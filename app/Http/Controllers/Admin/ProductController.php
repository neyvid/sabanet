<?php

namespace App\Http\Controllers\Admin;

use App\Models\Attachment\AttachmentType;
use App\Models\Category\CategoryType;
use App\Models\Product;
use App\Repositories\AttachmentRepository\AttachmentRepository;
use App\Repositories\CategoryRepository\CategoryRepository;
use App\Repositories\ProductRepository\ProductRepository;
use App\Services\Upload\UploadService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    protected $productRepository;
    protected $categoryRepositoru;

    public function __construct()
    {
        $this->productRepository = new ProductRepository();
        $this->categoryRepositoru = new CategoryRepository();
    }

    public function index()
    {

        $title = 'لیست محصولات';
        $products = $this->productRepository->all();
        return view('admin.product.index', compact('title', 'products'));

    }

    public function create()
    {

        $title = 'ایجاد محصول جدید';
        $categoriesOfProducts = $this->categoryRepositoru->all()->where('category_type', CategoryType::PRODUCT);
        return view('admin.product.create', compact('title', 'categoriesOfProducts'));

    }

    public function store(Request $request)
    {
        $product = $this->productRepository->create([
            'name' => $request->name,
            'price' => $request->price,
            'discount' => $request->discount,
            'stock' => $request->stock,
            'category_id' => $request->category,
            'product_type' => $request->product_type,
        ]);

        if ($product && $product instanceof Product) {
            $pictureOfProduct = $request->file('picture');
            $whiteList = config('upload.whitelist');
            if ($request->hasFile('picture') && in_array($pictureOfProduct->getClientMimeType(), $whiteList)) {
                $newFile = UploadService::image($request->picture);
                $attachmentRepository = new AttachmentRepository();
                $createAttachment = $attachmentRepository->create([
                    'type' => AttachmentType::IMAGE,
                    'name' => $newFile['name'],
                    'size' => $newFile['size'],
                ]);
                $product->attachments()->sync($createAttachment->id);
            }
            return redirect()->back()->with('success', 'محصول مورد نظر شما با موفیبت ثبت گردید');
        }


    }

    public function edit(Request $request)
    {
        $title = 'ویرایش محصول';
        $itemId = $request->item;
        $product = $this->productRepository->find($itemId);
        $categoriesOfProducts = $this->categoryRepositoru->all()->where('category_type', CategoryType::PRODUCT);
        return view('admin.product.edit', compact('title', 'product', 'categoriesOfProducts'));
    }

    public function update(Request $request)
    {

        $itemId = $request->item;
        $productUpdate = $this->productRepository->update($itemId, [
            'name' => $request->name,
            'price' => $request->price,
            'discount' => $request->discount,
            'stock' => $request->stock,
            'category_id' => $request->category,
            'product_type' => $request->product_type,
        ]);
        if ($productUpdate) {
            $pictureOfProduct = $request->file('picture');
            $whiteList = config('upload.whitelist');
            if ($request->hasFile('picture') && in_array($pictureOfProduct->getClientMimeType(), $whiteList)) {
                $newFile = UploadService::image($request->picture);
                $productForUpdate = $this->productRepository->find($itemId);
                $attachmentRepository = new AttachmentRepository();
                foreach ($productForUpdate->attachments as $attachment) {
                    File::delete(public_path('media/') . $attachment->name);
                    $productForUpdate->attachments()->delete($attachment->id);
                }
                $createAttachment = $attachmentRepository->create([
                    'type' => AttachmentType::IMAGE,
                    'name' => $newFile['name'],
                    'size' => $newFile['size'],
                ]);
                $productForUpdate->attachments()->sync($createAttachment->id);
            }
            return redirect()->back()->with('success', 'محصول مورد نظر شما با موفقیت بروزرسانی گردید.');
        }
    }

    public function destroy(Request $request)
    {
        $itemId = $request->item;
        $deleteItem = $this->productRepository->delete($itemId);
        if ($deleteItem) {
            return redirect()->back()->with('success', 'محصول موردنظرباموفقیت حذف گردید');
        }
    }
}

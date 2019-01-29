<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceCreate;
use App\Models\Attachment\AttachmentType;
use App\Models\Service;
use App\Repositories\AttachmentRepository\AttachmentRepository;
use App\Repositories\opratorRepository\OpratorRepository;
use App\Repositories\ServiceRepository\ServiceRepository;
use App\Services\Upload\UploadService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class ServiceController extends Controller
{
    protected $serviceRepository;
    protected $opratorRepository;

    public function __construct()
    {
        $this->serviceRepository = new ServiceRepository();
        $this->opratorRepository = new OpratorRepository();
    }

    public function index()
    {
        $title = 'سرویس های ارایه شده توسط اپراتور ها';
        $services = $this->serviceRepository->all();
        return view('admin.service.index', compact('services', 'title'));
    }

    public function create()
    {
        $title = 'ایجاد سرویس جدید برای اپراتور';
        $oprators = $this->opratorRepository->all();
        $serviceTypes = Service\ServiceType::getServiceType();
        $servicePlans = Service\ServicePlan::getServicePlan();
        return view('admin.service.create', compact('title', 'oprators', 'serviceTypes', 'servicePlans'));
    }

    public function store(ServiceCreate $request)
    {
        $serviceCreate = $this->serviceRepository->create([
            'oprator_id' => $request->input('oprator'),
            'name' => $request->input('name'),
            'type' => $request->input('type'),
            'plan' => $request->input('plan'),
            'period' => $request->input('period'),
            'night_trafic' => $request->input('nightTrafic'),
            'speed' => $request->input('speed'),
            'limit_amount' => $request->input('limitAmount'),
            'international_trafic' => $request->input('internationalTrafic'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'discount' => $request->input('discount'),
        ]);
        if ($serviceCreate && $serviceCreate instanceof Service) {
            $whiteList = config('upload.whitelist');
            $uploadedFile = $request->file('picture');
            if ($request->hasFile('picture') && in_array($uploadedFile->getClientMimeType(), $whiteList)) {
                $newFile = UploadService::image($request->picture);
                $attachmentRepository = new AttachmentRepository();
                $createAttachment = $attachmentRepository->create([
                    'type' => AttachmentType::IMAGE,
                    'name' => $newFile['name'],
                    'size' => $newFile['size'],
                ]);
                $serviceCreate->attachments()->sync([$createAttachment->id]);

            }
            return redirect()->back()->with('success', 'سرویس مورد نظر با موفقیت ثبت گردید');

        }


    }

    public function edit(Request $request)
    {
        $title = 'ویرایش سرویس اپراتور';
        $service = $this->serviceRepository->find($request->item);
        $oprators = $this->opratorRepository->all();
        $serviceTypes = Service\ServiceType::getServiceType();
        $servicePlans = Service\ServicePlan::getServicePlan();
        return view('admin.service.edit', compact('title', 'service', 'oprators', 'serviceTypes', 'servicePlans'));
    }

    public function update(Request $request)
    {

        $itemIdForUpdate = $request->input('item');
        $serviceUpdate = $this->serviceRepository->update($itemIdForUpdate, [
            'oprator_id' => $request->input('oprator'),
            'name' => $request->input('name'),
            'type' => $request->input('type'),
            'plan' => $request->input('plan'),
            'period' => $request->input('period'),
            'night_trafic' => $request->input('nightTrafic'),
            'speed' => $request->input('speed'),
            'limit_amount' => $request->input('limitAmount'),
            'international_trafic' => $request->input('internationalTrafic'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'discount' => $request->input('discount'),
        ]);
        if ($serviceUpdate) {
            $whiteList = config('upload.whitelist');
            $uploadedFile = $request->file('picture');
            if ($request->hasFile('picture') && in_array($uploadedFile->getClientMimeType(), $whiteList)) {
                $newFile = UploadService::image($request->picture);
                $itemForUpdate = $this->serviceRepository->find($itemIdForUpdate);
                $attachmentRepository = new AttachmentRepository();
                $createAttachment = $attachmentRepository->create([
                    'type' => AttachmentType::IMAGE,
                    'name' => $newFile['name'],
                    'size' => $newFile['size'],
                ]);
                foreach ($itemForUpdate->attachments as $attachment) {
                    File::delete(public_path('media/') . $attachment->name);
                    $itemForUpdate->attachments()->delete($attachment->id);

                }
                $itemForUpdate->attachments()->sync([$createAttachment->id]);
            }
            return redirect()->back()->with('success', 'سرویس مورد نظر با موفقیت بروزرسانی شد گردید');

        }
    }

    public function destroy(Request $request)
    {
        $itemId = $request->input('item');
        $deleteItem = $this->serviceRepository->delete($itemId);
        if ($deleteItem) {
            return redirect()->back()->with('success', 'سرویس موردنظرباموفقیت حذف گردید');
        }
    }
}

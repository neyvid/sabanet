<?php


namespace App\Services\Upload;


use Carbon\Carbon;
use Illuminate\Http\UploadedFile;

class UploadService
{
    public static function image(UploadedFile $file)
    {
        $fileExtension=$file->getClientOriginalExtension();
        $newName=Carbon::now('Asia/Tehran')->format('Y-m-d').'_'.str_random(10);
        $newFileName=$newName.'.'.$fileExtension;
        $newFile=$file->move(config('upload.path'),$newFileName);
        return [
          'size'=>$newFile->getSize(),
          'name'=>$newFileName
        ];
    }

}

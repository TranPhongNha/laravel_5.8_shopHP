<?php

namespace App\Traits;

use Storage;

trait StorageImageTrait
{
    public function storageTraitUpload($request, $fieldName, $foderName)
    {
        //check file có được upload ko
        if ($request->hasFile($fieldName)) {
            //xử lý upload file
            $file = $request->$fieldName;
            $fileNameOrigin = $file->getClientOriginalName();
            $fileNameHash = str_random(20) . '.' . $file->getClientOriginalExtension();
            $filePath = $request->file($fieldName)->storeAs('public/' . $foderName . '/' . auth()->id(), $fileNameHash);
            $dataUploadTrait = [
                'file_name' => $fileNameOrigin,  //trả về filename gốc
                'file_path' => Storage::url($filePath)
            ];
            return $dataUploadTrait;
        }
        return null;

    }
}

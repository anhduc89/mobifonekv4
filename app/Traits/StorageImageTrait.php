<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait StorageImageTrait
{
    public function storageTraitUpload($request, $fieldName, $folderName)
    {
        if ($request->hasFile($fieldName)) {
            $file = $request->$fieldName;
            $fileNameOrigin = $file->getClientOriginalName();
            $fileNameHash = date('dmY_hsi', time()) . '_' . str_random(10) . '.' . $file->getClientOriginalExtension();
            $filepath = $request->file($fieldName)->storeAs(
                'public/' . $folderName . '/' . auth()->id(),
                $fileNameHash
            );
            $dataUploadTrait = array(
                'file_name' => $fileNameOrigin,
                'file_path' => Storage::url($filepath) // dùng Storage::url($filepath) để chuyển lại thành folder storage/products trong public/storage.
                // Lưu vào db dưới dạng : storage/public/1/tên file và show ra ngoài web người dùng
            );
            return $dataUploadTrait;
        } else {
            return null;
        }
    }

    // upload nhiều file
    public function storageTraitUploadMutiple($file, $folderName)
    {
        $fileNameOrigin = $file->getClientOriginalName();
        $fileNameHash = date('dmY_hsi', time()) . '_' . str_random(10) . '.' . $file->getClientOriginalExtension();
        $filepath = $file->storeAs(
            'public/' . $folderName . '/' . auth()->id(),
            $fileNameHash
        );
        $dataUploadTrait = array(
            'file_name' => $fileNameOrigin,
            'file_path' => Storage::url($filepath) // dùng Storage::url($filepath) để chuyển lại thành folder storage/products trong public/storage.
            // Lưu vào db dưới dạng : storage/public/1/tên file và show ra ngoài web người dùng
        );
        return $dataUploadTrait;

    }
}

?>

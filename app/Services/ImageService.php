<?php

namespace App\Services;

use Illuminate\Support\Facades\File;

class ImageService {
    /**
     * Upload a new image and delete the old image if provided.
     *
     * @param \Illuminate\Http\UploadedFile|null $newImage
     * @param string|null $oldImagePath
     * @param string $uploadDirectory
     * @return string|null
     */
    public static function uploadImage($newImage, $oldImagePath = null, $uploadFolder = 'hzbrl') {

        if (!$newImage) {
            return $oldImagePath;
        }

// Delete the old image if it exists
        if ($oldImagePath && File::exists(public_path($oldImagePath))) {
            File::delete(public_path($oldImagePath));
        }

// Store the new image
        // $filePath = $newImage->store($uploadFolder, 'public');

        $destinationPath = public_path("uploads/$uploadFolder");

        $fileName = time() . '_' . $newImage->getClientOriginalName();
        $newImage->move($destinationPath, $fileName);
        $uploadedPath = 'uploads/' . $uploadFolder . '/' . $fileName;

        return $uploadedPath;
    }

}

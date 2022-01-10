<?php

if (!function_exists('uploadFile')) {
    function uploadFile($file = null, $dir)
    {
        if ($file) {

            $destinationPath =  public_path('storage') . DIRECTORY_SEPARATOR . $dir . DIRECTORY_SEPARATOR;

            $media_image = $file->hashName();

            $file->move($destinationPath, $media_image);

            return $media_image;
        }
    }
}

function statusChanges($data, $modalname)
{

    $model = "\\App\\Models\\" . $modalname;
    $update = $model::where('id', $data->id)->update(['status' => $data->status]);
    if ($update) {
        return response()->json(['status' => '1', 'mesage' => $data->status]);
    } else {
        return response()->json(['status' => '0', 'mesage' => $data->status]);
    }
}
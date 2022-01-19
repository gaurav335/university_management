<?php
use App\Models\MeritRound;
use App\Models\Addmissions;
use App\Models\CollegeMerit;
use App\Models\AddmissionConfimation;

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

if (!function_exists('encryptString')) {
    function encryptString($plaintext)
    {
        $ciphertext_raw =  openssl_encrypt(
            $plaintext,
            'AES-256-CBC',
            config('app.SERVER_ENCRYPTION_KEY'),
            $options = 0,
            config('app.SERVER_ENCRYPTION_IV')
        );
        return base64_encode($ciphertext_raw);
    }
}

if (!function_exists('decryptString')) {

    function decryptString($plaintext)
    {
        $c = base64_decode($plaintext);
        $original_plaintext = openssl_decrypt($c, 'AES-256-CBC', config('app.SERVER_ENCRYPTION_KEY'), $options = 0, config('app.SERVER_ENCRYPTION_IV'));
        return $original_plaintext;
    }
}

function generateStudentCode($id, $string)
{
    return strtoupper($string) . $id . rand(10000, 99999);
}

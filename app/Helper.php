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

function studenAdmission()
{
    $dt = new DateTime();
    $today = $dt->format('yy-mm-dd');
    $MeritRound = MeritRound::where('status', '1')->get();
    foreach ($MeritRound as $round) {
        if ($round->merit_result_declare_date <= $today) {
            $addmission = Addmissions::where('merit_round_id',$round->id)->where("status",'1')->get();
                foreach($addmission as $add){
                    foreach($add->college_id as $co_id){
                        $CollegeMerit = CollegeMerit::where('college_id',$co_id)->where('merit_round_id',$round->id)->where('course_id',$add->course_id)->first();
                        if($CollegeMerit){
                            if($CollegeMerit->merit <= $add->merit){
                            $AddmissionConfimation = AddmissionConfimation::where('addmission_id',$add->id)->where('confirm_round_id',$round->id)->first();
                               if(empty($AddmissionConfimation)){
                                AddmissionConfimation::create([
                                'addmission_id' => $add->id,
                                'confirm_college_id' => $co_id,
                                'confirm_round_id' => $round->id,
                                'confirm_merit' => round($add->merit,2),
                                'confirmation_type' => "M"
                            ]);
                       }
                    }
                }
            }
        }
        $CollegeMerit = CollegeMerit::where('merit_round_id',$round->id)->get();
        }
    }
}
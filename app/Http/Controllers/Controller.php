<?php

namespace App\Http\Controllers;

use App\Models\AssetFile;
use App\Models\Product;
use App\Models\User;
use App\Models\Vendor;
use App\Models\Visit;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Brian2694\Toastr\Facades\Toastr;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function recordSave($table,$req,$extra_data=null,$codition=null)
    {
        //record update
        if(isset($req['id'])){
            $model=$table::find($req['id']);

            if(! isset($model->id)){
                return false;
            }
            collect($req)->map(function($val,$key) use($model,$extra_data){

                if($key!='_token' && $key!='_method'){
                    $model->$key=$val;

                    if($extra_data!=null){
                        $extra_data->map(function($extra_data_val,$key) use($model){
                            $model->$key=$extra_data_val;
                        });
                    }
                }
            });
        }else{
            //record insert
            $model=new $table();
            collect($req)->map(function($val,$key) use($model,$extra_data){
                if($key!='_token'){
                    $model->$key=$val;

                    if($extra_data!=null){
                        $extra_data->map(function($extra_data_val,$key) use($model){
                            $model->$key=$extra_data_val;
                        });
                    }
                }
            });
        }
        return $model->save() ? $model : false;
    }


    public function fileUpload($file, $model, $storageType='local'): array
    {
        try {
            if($storageType == 'local'){
                $extension = $file->getClientOriginalExtension();
                $filename = $model->id.'_'.time().'.'.$extension;


                $path = 'images'.'/'.$model->getTable().'/';

                $folder = public_path('/storage/'.$path);
                if (!File::exists($folder)) {
                File::makeDirectory($folder, 0775, true, true);
                }

                $file->move($folder, $filename);
                $image = url('/storage/' . $path . $filename);

                $datas = [
                'filename' => $filename,
                'filepath' =>'/storage/'.$path.$filename,
                'url'=> $image,
                'original_name'=> $file->getClientOriginalName(),
                'filetype' =>  $file->getClientMimeType(),
                'created_by' => auth()->user()->id,
                ];
                return $datas;
            }
            else{
                return [];
            }
        } catch (Exception $e) {
            return [];
        }
    }

    public function downloadImage($id)
    {
        $file = AssetFile::where('id',$id)->first();
        // return $file;
        $subpath='';
        if($file->model_type == Vendor::class){
            $subpath ='vendors';
        } else if($file->model_type == Visit::class){
            $subpath ='visits';
        } else if($file->model_type == User::class){
            $subpath ='users';
        } else if($file->model_type == Product::class){
            $subpath ='products';
        }

        $imagePath = Storage::url('images/'.$subpath.'/'.$file->filename);

        return response()->download(public_path($imagePath));

    }


    //Team Assigned
    public function assignedTeam($data)
    {
        $user = User::findOrFail($data['id']);
        $user->team_id = $data['team_id'];
        if($user->save()){
            return true;
        }
        return false;
    }

    //Fetch Geo Tag from images
    function triphoto_getGPS($fileName)
    {
    //get the EXIF all metadata from Images
        try{
            $exif = exif_read_data($fileName);

            if(isset($exif["GPSLatitudeRef"])) {
                $LatM = 1; $LongM = 1;
                if($exif["GPSLatitudeRef"] == 'S') {
                    $LatM = -1;
                }
                if($exif["GPSLongitudeRef"] == 'W') {
                    $LongM = -1;
                }

                //get the GPS data
                $gps['LatDegree']=$exif["GPSLatitude"][0];
                $gps['LatMinute']=$exif["GPSLatitude"][1];
                $gps['LatgSeconds']=$exif["GPSLatitude"][2];
                $gps['LongDegree']=$exif["GPSLongitude"][0];
                $gps['LongMinute']=$exif["GPSLongitude"][1];
                $gps['LongSeconds']=$exif["GPSLongitude"][2];

                //convert strings to numbers
                foreach($gps as $key => $value){
                    $pos = strpos($value, '/');
                    if($pos !== false){
                        $temp = explode('/',$value);
                        $gps[$key] = $temp[0] / $temp[1];
                    }
                }

                //calculate the decimal degree
                $result['latitude']  = $LatM * ($gps['LatDegree'] + ($gps['LatMinute'] / 60) + ($gps['LatgSeconds'] / 3600));
                $result['longitude'] = $LongM * ($gps['LongDegree'] + ($gps['LongMinute'] / 60) + ($gps['LongSeconds'] / 3600));
                $result['datetime']  = $exif["FileDateTime"];

                return $result;
            }
        }catch(Exception $e){
            return [];
        }

    }
}

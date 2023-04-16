<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

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

    public function getEstablishmentType($id){
        if($id!=null){
            if($id == 1){
                return 'Individual';
            }elseif($id == 2){
                return 'LLP';
            }elseif($id == 3){
                return 'OPC';
            }elseif($id == 4){
                return 'Propietorship';
            }elseif($id == 5){
                return 'Partnership';
            }elseif($id == 6){
                return 'Pvt. Ltd.';
            }elseif($id == 7){
                return 'Public Ltd';
            }elseif($id == 8){
                return'Other';
            }
        }
        return null;
    }
}

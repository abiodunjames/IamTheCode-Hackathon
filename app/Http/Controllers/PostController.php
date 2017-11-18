<?php

namespace App\Http\Controllers;

use App\Incident;
use App\Services\GeoCord;
use App\Services\Sms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Ramsey\Uuid\Uuid;

class PostController extends Controller
{
    /**
     * @param Request $request
     * @return void
     */
    public function getUssD(Request $request)
    {
        $data['fromIp'] = $request->from;
        $data['location'] = $request->body;
        $data['name'] = "USSD PLATFORM";
        $city = isset($request->FromCity) ? $request->FromCity : null;
        $state = isset($request->FromState) ? $request->FromState : null;
        if ($city != null || $state != null) { //get coordinate
            $geocode = new GeoCord();
            $address = $city . ", " . $state;
            $result = $geocode->getByAddress($address);
            if ($result['accuracy'] != "result_not_found") {
                $data['longitude'] = $result['lng'];
                $data['latitude'] = $result['lat'];
            }
        }
        $incident = Incident::create($data);
        if ($incident) {
            Sms::Twilio()->message($request->from, 'Thank you! Your location was logged. Rescue agents are on the way');
        }
    }

    /**
     * @param Request $request
     * @return void
     */
    public function uploadImage(Request $request){
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            if($request->avatar!=null){
            }
            $extension =$request->avatar->extension();
            $file_name = Uuid::uuid4().'.'.$extension;;
            $path ='image';
            if(!Storage::exists($path)) Storage::makeDirectory($path, 775);
            $avatar  =Image::make($request->image)->resize(null,300,function ($constraint){
                $constraint->aspectRatio();
            });

            $avatar =$avatar->stream();
            $avatar_path =$path.DIRECTORY_SEPARATOR.$file_name;
            //dd(storage_path().'/'.$avatar_path);
            Storage::disk()->put($avatar_path,$avatar->__toString());

            $geo =new GeoCord();

            $lat =$request->lat;
            $lng =$request->lng;
            $location =$geo->getLocationFromCoordinate($lat,$lng);
            $incident=Incident::create(
                [
                    'name'=>"WEB PLATFORM",
                    'fromIp'=>request()->ip(),
                    'latitude'=>$lat,
                    'longitude'=>$lng,
                    'location'=>$location,
                    'photo'=>$avatar_path]
            );
            if($incident){
                return response(['status'=>true,'msg'=>'Data saved successfully']);
            }
        }
    }

}

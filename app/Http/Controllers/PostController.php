<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Incident;
use App\Services\GeoCord;
use App\Services\Sms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Ramsey\Uuid\Uuid;
use Validator;

//use Illuminate\Support\Facades\Validator;

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
                $data['location'] = $city . ", " . $state;
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
    public function uploadImage(ImageRequest $request)
    {
        //dd($request->all());

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            if ($request->avatar != null) {
            }
            $extension = $request->image->extension();
            $file_name = Uuid::uuid4() . '.' . $extension;;
            $path = 'image';
            if (!Storage::disk('public')->exists($path)) Storage::disk('public')->makeDirectory($path, 775);
            $avatar = Image::make($request->image)->resize(null, 300, function ($constraint) {
                $constraint->aspectRatio();
            });

            //$avatar = $avatar->stream();
            $avatar_path = $path . DIRECTORY_SEPARATOR . $file_name;
            //dd(storage_path().'/'.$avatar_path);
          //  Storage::disk('public')->put($avatar_path, $avatar->__toString());
            $request->image->move(public_path($path), $file_name);

            if ($request->has('email')) {
                $data['email'] = $request->email;
            }
            if ($request->has('lat') && $request->has('lng')) {
                $lat = $request->lat;
                $lng = $request->lng;
                $data['longitude'] = $lng;
                $data['latitude'] = $lat;
                $geo = new GeoCord();
                $result = $geo->getLocationFromCoordinate(floatval($lat), floatval($lng));
                $data['location'] = $result['formatted_address'];
            }
            $data['photo'] = $avatar_path;
            $data['name'] = "WEB PLATFORM";
            $data['fromIp'] = request()->ip();
            $incident = Incident::create($data);
            if ($incident) {
                if (!$request->ajax()) {
                    return back()->with('msg', 'Thank you for reporting. ');
            }
                return response(['status' => true, 'msg' => 'Data saved successfully']);

            }

        }
    }

    public  function  postMobileUSSD(Request $request){
        $data['name'] ='USSD PLATFORM';
        $data['location']=$request->address;
        $geo =new GeoCord();
        $result =$geo->getByAddress($data['location']);
        $data['longitude'] = $result['lng'];
        $data['latitude'] = $result['lat'];
        $inc=Incident::create($data);
        if($inc){
            return response(['status'=>true,'data'=>'Data saved successfully']);
        }


    }
}


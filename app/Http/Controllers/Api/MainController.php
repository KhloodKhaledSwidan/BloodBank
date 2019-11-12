<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Governorate;
use App\Models\City;
use App\Models\Setting;
use App\Models\BloodType;
use App\Models\Contact;
use App\Models\Category;
class MainController extends Controller
{
    //





    public function governorates(){
    	$governorates = Governorate::all();
    	return responseJson(1,'success',$governorates);
    }
    public function cities(Request $request){
    	$cities = City::where(function($query) use($request){

    		if ($request->has('governorate_id')) {
    		$query->where('governorate_id',$request->governorate_id);
    		}
    	})->get();
    	return responseJson(1,'success',$cities);
    }

    public function settings(){
    	$settings = Setting::all();
    	return responseJson(1,'success',$settings);

    }
       public function blood_types(){
    	$bloodTypes = BloodType::all();
    	return responseJson(1,'success',$bloodTypes);

    }

    public function contacts(Request $request){
    	$validator = validator()->make($request->all(),[
     
'title'=>'required',
'phone'=>'required',
'email'=>'required',
'message'=>'required',
'client_id'=>'required',

    	]);
    
  if ($validator->fails()) {
             return responseJson(0,$validator->errors()->first(),$validator->errors());
        }else{
    
    	$contacts = Contact::create($request->all());
    	return responseJson(1,'success',$contacts);
}
    }


    public function categories(){

        $categories = Category::paginate(5);
        return responseJson(1,'success',$categories);
    }
}

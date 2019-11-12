<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\DonationRequest;
class DonationController extends Controller
{
    //


    public  function createDonationRequest(Request $request){
        $client = auth()->user()->id;
//dd($client);
$donationRequest = DonationRequest::create([
'patient_name'=>$request->patient_name,
    'client_id'=>$client,
    'age'=>$request->age,
    'bags_number'=>$request->bags_number,
    'hospital_name'=>$request->hospital_name,
    'hospital_address'=>$request->hospital_address,
    'latitude'=>$request->latitude,
        'longitude'=>$request->longitude,
    'phone'=>$request->phone,
    'notes'=>$request->notes,
    'blood_type_id'=>$request->blood_type_id,
    'city_id'=>$request->city_id,
]);
//dd($donationRequest);

$donationRequest->save();
 return responseJson(1,'success',$donationRequest);


    }


    public function donation_details($id){
//        $donationDetails = DonationRequest::find($id);
//            $donationDetails->all();
//dd($donationDetails);
////     return responseJson(1,'success',$donationDetails);




        $post = DonationRequest::findOrFail($id);
        return responseJson(1,'success',$post);

    }


    public  function donation_requests(){
        $donationRequests = DonationRequest::select('patient_name','hospital_name','city_id','blood_type_id')->get()->toArray();
//
        return responseJson(1,'success',$donationRequests);
    }
}

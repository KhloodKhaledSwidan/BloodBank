<?php

namespace App\Http\Controllers\Api;

use App\Models\BloodType;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client;

class NotificationsController extends Controller
{
    //


    public function notificationSettings(Request $request)
    {

        $validator = validator()->make($request->all(), [
            'governorates' => 'array',
            'blood_types' => 'array',

        ]);
        if ($validator->fails()) {
            return responseJson(0, $validator->errors()->first(), $validator->errors());
        }
        if ($request->has('governorates')) {
            $request->user()->governorates()->sync($request->governorates);
        }
        if ($request->has('blood_types')) {
            $request->user()->blood_types()->sync($request->blood_types);
        }


        $data = [
            'governorates' => $request->user()->governorates()->pluck('governorates.id')->toArray(),
            'blood_types' => $request->user()->blood_types()->pluck('blood_types.id')->toArray(),
        ];
        return responseJson(1, 'success', $data);
    }

    public function notificationList(){
$allNotification = Notification::all();
if (count($allNotification) > 0){
    return responseJson(1,'success',$allNotification);
}else{
    return responseJson(0,'failed');
}
    }
}

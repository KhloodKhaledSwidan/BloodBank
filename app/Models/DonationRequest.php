<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonationRequest extends Model 
{

    protected $table = 'donation_requests';
    public $timestamps = true;
    protected $fillable = array('patient_name', 'age', 'bags_number', 'hospital_name', 'hospital_address', 'latitude', 'longitude', 'phone', 'notes', 'blood_type_id', 'city_id', 'client_id');

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function bloodType()
    {
        return $this->belongsTo('App\Models\BloodType');
    }

    public function notification()
    {
        return $this->hasOne('App\Models\Notification');
    }

}
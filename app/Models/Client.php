<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Client extends Authenticatable 
{

    protected $table = 'clients';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('name', 'password', 'phone', 'email', 'date_of_birth', 'pin_code', 'blood_type_id', 'city_id','last_donation_date');

    public function bloodType()
    {
        return $this->belongsTo('App\Models\BloodType');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function posts()
    {
        return $this->belongsToMany('App\Models\Post');
    }

    public function blood_types()
    {
        return $this->belongsToMany('App\Models\BloodType');
    }

    public function governorates()
    {
        return $this->belongsToMany('App\Models\Governorate');
    }

    public function notifications()
    {
        return $this->belongsToMany('App\Models\Notification');
    }

    public function contacts()
    {
        return $this->hasMany('App\Models\Contact');



    }


    public function tokens(){
        return $this->hasMany('App\Models\Token');
    }

      protected $hidden = [
        'password', 'api_token',
    ];

}



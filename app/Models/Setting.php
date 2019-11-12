<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model 
{

    protected $table = 'settings';
    public $timestamps = true;
    protected $fillable = array('about_app', 'phone', 'email', 'facebook_link', 'twitter_link', 'youtube_link', 'play_store_link', 'app_store_link');

}
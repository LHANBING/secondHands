<?php

namespace App\http\Model;

use Illuminate\Database\Eloquent\Model;

class Useraddress extends Model
{
    protected $table = "useraddress";
    protected $fillable = ['user_id','address','address_tel','addressname','province','city','area','status'];
    public $timestamps = false;
}

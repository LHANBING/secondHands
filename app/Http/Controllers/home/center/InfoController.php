<?php

namespace App\Http\Controllers\home\center;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class InfoController extends Controller
{
    public function index ()
    {
   		return view('homes.center.info');
    }

    public function edit ()
    {
    	echo "处理信息修改";
    }

}

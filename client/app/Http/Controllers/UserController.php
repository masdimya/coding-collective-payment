<?php

namespace App\Http\Controllers;

use App\Events\BroadCastTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;


class UserController extends Controller
{
    public function hookTransaction(){
        event(new BroadCastTransaction(true));
        return response('ok',200);
    }
}

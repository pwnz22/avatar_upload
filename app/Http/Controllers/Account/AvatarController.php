<?php

namespace App\Http\Controllers\Account;

use App\Http\Requests\AccountStoreAvatar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AvatarController extends Controller
{
    public function store(AccountStoreAvatar $request)
    {


        return response(null, 200);
    }
}

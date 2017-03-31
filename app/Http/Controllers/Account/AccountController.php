<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'avatar_id' => Rule::exists('image', 'id')->where(function ($q) use ($request) {
                $q->where('user_id', $request->user()->id);
            }),
        ]);

        $request->user()->update($request->only(['name', 'avatar_id']));

        return back();
    }
}

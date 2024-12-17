<?php

namespace App\Http\Controllers\Customer\mypage;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class EditProfileController extends Controller
{
    public function __invoke(): View
    {
        $customer = Customer::find(Auth::id()) ?? Customer::first();        

        return view('clients.account.edit', compact('customer'));
    }
}
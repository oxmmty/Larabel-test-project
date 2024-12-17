<?php
    
namespace App\Http\Controllers\Auth;
    
use App\Http\Controllers\Controller;
    
class UserRegisterController extends Controller
{
    public function __invoke() {
        return view('clients.account.register');
    }

}
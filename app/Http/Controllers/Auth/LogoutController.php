<?php
    
namespace App\Http\Controllers\Auth;
    
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Session;
    
class LogoutController extends Controller
{
    public function __invoke() {
    {
        Session::flush();
        Auth::logout();
  
        return Redirect('admin/login');
    }
    }
}
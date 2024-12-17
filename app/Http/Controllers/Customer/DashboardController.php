<?php
    
namespace App\Http\Controllers\Customer;
    
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

    
class DashboardController extends Controller
{
    public function __invoke(Request $request) {
        return view('clients.dashboard');
    }
}
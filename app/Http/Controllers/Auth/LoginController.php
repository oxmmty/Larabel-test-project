<?php
  
namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
  
class LoginController extends Controller
{
    /**
     * ログイン画面を表示する
     *
     * @return response()
     */
    public function index(): View
    {
        return view('clients.auth.login');
    }
      
    /**
     * ログイン処理を行う
     *
     * @return response()
     */
    public function postLogin(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('ログインに成功しました');
        }
  
        return redirect("login")->withError('おっと！無効な認証情報が入力されました');
    }
    
    /**
     * ログアウト処理を行う
     *
     * @return response()
     */
    public function logout(): RedirectResponse
    {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}

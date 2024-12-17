<?php
  
namespace App\Http\Controllers\Admin\Auth;
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
  
class AuthController extends Controller
{
    /**
     * ログイン画面を表示する
     *
     * @return response()
     */
    public function index(): View
    {
        return view('admin.auth.login');
    }  
      
    /**
     * 登録画面を表示する
     *
     * @return response()
     */
    public function registration(): View
    {
        return view('admin.auth.registration');
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
            return redirect()->intended('admin/dashboard')
                        ->withSuccess('ログインに成功しました');
        }
  
        return redirect("admin/login")->withError('おっと！無効な認証情報が入力されました');
    }
      
    /**
     * ユーザー登録処理を行う
     *
     * @return response()
     */
    public function postRegistration(Request $request): RedirectResponse
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $user = $this->create($data);
            
        Auth::login($user); 

        return redirect("admin/dashboard")->withSuccess('すばらしい！ログインに成功しました');
    }
    
    /**
     * ダッシュボードを表示する
     *
     * @return response()
     */
    public function dashboard()
    {
        if(Auth::check()){
            return view('admin.dashboard');
        }
  
        return redirect("admin/login")->withSuccess('おっと！アクセス権限がありません');
    }
    
    /**
     * ユーザーを作成する
     *
     * @return response()
     */
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
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
  
        return Redirect('admin/login');
    }
}

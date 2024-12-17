<?php
    
namespace App\Http\Controllers\Admin;
    
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

    
class UserController extends Controller
{
    /**
     * リソースの一覧を表示する。
     */
    public function index(Request $request): View
    {
        $search = $request->input('search');
        $users = User::query()
            ->where('name', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->latest()
            ->paginate(5);

        return view('admin.users.index', compact('users', 'search'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * 新しいリソースを作成するためのフォームを表示する。
     */
    public function create(): View
    {
        return view('admin.users.create');
    }
    
    /**
     * ストレージに新しく作成されたリソースを保存する。
     */
    public function store(UserStoreRequest $request): RedirectResponse
    {
        User::create(array_merge($request->validated(), ['password' => bcrypt($request->password)]));
        
        return redirect()->route('admin.users.index')
                         ->with('success', 'ユーザーが正常に作成されました。');
    }
  
    /**
     * 指定されたリソースを表示する。
     */
    public function show(User $user): View
    {
        return view('admin.users.show',compact('user'));
    }
  
    /**
     * 指定されたリソースを編集するためのフォームを表示する。
     */
    public function edit(User $user): View
    {
        return view('admin.users.edit',compact('user'));
    }
  
    /**
     * ストレージに保存された指定されたリソースを更新する。
     */
    public function update(UserUpdateRequest $request, User $user): RedirectResponse
    {
        $user->update($request->validated());
          
        return redirect()->route('admin.users.index')
                        ->with('success','ユーザーが正常に更新されました。');
    }
  
    /**
     * ストレージから指定されたリソースを削除する。
     */
    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
           
        return redirect()->route('admin.users.index')
                        ->with('success','ユーザーが正常に削除されました。');
    }

    /**
     * Export users to Excel.
     */
    public function export()
    {
        $users = User::all();
        return Excel::download(new UsersExport($users), 'users.xlsx');
    }
}
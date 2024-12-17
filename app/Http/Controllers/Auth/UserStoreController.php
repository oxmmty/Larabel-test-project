<?php
    
namespace App\Http\Controllers\Auth;
    
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerStoreRequest;
use App\Models\Customer;
use Illuminate\Support\Facades\Storage;

    
class UserStoreController extends Controller
{
    public function __invoke(CustomerStoreRequest $request) {
        $imagePath = $request->hasFile('avatar') ? $this->uploadImage($request) : "default";

        Customer::create(array_merge($request->validated(), ['avatar' => $imagePath, 'password' => bcrypt($request->password)]));
        
        return redirect()->route('login')
                         ->with('success', 'ユーザーが正常に作成されました。');
    }

    private function uploadImage($request)
    {
        $image = $request->file('avatar');
        $imageName = time().'.'.$image->extension();
        $image->storeAs('public/avatars', $imageName);
        return $imageName;
    }
}
<?php

namespace App\Http\Controllers\Customer\Mypage;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Http\Requests\CustomerUpdateRequest;

class UpdateProfileController extends Controller
{
    public function __invoke(CustomerUpdateRequest $request, Customer $customer): View
    {
        if ($request->hasFile('image')) {
            $imagePath = $this->uploadImage($request); // Use the new method
            $customer->update(array_merge($request->validated(), ['image' => $imagePath]));
        } else {
            $customer->update($request->validated());
        }
        return view('clients.account.edit', compact('customer', 'loggedUser'));
    }

    private function uploadImage(Request $request): string
    {
        if (!$request->hasFile('avatar')) {
            return '';
        }
        return $request->file('avatar')->store('images', 'public'); // Store the image
    }
}

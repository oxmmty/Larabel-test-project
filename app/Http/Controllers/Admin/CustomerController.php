<?php
    
namespace App\Http\Controllers\Admin;
    
use App\Models\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Http\Requests\CustomerStoreRequest;
use App\Http\Requests\CustomerUpdateRequest;
use App\Exports\CustomersExport;
use Maatwebsite\Excel\Facades\Excel;

    
class CustomerController extends Controller
{
    /**
     * リソースの一覧を表示する。
     */
    public function index(Request $request): View
    {
        $search = $request->input('search');
        $customers = Customer::query()
            ->where('name', 'like', '%' . $search . '%')
            ->orWhere('customer_id', 'like', '%' . $search . '%')
            ->latest()
            ->paginate(5);

        return view('admin.customers.index', compact('customers', 'search'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * 新しいリソースを作成するためのフォームを表示する。
     */
    public function create(): View
    {
        return view('admin.customers.create');
    }
    
    /**
     * ストレージに新しく作成されたリソースを保存する。
     */
    public function store(CustomerStoreRequest $request): RedirectResponse
    {   
        $imagePath = $request->hasFile('avatar') ? $this->uploadImage($request) : "default";

        Customer::create(array_merge($request->validated(), ['avatar' => $imagePath, 'password' => bcrypt($request->password)]));
        
        return redirect()->route('admin.customers.index')
                         ->with('success', '顧客が正常に作成されました。');
    }
  
    /**
     * 指定されたリソースを表示する。
     */
    public function show(Customer $customer): View
    {
        return view('admin.customers.show',compact('customer'));
    }
  
    /**
     * 指定されたリソースを編集するためのフォームを表示する。
     */
    public function edit(Customer $customer): View
    {
        return view('admin.customers.edit',compact('customer'));
    }
  
    /**
     * ストレージに保存された指定されたリソースを更新する。
     */
    public function update(CustomerUpdateRequest $request, Customer $customer): RedirectResponse
    {
        // Handle image upload if a new image is provided
        if ($request->hasFile('image')) {
            $imagePath = $this->uploadImage($request); // Use the new method
            $customer->update(array_merge($request->validated(), ['image' => $imagePath]));
        } else {
            $customer->update($request->validated());
        }
          
        return redirect()->route('admin.customers.index')
                        ->with('success','顧客が正常に更新されました。');
    }
  
    /**
     * ストレージから指定されたリソースを削除する。
     */
    public function destroy(Customer $customer): RedirectResponse
    {
        $customer->delete();
           
        return redirect()->route('admin.customers.index')
                        ->with('success','顧客が正常に削除されました。');
    }

    /**
     * Export customers to Excel.
     */
    public function export()
    {
        $customers = Customer::all();
        return Excel::download(new CustomersExport($customers), 'customers.xlsx');
    }
    /**
     * Handle image upload and return the path.
     */
    private function uploadImage(Request $request): string
    {
        if (!$request->hasFile('avatar')) {
            return '';
        }
        return $request->file('avatar')->store('images', 'public'); // Store the image
    }
}
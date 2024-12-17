@extends('clients.layout')
    
@section('content')
  
<div class="card mt-5">
  <h2 class="card-header">プロファイルを編集</h2>
  <div class="card-body">
  
    <form action="{{ route('customers.update',$customer->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
  
        <div class="mb-3">
            <label for="inputName" class="form-label"><strong>名前:</strong></label>
            <input 
                type="text" 
                name="name" 
                value="{{ $customer->name }}"
                class="form-control @error('name') is-invalid @enderror" 
                id="inputName" 
                placeholder="名前">
            @error('name')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
  
        <div class="mb-3">
            <label for="inputDetail" class="form-label"><strong>詳細:</strong></label>
            <textarea 
                class="form-control @error('detail') is-invalid @enderror" 
                style="height:150px" 
                name="detail" 
                id="inputDetail" 
                placeholder="詳細">{{ $customer->detail }}</textarea>
            @error('detail')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="inputCustomerID" class="form-label"><strong>顧客ID:</strong></label>
            <input 
                type="text" 
                name="customer_id" 
                value="{{ $customer->customer_id }}"
                class="form-control @error('customer_id') is-invalid @enderror" 
                id="inputCustomerID" 
                placeholder="顧客ID">
            @error('customer_id')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
  
        <div class="mb-3">
            <label for="inputPassword" class="form-label"><strong>パスワード:</strong></label>
            <input 
                type="password" 
                name="password" 
                class="form-control @error('password') is-invalid @enderror" 
                id="inputPassword" 
                placeholder="新しいパスワード（変更する場合のみ入力）">
            @error('password')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
  
        <div class="mb-3">
            <label for="inputGender" class="form-label"><strong>性別:</strong></label>
            <div class="form-check form-check-inline">
                <input 
                    class="form-check-input" 
                    type="radio" 
                    name="gender" 
                    id="male" 
                    value="male"
                    {{ $customer->gender == 'male' ? 'checked' : '' }}>
                <label class="form-check-label" for="male">男性</label>
            </div>
            <div class="form-check form-check-inline">
                <input 
                    class="form-check-input" 
                    type="radio" 
                    name="gender" 
                    id="female" 
                    value="female"
                    {{ $customer->gender == 'female' ? 'checked' : '' }}>
                <label class="form-check-label" for="female">女性</label>
            </div>
            @error('gender')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
  
        <div class="mb-3">
            <label for="inputAvatar" class="form-label"><strong>アバター:</strong></label>
            <input 
                type="file" 
                name="avatar" 
                class="form-control @error('avatar') is-invalid @enderror" 
                id="inputAvatar" 
                accept="image/*">
            @if($customer->avatar)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $customer->avatar) }}" alt="Current Avatar" style="max-width: 200px;">
                </div>
            @endif
            @error('avatar')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
  
        <div class="mb-3">
            <label for="inputJobType" class="form-label"><strong>職業タイプ:</strong></label>
            <select 
                class="form-select @error('job_type') is-invalid @enderror" 
                name="job_type" 
                id="inputJobType">
                <option value="">選択してください</option>
                <option value="1" {{ $customer->job_type == '1' ? 'selected' : '' }}>フルタイム</option>
                <option value="2" {{ $customer->job_type == '2' ? 'selected' : '' }}>パートタイム</option>
                <option value="3" {{ $customer->job_type == '3' ? 'selected' : '' }}>フリーランス</option>
            </select>
            @error('job_type')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
  
        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> 更新</button>
    </form>
  
  </div>
</div>
@endsection
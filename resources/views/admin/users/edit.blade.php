@extends('admin.layout')
    
@section('content')
  
<div class="card mt-5">
  <h2 class="card-header">ユーザーを編集</h2>
  <div class="card-body">
  
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('admin.users.index') }}"><i class="fa fa-arrow-left"></i> 戻る</a>
    </div>
  
    <form action="{{ route('admin.users.update',$user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
  
        <div class="mb-3">
            <label for="inputName" class="form-label"><strong>名前:</strong></label>
            <input 
                type="text" 
                name="name" 
                value="{{ $user->name }}"
                class="form-control @error('name') is-invalid @enderror" 
                id="inputName" 
                placeholder="名前">
            @error('name')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
  
        <div class="mb-3">
            <label for="inputEmail" class="form-label"><strong>メールアドレス:</strong></label>
            <input 
                type="email" 
                name="email" 
                value="{{ $user->email }}"
                class="form-control @error('email') is-invalid @enderror" 
                id="inputEmail" 
                placeholder="メールアドレス">
            @error('email')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
  
        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> 更新</button>
    </form>
  
  </div>
</div>
@endsection
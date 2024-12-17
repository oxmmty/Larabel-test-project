@extends('admin.layout')
    
@section('content')
  
<div class="card mt-5">
  <h2 class="card-header">新しいユーザーを追加</h2>
  <div class="card-body">
  
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('admin.users.index') }}"><i class="fa fa-arrow-left"></i> 戻る</a>
    </div>
  
    <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="inputName" class="form-label"><strong>名前:</strong></label>
            <input 
                type="text" 
                name="name" 
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
                class="form-control @error('email') is-invalid @enderror" 
                id="inputEmail" 
                placeholder="メールアドレス">
            @error('email')
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
                placeholder="パスワード">
            @error('password')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
  
        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> 送信</button>
    </form>
  
  </div>
</div>
@endsection
@extends('clients.layout')
  
@section('content')

<div class="card mt-5">
  <h2 class="card-header">顧客情報</h2>
  <div class="card-body">  
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
            <label class="form-label"><strong>名前:</strong></label>
            <div class="form-control bg-light">{{ $customer->name }}</div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
            <label class="form-label"><strong>メールアドレス:</strong></label>
            <div class="form-control bg-light">{{ $customer->email }}</div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
            <label class="form-label"><strong>電話番号:</strong></label>
            <div class="form-control bg-light">{{ $customer->phone }}</div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
            <label class="form-label"><strong>住所:</strong></label>
            <div class="form-control bg-light">{{ $customer->address }}</div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
            <label class="form-label"><strong>詳細:</strong></label>
            <div class="form-control bg-light">{{ $customer->detail }}</div>
        </div>
    </div>

    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
        <a href="{{ route('mypage.edit', $customer->id) }}" class="btn btn-warning">
            <i class="fa-solid fa-pen-to-square"></i> 編集
        </a>
    </div>
  </div>
</div>
@endsection
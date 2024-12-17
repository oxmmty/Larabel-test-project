@extends('admin.layout')
  
@section('content')

<div class="card mt-5">
  <h2 class="card-header">ユーザーを表示</h2>
  <div class="card-body">
  
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('admin.users.index') }}"><i class="fa fa-arrow-left"></i> 戻る</a>
    </div>
  
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>名前:</strong> <br/>
                {{ $user->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
            <div class="form-group">
                <strong>メールアドレス:</strong> <br/>
                {{ $user->email }}
            </div>
        </div>
    </div>
  
  </div>
</div>
@endsection
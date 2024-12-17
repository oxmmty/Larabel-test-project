@extends('admin.layout')
  
@section('content')

<div class="card mt-5">
  <h2 class="card-header">顧客を表示</h2>
  <div class="card-body">
  
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('admin.customers.index') }}"><i class="fa fa-arrow-left"></i> 戻る</a>
    </div>
  
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>名前:</strong> <br/>
                {{ $customer->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
            <div class="form-group">
                <strong>詳細:</strong> <br/>
                {{ $customer->detail }}
            </div>
        </div>
    </div>
  
  </div>
</div>
@endsection
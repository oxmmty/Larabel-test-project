@extends('admin.layout')

@section('content')
    <div class="p-5 mb-4 bg-light rounded-3">
      <div class="container-fluid py-5">

        @session('success')
            <div class="alert alert-success" role="alert"> 
              {{ $value }}
            </div>
        @endsession

        <h1 class="display-5 fw-bold">こんにちは、{{ auth()->user()->name }}</h1>
        <p class="col-md-8 fs-4">ダッシュボードへようこそ。<br/>ユーティリティのシリーズを使用して、このジャンボトロンを作成することができます。以前のBootstrapのバージョンと同じように、以下の例を見てみてください。</p>
        <button class="btn btn-primary btn-lg" type="button">ダッシュボード</button>
      </div>
    </div>
@endsection

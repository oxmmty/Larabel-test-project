<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>テスト</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  </head>
<body>
    
<main>
  <div class="container py-4">
    <header class="pb-3 mb-4 border-bottom">
        <div class="row">
            <div class="col-md-3">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('ログアウト') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="GET" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
      
    </header>

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

  </div>
</main>

</body>
</html>

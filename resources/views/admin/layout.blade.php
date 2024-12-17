<!DOCTYPE html>
<html lang="ja">
<head>
    <title>テスト</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
</head>
<body>
      
<main>
  <div class="container py-4">
    <header class="pb-3 mb-4 border-bottom">
        <div class="row flex justify-content-end">
            <div class="col-md-10 flex justify-content-end">
                <button type="button" class="btn btn-link" onclick="location.href='{{ route('admin.customers.index') }}'">
                    {{ __('カスタマー') }}
                </button>
                <button type="button" class="btn btn-link" onclick="location.href='{{ route('admin.users.index') }}'">
                    {{ __('管理ユーザー') }}
                </button>
                <button type="button" class="btn btn-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('ログアウト') }}
                </button>

                <form id="logout-form" action="{{ route('logout') }}" method="GET" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </header>
    <div class="container">
        @yield('content')
    </div>
  </div>
</main>
      
</body>
</html>
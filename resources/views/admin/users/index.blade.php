@extends('admin.layout')
   
@section('content')
  
<div class="card mt-5">
  <h2 class="card-header">ユーザー一覧</h2>
  <div class="card-body">
          
        @session('success')
            <div class="alert alert-success" role="alert"> {{ $value }} </div>
        @endsession
  
        <div class="d-flex justify-content-between align-items-center">
            <form action="{{ route('admin.users.index') }}" method="GET" class="d-flex">
                <input 
                    type="text" 
                    name="search" 
                    class="form-control me-2" 
                    id="search" 
                    placeholder="検索語"
                    value="{{ request()->input('search') }}">
                <button type="submit" class="btn btn-primary">検索</button>
            </form>
            <a class="btn btn-success btn-sm" href="{{ route('admin.users.create') }}"> <i class="fa fa-plus"></i> 新しいユーザーを作成</a>
        </div>
  
        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>名前</th>
                    <th>メールアドレス</th>
                    <th>詳細</th>
                    <th width="250px">アクション</th>
                </tr>
            </thead>
  
            <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->detail }}</td>
                    <td>
                        <form action="{{ route('admin.users.destroy',$user->id) }}" method="POST">
             
                            <a class="btn btn-info btn-sm" href="{{ route('admin.users.show',$user->id) }}"><i class="fa-solid fa-list"></i> 表示</a>
              
                            <a class="btn btn-primary btn-sm" href="{{ route('admin.users.edit',$user->id) }}"><i class="fa-solid fa-pen-to-square"></i> 編集</a>
             
                            @csrf
                            @method('DELETE')
                
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> 削除</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">データがありません。</td>
                </tr>
            @endforelse
            </tbody>
  
        </table>
        
        {!! $users->links() !!}
  
  </div>
</div>  
@endsection
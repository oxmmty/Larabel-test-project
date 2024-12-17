@extends('admin.layout')
   
@section('content')
  
<div class="card mt-5">
  <h2 class="card-header">テスト</h2>
  <div class="card-body">
          
        @session('success')
            <div class="alert alert-success" role="alert"> {{ $value }} </div>
        @endsession
  
        <div class="d-flex justify-content-between align-items-center">
            <form action="{{ route('admin.customers.index') }}" method="GET" class="d-flex">
                <input 
                    type="text" 
                    name="search" 
                    class="form-control me-2" 
                    id="search" 
                    placeholder="検索語"
                    value="{{ request()->input('search') }}">
                <button type="submit" class="btn btn-primary">検索</button>
            </form>
            <a class="btn btn-success btn-sm" href="{{ route('admin.customers.create') }}"> <i class="fa fa-plus"></i> 新しい顧客を作成</a>
            <a class="btn btn-info btn-sm" href="{{ route('admin.customers.export') }}"> <i class="fa fa-file-excel"></i> Excelエクスポート</a>
        </div>
  
        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>名前</th>
                    <th>顧客ID</th>
                    <th>性別</th>
                    <th>アバター</th>
                    <th>職業タイプ</th>
                    <th>詳細</th>
                    <th width="250px">アクション</th>
                </tr>
            </thead>
  
            <tbody>
            @forelse ($customers as $customer)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->customer_id }}</td>
                    <td>{{ $customer->gender }}</td>
                    <td><img src="{{ asset('storage/' . $customer->avatar) }}" alt="Avatar" class="img-fluid" style="width: 100px; height: 100px;"></td>
                    <td>{{ $customer->job_type }}</td>
                    <td>{{ $customer->detail }}</td>
                    <td>
                        <form action="{{ route('admin.customers.destroy',$customer->id) }}" method="POST">
             
                            <a class="btn btn-info btn-sm" href="{{ route('admin.customers.show',$customer->id) }}"><i class="fa-solid fa-list"></i> 表示</a>
              
                            <a class="btn btn-primary btn-sm" href="{{ route('admin.customers.edit',$customer->id) }}"><i class="fa-solid fa-pen-to-square"></i> 編集</a>
             
                            @csrf
                            @method('DELETE')
                
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> 削除</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8">データがありません。</td>
                </tr>
            @endforelse
            </tbody>
  
        </table>
        
        {!! $customers->links() !!}
  
  </div>
</div>  
@endsection
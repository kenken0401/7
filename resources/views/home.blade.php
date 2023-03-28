@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class = "search">
                        <form action="{{ route('posts.index') }}" method="GET">
                            <label>商品名</label><br>
                            <input type="text" name="keyword" value="{{ $keyword }}"><br>
                            <label>メーカー名</label><br>
                            <select name = "company_id">
                                @foreach ($companies as $company)
                                <option value = "{{ $company->id }}">{{ $company->company_name }}</option>
                                @endforeach
                            </select><br>
                            <input type = "submit" class = "btn" value = "検索">

                        </form>
                    </div>
                    <a href="{{ url('/signup') }}"><input type='button' value='新規登録'></a>
                    <h2>商品一覧</h2>
                </div>
                <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>商品画像</th>
                        <th>商品名</th>
                        <th>価格</th>
                        <th>在庫数</th>
                        <th>メーカー名</th>
                        <th>詳細表示</th>
                        <th>削除</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->img_path}}</td>
                        <td>{{ $item->product_name }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->stock }}</td>
                        <td>{{ $item->company_name }}</td>
                        <td>
                            <a href = "{{ route('detail', $item->id) }}">
                                <button type="submit">詳細</button>
                            <a>
                        </td>
                        <td>
                        <form action = "{{ route('del', $item->id) }}" method = "post" onclick = 'return confirm("削除しますか？")'>
                            @csrf
                            <button type = "submit">削除</button>
                        </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

                <div class = "card-body">
                    
                    @if (session('status'))
                        <div class = "alert alert-success" role = "alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

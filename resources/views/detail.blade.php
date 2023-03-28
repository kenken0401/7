<!DOCTYPE html>
<html lang = "ja">
<head>
  <meta charset = "UTF-8">
  <title>商品情報</title>
</head>
<body>
  <div>商品情報</div>
  <div class="contaner">
    <table>
      <thead>
        <tr>
            <th>商品ID</th>
            <th>商品画像</th>
            <th>商品名</th>
            <th>メーカー名</th>
            <th>価格</th>
            <th>在庫数</th>
            <th>コメント</th>
            <th>編集</th>
            <th>戻る</th>
        </tr>
      </thead>
      <tbody>
        @foreach($details as $detail)
        <tr>
            <td>{{ $detail->product_id }}</td>
            <td>{{ $detail->img_path }}</td>
            <td>{{ $detail->product_name }}</td>
            <td>{{ $detail->company_name }}</td>
            <td>{{ $detail->price }}</td>
            <td>{{ $detail->stock }}</td>
            <td>{{ $detail->comment }}</td>
            <td>
                <a href = "{{ route('edit', $detail->product_id) }}">                
                  <button type="submit">編集</button>
                </a>
            </td>
            <td>
                <a href = "{{ url('/home') }}">
                  <button type="submit">戻る</button>
                </a>
            </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>

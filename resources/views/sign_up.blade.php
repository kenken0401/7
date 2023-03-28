<!DOCTYPE html>
<html lang = "ja">
<head>
  <meta charset = "UTF-8">
  <title>新規登録</title>
</head>
<body>
  <div>商品登録</div>
  <div class="contaner">
    @if ($errors->any())
      @foreach ($errors->all() as $error)
          <p class="validation">{{$error}}</p>
      @endforeach
    @endif
    <form id = "new-product_form" action = "insert" method = "POST">
    @csrf
      <table>
          <thead>
              <tr>
                  <th>商品名</th>
                  <th>メーカー名</th>
                  <th>価格</th>
                  <th>在庫数</th>
                  <th>コメント</th>
                  <th>商品画像</th>
              </tr>
          </thead>
          <tbody>
              <tr>
                  <td><input type = "text" name = "product_name" value="{{ old('product_name') }}"></td>
                  <td>
                    <select name = "company_id">
                      @foreach ($companies as $company)
                        <option value = "{{ $company->id }}">{{ $company->company_name }}</option>
                      @endforeach
                    </select>
                  </td>
                  <td><input type = "text" name = "price" value="{{ old('price') }}"></td>
                  <td><input type = "text" name = "stock" value="{{ old('stock') }}"></td>
                  <td><input type = "text" name = "comment" value="{{ old('comment') }}"></td>
                  <td><input type = "file" name = "img_path"></td>
              </tr>
          </tbody>
      </table>
    <p><input type = "submit" value = "登録"></p>
    <p><a href = "{{ url('/home') }}"><input type = "button" value = "戻る"></a></p>
    </form>
  </div>
</body>

<!DOCTYPE html>
<html lang = "ja">
<head>
  <meta charset = "UTF-8">
  <title>編集画面</title>
</head>
<body>
  <div>商品情報編集</div>
  <div class="contaner">
    @if ($errors->any())
      @foreach ($errors->all() as $error)
          <p class="validation">{{$error}}</p>
      @endforeach
    @endif
    <form id = "new-product_form" action = "{{ route('update',$items->product_id) }}" method = "POST">
    @method('patch')
    @csrf
      <table>
          <thead>
              <tr>
                  <th>商品情報ID</th>
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
                  <td>{{ $items->product_id }}</td>
                  <td><input type = "text" name = "product_name" value="{{ $items->product_name }}"></td>
                  <td>
                    <select name = "company_id">
                      @foreach ($companies as $company)
                        @if ($items->company_id == $company->id)
                        <option value = "{{ $company->id }}" selected="selected">{{ $company->company_name }}</option>
                        @else
                        <option value = "{{ $company->id }}">{{ $company->company_name }}</option>
                        @endif
                      @endforeach
                    </select>
                  </td>
                  <td><input type = "text" name = "price" value = "{{ $items->price }}"></td>
                  <td><input type = "text" name = "stock" value = "{{ $items->stock }}"></td>
                  <td><input type = "text" name = "comment" value = "{{ $items->comment }}"></td>
                  <td><input type = "file" name = "img_path"></td>
              </tr>
              <p><input type = "submit" value = "更新"></p>
              <p><a href = "{{ route('detail', $items->product_id) }}"><input type = "button" value = "戻る"></a></p>
          </tbody>
      </table>
    </form>
  </div>
</body>

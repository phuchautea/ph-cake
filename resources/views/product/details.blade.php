Chi tiết sản phẩm: {{ $product->slug }}<hr>
Tên: {{ $product->name }} <br>
Giá: {{ number_format($product->price) }}đ <br>
Mô tả: {{ $product->description }} <br>
<img src="{{ $product->image }}" class="img-fluid" width="100px"> <br>
<form method="post" action="/addToCart">
    <input class="form-control" type="number" min="1" value="1" name="quantity">
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <button type="submit" class="btn btn-primary">Thêm vào giỏ hàng</button>
    @csrf
</form>

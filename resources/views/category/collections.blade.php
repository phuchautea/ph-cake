@foreach ($products as $product)
    Tên sp: <a href="/product/{{ $product->slug }}">{{ $product->name}}</a> - Giá {{ number_format($product->price) }} <br>
@endforeach
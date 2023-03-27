            Giỏ hàng navbar: 
            @foreach ($productCarts as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ number_format($product->price) }}đ</td>
                <td><img src="{{ $product->image }}" alt="{{ $product->name }}" class="img-fluid" width="100px"></td>
                <td><a href="/carts/delete/{{ $product->id }}">Xóa</a></td>
            </tr>
            @endforeach
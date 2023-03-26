<a href="/collections/all">Xem tất cả sản phẩm</a><br>
@foreach($categoryParents as $categoryParent)
    Tên: <a href="/collections/{{ $categoryParent->slug }}">{{ $categoryParent->name }}</a><br>
@endforeach
<li class="">
    <a href="/collections/all" title="Sản phẩm">
        Sản phẩm
        <i class="fa fa-chevron-down" aria-hidden="true"></i>
    </a>
    <ul class="sub_menu">
        @foreach($categoryMenus as $category)
            <li class="">
                @php $subCategory = App\Models\Category::where('parent_id', $category->id)->get(); @endphp
                @if($subCategory->count() > 0)
                <a href="/collections/{{ $category->slug }}">
                    {{ $category->name }} <i class="fa fa-chevron-right" aria-hidden="true"></i>
                </a>
                <ul class="sub_menu">
                    @foreach($subCategory as $subCategoryMenu)
                    <li class="">
                        <a href="/collections/{{ $subCategoryMenu->slug }}">
                            {{ $subCategoryMenu->name }}
                        </a>
                    </li>
                    @endforeach
                </ul>
                @else
                <a href="/collections/{{ $category->slug }}">
                    {{ $category->name }}
                </a>
                @endif
            </li>
        @endforeach
    </ul>
</li>
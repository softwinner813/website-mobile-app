@foreach($categories as $cat)
<div class="">
    <a href="{{ route('category.show', $cat) }}" class="border-bottom py-2 d-block font-weight-bold text-white">
        {{ $cat -> name }}
        <span class="badge badge-secondary badge-pill">{{ $cat -> num_products }}</span>
    </a>
    @if($cat -> children -> isNotEmpty())
    <div class="pl-2 subcategories">
        @include('includes.subcategories', ['categories' => $cat -> children])
    </div>
    @endif
</div>
@endforeach
<!-- list-group-item category @if(isset($category) && $cat -> isAncestorOf(optional($category))) active @endif  align-items-center rounded-0 list-group-item-action d-flex justify-content-between -->
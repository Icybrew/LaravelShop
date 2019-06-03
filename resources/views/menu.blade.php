<ul class="nav nav-pills flex-column my-2">
@if(!empty($categories) && count($categories) > 0)
    <h3 class="text-center">{!! __('shop.nav.categories') !!}</h3>
@foreach($categories as $category)
    <li class="nav-item">
        <a class="nav-link text-break{{ Request::is('catalog/' . $category->id) ? ' active' : NULL }}" href="{{ route('categories.show', ['id' => $category->id]) }}">{{ $category->name }}</a>
    </li>
@endforeach
@else
    <h3 class="text-center my-5">No catalogs</h3>
@endif
</ul>
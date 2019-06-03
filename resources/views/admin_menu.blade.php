<ul class="nav nav-pills flex-column my-2">
    <h3 class="text-center">{!! __('admin.title') !!}</h3>
    <li class="nav-item">
        <a class="nav-link text-break{{ Request::is('admin/categories*') ? ' active' : NULL }}" href="{{ route('admin.categories.index') }}">{{ __('admin.categories.title') }}</a>
        <a class="nav-link text-break{{ Request::is('admin/products*') ? ' active' : NULL }}" href="{{ route('admin.products.index') }}">{{ __('admin.products.title') }}</a>
        <a class="nav-link text-break{{ Request::is('admin/users*') ? ' active' : NULL }}" href="{{ route('admin.users.index') }}">{{ __('admin.users.title') }}</a>
    </li>
</ul>
@foreach ($menuItems as $menuItem)
    <a href="{{ $menuItem->Slug }}">{{ $menuItem->name }}</a>
@endforeach
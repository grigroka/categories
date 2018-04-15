<link rel="stylesheet" href="{{ asset('css/css.css') }}">
<div class="list">
    @foreach($children as $child)
        <div class="list">
            {{ $child->title }}
            @if(count($child->children))
                @include('children', ['children' => $child->children])
            @endif
        </div>
    @endforeach
</div>
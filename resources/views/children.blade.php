{{--TODO Change HTML ul to display deeper list--}}
<ul>
    @foreach($children as $child)
        <li>
            {{ $child->title }}
            @if(count($child->children))
                @include('children', ['children' => $child->children])
            @endif
        </li>
    @endforeach
</ul>
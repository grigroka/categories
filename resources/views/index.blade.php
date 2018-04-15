<div class="col-md-6">
    <h3>Category List</h3>
    <ul>
        @foreach($categories as $category)
            <li>
                {{ $category->title }}
                @if(count($category->children))
                    @include('children',['children' => $category->children])
                @endif
            </li>
        @endforeach
    </ul>
</div>

{{--<div class="col-md-6">--}}
    {{--<h3>Category List</h3>--}}
    {{--<ul>--}}
        {{--@foreach($flattenedParent as $parent)--}}
            {{--<li>--}}
                {{--{{ $parent->title }}--}}
                {{--@foreach($flattenedAll as $child)--}}
                    {{--<ul>--}}
                        {{--{{ $child->childs }}--}}
                    {{--</ul>--}}
                {{--@endforeach--}}
            {{--</li>--}}
        {{--@endforeach--}}
    {{--</ul>--}}
{{--</div>--}}
<div class="col-md-6">
    <h3>Category List</h3>
    <ul>
        @foreach($categories as $category)
            <li>
                {{ $category->title }}
                @if(count($category->childs))
                    @include('child',['childs' => $category->childs])
                @endif
            </li>
        @endforeach
    </ul>
</div>
<link rel="stylesheet" href="{{ asset('css/css.css') }}">
<div class="col-md-6">
    <h3>Recursive Category List</h3>
    <div class="list">
        @foreach($categories as $category)
            <div class="list">
                {{ $category->title }}
                @if(count($category->children))
                    @include('children', ['children' => $category->children])
                @endif
            </div>
        @endforeach
    </div>
</div>

<div class="col-md-6">
    <h3>Iterative Category List</h3>
    <div class="list">
        @php($current = $categories)
        @while(!empty($current))
            @php($child = [])
            @foreach($current as $item)
                <div class="list">
                    {{ $item->title }}
                    @if(count($item->children))
                        @php($child = $item->children)
                    @endif
                </div>
            @endforeach
            @php($current = $child)
        @endwhile
    </div>
</div>

<hr>

<div class="col-md-6">
    <h3>Add New Category</h3>
    {!! Form::open(['route'=>'add.category']) !!}

    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
        {{ Form::label('Title:') }}
        {{ Form::text('title', old('title'), ['class'=>'form-control', 'placeholder'=>'Enter Title']) }}
        <span class="text-danger">{{ $errors->first('title') }}</span>
    </div>

    <div class="form-group">
        {{ Form::label('Category:') }}
        {{ Form::select('parent_id',$allCategories, old('parent_id'), ['class'=>'form-control', 'placeholder'=>'Select Category']) }}
    </div>

    <div class="form-group">
        {{ Form::submit('Add New') }}
    </div>

    {!! Form::close() !!}
</div>
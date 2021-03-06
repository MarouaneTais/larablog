@extends('layouts.app')

@section('content')

@include('admin.includes.errors')
<div class="card">
    <div class="card-header">
        Edit post: {{ $post->title }}
    </div>

    <div class="card-body">
        <form action="{{ route('posts.update', ['id' => $post->id] ) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $post->title }}">
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" id="image" name="image" class="form-control">
            </div>

            <div class="form-group">
                <label for="categories">Select a category</label>
                <select name="category_id" id="categories" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id}}"
                            @if($post->category_id == $category->id) 
                                selected
                            @endif
                        >{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

             <div class="form-group">
                <label for="tags">Select Tags</label>
                <div class="checkbox">
                    @foreach($tags as $tag)
                    <label>
                    <input type="checkbox" name="tags[]" value="{{ $tag->id }}" 
                        @foreach($post->tags as $t)
                            @if($tag->id == $t->id)
                                checked
                            @endif
                        @endforeach
                    >{{ $tag->tag }}
                    </label>
                    <br>
                    @endforeach
                </div>
            </div>


            <div class="form-group">
                <label for="content">Content</label>
            <textarea name="content" id="content" cols="5" rows="5" class="form-control">{{ $post->content }}</textarea>
            </div>

            
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
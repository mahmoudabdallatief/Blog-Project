@extends('back.layouts.pages-layout')
@section('title' , 'Edit The Post')
@section('content')
<div class="row">
    <h1>Edit The Post</h1>
    <div class="col-12">
        <div class="card p-2">
            <form action="{{route('updatepost')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{$post->id}}" name ="id">
            <div class="row ">
          
                                <div class="mb-3 p-2">
                                    <label for=""class ="form-label">Post title</label>
                                    <input type="text" class="form-control" placeholder="Enter Post title" name="title" value="{{ $post->post_title }}">

                                    @error('title')
                <span class="text-danger">{{$message}}</span>
                @enderror
                                </div>
                                <div class="mb-3 p-2">
                                    <label for=""class ="form-label">Post content</label>
                                    <textarea class="form-control" style="height:300px" name="content" placeholder="Enter Post content">{{ $post->post_content }}</textarea>
  @error('content')
                <span class="text-danger">{{$message}}</span>
                @enderror

                
                                </div>
                                <div class="mb-3 p-2">
                                    <label for=""class ="form-label">Post category</label>

                                    <select  name="category" class="form-select">
                                    @foreach($subs as $sub)
                                      <option {{$post->category_id == $sub->id ? 'selected' : ''}} value="{{$sub->id}}" >{{$sub->subcategory_name}}</option>
                                      @endforeach
                                    </select>
                                    @error('category')
                <span class="text-danger">{{$message}}</span>
                @enderror
                
                                </div>
                                <div class="mb-3 p-2">
                                    <label for=""class ="form-label">Featured image</label>
                                    <input type="file" class="form-control bg-light text-dark" name="featured_image">
                                    <div class="image-preview p-2">
                                    <img src="images/{{$post->featured_image}}" class="border border-5 rounded-2 border-grey" alt="Image preview" width="280px" height="280px">
                                    </div>
                                 
                                    @error('featured_image')
                <span class="text-danger">{{$message}}</span>
                @enderror
                                </div>
                                <div class="mb-3 p-2">
                                    <label for=""class ="form-label">Post tags <span class="text-success">(Optional)</span></label>
                                    <input type="text"  class="form-control tags" placeholder="Enter Post tags" name="tags">

                <div id="div_element" class="d-flex gap-1 mt-2 justify-content-start">
                @foreach (explode(' ', $post->post_tags) as $tag =>$value)
                @if($post->post_tags !== NULL)
                <div class="btn btn-secondary d-block h5 rounded-2">
                               {{$value}}
                            </div>
                            @endif
                            @endforeach
                </div>
                                </div>
                                <div class="block">
                                <input type="hidden" class="currentTimestamp" name="currentTimestamp" value="">
                                <button class ="btn btn-primary" type="submit">Save post</button>
                                </div>
                                
            </form>
        </div>
    </div>
</div>

@endsection
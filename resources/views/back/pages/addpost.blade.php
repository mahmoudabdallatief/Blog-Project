@extends('back.layouts.pages-layout')
@section('title' , 'Add New Post')
@section('content')
<div class="row">
    <h1>Add New Post</h1>
    <div class="col-12">
        <div class="card p-2">
            <form action="{{route('addnewpost')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="row ">
          
                                <div class="mb-3 p-2">
                                    <label for=""class ="form-label">Post title</label>
                                    <input type="text" class="form-control" placeholder="Enter Post title" name="title" value="{{ old('title') }}">

                                    @error('title')
                <span class="text-danger">{{$message}}</span>
                @enderror
                                </div>
                                <div class="mb-3 p-2">
                                    <label for=""class ="form-label">Post content</label>
                                    <textarea class="form-control" style="height:300px" name="content" placeholder="Enter Post content">{{ old('content') }}</textarea>
  @error('content')
                <span class="text-danger">{{$message}}</span>
                @enderror

                
                                </div>
                                <div class="mb-3 p-2">
                                    <label for=""class ="form-label">Post category</label>

                                    <select  name="category" class="form-select">
                                    <option value="">---No Selected----</option>
                                    @foreach($subcategories as $sub)
                                      <option value="{{$sub->id}}">{{$sub->subcategory_name}}</option>
                                      @endforeach
                                    </select>
                                    @error('category')
                <span class="text-danger">{{$message}}</span>
                @enderror
                
                                </div>
                                <div class="mb-3 p-2">
                                    <label for=""class ="form-label">Featured image</label>
                                    <input  type="file" class="form-control bg-light text-dark" name="featured_image">
                                    <div class="image-preview p-2"></div>
                                    @error('featured_image')
                <span class="text-danger">{{$message}}</span>
                @enderror
                                </div>
                                <div class="mb-3 p-2">
                                    <label for=""class ="form-label">Post tags</label>
                                    <input type="text"  class="form-control tags" placeholder="Enter Post tags" name="tags" value="{{ old('tags') }}">
                                    @error('tags')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <div id="div_element" class="d-flex gap-1 mt-2 justify-content-start"></div>
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
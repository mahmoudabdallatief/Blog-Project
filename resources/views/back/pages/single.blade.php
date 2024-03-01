@extends('back.layouts.pages-layout')
@section('title' , 'Single Post')
@section('content')
<div class="text-start">
    <h1>Single Post</h1>
</div>

<div class="row mt-3 g-3">
    
    <div class="col-md-8">
    <div class="text-start"><h2>Post Details</h2></div>
        <div class=" card bg-transparent mb-2  w-100" style="border:none !important; box-shadow:none  !important;">
            <img style="cursor:pointer" src="images/{{$post->featured_image}}"  class="w-100  mb-3 " height="300" alt="" title ="{{$post->post_title}}">
@if($post->updated_at !==NULL)
@php
$mysqlTimestamp = strtotime($post->updated_at);
            $dateWithDayName = date("l, F j, Y \\A\\t h:i:s A", $mysqlTimestamp);
            @endphp
@else
@php
$mysqlTimestamp = strtotime($post->created_at);
            $dateWithDayName = date("l, F j, Y \\A\\t h:i:s A", $mysqlTimestamp);
            @endphp
@endif
<p><b>Date of post:- </b>{{"( ".$dateWithDayName." )"}}</p>
            <h4 class=""><b>Title of post:- </b>{{$post->post_title}}</h4>
            <p class=""><b>Content of post:- </b>{{$post->post_content}}</p>
            <p class=""><b>Category of post:- </b>{{$post->subcategory->subcategory_name}}</p>

            @if($post->post_tags !== NULL)
            <b > Tags of post :-</b>
            @endif
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
        
        <div class="row">
        @livewire('comments', ['postId' => $post->id])
        <livewire:scripts />
        </div>
       
        <div class="row">
            <br>
            <h2>Related Posts</h2>
            @foreach($posts as $post)
            <div class="col-md-12 mb-5 mt-2">
            <div class="card">
            <div class="row">
                <div class="col-md-4">
                    
                        
                  
                <a href="{{ route('single', ['id' => $post->id]) }}">
            <img src="images/{{$post->featured_image}}" class="  mb-3 " height="200" width="200" alt="" title ="{{$post->post_title}}">
</a>
                </div>
            <div class="col-md-8">
            <a class="h3 text-decoration-none" href="{{ route('single', ['id' => $post->id]) }}">
            <h3 ><b>Title of post:- </b>{{$post->post_title}}</h3>
</a>
            <p class=""><b>Content of post:- </b>{{$post->post_content}}</p>
            </div>
            
        </div>
            </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="col-md-4  "> 
        
    <div class="text-start ">   <h2>Recommended Posts</h2></div>
    @foreach($randoms as $random)
            <div class="w-100  mb-5">
            <div class="card position-relative  ">
            <a href="{{ route('single', ['id' => $random->id]) }}">
            <img src="images/{{$random->featured_image}}"  class="w-100  mb-3 " height="300" alt="" title ="{{$random->post_title}}">
</a>
            <h4 class="p-3">{{$random->post_title}}</h4>
            <p class="p-3">{{$random->post_content}}</p>
            <div class="position-absolute nest bg-primary text-light py-2 border border-3 rounded-2 border-light px-5">{{$random->subcategory->subcategory_name}}</div>
            <a href="{{ route('single', ['id' => $random->id]) }}" class="btn btn-success">Read Full Article</a>
        </div>
            </div>
            @endforeach
            <h2>Categories</h2>
            <div class="card"> 
                <br>
            <div class="w-100 row justify-content-center align-items-center" >
           
            @foreach($subs as $sub)
               <div class="col-lg-4 col-md-d col-sm-12  ">
                
                
                <a href="{{ route('index', ['cat_id' => $sub->id]) }}" class="h4  btn btn-secondary">{{$sub->subcategory_name}} ( {{$sub->post->count()}} )</a>
                
            
</div>
            @endforeach
            </div>
            </div>
            <br>
            <h2>Tags</h2>
            <div class="card"> 
                <br>
            <div class="w-100 row justify-content-center align-items-center" >
           
            @php
// Create an empty array to store the unique tags.
$uniqueTags = [];

// Iterate over the posts and add their tags to the array.
foreach ($posts1 as $post1) {
    foreach (explode(' ', $post1->post_tags) as $tag) {
        if (!in_array($tag, $uniqueTags) && $tag !== '') {
            $uniqueTags[] = $tag;
        }
    }
}

// Sort the unique tags array in alphabetical order.
sort($uniqueTags);
@endphp

@foreach ($uniqueTags as $tag)
    <div class="col-lg-4 col-md-d col-sm-12  ">

            <a href="{{ route('index', ['tag' =>$tag] ) }}" class="h4  btn btn-secondary">{{$tag}}</a>
        
    </div>
@endforeach

            </div>
            </div>
            </div>
        
</div>
@endsection
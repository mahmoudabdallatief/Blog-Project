@extends('back.layouts.pages-layout')
@section('title' , 'Home Page')
@section('content')
<div class="text-start">
    <h1>Home Page</h1>
</div>
<div class="row g-3">
    <div class="col-md-6">
    <h2 class="text-start">Search</h2>
    <form style="width:280px !important;" class=" input-group my-auto w-auto my-auto position-relative" id="search-form" action="{{route('index')}}" method="GET">
         @csrf
         <input
         name="search_query" id="search-query"
                autocomplete="off"
              type="text"
                class="form-control rounded in  "
                placeholder='Search '
                style="width: 225px;"
                />

                <button type='submit' class="input-group-text border-0 rounded-1 btn btn-primary"
               >
               <i class="fas fa-search icon_search" ></i>
                   </button>
  
                   
       </form>
    </div>
    <div class="col-md-6">
    <h2 class="text-start">Categories</h2>
    <div class="text-start">
    @foreach($cats as $cat)
    <div class="d-inline-block mx-1 mb-2">
    <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
   {{$cat->category_name}}
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    @foreach ($cat->subcategory as $sub)
    
    @if ($sub->post->count() > 0)
                        <li><a class="dropdown-item" href="{{ route('index', ['cat_id' => $sub->id]) }}">{{ $sub->subcategory_name }}</a></li>
                    @endif

 
   @endforeach
  </ul>
</div>
</div>
@endforeach
</div>
    </div>
</div>

<br>
@if(request()->has('cat_id') || request()->has('search_query') || request()->has('tag'))
<div class="row mt-3 g-3">
    @if(count($posts)==0)
    <p class="text-danger text-center">No Posts Found</p>
    @else

    @if(request()->has('cat_id'))
    <h2 class="text-start">Filtering of Posts by category :-</h2>
@endif

    @if(request()->has('search_query'))
    <h2 class="text-start">Search of Posts :-</h2>
    @endif
    @if(request()->has('tag'))
    <h2 class="text-start">Filtering of Posts by tag :-</h2>
    @endif
@foreach($posts as $post)
            <div class="col-md-6 my-5">
            <div class="card position-relative h-100 ">
            <a href="{{ route('single', ['id' => $post->id]) }}">
            <img src="images/{{$post->featured_image}}" class="w-100  mb-3 " height="300" alt="" title ="{{$post->post_title}}">
</a>
            <h4 class="p-3">{{$post->post_title}}</h4>
            <p class="p-3">{{$post->post_content}}</p>
            <div class="position-absolute nest bg-primary text-light py-2 border border-3 rounded-2 border-light px-5">{{$post->subcategory->subcategory_name}}</div>
            <a href="{{ route('single', ['id' => $post->id]) }}" class="btn btn-success ">Read Full Article</a>
        </div>
            </div>
            @endforeach
            @endif
</div>

@else

<div class="row mt-3 g-3">
    
    <div class="col-md-8">
    <div class="text-start"><h2>Latest Posts</h2></div>
        <div class="card position-relative ">
        <a href="{{ route('single', ['id' => $post->id]) }}">
            <img src="images/{{$post->featured_image}}"  class="w-100  mb-3 " height="300" alt="" title ="{{$post->post_title}}">
</a>
            <h4 class="p-3">{{$post->post_title}}</h4>
            <p class="p-3">{{$post->post_content}}</p>
            <div class="position-absolute nest bg-primary text-light py-2 border border-3 rounded-2 border-light px-5">{{$post->subcategory->subcategory_name}}</div>
            <a href="{{ route('single', ['id' => $post->id]) }}" class="btn btn-success">Read Full Article</a>
        </div>
        <div class="row">
            @foreach($posts as $post)
            <div class="col-md-6 my-5">
            <div class="card position-relative h-100 ">
            <a href="{{ route('single', ['id' => $post->id]) }}">
            <img src="images/{{$post->featured_image}}" class="w-100  mb-3 " height="300" alt="" title ="{{$post->post_title}}">
</a>
            <h4 class="p-3">{{$post->post_title}}</h4>
            <p class="p-3">{{$post->post_content}}</p>
            <div class="position-absolute nest bg-primary text-light py-2 border border-3 rounded-2 border-light px-5">{{$post->subcategory->subcategory_name}}</div>
            <a href="{{ route('single', ['id' => $post->id]) }}" class="btn btn-success">Read Full Article</a>
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
                
                <div class=" card bg-transparent mb-2 rounded-2 w-100" style="border:none !important">
                <a href="{{ route('index', ['cat_id' => $sub->id]) }}" class="h4  btn btn-secondary">{{$sub->subcategory_name}} ( {{$sub->post->count()}} )</a>
                
               </div>
</div>
            @endforeach
            </div>
            </div>
            </div>
        
</div>
@endif
<div class="row">
@if(request()->has('cat_id'))
{{ $posts->appends(['cat_id' => request('cat_id')])->links('pagination.custom') }}
@endif

@if(request()->has('search_query'))
{{ $posts->appends(['search_query' => request('search_query')])->links('pagination.custom') }}
@endif

@if(request()->has('tag'))
{{ $posts->appends(['tag' => request('tag')])->links('pagination.custom') }}
@endif
</div>
@endsection
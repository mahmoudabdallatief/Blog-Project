@extends('back.layouts.pages-layout')
@section('title' , 'All Posts')
@section('content')
<div class="row">
<div class=" success">
                  
                  @if(session('success'))
                                  <div class="alert ss alert-success">{{session('success')}}</div>
                                  @endif
                                  @if(session('failed'))
                                  <div class="alert ss alert-danger">{{session('failed')}}</div>
                                  @endif
                                  </div>
</div>
<div class="row">
<h1 class="text-start">All Posts</h1>
</div>

<livewire:show-posts/>

@livewireScripts

@endsection
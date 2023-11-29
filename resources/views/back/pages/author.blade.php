@extends('back.layouts.pages-layout')
@section('title' , 'Authors')
@section('content')


<div class="row mb-3">
                <div class="text-start success">
                  
@if(session('success'))
                <div class="alert ss alert-success">{{session('success')}}</div>
                @endif

                </div>
                <div class="page-header d-print-none " >
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              
              <!-- Page title actions -->
              <div class="col-auto ms-auto d-print-none">
                <div class="d-flex">
                <form class="d-block  d-flex input-group my-auto w-auto my-auto position-relative" id="search-form" action="{{route('author')}}" method="GET">
         @csrf
         <input
         name="search_query" id="search-query"
                autocomplete="off"
              type="text"
                class="form-control rounded in  "
                placeholder='Search '
                style="width: 225px;"
                />

                <button type='submit' class="input-group-text border-0 rounded-1 btn btn-warning"
               >
               <i class="fas fa-search icon_search" ></i>
                   </button>
  
                   
       </form>
               
                  <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-simple" style ="max-width:100px; max-height:50px">
                  <span style="font-size:20px"> + </span>  New author
                  </a>
                
                  
                  
                  <div class="modal modal-blur fade" id="modal-simple" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content ">
          <div class="modal-header">
            <h5 class="modal-title">Add New Author</h5>
            <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <!-- !-- -->
            <form action="" method ="POST"  id="myForm">

              
                        <div class="row">
                                <div class="mb-3">
                                    <label for=""class ="form-label">Name</label>
                                    <input type="text" class="form-control" placeholder="Enter author name" name="name" id="name">

                
                                </div>
                                <div class="mb-3">
                                    <label for=""class ="form-label">E-mail</label>
                                    <input type="text" class="form-control" placeholder="Enter author E-mail" name="email" id="email">
                                   
                
                                </div>
                                <div class="mb-3">
                                    <label for=""class ="form-label">Username</label>
                                    <input type="text" class="form-control" placeholder="Enter author name" name="username" id="username">
                       
                                </div>
                                <div class="mb-3">
                                    <label for=""class ="form-label">Author Type</label>
                                    <select name="type" id="type" class="form-select">
                                        <option value="">---No Selected----</option>
                                        @foreach($alltypes as $all)
                                        <option value="{{$all->id}}">{{$all->name}}</option>
                                        @endforeach
                                    </select>
                             
                                </div>
                                <div class="mb-3">
                                    <div class ="form-label">Is direct Publisher ?</div>
                                    <label class="form-check">
                                <input class="form-check-input" type="radio" 
	       name="direct"  value="1"  id="direct">
                                <span class="form-check-label">Yes</span>
                              </label>
                              <label class="form-check">
                                <input class="form-check-input" type="radio" 
	       name="direct" value="0"  id="direct" >
                                <span class="form-check-label">No</span>
                              </label>
                          
                                </div>
            <!-- ! -->
          </div>
          <div class="modal-footer ">
            <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
            <button  type ="submit" class="btn btn-primary" >Save changes</button>
           
</form>

          </div>
        </div>
      </div>
    </div>
                </div>
              </div>
            </div>
          </div>
          </div>    
</div>
<div class="text-start">
<h1>Authors</h1>
</div>
<div class="row row-cards parent">
              

              


@if(@$num)
<div class="text-center">
<span class="text-danger">{{$num}}</span>
</div>

          @else
          @foreach($users as $user)
          <div class="col-md-6 col-lg-3 child">
                <div class="card  {{ isset($_COOKIE['mode']) ? ($_COOKIE['mode'] === 'light' ? 'bg-light text-dark' : 'bg-dark text-light') : '' }} h-100 ">
                  <div class="card-body p-4 text-center ">
                    <span class="avatar avatar-xl mb-3 rounded" style="background-image: url(images/{{$user->picture}})"></span>
                    <h3 class="m-0 mb-1">{{$user->name}}</h3>
                    <p class="m-0 mb-1 h4">{{$user->username}}</p>
                    <div class="text-muted">{{$user->email}}</div>
                    
                    <div class="mt-3">
                      
                        <span class="badge bg-purple-lt">{{$user->Type->name}}</span>
                        
                    </div>
                   
                    @if($user->id == session('log'))
                    <br>
                    <span class="text-success" style="font-size:20px;">You</span>
                    @endif
                  </div>
                  <div class="d-flex">
                  <a href="#" class="card-btn" data-bs-toggle="modal" data-bs-target="#modal-simple{{$user->id}}" ><!-- Download SVG icon from http://tabler-icons.io/i/phone -->
                    
                      Edit</a>
                      <div class="modal modal-blur fade" id="modal-simple{{$user->id}}" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content  {{ isset($_COOKIE['mode']) ? ($_COOKIE['mode'] === 'light' ? 'bg-light text-dark' : 'bg-dark text-light') : '' }}">
          <div class="modal-header">
            <h5 class="modal-title">Edit The Author</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              @if($_COOKIE['mode']==='light')
            <i class="fa-solid fa-xmark fa-2x text-dark"></i>
            @else
            <i class="fa-solid fa-xmark fa-2x text-light"></i>
            @endif    
            </button>
          </div>
          <div class="modal-body">
            <!-- !-- -->
            <form  class="myFormupdate">
           
                        <div class="row">
                                <div class="mb-3">
                                    <label for=""class ="form-label">Name</label>
                                    <input type="text" value ="{{$user->name}}" class="form-control  {{ isset($_COOKIE['mode']) ? ($_COOKIE['mode'] === 'light' ? 'bg-light text-dark' : 'bg-dark text-light') : '' }}" placeholder="Enter author name" name="name_of_author" id="name_of_author">

                
                                </div>
                                <div class="mb-3">
                                    <label for=""class ="form-label">E-mail</label>
                                    <input type="text"  value ="{{$user->email}}" class="form-control  {{ isset($_COOKIE['mode']) ? ($_COOKIE['mode'] === 'light' ? 'bg-light text-dark' : 'bg-dark text-light') : '' }}" placeholder="Enter author E-mail" name="email_of_author" id="email_of_author">
                                   
                
                                </div>
                                <div class="mb-3">
                                    <label for=""class ="form-label">Username</label>
                                    <input type="text" value ="{{$user->username}}" class="form-control  {{ isset($_COOKIE['mode']) ? ($_COOKIE['mode'] === 'light' ? 'bg-light text-dark' : 'bg-dark text-light') : '' }}" placeholder="Enter author name" name="username_of_author" id="username_of_author">
                       
                                </div>
                                <div class="mb-3">
                                    <label for=""class ="form-label">Author Type</label>
                                    <select name="type_of_author" id="type_of_author" class="form-select  {{ isset($_COOKIE['mode']) ? ($_COOKIE['mode'] === 'light' ? 'bg-light text-dark' : 'bg-dark text-light') : '' }}">
                                        
                                        @foreach($alltypes as $all)
                                        <option {{$user->type == $all->id ? 'selected' : ''}} value="{{$all->id}}">{{$all->name}}</option>
                                        @endforeach
                                    </select>
                             
                                </div>
                                <div class="mb-3">
                                    <div class ="form-label">Is direct Publisher ?</div>
                                    <label class="form-check">
                                <input class="form-check-input" type="radio" 
	       name="direct_of_author"  value="1"  id="direct_of_author" {{$user->direct_publish == 1 ? 'checked' : ''}}>
                                <span class="form-check-label">Yes</span>
                              </label>
                              <label class="form-check">
                                <input class="form-check-input" type="radio" 
	       name="direct_of_author" value="0"  id="direct_of_author"  {{$user->direct_publish == 0 ? 'checked' : ''}}>
                                <span class="form-check-label">No</span>
                              </label>
                          
                                </div>
                                <div class="mb-3">
                                <div class="form-check form-switch">
                                
  <input class="form-check-input" name="my_checkbox" type="checkbox" id="flexSwitchCheckDefault"  {{$user->blocked== 1 ? 'checked' : ''}}>
  <label class="form-check-label " for="flexSwitchCheckDefault">Is blocked ?</label>
</div>
<input type="hidden" value="{{$user->id}}" name="id" class="id">
                             
                                </div>
            <!-- ! -->
          </div>
          <div class="modal-footer  {{ isset($_COOKIE['mode']) ? ($_COOKIE['mode'] === 'light' ? 'bg-light text-dark' : 'bg-dark text-light') : '' }}">
            <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
            <button  type ="submit" class="btn btn-primary" >Save changes</button>
           
</form>

          </div>
        </div>
      </div>
    </div>

    
                </div>
                <a href="#" class="card-btn" data-bs-toggle="modal" data-bs-target="#modal-simplet{{$user->id}}" ><!-- Download SVG icon from http://tabler-icons.io/i/phone -->
                    
                    Delete</a>
                    <div class="modal modal-blur fade" id="modal-simplet{{$user->id}}" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content  {{ isset($_COOKIE['mode']) ? ($_COOKIE['mode'] === 'light' ? 'bg-light text-dark' : 'bg-dark text-light') : '' }}">
          <div class="modal-header">
            <h5 class="modal-title">Are You sure You want to delete The Author ?</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              @if($_COOKIE['mode']==='light')
            <i class="fa-solid fa-xmark fa-2x text-dark"></i>
            @else
            <i class="fa-solid fa-xmark fa-2x text-light"></i>
            @endif    
            </button>
          </div>
          <div class="modal-body">
            <p>{{$user->name}}</p>
           
</div>
          <div class="modal-footer  {{ isset($_COOKIE['mode']) ? ($_COOKIE['mode'] === 'light' ? 'bg-light text-dark' : 'bg-dark text-light') : '' }}">
            <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
            <form action="{{route('deleteauthor')}}" method ="POST">
              @csrf
              @if(request()->has('search_query'))
              <input type="hidden" name ="search_query" value= "{{request()->search_query}}">
              @endif
              <input type="hidden" name ="id" value= "{{$user->id}}">
              <input type="hidden" name ="page" value= "{{$users->currentPage()}}">
            <button type="submit"  class="btn btn-danger " >Delete</button>
            </form>
           
           


          </div>
        </div>
      </div>
    </div>
    
                  </div>
                </div>
                </div>
                
                @endforeach
          @endif  
          @if(request()->has('search_query') && !@$num)
          <div class="chipag w-100">
          {{ $users->appends(['search_query' => request('search_query')])->links('pagination.custom') }}
          </div>
          @endif
          @if(!request()->has('search_query') && !@$num)
        
            <div class="chipag w-100">
            {{ $users->links('pagination.custom') }}
            </div>
         

     
          @endif  
          
</div>

@endsection
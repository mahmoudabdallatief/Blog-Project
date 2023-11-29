@extends('back.layouts.pages-layout')
@section('title' , 'profile')
@section('content')
<div class="page-header">
  <div class="row align-items-center">
    <div class="col-auto">
      @if($user->picture !== 'NULL')
      <span class="avatar avatar-md" style="background-image: url(images/{{$user->picture}})"></span>
      @else
      <span class="avatar avatar-md" style="background-image: url(images/profile.jpg)"></span>
      @endif
    </div>
    <div class="col">
      <h2 class="page-title">{{$user->name}}</h2>
      <div class="page-subtitle">
        <div class="row">
          <div class="col-auto">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <line x1="3" y1="21" x2="21" y2="21" />
              <path d="M5 21v-14l8 -4v18" />
              <path d="M19 21v-10l-6 -4" />
              <line x1="9" y1="9" x2="9" y2="9.01" />
              <line x1="9" y1="12" x2="9" y2="12.01" />
              <line x1="9" y1="15" x2="9" y2="15.01" />
              <line x1="9" y1="18" x2="9" y2="18.01" />
            </svg>
            <a href="#" class="text-reset">{{$user->username}}</a>
          </div>
          
          
        </div>
      </div>
    </div>
    <div class="col-auto    ">
 
      <div  class=" d-lg-block  d-md-block d-sm-block">
<form id="myForm" action="{{route('changepicture')}}" method="POST" enctype="multipart/form-data">
  @csrf
  <label for="myFileInput" class="file-input-button btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4" />
          <line x1="8" y1="9" x2="16" y2="9" />
          <line x1="8" y1="13" x2="14" y2="13" />
        </svg>Change Picture</label>
  <input type="file" id="myFileInput"  name ='image'>

  <script>
    const fileInput = document.getElementById('myFileInput');
    const form = document.getElementById('myForm');

    fileInput.addEventListener('change', () => {
      form.submit();
    });
  </script>
</form>

      </div>
      
      @error('image')
<div class="d-block">
<span class="text-danger">{{$message}}</span>
</div>
    @enderror
     
    </div>
    
  </div>
</div>
<hr>
<div class="row">
@if(session('success'))
                <div class="alert  alert-success">{{session('success')}}</div>
                @endif
                @if(session('failed'))
                <div class="alert  alert-danger">{{session('failed')}}</div>
                @endif
<div class="card">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs">
      <li class="nav-item">
        <a href="#tabs-Details" class="nav-link active" data-bs-toggle="tab">Personal Details</a>
      </li>
      <li class="nav-item">
        <a href="#tabs-Password" class="nav-link" data-bs-toggle="tab">Change-Password</a>
      </li>
    </ul>
  </div>
  <div class="card-body">
  
    <div class="tab-content">
      <div class="tab-pane active show" id="tabs-Details">
   
<form action="{{route('updateuser')}}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-4">
        <div class="mb-3">
  <label class="form-label">Name</label>
  <input type="text" class="form-control form-control-rounded mb-2" name="name" placeholder="Name" />
  @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
</div>

        </div>
        <div class="col-md-4">
        <label class="form-label">Username</label>
  <input type="text" class="form-control form-control-rounded mb-2" name="username" placeholder="Username" />
  @error('username')
                <span class="text-danger">{{$message}}</span>
                @enderror
        </div>
        <div class="col-md-4">
        <label class="form-label">E-mail</label>
  <input type="text" class="form-control form-control-rounded mb-2" name="email" placeholder="E-mail" />
  @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
        </div>
        
    </div>
    <div class="mb-3">
  <label class="form-label">Biography</label>
  <textarea class="form-control" style="height:300px" name="biography" placeholder="Biography"></textarea>
  @error('biography')
                <span class="text-danger">{{$message}}</span>
                @enderror
</div>

<button type="submit" class="btn btn-primary">Save Changes</button>
</form>

      </div>
      <div class="tab-pane" id="tabs-Password">
        <h5 class="text-warning">The new password must be between 5 to 25 characters.</h5>
       <form action="{{route('updatepassword')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-4">
            <div class="mb-3">
  <label class="form-label">Current Password</label>
  <input type="password" class="form-control form-control-rounded mb-2" name="current_password" placeholder="current password" />
  @error('current_password')
                <span class="text-danger">{{$message}}</span>
                @enderror
</div>
            </div>
            <div class="col-md-4">
            <div class="mb-3">
  <label class="form-label">New Password</label>
  <input type="password" class="form-control form-control-rounded mb-2" name="new_password" placeholder="new password" />
  @error('new_password')
                <span class="text-danger">{{$message}}</span>
                @enderror
</div>
            </div>
            <div class="col-md-4">
            <div class="mb-3">
  <label class="form-label">New Confirmed Password</label>
  <input type="password" class="form-control form-control-rounded mb-2" name="new_confirmed_password" placeholder="new Confirmed password" />
  @error('new_confirmed_password')
                <span class="text-danger">{{$message}}</span>
                @enderror
</div>
            </div>
            
        </div>
        <button type="submit" class="btn btn-primary">Change Password</button>
       </form>
      </div>
    </div>
  </div>
</div>

</div>
@endsection
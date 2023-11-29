@extends('back.layouts.pages-layout')
@section('title' , 'settings')
@section('content')
<hr>
<div class="row ">
    <h1>Settings</h1>
@if(session('success'))
                <div class="alert  alert-success">{{session('success')}}</div>
                @endif
                
<div class="card">
                  <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs">
                      <li class="nav-item">
                        <a href="#tabs-home-8" class="nav-link active" data-bs-toggle="tab">General-Settings</a>
                      </li>
                      <li class="nav-item">
                        <a href="#tabs-profile-8" class="nav-link" data-bs-toggle="tab">Logo</a>
                      </li>
                      <li class="nav-item">
                        <a href="#tabs-activity-8" class="nav-link" data-bs-toggle="tab">Social Media</a>
                      </li>
                    </ul>
                  </div>
                  <div class="card-body">
                    <div class="tab-content">
                      <div class="tab-pane fade active show" id="tabs-home-8">
                       <form action="{{route('updategeneralsettings')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for=""class ="form-label">Blog name</label>
                                    <input type="text" class="form-control" placeholder="Enter blog name" name="name" id="">
                                    @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
                                </div>
                                <div class="mb-3">
                                    <label for=""class ="form-label">Blog E-mail</label>
                                    <input type="text" class="form-control" placeholder="Enter blog E-mail" name="email" id="">
                                    @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
                                </div>
                                <div class="mb-3">
                                    <label for=""class ="form-label">Blog describtion</label>
                                    <textarea class="form-control" style="height:300px" cols="3" rows="3" placeholder="Enter blog describtion" name="des" id=""></textarea>
                                    @error('des')
                <span class="text-danger">{{$message}}</span>
                @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                       </form>
                      </div>
                      <div class="tab-pane fade" id="tabs-profile-8">
                      <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                            <form action="{{route('updatelogo')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                            <label class ="form-label">Set blog logo</label>
                            <input type="file" name="logo" class ="form-control bg-light text-dark">
                             @error('logo')
                             <div class="my-2">
                                <span class="text-danger">{{$message}}</span>
                            </div>
                            @enderror
                            <button type="submit" class="btn btn-primary mt-3">Save changes</button>
                        </form>
                            </div>
                        
                        </div>
                      </div>
                      </div>
                      <div class="tab-pane fade" id="tabs-activity-8">
                      <form action="{{route('updatesocialmedia')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for=""class ="form-label">Facebook</label>
                                    <input type="text" class="form-control" placeholder="Enter Facebook URL" name="facebook" id="">
                                    @error('facebook')
                <span class="text-danger">{{$message}}</span>
                @enderror
                                </div>
                                <div class="mb-3">
                                    <label for=""class ="form-label">Instegram</label>
                                    <input type="text" class="form-control" placeholder="Enter Instegram URL" name="instegram" id="">
                                    @error('instegram')
                <span class="text-danger">{{$message}}</span>
                @enderror
                                </div>
                                <button type="submit" class="btn btn-primary mt-3">Save changes</button>
                                </div>
                                <div class="col-md-6">
                                <div class="mb-3">
                                    <label for=""class ="form-label">You Tube</label>
                                    <input type="text" class="form-control" placeholder="Enter You Tube URL" name="youtube" id="">
                                    @error('youtube')
                <span class="text-danger">{{$message}}</span>
                @enderror
                                </div>
                                <div class="mb-3">
                                    <label for=""class ="form-label">Linkedin</label>
                                    <input type="text" class="form-control" placeholder="Enter Linkedin URL" name="linkedin" id="">
                                    @error('linkedin')
                <span class="text-danger">{{$message}}</span>
                @enderror
                                </div>
                                
                                </div>
                                
</form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
</div>

@endsection
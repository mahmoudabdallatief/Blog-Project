@extends('back.layouts.auth-layout')
@section('title' , 'reset-password')
@section('content')

<div class="page page-center">
      <div class="container container-tight py-4">
        <div class="text-center mb-4">
          <a href="." class="navbar-brand navbar-brand-autodark"><img src="images/{{$setting->logo}}" height="36" alt=""></a>
        </div>
       <div>
       @if(session('failed'))
                <div class="alert  alert-danger">{{session('failed')}}</div>
                @endif
                @if(session('success'))
                <div class="alert  alert-success">{{session('success')}}</div>
                @endif
<div class="card card-md">

          <div class="card-body">
            <h2 class="h2 text-center mb-4">Reset Password</h2>
            <form  action="{{ route('reset-password') }}" method="POST" autocomplete="off" novalidate>
              @csrf
              <input type="hidden" value="{{ request()->token }}" name="token">
              <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name ='email' placeholder="your@email.com" autocomplete="off" wire:model="email">
                @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
                
              </div>
              <div class="mb-2">
                <label class="form-label">
                  New Password
                </label>
                <div class="input-group input-group-flat">
                  <input type="password" class="form-control" name ='password' placeholder="Your New password"  autocomplete="off">
                 
                
                  <span class="input-group-text">
                    <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
                    </a>
                  </span>
                 
                </div>
                @error('password')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
              <div class="mb-2">
                <label class="form-label">
                  Confirmed Password
                </label>
                <div class="input-group input-group-flat">
                  <input type="password" class="form-control" name ='confirmed_password' placeholder="Your Confirmed password"  autocomplete="off">
                 
                
                  <span class="input-group-text">
                    <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
                    </a>
                  </span>
                 
                </div>
                @error('confirmed_password')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
              
              <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100">Reset Password</button>
              </div>
            </form>
          </div>
</div>
          
      </div>
    </div>
@endsection
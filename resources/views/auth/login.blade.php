@extends('layout.common.main')
{{-- 
@push('head')
<link rel="stylesheet" href="{{ url('css/register-custom.css') }}">
@endpush --}}

@section('contents')
     <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
                @csrf
                <div class="form-group">
                  <label for="pgone">{{ __('Email Address') }}</label>
                  
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fa fa-email"></i>
                      </div>
                    </div>
                    <input id="email"  required autofocus type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror   
                  </div> 
                  
                  <div class="invalid-feedback">
                    Please fill in your email
                  </div>
                </div>
                <div class="form-group">
                  <div class="d-block">
                    <label for="password" class="control-label">Password</label>
                    <div class="float-right">
                      <a href="auth-forgot-password.html" style=" text-decoration:none;" class="ccy text-small">
                        Forgot Password?
                      </a>
                    </div>
                  </div>
                  
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fa fa-key"></i>
                      </div>
                    </div>
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror        
                  </div>      
                  
                  <div class="invalid-feedback">
                    please fill in your password
                  </div>
                </div>
                <div class="form-group">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                    <label class="custom-control-label" for="remember-me">Remember Me</label>
                  </div>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                    {{__('Login') }}
                  </button>
                </div>
              </form>
              
             
           
@endsection
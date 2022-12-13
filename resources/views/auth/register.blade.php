@extends('layout.common.main')

@push('head')
<link rel="stylesheet" href="{{ url('css/register-custom.css') }}">
@endpush


@section('contents')
    @dump($errors)

  <form method="POST" action="{{ route('register') }}" class="form-signin">
    @csrf
    <div class="account-logo">
        <a href="index-2.html"><img src="assets/img/logo-dark.png" alt=""></a>
    </div>
    <div class="form-group">
        <label>{{ __('Full name') }}</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="fa fa-user"></i>
            </div>
          </div>
          <input type="text" id="name" autofocus required name="name" class="form-control  @error('name') is-invalid @enderror">

        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
        </div>


    </div>
    <div class="form-group">
        <label>{{ __('Email Address') }}</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="fa fa-email"></i>
            </div>
          </div>
          <input type="email" id="email" required name="email" class="form-control  @error('email') is-invalid @enderror">

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror 
        </div>
    
    </div>
    <div class="form-group">
        <label>{{ __('Region') }}</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="fa fa-map"></i>
            </div>
          </div>
          <input type="text" id="region" required name="region" class="form-control  @error('region') is-invalid @enderror">

        @error('region')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
        </div>
     </div>
  
    <div class="form-group">
        <label>{{ __('District') }}</label>
       
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="fa fa-map"></i>
            </div>
          </div>
          <input type="text" id="district" required="required" name="district" class="form-control  @error('district') is-invalid @enderror">

           @error('district')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror 
        </div>
    
    </div>
    <div class="form-group">
        <label>{{ __('Ward') }}</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="fa fa-map"></i>
            </div>
          </div>
          <input type="text" id="ward" name="ward" class="form-control  @error('ward') is-invalid @enderror">

        @error('ward')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror 
        </div>
    
    </div>
    
    <div class="form-group">
      <label class="display-block">Register as:</label>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="option" id="Peasant" value="Peasant">
<label class="form-check-label" for="gender_male">Peasant</label>
</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="option" id="Buyer" value="Buyer">
<label class="form-check-label" for="gender_female">Buyer</label>
@error('option')
<span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror 
</div>
  </div>
    

    <div class="form-group">
        <label>{{ __('Password') }}</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="fa fa-lock"></i>
            </div>
          </div>
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
          @error('password')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
      
      <div class="form-group">
        <label>{{ __('Confirm Password') }}</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="fa fa-lock"></i>
            </div>
          </div>
          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        </div>
        <div style="margin-top:10px" class="text-muted text-center">
          Already have an account? <a class="ccy" style=" text-decoration:none;" href="{{ url('login') }}">Log in</a>
        </div>
      </div>
      
    <div class="form-group checkbox">
        <label>
            <input type="checkbox"> I have read and agree the Terms &amp; Conditions
        </label>
    </div>
    <div class="form-group text-center">
        <button  type="submit" class="btn btn-primary account-btn">{{ __('Register') }}</button>
    </div>
   
</form>

@endsection

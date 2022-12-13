@extends('layout.common.main')

@push('head')
<link rel="stylesheet" href="{{ url('css/register-custom.css') }}">
@endpush


@section('contents')
    

    {!! Form::open(['class'=>'form-group row mb-4','action' =>[ 'BankController@update','Auth::user()->id'],'method'=>'POST']) !!}
    @csrf
    <div class="account-logo">
        <a href="index-2.html"><img src="assets/img/logo-dark.png" alt=""></a>
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
        
      </div>
      
    <div class="form-group text-center">
        <button  type="submit" class="btn btn-primary account-btn">{{ __('save') }}</button>
    </div>
   
 {!! Form::close() !!}

@endsection

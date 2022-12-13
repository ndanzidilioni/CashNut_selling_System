@extends('layout.common.main')

<!-- @push('head')
 --><link rel="stylesheet" href="{{ url('css/register-custom.css') }}">
<!--  -->

@section('contents')
    

  <!-- {!! Form::open(['class'=>'form-group row mb-4','action' => 'BankController@store','method'=>'POST']) !!} -->
    @csrf
    <div class="account-logo">
        <a href="index-2.html"><img src="assets/img/logo-dark.png" alt=""></a>
    </div>
    <div class="form-group">
        <label>{{ __('Bank Name') }}</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="fa fa-user"></i>
            </div>
          </div>
          <input type="text" id="Bname" autofocus required name="Bname" class="form-control  @error('Bname') is-invalid @enderror">

        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
        </div>


    </div>
    <div class="form-group">
        <label>{{ __('Account Name') }}</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="fa fa-email"></i>
            </div>
          </div>
          <input type="text" id="AcNa" required name="AcName" class="form-control  @error('AcName') is-invalid @enderror">

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror 
        </div>
    
    </div>

     <div class="form-group">
        <label>{{ __('Account Number') }}</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="fa fa-email"></i>
            </div>
          </div>
          <input type="text" id="AcNumber" required name="AcNumber" class="form-control  @error('AcNumber') is-invalid @enderror">

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror 
        </div>
    
    </div>
      <div class="form-group">
        <label>{{ __('Phone Number') }}</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="fa fa-email"></i>
            </div>
          </div>
          <input type="text" id="phoneNumber" required name="phoneNumber" class="form-control  @error('phoneNumber') is-invalid @enderror">

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror 
        </div>
    
    </div>
    <div class="form-group checkbox">
        <label>
            <input type="checkbox"> I have read and agree the Terms &amp; Conditions
        </label>
    </div>
    <div class="form-group text-center">
        <button  type="submit" class="btn btn-primary account-btn">{{ __('save') }}</button>
    </div>
   
{!! Form::close() !!}

@endsection

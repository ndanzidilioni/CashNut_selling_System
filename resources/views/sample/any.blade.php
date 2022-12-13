
  <form method="POST" action="{{ route('register') }}" class="form-signin">
    @csrf
    <div class="account-logo">
        <a href="index-2.html"><img src="assets/img/logo-dark.png" alt=""></a>
    </div>
    <div class="form-group">
        <label>{{ __('Full name') }}</label>
        <input type="text" id="name" name="name" class="form-control  @error('name') is-invalid @enderror">
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror


    </div>
    <div class="form-group">
        <label>{{ __('Phone number') }}</label>
        <input type="number" id="phone" name="phone" class="form-control  @error('phone') is-invalid @enderror">
        @error('phone')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror 
    
    </div>
    <div class="form-group">
        <label>{{ __('Region') }}</label>
        <input type="text" id="region" name="region" class="form-control  @error('region') is-invalid @enderror">
        @error('region')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
     </div>
    <div class="form-group">
        <label>{{ __('District') }}</label>
        <input type="text" id="district" name="district" class="form-control  @error('district') is-invalid @enderror">
        @error('district')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror 
    
    </div>
    <div class="form-group">
        <label>{{ __('District') }}</label>
        <input type="text" id="district" name="district" class="form-control  @error('district') is-invalid @enderror">
        @error('district')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror 
    
    </div>
    <div class="form-group">
        <label>{{ __('Ward') }}</label>
        <input type="text" id="ward" name="ward" class="form-control  @error('ward') is-invalid @enderror">
        @error('ward')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror 
    
    </div>
    <div class="form-group">
        <label>{{ __('District') }}</label>
        <input type="text" id="district" name="district" class="form-control  @error('district') is-invalid @enderror">
        @error('district')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror 
    
    </div>
    <div class="form-group checkbox">
        <label>
            <input type="checkbox"> I have read and agree the Terms &amp; Conditions
        </label>
    </div>
    <div class="form-group text-center">
        <button class="btn btn-primary account-btn" type="submit">Signup</button>
    </div>
    <div class="text-center login-link">
        Already have an account? <a href="login.html">Login</a>
    </div>
</form>
if($data('option') == 'Peasant'){
    $userRoles = User::find($user->id);
    $userRoles->roles()->attach(2);     
   
}
else{
    $userRoles = User::find($user->id);
    $userRoles->roles()->attach(1);     
   
}
// roles



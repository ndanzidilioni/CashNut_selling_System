
@include('layout.common.header')
<div class="row">
    <div class="col-lg-8 offset-lg-2">
      <br><br>
        <h4 class="page-title">Add your Bank Information</h4>
    </div>
</div>
  
<div class="row">
    <div class="col-lg-8 offset-lg-2">
     {!! Form::open(['class'=>'form-group row mb-4','action' => 'BankController@store','method'=>'POST']) !!}

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Bank name<span class="text-danger">*</span></label>
                        {{ Form::text('Bname', null , ['class'=>'form-control']) }}

                        {{-- <input class="form-control" type="text"> --}}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Account Name</label>
                        {{ Form::text('Aname', null , ['class'=>'form-control']) }}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Account Number<span class="text-danger">*</span></label>
                        {{ Form::number('Anumber', null , ['class'=>'form-control']) }}
                    </div>
                </div>
              
               
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>phone Number</label>
                        {{ Form::number('phone', null , ['class'=>'form-control']) }}
                    </div>
                </div>
               
                
               


            </div>
            <div class="m-t-20 text-center">
                    {{ Form::submit('save', ['class'=>'btn btn-primary  submit-btn']) }}

                {{-- <button class="btn btn-primary submit-btn">Create Employee</button> --}}
            </div>
            {!! Form::close() !!}

    </div>
</div>


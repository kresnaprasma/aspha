
   <div class="row">
      <div class="col-md-6">
         <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            {!! Form::label('name', "Name", ['class'=>'col-md-4 control-label']) !!}
            <div class="col-md-8">
               {!! Form::text('name', old('name'), ['class'=>'form-control','required','autofocus','id'=>'name']) !!}
               @if ($errors->has('name'))
               <span class="help-block">
               <strong>{{ $errors->first('name') }}</strong>
               </span>
               @endif
            </div>
         </div>

         <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            {!! Form::label('email', "Email", ['class'=>'col-md-4 control-label']) !!}
            <div class="col-md-8">
               {!! Form::text('email', old('email'), ['class'=>'form-control','required','id'=>'email']) !!}
               @if ($errors->has('email'))
               <span class="help-block">
               <strong>{{ $errors->first('email') }}</strong>
               </span>
               @endif
            </div>
         </div>
         
         <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
            {!! Form::label('address', "Address", ['class'=>'col-md-4 control-label']) !!}
            <div class="col-md-8">
               {!! Form::textarea('address', old('address'), ['class'=>'form-control','id'=>'address']) !!}
               @if ($errors->has('address'))
               <span class="help-block">
               <strong>{{ $errors->first('address') }}</strong>
               </span>
               @endif
            </div>
         </div>
         
         <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
            {!! Form::label('phone', "Phone", ['class'=>'col-md-4 control-label']) !!}
            <div class="col-md-8">
               {!! Form::text('phone', old('phone'), ['class'=>'form-control','id'=>'phone']) !!}
               @if ($errors->has('phone'))
               <span class="help-block">
               <strong>{{ $errors->first('phone') }}</strong>
               </span>
               @endif
            </div>
         </div>
         
         <div class="form-group{{ $errors->has('npwp') ? ' has-error' : '' }}">
            {!! Form::label('npwp', "Npwp", ['class'=>'col-md-4 control-label']) !!}
            <div class="col-md-8">
               {!! Form::text('npwp', old('npwp'), ['class'=>'form-control','id'=>'npwp']) !!}
               @if ($errors->has('npwp'))
               <span class="help-block">
               <strong>{{ $errors->first('npwp') }}</strong>
               </span>
               @endif
            </div>
         </div>
      </div>
      <!-- /.col -->
      <div class="col-md-6">
         <div class="form-group{{ $errors->has('pic_name') ? ' has-error' : '' }}">
            {!! Form::label('pic_name', "PIC Name", ['class'=>'col-md-4 control-label']) !!}
            <div class="col-md-8">
               {!! Form::text('pic_name', old('pic_name'), ['class'=>'form-control','id'=>'pic_name']) !!}
               @if ($errors->has('pic_name'))
               <span class="help-block">
               <strong>{{ $errors->first('pic_name') }}</strong>
               </span>
               @endif
            </div>
         </div>
      
         <div class="form-group{{ $errors->has('branch_id') ? ' has-error' : '' }}">
            {!! Form::label('branch_id', "Branch", ['class'=>'col-md-4 control-label']) !!}
            <div class="col-md-8">
               {!! Form::select('branch_id',$branch_list, old('branch_id'), ['class'=>'form-control','id'=>'branch_id']) !!}
               @if ($errors->has('branch_id'))
               <span class="help-block">
               <strong>{{ $errors->first('branch_id') }}</strong>
               </span>
               @endif
            </div>
         </div>

      </div>
   </div>
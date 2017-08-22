<div class="row">
      <div class="col-md-6">
         
         <div class="form-group{{ $errors->has('customercollateral_no') ? ' has-error' : '' }}">
            {!! Form::label('customercollateral_no', "customercollateral_no", ['class'=>'col-md-4 control-label']) !!}
            <div class="col-md-8">
               {!! Form::text('customercollateral_no', null, ['class'=>'form-control', 'readonly'=>'true', 'placeholder' => empty($customercollateral_id) ? 'default value' : $customercollateral_id, 'required' ]) !!}
               @if ($errors->has('customercollateral_no'))
               <span class="help-block">
               <strong>{{ $errors->first('customercollateral_no') }}</strong>
               </span>
               @endif
            </div>
         </div>

         <div class="form-group{{ $errors->has('stnk') ? ' has-error' : '' }}">
            {!! Form::label('stnk', "stnk", ['class'=>'col-md-4 control-label']) !!}
            <div class="col-md-8">
               {!! Form::text('stnk', old('stnk'), ['class'=>'form-control','required','autofocus','id'=>'stnk']) !!}
               @if ($errors->has('stnk'))
               <span class="help-block">
               <strong>{{ $errors->first('stnk') }}</strong>
               </span>
               @endif
            </div>
         </div>

         <div class="form-group{{ $errors->has('bpkb') ? ' has-error' : '' }}">
            {!! Form::label('bpkb', "bpkb", ['class'=>'col-md-4 control-label']) !!}
            <div class="col-md-8">
               {!! Form::text('bpkb', old('bpkb'), ['class'=>'form-control','required','id'=>'bpkb']) !!}
               @if ($errors->has('bpkb'))
               <span class="help-block">
               <strong>{{ $errors->first('bpkb') }}</strong>
               </span>
               @endif
            </div>
         </div>
         
         <div class="form-group{{ $errors->has('machine_number') ? ' has-error' : '' }}">
            {!! Form::label('machine_number', "Machine Number", ['class'=>'col-md-4 control-label']) !!}
            <div class="col-md-8">
               {!! Form::text('machine_number', old('machine_number'), ['class'=>'form-control','id'=>'machine_number']) !!}
               @if ($errors->has('machine_number'))
               <span class="help-block">
               <strong>{{ $errors->first('machine_number') }}</strong>
               </span>
               @endif
            </div>
         </div>
         
         <div class="form-group{{ $errors->has('chassis_number') ? ' has-error' : '' }}">
            {!! Form::label('chassis_number', "Chassis Number", ['class'=>'col-md-4 control-label']) !!}
            <div class="col-md-8">
               {!! Form::text('chassis_number', old('chassis_number'), ['class'=>'form-control','id'=>'chassis_number']) !!}
               @if ($errors->has('chassis_number'))
               <span class="help-block">
               <strong>{{ $errors->first('chassis_number') }}</strong>
               </span>
               @endif
            </div>
         </div>
         
      </div>
      
      <!-- /.col -->
      <div class="col-md-6">
         <div class="form-group{{ $errors->has('vehicle_color') ? ' has-error' : '' }}">
            {!! Form::label('vehicle_color', "Vehicle Color", ['class'=>'col-md-4 control-label']) !!}
            <div class="col-md-8">
               {!! Form::text('vehicle_color', old('vehicle_color'), ['class'=>'form-control','id'=>'vehicle_color']) !!}
               @if ($errors->has('vehicle_color'))
               <span class="help-block">
               <strong>{{ $errors->first('vehicle_color') }}</strong>
               </span>
               @endif
            </div>
         </div>
         <div class="form-group{{ $errors->has('vehicle_cc') ? ' has-error' : '' }}">
            {!! Form::label('vehicle_cc', "Vehicle CC", ['class'=>'col-md-4 control-label']) !!}
            <div class="col-md-8">
               {!! Form::text('vehicle_cc', old('vehicle_cc'), ['class'=>'form-control','id'=>'vehicle_cc']) !!}
               @if ($errors->has('vehicle_cc'))
               <span class="help-block">
               <strong>{{ $errors->first('vehicle_cc') }}</strong>
               </span>
               @endif
            </div>
         </div>
      
         <div class="form-group{{ $errors->has('collateral_name') ? ' has-error' : '' }}">
            {!! Form::label('collateral_name', "Collateral Name", ['class'=>'col-md-4 control-label']) !!}
            <div class="col-md-8">
               {!! Form::text('collateral_name', old('collateral_name'), ['class'=>'form-control','required','autofocus','id'=>'collateral_name']) !!}
               @if ($errors->has('collateral_name'))
               <span class="help-block">
               <strong>{{ $errors->first('collateral_name') }}</strong>
               </span>
               @endif
            </div>
         </div>

         <div class="form-group{{ $errors->has('vehicle_date') ? ' has-error' : '' }}">
            {!! Form::label('vehicle_date', "Tahun Buat", ['class'=>'col-md-4 control-label']) !!}
            <div class="col-md-8">
               {!! Form::date('vehicle_date', old('vehicle_date'), ['class'=>'form-control','required','autofocus','id'=>'vehicle_date']) !!}
               @if ($errors->has('vehicle_date'))
               <span class="help-block">
               <strong>{{ $errors->first('vehicle_date') }}</strong>
               </span>
               @endif
            </div>
         </div>

         <div class="form-group{{ $errors->has('stnk_due_date') ? ' has-error' : '' }}">
            {!! Form::label('stnk_due_date', "Masa Berlaku STNK", ['class'=>'col-md-4 control-label']) !!}
            <div class="col-md-8">
               {!! Form::date('stnk_due_date', old('stnk_due_date'), ['class'=>'form-control','required','autofocus','id'=>'stnk_due_date']) !!}
               @if ($errors->has('stnk_due_date'))
               <span class="help-block">
               <strong>{{ $errors->first('stnk_due_date') }}</strong>
               </span>
               @endif
            </div>
         </div>

      </div>
   </div>
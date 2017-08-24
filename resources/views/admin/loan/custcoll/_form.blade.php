<div class="row">
      <div class="col-md-6">
         
         <div class="form-group{{ $errors->has('customer_no') ? ' has-error' : '' }}">
            {!! Form::label('customer_no', 'Customer No.', ['class'=>'col-md-4 control-label']) !!}
            {!! Form::text('customer_no', old('customer_no'), ['class'=>'form-control', 'id'=>'customernoColl', 'readonly'=>'true']) !!}
            @if ($errors->has('customer_no'))
               <span class="help-block">
                  <strong>{{ $errors->first('customer_no') }}</strong>
               </span>
            @endif
         </div>

         <div class="form-group{{ $errors->has('customercollateral_no') ? ' has-error' : '' }}">
            {!! Form::label('customercollateral_no', "Customercollateral No", ['class'=>'col-md-4 control-label']) !!}
            {!! Form::text('customercollateral_no', $customercollateral_id, ['class'=>'form-control', 'readonly'=>'true', 'id'=>'customercollateralColl']) !!}
               @if ($errors->has('customercollateral_no'))
               <span class="help-block">
               <strong>{{ $errors->first('customercollateral_no') }}</strong>
               </span>
               @endif
         </div>

         <div class="form-group{{ $errors->has('stnk') ? ' has-error' : '' }}">
            {!! Form::label('stnk', "Stnk", ['class'=>'col-md-4 control-label']) !!}
            {!! Form::text('stnk', old('stnk'), ['class'=>'form-control','required','autofocus','id'=>'stnkColl']) !!}
               @if ($errors->has('stnk'))
               <span class="help-block">
               <strong>{{ $errors->first('stnk') }}</strong>
               </span>
               @endif
         </div>

         <div class="form-group{{ $errors->has('bpkb') ? ' has-error' : '' }}">
            {!! Form::label('bpkb', "Bpkb", ['class'=>'col-md-4 control-label']) !!}
            {!! Form::text('bpkb', old('bpkb'), ['class'=>'form-control','required','id'=>'bpkbColl']) !!}
               @if ($errors->has('bpkb'))
               <span class="help-block">
               <strong>{{ $errors->first('bpkb') }}</strong>
               </span>
               @endif
         </div>
         
         <div class="form-group{{ $errors->has('machine_number') ? ' has-error' : '' }}">
            {!! Form::label('machine_number', "Machine Number", ['class'=>'col-md-4 control-label']) !!}
            {!! Form::text('machine_number', old('machine_number'), ['class'=>'form-control','id'=>'machine_numberColl']) !!}
               @if ($errors->has('machine_number'))
               <span class="help-block">
               <strong>{{ $errors->first('machine_number') }}</strong>
               </span>
               @endif
         </div>
         
         <div class="form-group{{ $errors->has('chassis_number') ? ' has-error' : '' }}">
            {!! Form::label('chassis_number', "Chassis Number", ['class'=>'col-md-4 control-label']) !!}
            {!! Form::text('chassis_number', old('chassis_number'), ['class'=>'form-control','id'=>'chassis_numberColl']) !!}
               @if ($errors->has('chassis_number'))
               <span class="help-block">
               <strong>{{ $errors->first('chassis_number') }}</strong>
               </span>
               @endif
         </div>
         
      </div>
      
      <!-- /.col -->
      <div class="col-md-6">
         <div class="form-group{{ $errors->has('vehicle_color') ? ' has-error' : '' }}">
            {!! Form::label('vehicle_color', "Vehicle Color", ['class'=>'col-md-4 control-label']) !!}
            {!! Form::text('vehicle_color', old('vehicle_color'), ['class'=>'form-control','id'=>'vehicle_colorColl']) !!}
               @if ($errors->has('vehicle_color'))
               <span class="help-block">
               <strong>{{ $errors->first('vehicle_color') }}</strong>
               </span>
               @endif
         </div>
         <div class="form-group{{ $errors->has('vehicle_cc') ? ' has-error' : '' }}">
            {!! Form::label('vehicle_cc', "Vehicle CC", ['class'=>'col-md-4 control-label']) !!}
            {!! Form::text('vehicle_cc', old('vehicle_cc'), ['class'=>'form-control','id'=>'vehicle_ccColl']) !!}
               @if ($errors->has('vehicle_cc'))
               <span class="help-block">
               <strong>{{ $errors->first('vehicle_cc') }}</strong>
               </span>
               @endif
         </div>
      
         <div class="form-group{{ $errors->has('collateral_name') ? ' has-error' : '' }}">
            {!! Form::label('collateral_name', "Collateral Name", ['class'=>'col-md-4 control-label']) !!}
            {!! Form::text('collateral_name', old('collateral_name'), ['class'=>'form-control','required','autofocus','id'=>'collateral_nameColl']) !!}
               @if ($errors->has('collateral_name'))
               <span class="help-block">
               <strong>{{ $errors->first('collateral_name') }}</strong>
               </span>
               @endif
         </div>

         <div class="form-group{{ $errors->has('vehicle_date') ? ' has-error' : '' }}">
            {!! Form::label('vehicle_date', "Tahun Buat", ['class'=>'col-md-4 control-label']) !!}
            {!! Form::date('vehicle_date', old('vehicle_date'), ['class'=>'form-control','required','autofocus','id'=>'vehicle_dateColl']) !!}
               @if ($errors->has('vehicle_date'))
               <span class="help-block">
               <strong>{{ $errors->first('vehicle_date') }}</strong>
               </span>
               @endif
         </div>

         <div class="form-group{{ $errors->has('stnk_due_date') ? ' has-error' : '' }}">
            {!! Form::label('stnk_due_date', "Masa Berlaku STNK", ['class'=>'col-md-4 control-label']) !!}
            {!! Form::date('stnk_due_date', old('stnk_due_date'), ['class'=>'form-control','required','autofocus','id'=>'stnk_due_dateColl']) !!}
               @if ($errors->has('stnk_due_date'))
               <span class="help-block">
               <strong>{{ $errors->first('stnk_due_date') }}</strong>
               </span>
               @endif
         </div>

      </div>
   </div>
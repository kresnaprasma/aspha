<div class="row">
      <div class="col-md-6">
         <div class="form-group{{ $errors->has('credit_ceiling_request') ? ' has-error' : '' }}">
            {!! Form::label('credit_ceiling_request', "Credit Request", ['class'=>'col-md-4 control-label']) !!}
            <div class="col-md-8">
               {!! Form::text('credit_ceiling_request', old('credit_ceiling_request'), ['class'=>'form-control','required','autofocus','id'=>'credit_ceiling_request']) !!}
               @if ($errors->has('credit_ceiling_request'))
                  <span class="help-block">
                     <strong>{{ $errors->first('credit_ceiling_request') }}</strong>
                  </span>
               @endif
            </div>
         </div>

         <div class="form-group{{ $errors->has('tenor_request') ? ' has-error' : '' }}">
            {!! Form::label('tenor_request', "Tenor Request", ['class'=>'col-md-4 control-label']) !!}
            <div class="col-md-8">
               {!! Form::text('tenor_request', old('tenor_request'), ['class'=>'form-control','required','id'=>'tenor_request']) !!}
               @if ($errors->has('tenor_request'))
                  <span class="help-block">
                     <strong>{{ $errors->first('tenor_request') }}</strong>
                  </span>
               @endif
            </div>
         </div>
         
         <div class="form-group{{ $errors->has('customer_no') ? ' has-error' : '' }}">
            {!! Form::label('customer_no', "Customer Name", ['class'=>'col-md-4 control-label']) !!}
            <div class="col-md-8">
               {!! Form::select('customer_no', $customer_list, old('customer_no'), ['class'=>'form-control','id'=>'customer_no']) !!}
               @if ($errors->has('customer_no'))
                  <span class="help-block">
                     <strong>{{ $errors->first('customer_no') }}</strong>
                  </span>
               @endif
            </div>
         </div>

      </div>

      
      <!-- /.col -->
      <div class="col-md-6">

         <div class="form-group{{ $errors->has('leasing_no') ? ' has-error' : '' }}">
            {!! Form::label('leasing_no', "Leasing", ['class'=>'col-md-4 control-label']) !!}
            <div class="col-md-8">
               {!! Form::select('leasing_no', $leasing_list, old('leasing_no'), ['class'=>'form-control','required','id'=>'leasing_no']) !!}
               @if ($errors->has('leasing_no'))
                  <span class="help-block">
                     <strong>{{ $errors->first('leasing_no') }}</strong>
                  </span>
               @endif
            </div>
         </div>

         <div class="form-group{{ $errors->has('branch_id') ? ' has-error' : '' }}">
            {!! Form::label('branch_id', "Branch", ['class'=>'col-md-4 control-label']) !!}
            <div class="col-md-8">
               {!! Form::select('branch_id', $branch_list, old('branch_id'), ['class'=>'form-control','id'=>'branch_id']) !!}
               @if ($errors->has('branch_id'))
                  <span class="help-block">
                     <strong>{{ $errors->first('branch_id') }}</strong>
                  </span>
               @endif
            </div>
         </div>

      </div>
   </div>
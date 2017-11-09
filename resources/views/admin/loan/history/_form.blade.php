   <div class="row">
      <div class="col-md-6">
         <div class="form-group{{ $errors->has('note') ? ' has-error' : '' }}">
            {!! Form::label('note', "Credit Request", ['class'=>'col-md-4 control-label']) !!}
            <div class="col-md-8">
               {!! Form::text('note', old('note'), ['class'=>'form-control','required','autofocus','id'=>'note']) !!}
               @if ($errors->has('note'))
                  <span class="help-block">
                     <strong>{{ $errors->first('note') }}</strong>
                  </span>
               @endif
            </div>
         </div>

         <div class="form-group{{ $errors->has('note') ? ' has-error' : '' }}">
            {!! Form::label('note', "Note", ['class'=>'col-md-4 control-label']) !!}
            <div class="col-md-8">
               {!! Form::text('note', old('note'), ['class'=>'form-control','required','id'=>'note']) !!}
               @if ($errors->has('note'))
                  <span class="help-block">
                     <strong>{{ $errors->first('note') }}</strong>
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

         <div class="form-group{{ $errors->has('cash_no') ? ' has-error' : '' }}">
            {!! Form::label('cash_no', "Cash No.", ['class'=>'col-md-4 control-label']) !!}
            <div class="col-md-8">
               {!! Form::select('cash_no', $cash_list, old('cash_no'), ['class'=>'form-control','id'=>'cash_no']) !!}
               @if ($errors->has('cash_no'))
                  <span class="help-block">
                     <strong>{{ $errors->first('cash_no') }}</strong>
                  </span>
               @endif
            </div>
         </div>

      </div>

   </div>
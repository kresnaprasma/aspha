<div class="row">
      <div class="col-md-6">
         <div class="form-group{{ $errors->has('tenor_approve') ? ' has-error' : '' }}">
            {!! Form::label('tenor_approve', "Tenor Approve", ['class'=>'col-md-4 control-label']) !!}
            <div class="col-md-8">
               {!! Form::text('tenor_approve', old('tenor_approve'), ['class'=>'form-control','required','autofocus','id'=>'tenor_approve']) !!}
               @if ($errors->has('tenor_approve'))
                  <span class="help-block">
                     <strong>{{ $errors->first('tenor_approve') }}</strong>
                  </span>
               @endif
            </div>
         </div>

         <div class="form-group{{ $errors->has('payment') ? ' has-error' : '' }}">
            {!! Form::label('payment', "Payment", ['class'=>'col-md-4 control-label']) !!}
            <div class="col-md-8">
               {!! Form::text('payment', old('payment'), ['class'=>'form-control','required','id'=>'payment']) !!}
               @if ($errors->has('payment'))
                  <span class="help-block">
                     <strong>{{ $errors->first('payment') }}</strong>
                  </span>
               @endif
            </div>
         </div>
         
         <div class="form-group{{ $errors->has('approve_date') ? ' has-error' : '' }}">
            {!! Form::label('approve_date', "Approve Date", ['class'=>'col-md-4 control-label']) !!}
            <div class="col-md-8">
               {!! Form::date('approve_date', old('approve_date'), ['class'=>'form-control','id'=>'approve_date']) !!}
               @if ($errors->has('approve_date'))
                  <span class="help-block">
                     <strong>{{ $errors->first('approve_date') }}</strong>
                  </span>
               @endif
            </div>
         </div>

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

         <div class="form-group{{ $errors->has('cash_no') ? ' has-error' : '' }}">
               {!! Form::label('cash_no', "Cash No.", ['class'=>'col-md-4 control-label']) !!}
            <div class="col-md-8">
               {!! Form::select('cash_no',$cash_list, old('cash_no'), ['class'=>'form-control','id'=>'cash_no']) !!}
               @if ($errors->has('cash_no'))
                  <span class="help-block">
                     <strong>{{ $errors->first('cash_no') }}</strong>
                  </span>
               @endif
            </div>
         </div>
      </div>

   </div>
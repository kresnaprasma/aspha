<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Aspha Sales Price History
            {!! Form::hidden('sales_no', old('sales_no'), ['class'=>'form-control']) !!}
        </h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toogle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
	<div class="box-body">
		<div class="row">
			@if($edit)
				<div class="col-md-4">
					<div class="form-group{{ $errors->has('pricesaleshistory_no') ? ' has-error' : '' }}">
		                {!! Form::label('pricesaleshistory_no', "No. Price History") !!}
		                {!! Form::text('pricesaleshistory_no', old('pricesaleshistory'), ['class'=>'form-control','required', 'id'=>'pricesaleshistory_no', 'readonly'=>'true']) !!}
		                @if ($errors->has('pricesaleshistory_no'))
		                    <span class="help-block">
		                        <strong>{{ $errors->first('pricesaleshistory_no') }}</strong>
		                    </span>
		                @endif
		            </div>
		            <div class="form-group">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						{!! Form::label('merk_id', 'Merk:') !!}
						{!! Form::text('merk_id', $pricesaleshistory->merks['name'], ['class'=>'form-control', 'id'=>'merk_id', 'readonly'=>'true']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('type_id', 'Type:') !!}
						{!! Form::text('type_id', $pricesaleshistory->types['name'], ['class'=>'form-control', 'id'=>'type_id', 'readonly'=>'true']) !!}
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group{{ $errors->has('selling_price') ? ' has-error' : '' }}">
		                {!! Form::label('selling_price', "Selling Price") !!}
		                {!! Form::text('selling_price', null, ['class'=>'form-control detail-purchasing','required','autofocus','id'=>'selling_price', 'onkeyup'=>'formatNumber(this)', 'onkeypress'=>'formatNumber(this)']) !!}
		                @if ($errors->has('selling_price'))
		                    <span class="help-block">
		                        <strong>{{ $errors->first('selling_price') }}</strong>
		                    </span>
		                @endif
		            </div>
		            <div class="form-group{{ $errors->has('discount') ? ' has-error' : '' }}">
		                {!! Form::label('discount', "Discount") !!}
		                {!! Form::text('discount', null, ['class'=>'form-control detail-purchasing','required','autofocus','id'=>'discount', 'onkeyup'=>'formatNumber(this)', 'onkeypress'=>'formatNumber(this)']) !!}
		                @if ($errors->has('discount'))
		                    <span class="help-block">
		                        <strong>{{ $errors->first('discount') }}</strong>
		                    </span>
		                @endif
		            </div>
				</div>
			@else
				<div class="col-md-4">
					<div class="form-group{{ $errors->has('pricesaleshistory_no') ? ' has-error' : '' }}">
		                {!! Form::label('pricesaleshistory_no', "No. Price History") !!}
		                {!! Form::text('pricesaleshistory_no', App\PriceSalesHistory::Maxno(), ['class'=>'form-control','required', 'id'=>'pricesaleshistory_no', 'readonly'=>'true']) !!}
		                @if ($errors->has('pricesaleshistory_no'))
		                    <span class="help-block">
		                        <strong>{{ $errors->first('pricesaleshistory_no') }}</strong>
		                    </span>
		                @endif
		            </div>
		            <div class="form-group">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						{!! Form::label('merk_id', 'Merk:') !!}
						<select name="merk_id" id="merk_id" class="form-control">
							<option value="">--- Select Merk ---</option>
							@foreach ($merkall as $key => $value)
								<option value="{{ $key }}">{{ $value }}</option>
							@endforeach
						</select>
					</div>

					<div class="form-group">
						{!! Form::label('type_id', 'Type:') !!}
						<select name="type_id" id="type_id" class="form-control">
							<option value="">--- Select Type ---</option>
						</select>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group{{ $errors->has('selling_price') ? ' has-error' : '' }}">
		                {!! Form::label('selling_price', "Selling Price") !!}
		                {!! Form::text('selling_price', null, ['class'=>'form-control detail-purchasing','required','autofocus','id'=>'selling_price', 'onkeyup'=>'formatNumber(this)', 'onkeypress'=>'formatNumber(this)']) !!}
		                @if ($errors->has('selling_price'))
		                    <span class="help-block">
		                        <strong>{{ $errors->first('selling_price') }}</strong>
		                    </span>
		                @endif
		            </div>
		            <div class="form-group{{ $errors->has('discount') ? ' has-error' : '' }}">
		                {!! Form::label('discount', "Discount") !!}
		                {!! Form::text('discount', null, ['class'=>'form-control detail-purchasing','required','autofocus','id'=>'discount', 'onkeyup'=>'formatNumber(this)', 'onkeypress'=>'formatNumber(this)']) !!}
		                @if ($errors->has('discount'))
		                    <span class="help-block">
		                        <strong>{{ $errors->first('discount') }}</strong>
		                    </span>
		                @endif
		            </div>
				</div>
			@endif
		</div>
	</div>
	<div class="box-footer">
		{!! Form::submit('save' , ['class' =>'btn btn-primary']) !!}
	</div>
</div>

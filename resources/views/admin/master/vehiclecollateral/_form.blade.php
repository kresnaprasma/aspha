@if($edit)
	<div class="box box-default">
		<div class="box-header with-border">
			<h3 class="box-title">
			Edit Collateral
			</h3>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
			</div>
		</div>

		<div class="box-body">
			<div class="col-md-4 center-block">
				<div class="form-group">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					{!! Form::label('merk_id', 'Merk:') !!}
					{!! Form::select('merk_id', $merkall ,old('merk_id'), ['class'=>'form-control', 'id'=>'merk_id']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('type_id', 'Type:') !!}
					{!! Form::select('type_id', $typeall, old('type_id'), ['class'=>'form-control', 'id'=>'type_id']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('vehicle_date', 'Year Manufacturing:') !!}
					{!! Form::selectYear('vehicle_date', 2009, date('Y'), old('vehicle_date'), ['class'=>'form-control', 'id'=>'vehicle_date']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('vehicle_price', 'Harga:') !!}
					{!! Form::text('vehicle_price', null, ['class'=>'form-control detail-purchasing','required','autofocus','id'=>'vehicle_price', 'onkeyup'=>'formatNumber(this)', 'onkeypress'=>'formatNumber(this)']) !!}
				</div>
					{!! Form::submit('save' , ['class' =>'btn btn-primary']) !!}
					{!! Form::close() !!}
			</div>
		</div>
	</div>
@else
	<div class="box box-default">
		<div class="box-header with-border">
			<h3 class="box-title">
			Create Collateral
			</h3>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
			</div>
		</div>
		<div class="box-body">
			<div class="col-md-4 center-block">
				<div class="form-group">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					{!! Form::label('merk_id', 'Merk:') !!}
					<select name="merk_id" id="merk_id" class="form-control" style="width: 285px">
						<option value="">--- Select Merk ---</option>
						@foreach ($merkall as $key => $value)
							<option value="{{ $key }}">{{ $value }}</option>
						@endforeach
					</select>
				</div>

				<div class="form-group">
					{!! Form::label('type_id', 'Type:') !!}
					<select name="type_id" id="type_id" class="form-control" style="width: 285px">
						<option value="">--- Select Type ---</option>
					</select>
				</div>

				<div class="form-group">
					{!! Form::label('vehicle_date', 'Year Manufacturing:') !!}
					{!! Form::selectYear('vehicle_date', 2009, date('Y'), old('vehicle_date'), ['class'=>'form-control', 'id'=>'vehicle_date']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('vehicle_price', 'Harga:') !!}
					{!! Form::text('vehicle_price', null, ['class'=>'form-control detail-purchasing','required','autofocus','id'=>'vehicle_price', 'onkeyup'=>'formatNumber(this)', 'onkeypress'=>'formatNumber(this)']) !!}
				</div>
					{!! Form::submit('save' , ['class' =>'btn btn-primary']) !!}
					{!! Form::close() !!}
			</div>
		</div>
	</div>
@endif
	
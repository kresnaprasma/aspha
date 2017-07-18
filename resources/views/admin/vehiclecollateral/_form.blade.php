<div class="row">
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
			{{-- {!! Form::select('type_id', null, ['class'=>'form-control m-bot15']) !!} --}}
			<select name="type_id" id="type_id" class="form-control" style="width: 285px">
				<option value="">--- Select Type ---</option>
			</select>
		</div>

		<div class="form-group">
			{!! Form::label('vehicle_date', 'Vehicle Date:') !!}
			{!! Form::date('vehicle_date', null, ['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('vehicle_price', 'Vehicle Price:') !!}
			{!! Form::text('vehicle_price', null, ['class'=>'form-control']) !!}
		</div>
			{!! Form::submit('save' , ['class' =>'btn btn-primary']) !!}
			{!! Form::close() !!}
	</div>
</div>
	
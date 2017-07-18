<div class="row">
	<div class="col-md-12 col-xs-12 col-sm-12 center-block">
		<div class="form-group col-sm-6 {{ $errors->has('merk') ? 'has-error' : '' }}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
				{!! Form::label('Merk', 'Merk :') !!}
				<select name="merk" id="merk" class="form-control" style="width: 400px">
					<option value="">--- Pilih Merk ---</option>
					@foreach ($merkall as $key => $value)
						<option value="{{ $key }}">{{ $value }}</option>
					@endforeach
				</select>
			<span class="text-danger">{{ $errors->first('merk') }}</span>
		</div>

		<div class="form-group col-sm-6 col-xs-6 col-md-6 {{ $errors->has('type') ? 'has-error' : '' }}">
			{!! Form::label('type', 'Type :') !!}
			<select name="type" id="type" class="form-control" style="width: 400px">
				<option value="">---Select Type---</option>
			</select>
			<span class="text-danger">{{ $errors->first('type') }}</span>
		</div>
		
		<div class="form-group col-sm-6 col-xs-6 col-md-6 {{ $errors->has('post_name') ? 'has-error' : '' }}">
			{!! Form::label('post_name', 'Nama Barang :') !!}
			<input type="text" class="form-control" name="post_name" id="post_name" style="width: 400px">
			<span class="text-danger">{{ $errors->first('post_name') }}</span>
		</div>
		
		<div class="form-group col-sm-6 col-xs-6 col-md-6 {{ $errors->has('post_price') ? 'has-error' : '' }}">
			{!! Form::label('post_price', 'Harga :') !!}
			<input type="text" class="form-control" name="post_price" id="post_price" style="width: 400px">
			<span class="text-danger">{{ $errors->first('post_price') }}</span>
		</div>
		
		<div class="form-group col-sm-6 col-xs-6 col-md-6 {{ $errors->has('fitur') ? 'has-error' : '' }}">
			{!! Form::label('fitur', 'Kelengkapan : ') !!}
			<input type="text" name="fitur" class="form-control" id="fitur" style="width: 400px">
			<span class="text-danger">{{ $errors->first('fitur') }}</span>
		</div>
		
		<div class="form-group col-sm-6 col-xs-6 col-md-6 {{ $errors->has('stnk_address') ? 'has-error' : '' }}">
			{!! Form::label('stnk_address', 'Alamat STNK :') !!}
			<input type="text" name="stnk_address" class="form-control" id="stnk_address" style="width: 400px">
			<span class="text-danger">{{ $errors->first('stnk_address') }}</span>
		</div>
		
		<div class="form-group col-sm-6 col-xs-6 col-md-6 {{ $errors->has('condition') ? 'has-error' : '' }}">
			{!! Form::label('condition', 'Kondisi :') !!}
			<select name="condition" id="conditionMotor" class="form-control" style="width: 400px" >
				<option value="BEKAS">BEKAS</option>
				<option value="BARU">BARU</option>
			</select>
			<span class="text-danger">{{ $errors->first('condition') }}</span>
	    </div>
	    
	    <div class="form-group col-sm-6 col-xs-6 col-md-6 {{ $errors->has('status') ? 'has-error' : '' }}">
	    	{!! Form::label('status', 'Status :') !!}
	    	<select name="status" id="statusMotor" class="form-control" style="width: 400px" >
				<option value="READY">READY</option>
				<option value="INDENT">INDENT</option>
			</select>
			<span class="text-danger">{{ $errors->first('status') }}</span>
	    </div>
	    
	    <div class="form-group col-sm-6 col-xs-6 col-md-6 {{ $errors->has('description') ? 'has-error' : '' }}">
	    	{!! Form::label('description', 'Deskripsi :') !!} <br>
	    	<textarea rows="5" cols="50" id="description" name="description">
	    	</textarea>
	    	<span class="text-danger">{{ $errors->first('description') }}</span>
	    </div>
		
		<div class="form-group col-sm-8 col-xs-8 col-md-8">
		{!! Form::submit('save' , ['class' =>'btn btn-primary']) !!}
		{!! Form::close() !!}
		</div>
	</div>
</div>
<div class="row" id="myform">
	<div class="col-md-12 col-sm-12 col-xs-12 center-block">

		<div class="form-group col-md-12 col-sm-12 col-xs-12">
			<h3><b>Spesifikasi Dasar Motor</b></h3>
		</div>
	
		<div class="form-group col-sm-4 col-md-4 col-xs-4 {{ $errors->has('merk') ? 'has-error' : '' }}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
				{!! Form::label('Merk', 'Merk :') !!}
				<select name="merk" id="merk" class="form-control" style="width: 370px">	
					<option value="">--- Pilih Warna ---</option>
					@foreach ($merkall as $key => $value)
						<option value="{{ $key }}">{{ $value }}</option>
					@endforeach
				</select>
			<span class="text-danger">{{ $errors->first('merk') }}</span>
		</div>

		<div class="form-group col-sm-4 col-md-4 col-xs-4 {{ $errors->has('type') ? 'has-error' : '' }}">
			{!! Form::label('type', 'Type :') !!}
			<select name="type" id="type" class="form-control" style="width: 370px" placeholder="Pilih Type"></select>
			<span class="text-danger">{{ $errors->first('type') }}</span>
		</div>
		
		<div class="form-group col-sm-4 col-md-4 col-xs-4 {{ $errors->has('vehicle_color') ? 'has-error' : '' }}">
			{!! Form::label('vehicle_color', 'Warna :') !!}
			<select class="select form-control" name="vehicle_color" id="vehicle_color" style="width: 370px">
				<option value="">--- Pilih Warna ---</option>
				<option value="merah">Merah</option>
				<option value="kuning">Kuning</option>
				<option value="biru">Biru</option>
				<option value="hijau">Hijau</option>
				<option value="putih">Putih</option>
				<option value="hitam">Hitam</option>
				<option value="orange">Orange</option>
				<option value="Cokelat">Cokelat</option>
				<option value="Abu-abu">Abu-abu</option>
				<option value="Silver">Silver</option>
				<option value="Ungu">Ungu</option>
			</select>
			<span class="text-danger">{{ $errors->first('vehicle_color') }}</span>
		</div>

		<div class="form-group col-md-12 col-sm-12 col-xs-12">
			<h3><b>Spesifikasi Dalam Motor</b></h3>
		</div>
		
		<div class="form-group col-sm-4 col-md-4 col-xs-4 {{ $errors->has('vehicle_cc') ? 'has-error' : '' }}">
			{!! Form::label('vehicle_cc', 'Kapasitas Mesin (cc): ') !!}
			<select class="select form-control" name="vehicle_cc" id="vehicle_cc" style="width: 370px">
				<option value=""></option>
				<option value="100">100</option>
				<option value="110">110</option>
				<option value="125">125</option>
				<option value="135">135</option>
				<option value="150">150</option>
				<option value="155">155</option>
				<option value="225">225</option>
				<option value="250">250</option>	
			</select>
			<span class="text-danger">{{ $errors->first('vehicle_cc') }}</span>
		</div>
		
		<div class="form-group col-sm-4 col-md-4 col-xs-4 {{ $errors->has('vehicle_date') ? 'has-error' : '' }}">
			{!! Form::label('vehicle_date', 'Tahun Pembuatan Kendaraan (bulan & tahun wajib benar): ') !!}
			{!! Form::date('vehicle_date', null, ['class'=>'form-control', 'id'=>'vehicle_date']) !!}
			<span class="text-danger">{{ $errors->first('vehicle_date') }}</span>
		</div>
		
		<div class="form-group col-sm-4 col-md-4 col-xs-4 {{ $errors->has('bpkb') ? 'has-error' : '' }}">
			{!! Form::label('bpkb', 'No. BPKB: ') !!}
			{!! Form::text('bpkb', null, ['class'=>'form-control', 'id'=>'bpkb']) !!}
			<span class="text-danger">{{ $errors->first('bpkb') }}</span>
		</div>
		
		<div class="form-group col-sm-4 col-md-4 col-xs-4 {{ $errors->first('chassis_number') ? 'has-error' : '' }}">
			{!! Form::label('chassis_number', 'No. Rangka :') !!}
			{!! Form::text('chassis_number', null, ['class'=>'form-control', 'id'=>'chassis_number']) !!}
			<span class="text-danger">{{ $errors->first('chassis_number') }}</span>
		</div>

		<div class="form-group col-sm-4 col-md-4 col-xs-4 {{ $errors->first('machine_number') ? 'has-error' : '' }}">
			{!! Form::label('machine_number', 'No. Mesin :') !!}
			{!! Form::text('machine_number', null, ['class'=>'form-control', 'id'=>'machine_number']) !!}
			<span class="text-danger">{{ $errors->first('machine_number') }}</span>
		</div>
		
		<div class="form-group col-sm-4 col-md-4 col-xs-4 {{ $errors->has('stnk_due_date') ? 'has-error' : '' }}">
			{!! Form::label('stnk_due_date', 'Masa Berlaku STNK :') !!}
			{!! Form::date('stnk_due_date', null, ['class'=>'form-control', 'id'=>'stnk_due_date']) !!}
			<span class="text-danger">{{ $errors->first('stnk_due_date') }}</span>
		</div>

		<div class="form-group col-md-12 col-sm-12 col-xs-12">
			<h3><b>Kriteria Peminjaman</b></h3>
		</div>
		
		<div class="form-group col-sm-4 col-md-4 col-xs-4 {{ $errors->has('tenor') ? 'has-error' : '' }}">
			{!! Form::label('tenor', 'Jangka Waktu Peminjaman :') !!}
			<select class="select form-control" name="tenor" id="tenor" style="width: 370px">
				<option value="">--- Pilih Tenor ---</option>
				<option value="12 bulan">12 bulan</option>
				<option value="18 bulan">18 bulan</option>
				<option value="24 bulan">24 bulan</option>
				<option value="30 bulan">30 bulan</option>
				<option value="36 bulan">36 bulan</option>
			</select>
			<span class="text-danger">{{ $errors->first('tenor') }}</span>
		</div>
		
		<div class="form-group col-sm-4 col-md-4 col-xs-4 {{ $errors->has('price_request') ? 'has-error' : '' }}">
			{!! Form::label('price_request', 'Jumlah Pinjaman :') !!}
			{!! Form::text('price_request', null, ['class'=>'form-control', 'id'=>'price_request']) !!}
		</div>
		
		<div class="form-group col-sm-6 col-md-6 col-xs-6">
		{!! Form::submit('save' , ['class' =>'btn btn-primary']) !!}
		{!! Form::close() !!}
		</div>
	</div>
</div>
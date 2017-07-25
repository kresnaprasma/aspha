<div class="row" id="myform">
	<div class="col-sm-9 col-md-9 col-xs-9 center-block">
		
		<div class="form-group col-sm-7 col-md-7 col-xs-7 {{ $errors->has('ktp_number') ? 'has-error' : '' }}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			{!! Form::label('ktp_number', 'No. KTP :') !!}
			{!! Form::text('ktp_number', null, ['class' => 'form-control', 'id' => 'ktp_number'] ) !!}
			<span class="text-danger">{{ $errors->first('ktp_number') }}</span>
		</div>

		<div class="form-group col-sm-7 col-md-7 col-xs-7 {{ $errors->has('familycard_number') ? 'has-error' : '' }}">
			{!! Form::label('familycard_number', 'No. KK :') !!}
			{!! Form::text('familycard_number', null, ['class' => 'form-control', 'id' => 'familycard_number'] ) !!}
			<span class="text-danger">{{ $errors->first('familycard_number') }}</span>
		</div>

		<div class="form-group col-sm-7 col-md-7 col-xs-7 {{ $errors->has('fullname') ? 'has-error' : '' }}">
			{!! Form::label('fullname', 'Nama Lengkap :') !!}
			{!! Form::text('fullname', null, ['class' => 'form-control', 'id' => 'fullname'] ) !!}
			<span class="text-danger">{{ $errors->first('fullname') }}</span>
		</div>

		<div class="form-group col-sm-7 col-md-7 col-xs-7 {{ $errors->has('address') ? 'has-error' : '' }}">
			{!! Form::label('address', 'Alamat :') !!}
			{!! Form::text('address', null, ['class' => 'form-control', 'id' => 'address'] ) !!}
			<span class="text-danger">{{ $errors->first('address') }}</span>
		</div>

		<div class="form-group col-sm-7 col-md-7 col-xs-7 {{ $errors->has('post_code') ? 'has-error' : '' }}">
			{!! Form::label('post_code', 'Kode Pos :') !!}
			{!! Form::text('post_code', null, ['class' => 'form-control', 'id' => 'post_code'] ) !!}
			<span class="text-danger">{{ $errors->first('post_code') }}</span>
		</div>

		<div class="form-group col-sm-7 col-md-7 col-xs-7 {{ $errors->has('birth_date') ? 'has-error' : '' }}">
			{!! Form::label('birth_date', 'Tanggal Lahir :') !!}
			{!! Form::date('birth_date', null, ['class' => 'form-control', 'id' => 'birth_date'] ) !!}
			<span class="text-danger">{{ $errors->first('birth_date') }}</span>
		</div>

		<div class="form-group col-sm-6 col-md-6 col-xs-6 {{ $errors->has('handphone') ? 'has-error' : '' }}">
			{!! Form::label('handphone', 'No. Telepon :') !!}
			{!! Form::text('handphone', null, ['class' => 'form-control', 'id' => 'handphone'] ) !!}
			<span class="text-danger">{{ $errors->first('handphone') }}</span>
		</div>

		<div class="form-group col-sm-6 col-md-6 col-xs-6 {{ $errors->has('job') ? 'has-error' : '' }}">
			{!! Form::label('job', 'Pekerjaan :') !!}
			{!! Form::text('job', null, ['class' => 'form-control', 'id' => 'job'] ) !!}
			<span class="text-danger">{{ $errors->first('job') }}</span>
		</div>

		<div class="form-group col-sm-6 col-md-6 col-xs-6 {{ $errors->has('company_address') ? 'has-error' : '' }}">
			{!! Form::label('company_address', 'Alamat Kantor :') !!}
			{!! Form::text('company_address', null, ['class' => 'form-control', 'id' => 'company_address'] ) !!}
			<span class="text-danger">{{ $errors->first('company_address') }}</span>
		</div>

		<div class="form-group col-sm-6 col-md-6 col-xs-6 {{ $errors->has('salary') ? 'has-error' : '' }}">
			{!! Form::label('salary', 'Slip Gaji :') !!}
			{!! Form::text('salary', null, ['class' => 'form-control', 'id' => 'salary'] ) !!}
			<span class="text-danger">{{ $errors->first('salary') }}</span>
		</div>

		<div class="form-group col-sm-6 col-md-6 col-xs-6 {{ $errors->has('email') ? 'has-error' : '' }}">
			{!! Form::label('email', 'Email :') !!}
			{!! Form::text('email', null, ['class' => 'form-control', 'id' => 'email'] ) !!}
			<span class="text-danger">{{ $errors->first('email') }}</span>
		</div>

		<div class="form-group col-sm-6 col-md-6 col-xs-6 {{ $errors->has('password') ? 'has-error' : '' }}">
			{!! Form::label('password', 'Password :') !!}
			{!! Form::text('password', null, ['class' => 'form-control', 'id' => 'password'] ) !!}
			<span class="text-danger">{{ $errors->first('password') }}</span>
		</div>

		<div class="form-group col-sm-7 col-md-7 col-xs-7">
			{!! Form::submit('save', ['class' => 'btn btn-primary']) !!}
			{!! Form::close() !!}
		</div>
	</div>
</div>
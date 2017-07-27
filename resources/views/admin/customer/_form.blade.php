<div class="box-body">
	<div class="row">
		<div class="col-md-6">
			<div class="form-group{{ $errors->has('branch_id') ? ' has-error' : '' }}">
                {!! Form::label('branch_id', "Branch") !!}
				{!! Form::select('branch_id', $branch_list, old('branch_id'), ['class'=>'form-control','id'=>'branch_id']) !!}
				@if ($errors->has('branch_id'))
				  <span class="help-block">
				      <strong>{{ $errors->first('branch_id') }}</strong>
				  </span>
				@endif
            </div>

			<div class="checkbox">
              <label>
                {!! Form::checkbox('active',1) !!} <b>active</b>
              </label>
            </div>
			<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                {!! Form::label('name', "Name") !!}
				{!! Form::text('name', old('name'), ['class'=>'form-control','id'=>'name','autofocus']) !!}
				@if ($errors->has('name'))
				  <span class="help-block">
				      <strong>{{ $errors->first('name') }}</strong>
				  </span>
				@endif
            </div>

            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                {!! Form::label('address', "Address") !!}
				{!! Form::textarea('address', old('address'), ['class'=>'form-control','id'=>'address']) !!}
				@if ($errors->has('address'))
				  <span class="help-block">
				      <strong>{{ $errors->first('address') }}</strong>
				  </span>
				@endif
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                {!! Form::label('email', "Email") !!}
				{!! Form::text('email', old('email'), ['class'=>'form-control','id'=>'email']) !!}
				@if ($errors->has('email'))
				  <span class="help-block">
				      <strong>{{ $errors->first('email') }}</strong>
				  </span>
				@endif
            </div>

            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                {!! Form::label('phone', "Phone") !!}
				{!! Form::text('phone', old('phone'), ['class'=>'form-control','id'=>'phone']) !!}
				@if ($errors->has('phone'))
				  <span class="help-block">
				      <strong>{{ $errors->first('phone') }}</strong>
				  </span>
				@endif
            </div>

            <div class="form-group{{ $errors->has('birthdate') ? ' has-error' : '' }}">
                {!! Form::label('birthdate', "Birthdate") !!}
				{!! Form::date('birthdate', old('birthdate'), ['class'=>'form-control','id'=>'birthdate']) !!}
				@if ($errors->has('birthdate'))
				  <span class="help-block">
				      <strong>{{ $errors->first('birthdate') }}</strong>
				  </span>
				@endif
            </div>

            <div class="form-group{{ $errors->has('birthplace') ? ' has-error' : '' }}">
                {!! Form::label('birthplace', "Birthplace") !!}
				{!! Form::text('birthplace', old('birthplace'), ['class'=>'form-control','id'=>'birthplace']) !!}
				@if ($errors->has('birthplace'))
				  <span class="help-block">
				      <strong>{{ $errors->first('birthplace') }}</strong>
				  </span>
				@endif
            </div>

            <div class="form-group{{ $errors->has('identity_number') ? ' has-error' : '' }}">
                {!! Form::label('identity_number', "KTP") !!}
				{!! Form::text('identity_number', old('identity_number'), ['class'=>'form-control','id'=>'identity_number']) !!}
				@if ($errors->has('identity_number'))
				  <span class="help-block">
				      <strong>{{ $errors->first('identity_number') }}</strong>
				  </span>
				@endif
            </div>

		</div>

		<div class="col-md-6">
			<div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                {!! Form::label('gender', "Gender") !!}
				{!! Form::select('gender', ['Male'=>'Male','Female'=>'Female'],old('gender'), ['class'=>'form-control','id'=>'gender']) !!}
				@if ($errors->has('gender'))
				  <span class="help-block">
				      <strong>{{ $errors->first('gender') }}</strong>
				  </span>
				@endif
            </div>

            <div class="form-group{{ $errors->has('rt') ? ' has-error' : '' }}">
                {!! Form::label('rt', "RT") !!}
				{!! Form::text('rt',old('rt'), ['class'=>'form-control','id'=>'rt']) !!}
				@if ($errors->has('rt'))
				  <span class="help-block">
				      <strong>{{ $errors->first('rt') }}</strong>
				  </span>
				@endif
            </div>

            <div class="form-group{{ $errors->has('rw') ? ' has-error' : '' }}">
                {!! Form::label('rw', "RW") !!}
				{!! Form::text('rw',old('rt'), ['class'=>'form-control','id'=>'rw']) !!}
				@if ($errors->has('rw'))
				  <span class="help-block">
				      <strong>{{ $errors->first('rw') }}</strong>
				  </span>
				@endif
            </div>

            <div class="form-group{{ $errors->has('postalcode') ? ' has-error' : '' }}">
                {!! Form::label('postalcode', "Postalcode") !!}
				{!! Form::text('postalcode',old('postalcode'), ['class'=>'form-control','id'=>'postalcode']) !!}
				@if ($errors->has('postalcode'))
				  <span class="help-block">
				      <strong>{{ $errors->first('postalcode') }}</strong>
				  </span>
				@endif
            </div>

            <div class="form-group{{ $errors->has('kelurahan') ? ' has-error' : '' }}">
                {!! Form::label('kelurahan', "Kelurahan") !!}
				{!! Form::text('kelurahan',old('kelurahan'), ['class'=>'form-control','id'=>'kelurahan']) !!}
				@if ($errors->has('kelurahan'))
				  <span class="help-block">
				      <strong>{{ $errors->first('kelurahan') }}</strong>
				  </span>
				@endif
            </div>

            <div class="form-group{{ $errors->has('kecamatan') ? ' has-error' : '' }}">
                {!! Form::label('kecamatan', "Kecamatan") !!}
				{!! Form::text('kecamatan',old('kecamatan'), ['class'=>'form-control','id'=>'kecamatan']) !!}
				@if ($errors->has('kecamatan'))
				  <span class="help-block">
				      <strong>{{ $errors->first('kecamatan') }}</strong>
				  </span>
				@endif
            </div>

            <div class="form-group{{ $errors->has('kabupaten') ? ' has-error' : '' }}">
                {!! Form::label('kabupaten', "Kabupaten") !!}
				{!! Form::text('kabupaten',old('kabupaten'), ['class'=>'form-control','id'=>'kabupaten']) !!}
				@if ($errors->has('kabupaten'))
				  <span class="help-block">
				      <strong>{{ $errors->first('kabupaten') }}</strong>
				  </span>
				@endif
            </div>

            <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                {!! Form::label('city', "City") !!}
				{!! Form::text('city',old('city'), ['class'=>'form-control','id'=>'city']) !!}
				@if ($errors->has('city'))
				  <span class="help-block">
				      <strong>{{ $errors->first('city') }}</strong>
				  </span>
				@endif
            </div>

            <div class="form-group{{ $errors->has('province') ? ' has-error' : '' }}">
                {!! Form::label('province', "Province") !!}
				{!! Form::text('province',old('province'), ['class'=>'form-control','id'=>'province']) !!}
				@if ($errors->has('province'))
				  <span class="help-block">
				      <strong>{{ $errors->first('province') }}</strong>
				  </span>
				@endif
            </div>

            <div class="form-group{{ $errors->has('kk_number') ? ' has-error' : '' }}">
                {!! Form::label('kk_number', "KK No.") !!}
				{!! Form::text('kk_number',old('kk_number'), ['class'=>'form-control','id'=>'kk_number']) !!}
				@if ($errors->has('kk_number'))
				  <span class="help-block">
				      <strong>{{ $errors->first('kk_number') }}</strong>
				  </span>
				@endif
            </div>
		</div>
	</div>
</div>
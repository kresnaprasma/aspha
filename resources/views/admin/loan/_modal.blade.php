{{-- Create Modal --}}
<div class="modal fade" id="createCustomerModal" tabindex="-1" role="dialog" aria-labelledby="Create Customer">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="CreateColor">Create Customer</h4>
			</div>
			<div class="modal-body col-md-12">
				{!! Form::open(['route'=>'admin.customer.store']) !!}
				<div class="col-md-6">
					<div class="form-group">
						{!! Form::label('branch_id', "Branch") !!}
						{!! Form::select('branch_id', $branch_list, old('branch_id'), ['class'=>'form-control','id'=>'branch_id']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('customer_no', 'Customer No:') !!}
						{!! Form::text('customer_no', null, ['class'=>'form-control', 'readonly'=>'true', 'placeholder' => empty($customer_id) ? 'default value' : $customer_id, 'required' ]) !!}
						{{-- {{ Form::text('customer_no', old('customer_no'), ['class'=>'form-control', 'id'=>'customer_no', 'readonly'=>'true']) }} --}}
					</div>
					<div class="checkbox">
		            	<label>
		            		{!! Form::checkbox('active',1) !!} <b>active</b>
		            	</label>
		            </div>
		            <div class="form-group">
		            	{!! Form::label('name', "Name") !!}
						{!! Form::text('name', old('name'), ['class'=>'form-control','id'=>'name','autofocus']) !!}
		            </div>
		            <div class="form-group">
		            	{!! Form::label('address', "Address") !!}
						{!! Form::textarea('address', old('address'), ['class'=>'form-control','id'=>'address']) !!}
		            </div>
		            <div class="form-group">
		            	{!! Form::label('email', "Email") !!}
						{!! Form::text('email', old('email'), ['class'=>'form-control','id'=>'email']) !!}
		            </div>
		            <div class="form-group">
		            	{!! Form::label('phone', "Phone") !!}
						{!! Form::text('phone', old('phone'), ['class'=>'form-control','id'=>'phone']) !!}
		            </div>
		            <div class="form-group">
		            	{!! Form::label('birthdate', "Birthdate") !!}
						{!! Form::date('birthdate', old('birthdate'), ['class'=>'form-control','id'=>'birthdate']) !!}
		            </div>
		            <div class="form-group">
		            	{!! Form::label('birthplace', "Birthplace") !!}
						{!! Form::text('birthplace', old('birthplace'), ['class'=>'form-control','id'=>'birthplace']) !!}
		            </div>
		            <div class="form-group">
		            	{!! Form::label('identity_number', "KTP") !!}
						{!! Form::text('identity_number', old('identity_number'), ['class'=>'form-control','id'=>'identity_number']) !!}
		            </div>
				</div>
				<div class="col-md-6">
		            <div class="form-group">
		            	{!! Form::label('gender', "Gender") !!}
						{!! Form::select('gender', ['Male'=>'Male','Female'=>'Female'],old('gender'), ['class'=>'form-control','id'=>'gender']) !!}
		            </div>
		            <div class="form-group">
		            	{!! Form::label('rt', "RT") !!}
						{!! Form::text('rt',old('rt'), ['class'=>'form-control','id'=>'rt']) !!}
		            </div>
		            <div class="form-group">
		            	{!! Form::label('rw', "RW") !!}
						{!! Form::text('rw',old('rt'), ['class'=>'form-control','id'=>'rw']) !!}
		            </div>
		            <div class="form-group">
		            	{!! Form::label('postalcode', "Postalcode") !!}
						{!! Form::text('postalcode',old('postalcode'), ['class'=>'form-control','id'=>'postalcode']) !!}
		            </div>
		            <div class="form-group">
		            	{!! Form::label('kelurahan', "Kelurahan") !!}
						{!! Form::text('kelurahan',old('kelurahan'), ['class'=>'form-control','id'=>'kelurahan']) !!}
		            </div>
		            <div class="form-group">
		            	{!! Form::label('kecamatan', "Kecamatan") !!}
						{!! Form::text('kecamatan',old('kecamatan'), ['class'=>'form-control','id'=>'kecamatan']) !!}
		            </div>
		            <div class="form-group">
		            	{!! Form::label('kabupaten', "Kabupaten") !!}
						{!! Form::text('kabupaten',old('kabupaten'), ['class'=>'form-control','id'=>'kabupaten']) !!}
		            </div>
		            <div class="form-group">
		            	{!! Form::label('city', "City") !!}
						{!! Form::text('city',old('city'), ['class'=>'form-control','id'=>'city']) !!}
		            </div>
		            <div class="form-group">
		            	{!! Form::label('province', "Province") !!}
						{!! Form::text('province',old('province'), ['class'=>'form-control','id'=>'province']) !!}
		            </div>
		            <div class="form-group">
		            	{!! Form::label('kk_number', "KK No.") !!}
						{!! Form::text('kk_number',old('kk_number'), ['class'=>'form-control','id'=>'kk_number']) !!}
		            </div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-success" id="addcustomerloan">
					<i class="fa fa-plus-circle"></i> Yes 
				</button>
			</div>
		</div>
	</div>	
</div>
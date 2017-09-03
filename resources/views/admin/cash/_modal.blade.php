{{-- Create Modal Customer --}}
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
				{!! Form::open(['id'=>'createCustomerForm']) !!}
				<div class="col-md-6">
					<div class="form-group">
						{!! Form::label('branch_id', "Branch") !!}
						{!! Form::select('branch_id', $branch_list, old('branch_id'), ['class'=>'form-control','id'=>'branch_id']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('customer_no', 'Customer No:') !!}
						{!! Form::text('customer_no', $customer_id, ['class'=>'form-control', 'readonly'=>'true']) !!}
					</div>
					<div class="checkbox">
		            	<label>
		            		{!! Form::checkbox('active',1) !!} <b>active</b>
		            	</label>
		            </div>
		            <div class="form-group">
		            	{!! Form::label('name', "Name") !!}
						{!! Form::text('name', old('name'), ['class'=>'form-control','id'=>'name_modal','autofocus']) !!}
		            </div>
		            <div class="form-group">
		            	{!! Form::label('address', "Address") !!}
						{!! Form::textarea('address', old('address'), ['class'=>'form-control','id'=>'address_modal']) !!}
		            </div>
		            <div class="form-group">
		            	{!! Form::label('email', "Email") !!}
						{!! Form::text('email', old('email'), ['class'=>'form-control','id'=>'email_modal']) !!}
		            </div>
		            <div class="form-group">
		            	{!! Form::label('phone', "Phone") !!}
						{!! Form::text('phone', old('phone'), ['class'=>'form-control','id'=>'phone_modal']) !!}
		            </div>
		            <div class="form-group">
		            	{!! Form::label('birthdate', "Birthdate") !!}
						{!! Form::date('birthdate', old('birthdate'), ['class'=>'form-control','id'=>'birthdate_modal']) !!}
		            </div>
		            <div class="form-group">
		            	{!! Form::label('birthplace', "Birthplace") !!}
						{!! Form::text('birthplace', old('birthplace'), ['class'=>'form-control','id'=>'birthplace_modal']) !!}
		            </div>
		            <div class="form-group">
		            	{!! Form::label('identity_number', "KTP") !!}
						{!! Form::text('identity_number', old('identity_number'), ['class'=>'form-control','id'=>'identity_number_modal']) !!}
		            </div>
				</div>
				<div class="col-md-6">
		            <div class="form-group">
		            	{!! Form::label('gender', "Gender") !!}
						{!! Form::select('gender', ['Male'=>'Male','Female'=>'Female'],old('gender'), ['class'=>'form-control','id'=>'gender_modal']) !!}
		            </div>
		            <div class="form-group">
		            	{!! Form::label('rt', "RT") !!}
						{!! Form::text('rt',old('rt'), ['class'=>'form-control','id'=>'rt_modal']) !!}
		            </div>
		            <div class="form-group">
		            	{!! Form::label('rw', "RW") !!}
						{!! Form::text('rw',old('rt'), ['class'=>'form-control','id'=>'rw_modal']) !!}
		            </div>
		            <div class="form-group">
		            	{!! Form::label('postalcode', "Postalcode") !!}
						{!! Form::text('postalcode',old('postalcode'), ['class'=>'form-control','id'=>'postalcode_modal']) !!}
		            </div>
		            <div class="form-group">
		            	{!! Form::label('kelurahan', "Kelurahan") !!}
						{!! Form::text('kelurahan',old('kelurahan'), ['class'=>'form-control','id'=>'kelurahan_modal']) !!}
		            </div>
		            <div class="form-group">
		            	{!! Form::label('kecamatan', "Kecamatan") !!}
						{!! Form::text('kecamatan',old('kecamatan'), ['class'=>'form-control','id'=>'kecamatan_modal']) !!}
		            </div>
		            <div class="form-group">
		            	{!! Form::label('kabupaten', "Kabupaten") !!}
						{!! Form::text('kabupaten',old('kabupaten'), ['class'=>'form-control','id'=>'kabupaten_modal']) !!}
		            </div>
		            <div class="form-group">
		            	{!! Form::label('city', "City") !!}
						{!! Form::text('city',old('city'), ['class'=>'form-control','id'=>'city_modal']) !!}
		            </div>
		            <div class="form-group">
		            	{!! Form::label('province', "Province") !!}
						{!! Form::text('province',old('province'), ['class'=>'form-control','id'=>'province_modal']) !!}
		            </div>
		            <div class="form-group">
		            	{!! Form::label('kk_number', "KK No.") !!}
						{!! Form::text('kk_number',old('kk_number'), ['class'=>'form-control','id'=>'kk_number_modal']) !!}
		            </div>
				</div>
			</div>
			{!! Form::close() !!}
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-success" id="addcustomerloan">
					<i class="fa fa-plus-circle"></i> Yes 
				</button>
			</div>
		</div>
	</div>	
</div>

{{-- Delete Modal Cash--}}
<div class="modal fade" id="deleteCashModal" tabindex="-1" role="dialog" aira-labelledby="DeleteCash">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismis="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="CreateCash">Please Confirm</h4>
			</div>
			<div class="modal-body">
				<p class="modal-body">
					<i class="fa fa-question-circle fa-lg"></i>
					Are you sure you want to delete this Dana Tunai?
				</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-danger" onclick=DeleteCash()><i class="fa fa-times-circle"></i> Yes
			</div>
		</div>
	</div>
</div>
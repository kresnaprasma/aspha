{{-- Edit Modal --}}
	<div class="modal fade" id="editClientModal" tabindex="-1" role="dialog" aria-labelledby="EditBranch">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="EditClient">Edit Client</h4>
				</div>
				<div class="modal-body">
					{!! Form::open(['id'=>'editClient', 'method'=>"PATCH"]) !!}
					<div class="form-group">
						{!! Form::label('name', 'Name :') !!}
						{!! Form::text('name', null, ['class'=>'form-control', 'id'=>'clientname']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('no_ktp', 'No KTP :') !!}
						{!! Form::text('no_ktp', null, ['class'=>'form-control', 'id'=>'clientktp']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('address', 'Alamat :') !!}
						{!! Form::text('address', null, ['class'=>'form-control', 'id'=>'clientaddress']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('post_code', 'Kode Pos :') !!}
						{!! Form::text('post_code', null, ['class'=>'form-control', 'id'=>'post_code']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('birth_date', 'Tanggal Lahir :') !!}
						{!! Form::date('birth_date', null, ['class'=>'form-control', 'id'=>'birth_date']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('handphone', 'No Telp :') !!}
						{!! Form::text('handphone', null, ['class'=>'form-control', 'id'=>'handphone']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('email', 'Email :') !!}
						{!! Form::email('email', null, ['class'=>'form-control', 'id'=>'email']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('password', 'Password :') !!}
						{!! Form::password('password', null, ['class'=>'form-control', 'id'=>'password']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('confirmation_password', 'Confirmation Password :') !!}
						{!! Form::password('condirmation_password', null, ['class'=>'form-control', 'id'=>'confirmation_password']) !!}
					</div>
					{!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>

	{{-- Delete Modal --}}
	<div class="modal fade" id="deleteClientModal" tabindex="-1" role="dialog" aria-labelledby="DeleteClient">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="CreateClient">Please Confirm</h4>
				</div>
				<div class="modal-body">
					<p class="lead">
						<i class="fa fa-question-circle fa-lg"></i>
						Are you sure you want to delete this Client?
					</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-danger" onclick=DeleteClient()><i class="fa fa-times-circle"></i> Yes
				</div>
			</div>
		</div>
	</div>
{{-- Create Modal --}}
<div class="modal fade" id="createRoleModal" tabindex="-1" role="dialog" aria-labelledby="Create Bank">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="CreateColor">Create Role</h4>
			</div>
			<div class="modal-body">
				{!! Form::open(['route'=> 'admin.master.role.store']) !!}
					<div class="form-group">
						{!! Form::label('name', 'Name') !!}
						{!! Form::text('name', null,['class'=>'form-control']) !!}
					</div>
					{!! Form::submit('Save' , ['class' =>'btn btn-red']) !!}
				{!! Form::close() !!}
			</div>
			<div class="modal-footer"></div>
		</div>
	</div>
</div>

{{-- Edit Modal --}}
<div class="modal fade" id="editRoleModal" tabindex="-1" role="dialog" aria-labelledby="Edit Bank">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="EditType">Edit Role</h4>
			</div>
			<div class="modal-body">
				{!! Form::open(['url'=> '/admin/master/role/','method'=>"PATCH",'id'=>'editRoleForm']) !!}
					<div class="form-group">
						{!! Form::label('name', 'Name') !!}
						{!! Form::text('name', null,['class'=>'form-control','id'=>'nameRole']) !!}
					</div>
					{!! Form::submit('Update' , ['class' =>'btn btn-red']) !!}
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

{{-- Delete Modal --}}
<div class="modal fade" id="deleteRoleModal" tabindex="-1" role="dialog" aria-labelledby="Delete Bank">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="CreateMerk">Please Confirm</h4>
			</div>
			<div class="modal-body">
				<p class="lead">
            	<i class="fa fa-question-circle fa-lg"></i>  
            		Are you sure you want to delete this Role?
          		</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            	<button type="submit" class="btn btn-danger" onclick="DeleteRole()">
            		<i class="fa fa-times-circle"></i> Yes
            	</button>
			</div>
		</div>
	</div>
</div>
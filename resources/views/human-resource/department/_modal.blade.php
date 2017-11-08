{{-- Create Modal --}}
<div class="modal fade" id="createDepartmentModal" tabindex="-1" role="dialog" aria-labelledby="Create Bank">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="CreateColor">Create Department</h4>
			</div>
			<div class="modal-body">
				{!! Form::open(['route'=> 'human-resource.department.store']) !!}
					<div class="form-group">
						{!! Form::label('department_no', 'No') !!}
						{!! Form::text('department_no', null,['class'=>'form-control']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('name', 'Name') !!}
						{!! Form::text('name', null, ['class'=>'form-control']) !!}
					</div>
					{!! Form::submit('save' , ['class' =>'btn btn-red']) !!}
				{!! Form::close() !!}
			</div>
			<div class="modal-footer"></div>
		</div>
	</div>
</div>

{{-- Edit Modal --}}
<div class="modal fade" id="editDepartmentModal" tabindex="-1" role="dialog" aria-labelledby="Edit Department">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="EditType">Edit Department</h4>
			</div>
			<div class="modal-body">
				{!! Form::open(['url'=> '/admin/human-resource/department/','method'=>"PATCH",'id'=>'editDepartmentForm']) !!}
					<div class="form-group">
						{!! Form::label('department_no', 'No.') !!}
						{!! Form::text('department_no', null,['class'=>'form-control','id'=>'noDepartmentEdit']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('name', 'Name') !!}
						{!! Form::text('name', null, ['class'=>'form-control','id'=>'nameDepartmentEdit']) !!}
					</div>
					{!! Form::submit('Update' , ['class' =>'btn btn-red']) !!}
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

{{-- Delete Modal --}}
<div class="modal fade" id="deleteDepartmentModal" tabindex="-1" role="dialog" aria-labelledby="Delete Bank">
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
            		Are you sure you want to delete this Bank?
          		</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            	<button type="submit" class="btn btn-danger" onclick="DeleteDepartment()">
            		<i class="fa fa-times-circle"></i> Yes
            	</button>
			</div>
		</div>
	</div>
</div>
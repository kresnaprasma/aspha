{{-- Create Modal --}}
	<div class="modal fade" id="createChecklistModal" tabindex="-1" role="dialog" aria-labelledby="Create Department">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="CreateColor">Create Checklist</h4>
				</div>
				<div class="modal-body">
					{!! Form::open(['route'=>'admin.master.checklist.store']) !!}
						<div class="form-group">
							{!! Form::label('name', 'Name:') !!}
							{!! Form::text('name',null,['class'=>'form-control']) !!}
						</div>
						{!! Form::submit('save' , ['class' =>'btn btn-primary']) !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>

	{{-- Edit Modal --}}
	<div class="modal fade" id="editChecklistModal" tabindex="-1" role="dialog" aria-labelledby="EditBranch">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="EditType">Edit Checklist</h4>
				</div>
				<div class="modal-body">
					{!! Form::open(['id'=>'editChecklist', 'method'=>"PATCH"]) !!}
						<div class="form-group">
							{!! Form::label('id', 'Id:') !!}
							{!! Form::text('id', null,['class'=> 'form-control', 'id'=>'idChecklist']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('name', 'Name:') !!}
							{!! Form::text('name',null,['class'=>'form-control', 'id'=>'nameChecklist']) !!}
						</div>
						{!! Form::submit('Update' , ['class' =>'btn btn-primary']) !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>

	{{-- Delete Modal --}}
	<div class="modal fade" id="deleteChecklistModal" tabindex="-1" role="dialog" aria-labelledby="Delete Type">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</spapdate Checklistn>
					</button>
					<h4 class="modal-title" id="CreateChecklist">Please Confirm</h4>
				</div>
				<div class="modal-body">
					<p class="lead">
	            	<i class="fa fa-question-circle fa-lg"></i>  
	            		Are you sure you want to delete this Checklist?
	          		</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	            	<button type="submit" class="btn btn-danger" onclick=DeleteChecklist()><i class="fa fa-times-circle"></i> Yes
				</div>
			</div>
		</div>
	</div>
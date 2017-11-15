{{-- Create Modal --}}
	<div class="modal fade" id="createCreditTypeModal" tabindex="-1" role="dialog" aria-labelledby="Create Department">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="CreateColor">Create Credit Type</h4>
				</div>
				<div class="modal-body">
					{!! Form::open(['route'=>'master.credittype.store']) !!}
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
	<div class="modal fade" id="editCreditTypeModal" tabindex="-1" role="dialog" aria-labelledby="EditBranch">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="EditType">Edit Credit Type</h4>
				</div>
				<div class="modal-body">
					{!! Form::open(['id'=>'editCreditType', 'method'=>"PATCH"]) !!}
						<div class="form-group">
							{!! Form::label('name', 'Name:') !!}
							{!! Form::text('name',null,['class'=>'form-control', 'id'=>'nameCreditType']) !!}
						</div>
						{!! Form::submit('Update' , ['class' =>'btn btn-primary']) !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>

	{{-- Delete Modal --}}
	<div class="modal fade" id="deleteCreditTypeModal" tabindex="-1" role="dialog" aria-labelledby="Delete Type">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</spapdate Merkn>
					</button>
					<h4 class="modal-title" id="CreateMerk">Please Confirm</h4>
				</div>
				<div class="modal-body">
					<p class="lead">
	            	<i class="fa fa-question-circle fa-lg"></i>  
	            		Are you sure you want to delete this Credit Type?
	          		</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	            	<button type="submit" class="btn btn-danger" onclick=DeleteCreditType()><i class="fa fa-times-circle"></i> Yes
				</div>
			</div>
		</div>
	</div>
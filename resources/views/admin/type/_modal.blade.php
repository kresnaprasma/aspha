{{-- Create Modal --}}
	<div class="modal fade" id="createTypeModal" tabindex="-1" role="dialog" aria-labelledby="Create Department">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="CreateColor">Create Type</h4>
				</div>
				<div class="modal-body">
					{!! Form::open(['route'=>'admin.type.store']) !!}
						<div class="form-group">
							{!! Form::label('id', 'Code Type:') !!}
							{!! Form::text('id', null, ['class'=>'form-control']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('name', 'Name:') !!}
							{!! Form::text('name',null,['class'=>'form-control']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('merk_id', 'Merk:') !!}
							{!! Form::select('merk_id', $merks, null, ['class'=>'form-control m-bot15']) !!}
						</div>
					{!! Form::submit('save' , ['class' =>'btn btn-primary']) !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>

	{{-- Edit Modal --}}
	<div class="modal fade" id="editTypeModal" tabindex="-1" role="dialog" aria-labelledby="EditBranch">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="EditType">Edit Type</h4>
				</div>
				<div class="modal-body">
					{!! Form::open(['id'=>'editType', 'method'=>"PATCH"]) !!}
						<div class="form-group">
							{!! Form::label('id', 'Code Type:') !!}
							{!! Form::text('id', null,['class'=> 'form-control', 'id'=>'codeType']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('name', 'Name:') !!}
							{!! Form::text('name',null,['class'=>'form-control', 'id'=>'nameType']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('merk_id', 'Merk:') !!}
							{!! Form::select('merk_id', $merks, null, ['class'=>'form-control m-bot15', 'id'=>'merkType']) !!}
						</div>
						{!! Form::submit('Update' , ['class' =>'btn btn-primary']) !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>

	{{-- Delete Modal --}}
	<div class="modal fade" id="deleteTypeModal" tabindex="-1" role="dialog" aria-labelledby="Delete Type">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</spapdate Merkn>
					</button>
					<h4 class="modal-title" id="CreateType">Please Confirm</h4>
				</div>
				<div class="modal-body">
					<p class="lead">
	            	<i class="fa fa-question-circle fa-lg"></i>  
	            		Are you sure you want to delete this Merk?
	          		</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	            	<button type="submit" class="btn btn-danger" onclick=DeleteType()><i class="fa fa-times-circle"></i> Yes
				</div>
			</div>
		</div>
	</div>
{{-- Create Modal --}}
<div class="modal fade" id="createBranchModal" tabindex="-1" role="dialog" aria-labelledby="Create Bank">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="CreateColor">Create Branch</h4>
			</div>
			<div class="modal-body">
				{!! Form::open(['route'=> 'master.branch.store']) !!}
					<div class="form-group">
						{!! Form::label('name', 'Name') !!}
						{!! Form::text('name', null,['class'=>'form-control']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('email', 'Email') !!}
						{!! Form::text('email', null, ['class'=>'form-control']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('address', 'Address') !!}
						{!! Form::textarea('address', null, ['class'=>'form-control']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('phone', 'Phone') !!}
						{!! Form::text('phone', null, ['class'=>'form-control']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('fax', 'Fax') !!}
						{!! Form::text('fax', null, ['class'=>'form-control']) !!}
					</div>
					{!! Form::submit('save' , ['class' =>'btn btn-red']) !!}
				{!! Form::close() !!}
			</div>
			<div class="modal-footer"></div>
		</div>
	</div>
</div>

{{-- Edit Modal --}}
<div class="modal fade" id="editBranchModal" tabindex="-1" role="dialog" aria-labelledby="Edit Bank">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="EditType">Edit Branch</h4>
			</div>
			<div class="modal-body">
				{!! Form::open(['url'=> '/master/branch/','method'=>"PATCH",'id'=>'editBranchForm']) !!}
					<div class="form-group">
						{!! Form::label('name', 'Name') !!}
						{!! Form::text('name', null,['class'=>'form-control', 'id'=>'nameBranch']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('email', 'Email') !!}
						{!! Form::text('email', null, ['class'=>'form-control','id'=>'emailBranch']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('address', 'Address') !!}
						{!! Form::textarea('address', null, ['class'=>'form-control','id'=>'addressBranch']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('phone', 'Phone') !!}
						{!! Form::text('phone', null, ['class'=>'form-control','id'=>'phoneBranch']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('fax', 'Fax') !!}
						{!! Form::text('fax', null, ['class'=>'form-control','id'=>'faxBranch']) !!}
					</div>
					{!! Form::submit('Update' , ['class' =>'btn btn-red']) !!}
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

{{-- Delete Modal --}}
<div class="modal fade" id="deleteBranchModal" tabindex="-1" role="dialog" aria-labelledby="Delete Bank">
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
            		Are you sure you want to delete this Branch?
          		</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            	<button type="submit" class="btn btn-danger" onclick="DeleteBranch()">
            		<i class="fa fa-times-circle"></i> Yes
            	</button>
			</div>
		</div>
	</div>
</div>
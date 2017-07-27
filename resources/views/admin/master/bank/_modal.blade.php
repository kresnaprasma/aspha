{{-- Create Modal --}}
<div class="modal fade" id="createBankModal" tabindex="-1" role="dialog" aria-labelledby="Create Bank">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="CreateColor">Create Bank</h4>
			</div>
			<div class="modal-body">
				{!! Form::open(['route'=> 'admin.master.bank.store']) !!}
					<div class="form-group">
						{!! Form::label('name', 'Name') !!}
						{!! Form::text('name', null,['class'=>'form-control']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('alias', 'Alias') !!}
						{!! Form::text('alias', null, ['class'=>'form-control']) !!}
					</div>
					{!! Form::submit('save' , ['class' =>'btn btn-red']) !!}
				{!! Form::close() !!}
			</div>
			<div class="modal-footer"></div>
		</div>
	</div>
</div>

{{-- Edit Modal --}}
<div class="modal fade" id="editBankModal" tabindex="-1" role="dialog" aria-labelledby="Edit Bank">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="EditType">Edit Bank</h4>
			</div>
			<div class="modal-body">
				{!! Form::open(['url'=> '/admin/master/bank/','method'=>"PATCH",'id'=>'editBankForm']) !!}
					<div class="form-group">
						{!! Form::label('name', 'Name') !!}
						{!! Form::text('name', null,['class'=>'form-control','id'=>'nameBank']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('alias', 'Alias') !!}
						{!! Form::text('alias', null, ['class'=>'form-control','id'=>'aliasBank']) !!}
					</div>
					{!! Form::submit('Update' , ['class' =>'btn btn-red']) !!}
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

{{-- Delete Modal --}}
<div class="modal fade" id="deleteBankModal" tabindex="-1" role="dialog" aria-labelledby="Delete Bank">
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
            	<button type="submit" class="btn btn-danger" onclick="DeleteBank()">
            		<i class="fa fa-times-circle"></i> Yes
            	</button>
			</div>
		</div>
	</div>
</div>
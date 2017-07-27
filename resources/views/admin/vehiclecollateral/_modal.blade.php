	


	{{-- Edit Modal --}}
	<div class="modal fade" id="editCollateralModal" tabindex="-1" role="dialog" aria-labelledby="EditBranch">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="EditCollateral">Edit Collateral</h4>
				</div>
				<div class="modal-body">
					{!! Form::open(['id'=>'editCollateral', 'method'=>"PATCH"]) !!}
					<div class="form-group">
						{!! Form::label('merk_id', 'Merk:') !!}
						<select name="merk_id" id="merkCollateral" class="form-control" style="width: 375px">
							@foreach ($merkall as $key => $value)
								<option value="{{ $key }}">{{ $value }}</option>
							@endforeach
						</select>
					</div> 
					<div class="form-group">
						{!! Form::label('type_id', 'Type:') !!}
						<select name="type_id" id="typeCollateral" class="form-control" style="width: 375px">
						</select>
					</div>
					<div class="form-group">
						{!! Form::label('vehicle_date', 'Vehicle Date:') !!}
						{!! Form::date('vehicle_date', null, ['class'=>'form-control', 'id' => 'dateCollateral']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('vehicle_price', 'Vehicle Price:') !!}
						{!! Form::text('vehicle_price', null, ['class'=>'form-control', 'id' => 'priceCollateral']) !!}
					</div>
					{!! Form::submit('Update', ['class'=>'btn btn-primary']) !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>

	{{-- Delete Modal --}}
	<div class="modal fade" id="deleteCollateralModal" tabindex="-1" role="dialog" aria-labelledby="Delete Collateral">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</spapdate Merkn>
					</button>
					<h4 class="modal-title" id="CreateCollateral">Please Confirm</h4>
				</div>
				<div class="modal-body">
					<p class="modal-body">
					<i class="fa fa-question-circle fa-lg"></i>
					Are you sure you want to delete this Collateral?
					</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-danger" onclick=DeleteCollateral()><i class="fa fa-times-circle"></i> Yes
				</div>
			</div>
		</div>
	</div>
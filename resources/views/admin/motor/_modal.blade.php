{{-- Edit Modal --}}
	<div class="modal fade" id="editMotorModal" tabindex="-1" role="dialog" aria-labelledby="EditBranch">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="EditMotor">Edit Motor</h4>
				</div>
				<div class="modal-body">
					{!! Form::open(['id'=>'editMotor', 'method'=>"PATCH"]) !!}
					<div class="form-group">
						{!! Form::label('Merk', 'Merk :') !!}
						<select name="merk" id="merkMotor" class="form-control" style="width: 270px">
							<option value="">--- Pilih Merk ---</option>
							@foreach ($merkall as $key => $value)
								<option value="{{ $key }}">{{ $value }}</option>
							@endforeach
						</select>
					</div>	
					<div class="form-group">
						{!! Form::label('type', 'Type :') !!}
						<select name="type" id="typeMotor" class="form-control" style="width: 270px" placeholder="Pilih Type"></select>
					</div>
					<div class="form-group">
						{!! Form::label('post_name', 'Nama Barang :') !!}
						{!! Form::text('post_name', null, ['class'=>'form-control', 'id'=>'postMotor']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('post_price', 'Harga :') !!}
						{!! Form::text('post_price', null, ['class'=>'form-control', 'id'=>'priceMotor']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('fitur', 'Fitur : ') !!}
						{!! Form::text('fitur', null, ['class'=>'form-control', 'id'=>'fiturMotor']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('stnk_address', 'Alamat STNK :') !!}
						{!! Form::text('stnk_address', null, ['class'=>'form-control', 'id'=>'stnkMotor']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('condition', 'Kondisi :') !!}
						<select name="condition" id="conditionMotor" class="form-control" style="width: 270px" >
							<option value="BEKAS">BEKAS</option>
							<option value="BARU">BARU</option>
						</select>
				    </div>
					{!! Form::submit('Update', ['class' =>'btn btn-primary']) !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>

	{{-- Delete Modal --}}
	<div class="modal fade" id="deleteMotorModal" tabindex="-1" role="dialog" aria-labelledby="Delete Motor">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</spapdate Merkn>
					</button>
					<h4 class="modal-title" id="CreateMotor">Please Confirm</h4>
				</div>
				<div class="modal-body">
					<p class="modal-body">
					<i class="fa fa-question-circle fa-lg"></i>
					Are you sure you want to delete this Data?
					</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-danger" onclick=DeleteMotor()><i class="fa fa-times-circle"></i> Yes
				</div>
			</div>
		</div>
	</div>
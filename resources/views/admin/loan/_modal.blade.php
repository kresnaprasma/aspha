{{-- Edit Modal --}}
	<div class="modal fade" id="editLoanModal" tabindex="-1" role="dialog" aria-labelledby="EditBranch">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="EditLoan">Edit Loan</h4>
				</div>
				<div class="modal-body">
					{!! Form::open(['id'=>'editLoan', 'method'=>"PATCH"]) !!}
					<div class="form-group">
						{!! Form::label('vehicle_color', 'Vehicle Color:') !!}
						<select class="select form-control" name="vehicle_color" id="colorLoan" style="width: 270px">
							<option value="merah">Merah</option>
							<option value="kuning">Kuning</option>
							<option value="biru">Biru</option>
							<option value="hijau">Hijau</option>
							<option value="putih">Putih</option>
							<option value="hitam">Hitam</option>
							<option value="orange">Orange</option>
							<option value="Cokelat">Cokelat</option>
							<option value="Abu-abu">Abu-abu</option>
							<option value="Silver">Silver</option>
							<option value="Ungu">Ungu</option>
						</select>
					</div>
					<div class="form-group">
						{!! Form::label('vehicle_cc', 'Vehicle CC:') !!}
						{{-- {!! Form::text('vehicle_cc', null, ['class'=>'form-control', 'id'=>'ccLoan']) !!} --}}
						<select class="select form-control" name="vehicle_cc" id="ccLoan" style="width: 270px">
							<option value="100">100</option>
							<option value="110">110</option>
							<option value="125">125</option>
							<option value="135">135</option>
							<option value="150">150</option>
							<option value="155">155</option>
							<option value="225">225</option>
							<option value="250">250</option>	
						</select>
					</div>
					<div class="form-group">
						{!! Form::label('bpkb', 'No BPKB :') !!}
						{!! Form::text('bpkb', null, ['class'=> 'form-control', 'id'=>'bpkbLoan']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('chassis_number', 'No Rangka :') !!}
						{!! Form::text('chassis_number', null, ['class'=> 'form-control', 'id'=>'chassisLoan']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('machine_number', 'No Mesin :') !!}
						{!! Form::text('machine_number', null, ['class'=> 'form-control', 'id'=>'machineLoan']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('vehicle_date', 'Vehicle Date:') !!}
						{!! Form::date('vehicle_date', null, ['class'=>'form-control', 'id'=>'dateLoan']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('stnk_due_date', 'Stnk Due Date:') !!}
						{!! Form::date('stnk_due_date', null, ['class'=>'form-control', 'id' =>'stnkLoan']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('tenor', 'Tenor:') !!}
						<select class="select form-control" name="tenor" id="tenorLoan" style="width: 270px">
							<option value="12 bulan">12 bulan</option>
							<option value="18 bulan">18 bulan</option>
							<option value="24 bulan">24 bulan</option>
							<option value="30 bulan">30 bulan</option>
							<option value="36 bulan">36 bulan</option>
						</select>
					</div>
					<div class="form-group">
						{!! Form::label('price_request', 'Price Request:') !!}
						{!! Form::text('price_request', null, ['class'=>'form-control', 'id'=>'requestLoan']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('approval', 'Approval:') !!}
						<select class="select form-control" name="approval" id="approvalLoan" style="width: 270px">
							<option value="YES">YES</option>
							<option value="NO">NO</option>
						</select>
					</div>
					{!! Form::submit('Update', ['class'=>'btn btn-primary']) !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>

	{{-- Delete Modal --}}
	<div class="modal fade" id="deleteLoanModal" tabindex="-1" role="dialog" aria-labelledby="Delete Loan">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</spapdate Merkn>
					</button>
					<h4 class="modal-title" id="CreateLoan">Please Confirm</h4>
				</div>
				<div class="modal-body">
					<p class="modal-body">
					<i class="fa fa-question-circle fa-lg"></i>
					Are you sure you want to delete this Loan?
					</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-danger" onclick=DeleteLoan()><i class="fa fa-times-circle"></i> Yes
				</div>
			</div>
		</div>
	</div>
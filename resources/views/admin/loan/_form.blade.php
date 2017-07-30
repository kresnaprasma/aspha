<div class="box box-default">
	<div class="box-header with-border">
	   <h3 class="box-title">
	   		Cash Loan - <b>@if ($edit){{ $loan->loan_no }}@else {{ $loan->Maxno() }}@endif</b>
	   </h3>

	   <div class="box-tools pull-right">
			<a href="/admin/loan/">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
			<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
		</div>

		<div class="box-body">
			<div class="row">
				<div class="col-md-6">
				
					<div class="form-group {{ $errors->has('merk') ? 'has-error' : '' }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
							{!! Form::label('Merk', 'Merk :', ['class' => 'col-md-3 control-label']) !!}
							<select name="merk" id="merk" class="form-control col-md-8" style="width: 370px">	
								<option value="">--- Choose Merk ---</option>
								@foreach ($merkall as $key => $value)
									<option value="{{ $key }}">{{ $value }}</option>
								@endforeach
							</select>
						<span class="text-danger">{{ $errors->first('merk') }}</span>
					</div>

					<div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
						{!! Form::label('type', 'Type :', ['class' => 'col-md-3 control-label']) !!}
						<select name="type" id="type" class="form-control col-md-8" style="width: 370px" placeholder="Pilih Type"></select>
						<span class="text-danger">{{ $errors->first('type') }}</span>
					</div>

					<div class="form-group {{ $errors->has('vehicle_color') ? 'has-error' : '' }}">
						{!! Form::label('vehicle_color', 'Warna :', ['class' => 'col-md-3 control-label']) !!}
						<div class="col-md-4">
							{!! Form::text('vehicle_color', null, ['class'=>'form-control']) !!}
							<span class="text-danger">{{ $errors->first('vehicle_color') }}</span>
						</div>
					</div>
					
					<div class="form-group {{ $errors->has('vehicle_cc') ? 'has-error' : '' }}">
						{!! Form::label('vehicle_cc', 'Kapasitas Mesin (cc): ', ['class' => 'col-md-3 control-label']) !!}
						<div class="col-md-4">
							{!! Form::text('vehicle_cc', null, ['class'=>'form-control']) !!}
							<span class="text-danger">{{ $errors->first('vehicle_cc') }}</span>
						</div>
					</div>
					
					
					
					<div class="form-group {{ $errors->has('stnk_due_date') ? 'has-error' : '' }}">
						{!! Form::label('stnk_due_date', 'Masa Berlaku STNK :', ['class' => 'col-md-3 control-label']) !!}
						<div class="col-md-4">
							{!! Form::date('stnk_due_date', null, ['class'=>'form-control', 'id'=>'stnk_due_date']) !!}
							<span class="text-danger">{{ $errors->first('stnk_due_date') }}</span>
						</div>
					</div>
					
					<div class="form-group {{ $errors->has('tenor') ? 'has-error' : '' }}">
						{!! Form::label('tenor', 'Jangka Waktu Peminjaman :', ['class' => 'col-md-3 control-label']) !!}
						<div class="col-md-4">
							<select class="select form-control" name="tenor" id="tenor" style="width: 370px">
								<option value="">--- Pilih Tenor ---</option>
								<option value="12 bulan">12 bulan</option>
								<option value="18 bulan">18 bulan</option>
								<option value="24 bulan">24 bulan</option>
								<option value="30 bulan">30 bulan</option>
								<option value="36 bulan">36 bulan</option>
							</select>
							<span class="text-danger">{{ $errors->first('tenor') }}</span>
						</div>
					</div>
					
					<div class="form-group {{ $errors->has('price_request') ? 'has-error' : '' }}">
						{!! Form::label('price_request', 'Jumlah Pinjaman :', ['class' => 'col-md-3 control-label']) !!}
						<div class="col-md-4">
							{!! Form::text('price_request', null, ['class'=>'form-control', 'id'=>'price_request']) !!}
						</div>
					</div>
					
					
				</div>

				<div class="col-md-6">
					<div class="form-group {{ $errors->has('vehicle_date') ? 'has-error' : '' }}">
						{!! Form::label('vehicle_date', 'Tahun Pembuatan Kendaraan (bulan & tahun wajib benar): ', ['class' => 'control-label']) !!}
						{!! Form::date('vehicle_date', null, ['class'=>'form-control', 'id'=>'vehicle_date']) !!}
						<span class="text-danger">{{ $errors->first('vehicle_date') }}</span>
					</div>
					
					<div class="form-group {{ $errors->has('bpkb') ? 'has-error' : '' }}">
						{!! Form::label('bpkb', 'No. BPKB: ', ['class' => 'control-label']) !!}
						{!! Form::text('bpkb', null, ['class'=>'form-control col-md-4', 'id'=>'bpkb']) !!}
						<span class="text-danger">{{ $errors->first('bpkb') }}</span>
					</div>
					
					<div class="form-group {{ $errors->first('chassis_number') ? 'has-error' : '' }}">
						{!! Form::label('chassis_number', 'No. Rangka :') !!}
						{!! Form::text('chassis_number', null, ['class'=>'form-control col-md-4', 'id'=>'chassis_number']) !!}
						<span class="text-danger">{{ $errors->first('chassis_number') }}</span>
					</div>

					<div class="form-group {{ $errors->first('machine_number') ? 'has-error' : '' }}">
						{!! Form::label('machine_number', 'No. Mesin :') !!}
						{!! Form::text('machine_number', null, ['class'=>'form-control col-md-4', 'id'=>'machine_number']) !!}
						<span class="text-danger">{{ $errors->first('machine_number') }}</span>
					</div>

					{{-- <div class="form-group{{ $errors->first('customer_id') ? 'has-error' : '' }}">
						{!! Form::label('customer_id', 'Customer :', ['class'=>'col-md-4 control-label']) !!}
						<div class="col-md-8">
							{!! Form::select('customer_id', $customer_list, ['class'=>'form-control', 'id'=>'customer_id']) !!}
							<span class="text-danger">{{ $errors->first('machine_number') }}</span>
						</div>
					</div> --}}
					<div class="form-group{{ $errors->has('branch_id') ? ' has-error' : '' }}">
	                  {!! Form::label('branch_id', "Branch", ['class'=>'col-md-2 control-label']) !!}
	                  <div class="col-md-8">
	                      {!! Form::select('branch_id',$branch_list, old('branch_id'), ['class'=>'form-control','id'=>'branch_id']) !!}
	                      @if ($errors->has('branch_id'))
	                          <span class="help-block">
	                              <strong>{{ $errors->first('branch_id') }}</strong>
	                          </span>
	                      @endif
	                  </div>
	              	</div>

	              	<div class="form-group{{ $errors->has('customer_id') ? ' has-error' : '' }}">
	                  {!! Form::label('customer_id', "Customer", ['class'=>'col-md-2 control-label']) !!}
	                  <div class="col-md-8">
	                      {!! Form::select('customer_id',$customer_list, old('customer_id'), ['class'=>'form-control','id'=>'customer_id']) !!}
	                      @if ($errors->has('customer_id'))
	                          <span class="help-block">
	                              <strong>{{ $errors->first('customer_id') }}</strong>
	                          </span>
	                      @endif
	                  </div>
	              	</div>

	              	<div class="form-group{{ $errors->has('user_approval') ? ' has-error' : '' }}">
		                {!! Form::label('user_approval', "user_approval") !!}
						{!! Form::select('user_approval', ['YES'=>'YES','NO'=>'NO'],old('user_approval'), ['class'=>'form-control','id'=>'user_approval']) !!}
						@if ($errors->has('user_approval'))
						  <span class="help-block">
						      <strong>{{ $errors->first('user_approval') }}</strong>
						  </span>
						@endif
		            </div>
				</div>

				<div class="form-group col-sm-6 col-md-6 col-xs-6">
					{!! Form::submit('save' , ['class' =>'btn btn-primary']) !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
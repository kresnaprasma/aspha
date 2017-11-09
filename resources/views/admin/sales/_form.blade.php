@if($edit)
	<div class="box box-primary">
	    <div class="box-header with-border">
	        <h3 class="box-title">Aspha Mokas Sales
	        </h3>
	        <div class="box-tools pull-right">
	            <button class="btn btn-box-tool" data-widget="collapse" data-toogle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
	        </div>
	    </div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group{{ $errors->has('sales_no') ? ' has-error' : '' }}">
		                {!! Form::label('sales_no', "No. Sales") !!}
		                {!! Form::text('sales_no', old('sales_no'), ['class'=>'form-control','required', 'id'=>'sales_noSales', 'readonly'=>'true']) !!}
		                @if ($errors->has('sales_no'))
		                    <span class="help-block">
		                        <strong>{{ $errors->first('sales_no') }}</strong>
		                    </span>
		                @endif
		            </div>
		            <div class="form-group">
		            	<div class="input-group">
		            		{!! Form::label('mokas_number', 'Id Mokas') !!}
							{!! Form::text('mokas_number', old('mokas_number'), ['class'=>'form-control','required', 'placeholder' => 'Mokas Code', 'id'=>'mokas_noSales', 'readonly'=>'true']) !!}
		            		}
		                </div>
		            </div>
		            <div class="form-group{{ $errors->has('branch_id') ? ' has-error' : '' }}">
						{!! Form::label('branch_id', 'Branch') !!}
						{!! Form::select('branch_id', $branch_list, old('branch_id'), ['class'=>'form-control','id'=>'branch_id', 'placeholder'=>'-- Select Branch --']) !!}
						@if ($errors->has('branch_id'))
						  <span class="help-block">
						      <strong>{{ $errors->first('branch_id') }}</strong>
						  </span>
						@endif
		            </div>
		            <div class="form-group{{ $errors->has('discount') ? ' has-error' : '' }}">
		                {!! Form::label('discount', "Discount") !!}
		                {!! Form::text('discount', old('discount'), ['class'=>'form-control detail-purchasing','required','autofocus','id'=>'discountSales', 'onkeyup'=>'formatNumber(this)', 'onkeypress'=>'formatNumber(this)']) !!}
		                @if ($errors->has('discount'))
		                    <span class="help-block">
		                        <strong>{{ $errors->first('discount') }}</strong>
		                    </span>
		                @endif
		            </div>
		            <div class="form-group{{ $errors->has('selling_price') ? ' has-error' : '' }}">
		                {!! Form::label('selling_price', "Selling Price") !!}
		                {!! Form::text('selling_price', old('selling_price'), ['class'=>'form-control detail-purchasing','required','autofocus','id'=>'selling_priceSales', 'onkeyup'=>'formatNumber(this)', 'onkeypress'=>'formatNumber(this)']) !!}
		                @if ($errors->has('selling_price'))
		                    <span class="help-block">
		                        <strong>{{ $errors->first('selling_price') }}</strong>
		                    </span>
		                @endif
		            </div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
		                <div class="input-group">
		                    {!!Form::select('customer_list', $customer_list, old('customer_list'), ['class'=>'form-control', 'placeholder'=>'Select Customer','id'=>'customer_list', 'onchange'=>'getCustomerList(this.value)']) !!}
		                </div><!-- /input-group -->
		            </div>
		            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	                    {!! Form::label('name', "Name") !!}
	                    {!! Form::text('name', old('name'), ['class'=>'form-control','id'=>'nameSales','autofocus', 'readonly' => 'true']) !!}
	                    @if ($errors->has('name'))
	                        <span class="help-block">
	                            <strong>{{ $errors->first('name') }}</strong>
	                        </span>
	                    @endif
	                </div>
	                <div class="form-group{{ $errors->has('identity_number') ? ' has-error' : '' }}">
	                    {!! Form::label('identity_number', "KTP") !!}
	                    {!! Form::text('identity_number', old('identity_number'), ['class'=>'form-control','id'=>'identity_numberSales', 'readonly' => 'true']) !!}
	                    @if ($errors->has('identity_number'))
	                        <span class="help-block">
	                            <strong>{{ $errors->first('identity_number') }}</strong>
	                        </span>
	                    @endif
	                </div>
	                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
	                    {!! Form::label('address', "Address") !!}
	                    {!! Form::textarea('address', old('address'), ['class'=>'form-control','id'=>'addressSales', 'readonly' => 'true']) !!}
	                    @if ($errors->has('address'))
	                        <span class="help-block">
	                            <strong>{{ $errors->first('address') }}</strong>
	                        </span>
	                    @endif
	                </div>
				</div>
			</div>
		</div>
	</div>

	{{--  payment --}}
	<div class="box box-primary">
	    <div class="box-header with-border">
	        <h3 class="box-title">Cash Payment
	            {!! Form::hidden('sales_no', old('sales_no'), ['class'=>'form-control']) !!}
	        </h3>
	        <div class="box-tools pull-right">
	            <button class="btn btn-box-tool" data-widget="collapse" data-toogle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
	        </div>
	    </div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group{{ $errors->has('cash_method') ? ' has-error' : '' }}">
		                {!! Form::label('cash_method', "Payment Method") !!}
		                {!! Form::select('cash_method', ['Cash'=>'Cash','Credit'=>'Credit'], old('cash_method'), ['class'=>'form-control','required', 'id'=>'cash_methodSales', 'placeholder'=>'-- Select Payment Method --']) !!}
		                @if ($errors->has('cash_method'))
		                    <span class="help-block">
		                        <strong>{{ $errors->first('cash_method') }}</strong>
		                    </span>
		                @endif
		            </div>
		            <div class="form-group{{ $errors->has('leasing_no') ? ' has-error' : '' }}">
		                {!! Form::label('leasing_no', "Leasing") !!}
		                {!! Form::select('leasing_no', $leasing_list, old('leasing_no'), ['class'=>'form-control','required', 'placeholder'=>'-- Select Leasing --', 'id'=>'leasingSales']) !!}
		                @if ($errors->has('leasing_no'))
		                    <span class="help-block">
		                        <strong>{{ $errors->first('leasing_no') }}</strong>
		                    </span>
		                @endif
		            </div>
		            <div class="form-group{{ $errors->has('down_payment') ? ' has-error' : '' }}">
		                {!! Form::label('down_payment', "Down Payment") !!}
		                {!! Form::text('down_payment', null, ['class'=>'form-control detail-purchasing','required','autofocus','id'=>'down_paymentSales', 'onkeyup'=>'formatNumber(this)', 'onkeypress'=>'formatNumber(this)']) !!}
		                @if ($errors->has('down_payment'))
		                    <span class="help-block">
		                        <strong>{{ $errors->first('down_payment') }}</strong>
		                    </span>
		                @endif
		            </div>
		            <div class="form-group{{ $errors->has('tenor') ? ' has-error' : '' }}">
		                {!! Form::label('tenor', "Tenor") !!}
		                {!! Form::select('tenor',  $tenor_requestlist, old('tenor'), ['class'=>'form-control','required', 'placeholder'=>'-- Select Tenor --', 'id'=>'tenorSales']) !!}
		                @if ($errors->has('tenor'))
		                    <span class="help-block">
		                        <strong>{{ $errors->first('tenor') }}</strong>
		                    </span>
		                @endif
		            </div>
				</div>
				<div class="col-md-6">
					<div class="form-group{{ $errors->has('others_cost') ? ' has-error' : '' }}">
		                {!! Form::label('others_cost', "Others Cost") !!}
		                {!! Form::text('others_cost', null, ['class'=>'form-control detail-purchasing','required','autofocus','id'=>'others_cost', 'onkeyup'=>'formatNumber(this)', 'onkeypress'=>'formatNumber(this)']) !!}
		                @if ($errors->has('others_cost'))
		                    <span class="help-block">
		                        <strong>{{ $errors->first('others_cost') }}</strong>
		                    </span>
		                @endif
		            </div>
		            <div class="form-group{{ $errors->has('bank_id') ? ' has-error' : '' }}">
		                {!! Form::label('bank_id', "Bank") !!}
		                {!! Form::select('bank_id', $banks, old('bank'), ['class'=>'form-control','required', 'id'=>'bank', 'placeholder'=> '-- Select Bank --']) !!}
		                @if ($errors->has('bank_id'))
		                    <span class="help-block">
		                        <strong>{{ $errors->first('bank_id') }}</strong>
		                    </span>
		                @endif
		            </div>
		            <div class="form-group{{ $errors->has('rek_number') ? ' has-error' : '' }}">
		                {!! Form::label('rek_number', "Rek. Number") !!}
		                {!! Form::text('rek_number', old('rek_number'), ['class'=>'form-control','required']) !!}
		                @if ($errors->has('rek_number'))
		                    <span class="help-block">
		                        <strong>{{ $errors->first('rek_number') }}</strong>
		                    </span>
		                @endif
		            </div>
		            <div class="form-group{{ $errors->has('payment') ? ' has-error' : '' }}">
		                {!! Form::label('payment', "Payment") !!}
		                {!! Form::text('payment', null, ['class'=>'form-control detail-purchasing','required','autofocus','id'=>'paymentSales', 'onkeyup'=>'formatNumber(this)', 'onkeypress'=>'formatNumber(this)']) !!}
		                @if ($errors->has('payment'))
		                    <span class="help-block">
		                        <strong>{{ $errors->first('payment') }}</strong>
		                    </span>
		                @endif
		            </div>
				</div>
			</div>
		</div>
	</div>

	{{-- Motor Spesification --}}
	<div class="box box-primary">
	    <div class="box-header with-border">
	        <h3 class="box-title">Spesification</b></h3>
	        <div class="box-tools pull-right">
	            <button class="btn btn-box-tool" data-widget="collapse" data-toogle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
	        </div>
	    </div>
	    <div class="box-body">
	        <div class="row">
	            <div class="col-md-4 col-offset-md-1">
	                <div class="form-group{{ $errors->has('stnk') ? ' has-error' : '' }}">
	                    {!! Form::label('stnk', "Stnk No.") !!}
	                    {!! Form::text('stnk', old('stnk'), ['class'=>'form-control','id'=>'stnkSales', 'readonly'=>'true']) !!}
	                    @if ($errors->has('stnk'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('stnk') }}</strong>
	                    </span>
	                    @endif
	                </div>

	                <div class="form-group{{ $errors->has('bpkb') ? ' has-error' : '' }}">
	                    {!! Form::label('bpkb', "Bpkb No.") !!}
	                    {!! Form::text('bpkb', old('bpkb'), ['class'=>'form-control','id'=>'bpkbSales', 'readonly'=>'true']) !!}
	                    @if ($errors->has('bpkb'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('bpkb') }}</strong>
	                    </span>
	                    @endif
	                </div>

	                <div class="form-group{{ $errors->has('machine_number') ? ' has-error' : '' }}">
	                    {!! Form::label('machine_number', "Machine No.") !!}
	                    {!! Form::text('machine_number', old('machine_number'), ['class'=>'form-control','id'=>'machine_numberSales', 'readonly'=>'true']) !!}
	                    @if ($errors->has('machine_number'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('machine_number') }}</strong>
	                    </span>
	                    @endif
	                </div>

	                <div class="form-group{{ $errors->has('chassis_number') ? ' has-error' : '' }}">
	                    {!! Form::label('chassis_number', "Chassis No.") !!}
	                    {!! Form::text('chassis_number', old('chassis_number'), ['class'=>'form-control','id'=>'chassis_numberSales', 'readonly'=>'true']) !!}
	                    @if ($errors->has('chassis_number'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('chassis_number') }}</strong>
	                    </span>
	                    @endif
	                </div>
	            </div>
	            <!-- /.col -->
	            <div class="col-md-4">
	            	<div class="form-group{{ $errors->has('type_id') ? ' has-error' : '' }}">
	                    {!! Form::label('type_id', "Type") !!}
	                    {!! Form::text('type_id', old('type_id'), ['class'=>'form-control','id'=>'type_idSales', 'readonly'=>'true']) !!}
	                    @if ($errors->has('type_id'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('type_id') }}</strong>
	                    </span>
	                    @endif
	                </div>
	                <div class="form-group{{ $errors->has('manufacture_year') ? ' has-error' : '' }}">
	                    {!! Form::label('manufacture_year', "Manufactur Year") !!}
	                    {!! Form::text('manufacture_year', old('manufacture_year'), ['class'=>'form-control','id'=>'manufacture_yearSales', 'readonly' => 'true']) !!}
	                    @if ($errors->has('manufacture_year'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('manufacture_year') }}</strong>
	                    </span>
	                    @endif
	                </div>

	                <div class="form-group{{ $errors->has('stnk_due_date') ? ' has-error' : '' }}">
	                    {!! Form::label('stnk_due_date', "Masa Berlaku STNK") !!}
	                    {!! Form::date('stnk_due_date', old('stnk_due_date'), ['class'=>'form-control','id'=>'stnk_due_dateSales', 'readonly'=>'true']) !!}
	                    @if ($errors->has('stnk_due_date'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('stnk_due_date') }}</strong>
	                    </span>
	                    @endif
	                </div>
	                 <div class="form-group{{ $errors->has('plat') ? ' has-error' : '' }}">
	                    {!! Form::label('plat', "Plat") !!}
	                    {!! Form::text('plat', old('plat'), ['class'=>'form-control','id'=>'platSales', 'readonly'=>'true']) !!}
	                    @if ($errors->has('plat'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('plat') }}</strong>
	                    </span>
	                    @endif
	                </div>            	
	            </div>
	            <div class="col-md-4">
	            	<div class="form-group{{ $errors->has('picture') ? ' has-error' : '' }}">
	                    {!! Form::label('picture', "Motor View") !!}
	                    <img src="storage/MotorBekas/zeus-helmet-logo.png" class="img-responsive" alt="">
	                    @if ($errors->has('picture'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('picture') }}</strong>
	                    </span>
	                    @endif
	                </div>
	            </div>
	            
	        </div>
	    </div>
	    <!-- /.box-body -->
	</div>

	{{-- Upload Sales --}}
	<div class="box box-primary">
	    <div class="box-header with-border">
	        <h3 class="box-title">Attachment Upload</b></h3>
	        <input type="text" class="dial" id="dial" value="0" data-width="48" data-height="48" data-fgColor="#0788a5" data-bgColor="#3e4043" style="display: none;" />
	        <div class="box-tools pull-right">
	            <button class="btn btn-box-tool" data-widget="collapse" data-toogle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
	        </div>
	    </div>
	    <div class="box-body">
	        <button type="button" class="btn btn-default start upload-collateral dz-clickable">
	            <i class="fa fa-upload" aria-hidden="true"> Upload</i>
	        </button>
	        <div id="uploadcollateral">
	            <ul class="list-inline">
	            </ul>
	        </div>
	    </div>
	    <div class="box-footer">
			{!! Form::submit('save' , ['class' =>'btn btn-primary']) !!}
		</div>
	</div>
@else
	<div class="box box-primary">
	    <div class="box-header with-border">
	        <h3 class="box-title">Aspha Mokas Sales
	        </h3>
	        <div class="box-tools pull-right">
	            <button class="btn btn-box-tool" data-widget="collapse" data-toogle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
	        </div>
	    </div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group{{ $errors->has('sales_no') ? ' has-error' : '' }}">
		                {!! Form::label('sales_no', "No. Sales") !!}
		                {!! Form::text('sales_no', App\Sales::Maxno(), ['class'=>'form-control','required', 'id'=>'sales_noSales', 'readonly'=>'true']) !!}
		                @if ($errors->has('sales_no'))
		                    <span class="help-block">
		                        <strong>{{ $errors->first('sales_no') }}</strong>
		                    </span>
		                @endif
		            </div>
		            <div class="col-md-3">
		            	<div class="checkbox">
			            	<label>
			            		{!! Form::checkbox('ktp',1) !!} <b>KTP</b>
			            	</label>
			            </div>
		            </div>  
		            <div class="col-md-3">
			            <div class="checkbox">
			            	<label>
			            		{!! Form::checkbox('kk',1) !!} <b>KK</b>
			            	</label>
			            </div>
		            </div>
		            <div class="form-group">
		            	<div class="input-group">
							{!! Form::text('mokas_number', old('mokas_number'), ['class'=>'form-control','required', 'placeholder' => 'Mokas Code', 'id'=>'mokas_noSales', 'readonly'=>'true']) !!}
							<span class="input-group-btn">
								<button type="button" class="btn btn-default" onclick="AddMokas()">
		                            <i class="fa fa-search" aria-hidden="true"></i>
		                        </button>
		                    </span>
		                </div>
		            </div>
		            <div class="form-group{{ $errors->has('branch_id') ? ' has-error' : '' }}">
						{!! Form::label('branch_id', 'Branch') !!}
						{!! Form::select('branch_id', $branch_list, old('branch_id'), ['class'=>'form-control','id'=>'branch_id', 'placeholder'=>'-- Select Branch --']) !!}
						@if ($errors->has('branch_id'))
						  <span class="help-block">
						      <strong>{{ $errors->first('branch_id') }}</strong>
						  </span>
						@endif
		            </div>
		            <div class="form-group{{ $errors->has('discount') ? ' has-error' : '' }}">
		                {!! Form::label('discount', "Discount") !!}
		                {!! Form::text('discount', old('discount'), ['class'=>'form-control detail-purchasing','required','autofocus','id'=>'discountSales', 'onkeyup'=>'formatNumber(this)', 'onkeypress'=>'formatNumber(this)']) !!}
		                @if ($errors->has('discount'))
		                    <span class="help-block">
		                        <strong>{{ $errors->first('discount') }}</strong>
		                    </span>
		                @endif
		            </div>
		            <div class="form-group{{ $errors->has('selling_price') ? ' has-error' : '' }}">
		                {!! Form::label('selling_price', "Selling Price") !!}
		                {!! Form::text('selling_price', old('selling_price'), ['class'=>'form-control detail-purchasing','required','autofocus','id'=>'selling_priceSales', 'onkeyup'=>'formatNumber(this)', 'onkeypress'=>'formatNumber(this)']) !!}
		                @if ($errors->has('selling_price'))
		                    <span class="help-block">
		                        <strong>{{ $errors->first('selling_price') }}</strong>
		                    </span>
		                @endif
		            </div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
		                <div class="input-group">
		                    {!!Form::select('customer_list', $customer_list, old('customer_list'), ['class'=>'form-control', 'placeholder'=>'Select Customer','id'=>'customer_list', 'onchange'=>'getCustomerList(this.value)']) !!}
		                    <span class="input-group-btn">
		                        <button type="button" class="btn btn-default" onclick="AddCustomer()">
		                            <i class="fa fa-plus" aria-hidden="true"></i>
		                        </button>
		                    </span>
		                </div><!-- /input-group -->
		            </div>
		            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	                    {!! Form::label('name', "Name") !!}
	                    {!! Form::text('name', old('name'), ['class'=>'form-control','id'=>'nameSales','autofocus', 'readonly' => 'true']) !!}
	                    @if ($errors->has('name'))
	                        <span class="help-block">
	                            <strong>{{ $errors->first('name') }}</strong>
	                        </span>
	                    @endif
	                </div>
	                <div class="form-group{{ $errors->has('identity_number') ? ' has-error' : '' }}">
	                    {!! Form::label('identity_number', "KTP") !!}
	                    {!! Form::text('identity_number', old('identity_number'), ['class'=>'form-control','id'=>'identity_numberSales', 'readonly' => 'true']) !!}
	                    @if ($errors->has('identity_number'))
	                        <span class="help-block">
	                            <strong>{{ $errors->first('identity_number') }}</strong>
	                        </span>
	                    @endif
	                </div>
	                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
	                    {!! Form::label('address', "Address") !!}
	                    {!! Form::textarea('address', old('address'), ['class'=>'form-control','id'=>'addressSales', 'readonly' => 'true']) !!}
	                    @if ($errors->has('address'))
	                        <span class="help-block">
	                            <strong>{{ $errors->first('address') }}</strong>
	                        </span>
	                    @endif
	                </div>
				</div>
			</div>
		</div>
	</div>

	{{--  payment --}}
	<div class="box box-primary">
	    <div class="box-header with-border">
	        <h3 class="box-title">Cash Payment
	            {!! Form::hidden('sales_no', old('sales_no'), ['class'=>'form-control']) !!}
	        </h3>
	        <div class="box-tools pull-right">
	            <button class="btn btn-box-tool" data-widget="collapse" data-toogle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
	        </div>
	    </div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group{{ $errors->has('cash_method') ? ' has-error' : '' }}">
		                {!! Form::label('cash_method', "Payment Method") !!}
		                {!! Form::select('cash_method', ['Cash'=>'Cash','Credit'=>'Credit'], old('cash_method'), ['class'=>'form-control','required', 'id'=>'cash_methodSales', 'placeholder'=>'-- Select Payment Method --']) !!}
		                @if ($errors->has('cash_method'))
		                    <span class="help-block">
		                        <strong>{{ $errors->first('cash_method') }}</strong>
		                    </span>
		                @endif
		            </div>
		            <div class="form-group{{ $errors->has('leasing_no') ? ' has-error' : '' }}">
		                {!! Form::label('leasing_no', "Leasing") !!}
		                {!! Form::select('leasing_no', $leasing_list, old('leasing_no'), ['class'=>'form-control','required', 'placeholder'=>'-- Select Leasing --', 'id'=>'leasingSales']) !!}
		                @if ($errors->has('leasing_no'))
		                    <span class="help-block">
		                        <strong>{{ $errors->first('leasing_no') }}</strong>
		                    </span>
		                @endif
		            </div>
		            <div class="form-group{{ $errors->has('down_payment') ? ' has-error' : '' }}">
		                {!! Form::label('down_payment', "Down Payment") !!}
		                {!! Form::text('down_payment', null, ['class'=>'form-control detail-purchasing','required','autofocus','id'=>'down_paymentSales', 'onkeyup'=>'formatNumber(this)', 'onkeypress'=>'formatNumber(this)']) !!}
		                @if ($errors->has('down_payment'))
		                    <span class="help-block">
		                        <strong>{{ $errors->first('down_payment') }}</strong>
		                    </span>
		                @endif
		            </div>
		            <div class="form-group{{ $errors->has('tenor') ? ' has-error' : '' }}">
		                {!! Form::label('tenor', "Tenor") !!}
		                {!! Form::select('tenor',  $tenor_requestlist, old('tenor'), ['class'=>'form-control','required', 'placeholder'=>'-- Select Tenor --', 'id'=>'tenorSales']) !!}
		                @if ($errors->has('tenor'))
		                    <span class="help-block">
		                        <strong>{{ $errors->first('tenor') }}</strong>
		                    </span>
		                @endif
		            </div>
				</div>
				<div class="col-md-6">
					<div class="form-group{{ $errors->has('others_cost') ? ' has-error' : '' }}">
		                {!! Form::label('others_cost', "Others Cost") !!}
		                {!! Form::text('others_cost', null, ['class'=>'form-control detail-purchasing','required','autofocus','id'=>'others_cost', 'onkeyup'=>'formatNumber(this)', 'onkeypress'=>'formatNumber(this)']) !!}
		                @if ($errors->has('others_cost'))
		                    <span class="help-block">
		                        <strong>{{ $errors->first('others_cost') }}</strong>
		                    </span>
		                @endif
		            </div>
		            <div class="form-group{{ $errors->has('bank_id') ? ' has-error' : '' }}">
		                {!! Form::label('bank_id', "Bank") !!}
		                {!! Form::select('bank_id', $banks, old('bank'), ['class'=>'form-control','required', 'id'=>'bank', 'placeholder'=> '-- Select Bank --']) !!}
		                @if ($errors->has('bank_id'))
		                    <span class="help-block">
		                        <strong>{{ $errors->first('bank_id') }}</strong>
		                    </span>
		                @endif
		            </div>
		            <div class="form-group{{ $errors->has('rek_number') ? ' has-error' : '' }}">
		                {!! Form::label('rek_number', "Rek. Number") !!}
		                {!! Form::text('rek_number', old('rek_number'), ['class'=>'form-control','required']) !!}
		                @if ($errors->has('rek_number'))
		                    <span class="help-block">
		                        <strong>{{ $errors->first('rek_number') }}</strong>
		                    </span>
		                @endif
		            </div>
		            <div class="form-group{{ $errors->has('payment') ? ' has-error' : '' }}">
		                {!! Form::label('payment', "Payment") !!}
		                {!! Form::text('payment', null, ['class'=>'form-control detail-purchasing','required','autofocus','id'=>'paymentSales', 'onkeyup'=>'formatNumber(this)', 'onkeypress'=>'formatNumber(this)']) !!}
		                @if ($errors->has('payment'))
		                    <span class="help-block">
		                        <strong>{{ $errors->first('payment') }}</strong>
		                    </span>
		                @endif
		            </div>
				</div>
			</div>
		</div>
	</div>

	{{-- Motor Spesification --}}
	<div class="box box-primary">
	    <div class="box-header with-border">
	        <h3 class="box-title">Spesification</b></h3>
	        <div class="box-tools pull-right">
	            <button class="btn btn-box-tool" data-widget="collapse" data-toogle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
	        </div>
	    </div>
	    <div class="box-body">
	        <div class="row">
	            <div class="col-md-4 col-offset-md-1">
	                <div class="form-group{{ $errors->has('stnk') ? ' has-error' : '' }}">
	                    {!! Form::label('stnk', "Stnk No.") !!}
	                    {!! Form::text('stnk', old('stnk'), ['class'=>'form-control','id'=>'stnkSales', 'readonly'=>'true']) !!}
	                    @if ($errors->has('stnk'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('stnk') }}</strong>
	                    </span>
	                    @endif
	                </div>

	                <div class="form-group{{ $errors->has('bpkb') ? ' has-error' : '' }}">
	                    {!! Form::label('bpkb', "Bpkb No.") !!}
	                    {!! Form::text('bpkb', old('bpkb'), ['class'=>'form-control','id'=>'bpkbSales', 'readonly'=>'true']) !!}
	                    @if ($errors->has('bpkb'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('bpkb') }}</strong>
	                    </span>
	                    @endif
	                </div>

	                <div class="form-group{{ $errors->has('machine_number') ? ' has-error' : '' }}">
	                    {!! Form::label('machine_number', "Machine No.") !!}
	                    {!! Form::text('machine_number', old('machine_number'), ['class'=>'form-control','id'=>'machine_numberSales', 'readonly'=>'true']) !!}
	                    @if ($errors->has('machine_number'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('machine_number') }}</strong>
	                    </span>
	                    @endif
	                </div>

	                <div class="form-group{{ $errors->has('chassis_number') ? ' has-error' : '' }}">
	                    {!! Form::label('chassis_number', "Chassis No.") !!}
	                    {!! Form::text('chassis_number', old('chassis_number'), ['class'=>'form-control','id'=>'chassis_numberSales', 'readonly'=>'true']) !!}
	                    @if ($errors->has('chassis_number'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('chassis_number') }}</strong>
	                    </span>
	                    @endif
	                </div>
	            </div>
	            <!-- /.col -->
	            <div class="col-md-4">
	            	<div class="form-group{{ $errors->has('type_id') ? ' has-error' : '' }}">
	                    {!! Form::label('type_id', "Type") !!}
	                    {!! Form::text('type_id', old('type_id'), ['class'=>'form-control','id'=>'type_idSales', 'readonly'=>'true']) !!}
	                    @if ($errors->has('type_id'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('type_id') }}</strong>
	                    </span>
	                    @endif
	                </div>
	                <div class="form-group{{ $errors->has('manufacture_year') ? ' has-error' : '' }}">
	                    {!! Form::label('manufacture_year', "Manufactur Year") !!}
	                    {!! Form::text('manufacture_year', old('manufacture_year'), ['class'=>'form-control','id'=>'manufacture_yearSales', 'readonly' => 'true']) !!}
	                    @if ($errors->has('manufacture_year'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('manufacture_year') }}</strong>
	                    </span>
	                    @endif
	                </div>

	                <div class="form-group{{ $errors->has('stnk_due_date') ? ' has-error' : '' }}">
	                    {!! Form::label('stnk_due_date', "Masa Berlaku STNK") !!}
	                    {!! Form::date('stnk_due_date', old('stnk_due_date'), ['class'=>'form-control','id'=>'stnk_due_dateSales', 'readonly'=>'true']) !!}
	                    @if ($errors->has('stnk_due_date'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('stnk_due_date') }}</strong>
	                    </span>
	                    @endif
	                </div>
	                 <div class="form-group{{ $errors->has('plat') ? ' has-error' : '' }}">
	                    {!! Form::label('plat', "Plat") !!}
	                    {!! Form::text('plat', old('plat'), ['class'=>'form-control','id'=>'platSales', 'readonly'=>'true']) !!}
	                    @if ($errors->has('plat'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('plat') }}</strong>
	                    </span>
	                    @endif
	                </div>	
	            </div>
	            <div class="col-md-4">
	            	<div class="form-group{{ $errors->has('picture') ? ' has-error' : '' }}">
	                    {!! Form::label('picture', "Motor View") !!}
	                    <img src="storage/MotorBekas/zeus-helmet-logo.png" class="img-responsive" alt="">
	                    @if ($errors->has('picture'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('picture') }}</strong>
	                    </span>
	                    @endif
	                </div>
	            </div>
	        </div>
	    </div>
	    <!-- /.box-body -->
	</div>

	{{-- Upload Sales --}}
	<div class="box box-primary">
	    <div class="box-header with-border">
	        <h3 class="box-title">Attachment Upload</b></h3>
	        <input type="text" class="dial" id="dial" value="0" data-width="48" data-height="48" data-fgColor="#0788a5" data-bgColor="#3e4043" style="display: none;" />
	        <div class="box-tools pull-right">
	            <button class="btn btn-box-tool" data-widget="collapse" data-toogle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
	        </div>
	    </div>
	    <div class="box-body">
	        <button type="button" class="btn btn-default start upload-collateral dz-clickable">
	            <i class="fa fa-upload" aria-hidden="true"> Upload</i>
	        </button>
	        <div id="uploadcollateral">
	            <ul class="list-inline">
	            </ul>
	        </div>
	    </div>
	    <div class="box-footer">
			{!! Form::submit('save' , ['class' =>'btn btn-primary']) !!}
		</div>
	</div>
@endif

{{-- Dana Tunai  --}}
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Dana Tunai </b>
            @if($edit)
                {!! Form::hidden('cash_no', old('cash_no'), ['class'=>'form-control']) !!}
            @else
                {!! Form::hidden('cash_no', null, ['class'=>'form-control']) !!}
            @endif
                {!! Form::hidden('id_cash', null, ['class'=>'form-control', 'id'=>'id_cash']) !!}
        </h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toogle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-4 col-offset-md-1">
                <div class="form-group{{ $errors->has('cash_no') ? ' has-error' : '' }}">
                    {!! Form::label('cash_no', "Cash No.") !!}
                    {!! Form::text('cash_no', old('cash_no'), ['class'=>'form-control','required','id'=>'cash_no', 'readonly' => 'true']) !!}
                    @if ($errors->has('cash_no'))
                        <span class="help-block">
                            <strong>{{ $errors->first('cash_no') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('credit_ceiling_request') ? ' has-error' : '' }}">
                    {!! Form::label('credit_ceiling_request', "Plafond Credit Request") !!}
                    {!! Form::text('credit_ceiling_request', old('credit_ceiling_request'), ['class'=>'form-control detail-purchasing','required','autofocus','id'=>'credit_ceiling_request', 'onkeyup'=>'formatNumber(this)', 'onkeypress'=>'formatNumber(this)']) !!}
                    @if ($errors->has('credit_ceiling_request'))
                        <span class="help-block">
                            <strong>{{ $errors->first('credit_ceiling_request') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('tenor_request') ? ' has-error' : '' }}">
                    {!! Form::label('tenor_request', "Tenor Request") !!}
                    {!! Form::select('tenor_request', $tenor_requestlist, old('tenor_request'), ['class'=>'form-control','required','id'=>'tenor_request']) !!}
                    @if ($errors->has('tenor_request'))
                        <span class="help-block">
                            <strong>{{ $errors->first('tenor_request') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('credittype_id') ? ' has-error' : '' }}">
                    {!! Form::label('credittype_id', "Credit Type") !!}
                    {!! Form::select('credittype_id', $credittype_list, old('credittype_id'), ['class'=>'form-control','id'=>'branchidCash']) !!}
                    @if ($errors->has('credittype_id'))
                        <span class="help-bcredittype_idlock">
                            <strong>{{ $errors->first('credittype_id') }}</strong>
                        </span>
                    @endif
                </div>
          </div>

          
          <!-- /.col -->
          <div class="col-md-4">

                <div class="form-group{{ $errors->has('leasing_no') ? ' has-error' : '' }}">
                    {!! Form::label('leasing_no', "Leasing") !!}
                    {!! Form::select('leasing_no', $leasing_list, old('leasing_no'), ['class'=>'form-control','required']) !!}
                    @if ($errors->has('leasing_no'))
                        <span class="help-block">
                            <strong>{{ $errors->first('leasing_no') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('branch_id') ? ' has-error' : '' }}">
                    {!! Form::label('branch_id', "Branch") !!}
                    {!! Form::select('branch_id', $branch_list, old('branch_id'), ['class'=>'form-control','id'=>'branchidCash']) !!}
                    @if ($errors->has('branch_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('branch_id') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('maximum_plafond') ? ' has-error' : '' }}">
                    {!! Form::label('maximum_plafond', 'Max. Plafond') !!}
                    {!! Form::text('maximum_plafond', old('maximum_plafond'), ['class' =>'form-control', 'id'=>'maxplafondCash', 'readonly'=>'true']) !!}
                    @if ($errors->has('maximum_plafond'))
                        <span class="help-block">
                            <strong>{{ $errors->first('maximum_plafond') }}</strong>
                        </span>
                    @endif
                </div>

          </div>
       </div>
    </div>
    <!-- /.box-body -->
</div>

{{-- Customer --}}
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Customer</b></h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toogle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-4 col-offset-md-1">
                <div class="form-group">
                    <div class="input-group">
                        {!!Form::select('customer_list', $customer_list, null, ['class'=>'customer_select2 form-control', 'placeholder'=>'Select Customer','id'=>'customer_list', 'onchange'=>'getCustomerList(this.value)']) !!}
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-default" onclick="AddCustomer()">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </button>
                        </span>
                    </div><!-- /input-group -->
                </div>
                <div class="form-group{{ $errors->has('customer_no') ? ' has-error' : '' }}">
                    {!! Form::label('customer_no', 'Customer No') !!}
                    {!! Form::text('customer_no', old('customer_no'), ['class' => 'form-control', 'id' => 'customernoLoan', 'autofocus', 'readonly' => 'true']) !!}
                    @if ($errors->has('customer_no'))
                        <span class="help-block">
                            <strong>{{ $errors->first('customer_no') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    {!! Form::label('name', "Name") !!}
                    {!! Form::text('name', old('name'), ['class'=>'form-control','id'=>'nameLoan','autofocus', 'readonly' => 'true']) !!}
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('identity_number') ? ' has-error' : '' }}">
                    {!! Form::label('identity_number', "KTP") !!}
                    {!! Form::text('identity_number', old('identity_number'), ['class'=>'form-control','id'=>'identity_numberLoan', 'readonly' => 'true']) !!}
                    @if ($errors->has('identity_number'))
                        <span class="help-block">
                            <strong>{{ $errors->first('identity_number') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

              
            <!-- /.col -->
            <div class="col-md-4">
                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                    {!! Form::label('phone', "Phone") !!}
                    {!! Form::text('phone', old('phone'), ['class'=>'form-control','id'=>'phoneLoan', 'readonly' => 'true']) !!}
                    @if ($errors->has('phone'))
                    <span class="help-block">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                    @endif
                </div>
                
                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                    {!! Form::label('address', "Address") !!}
                    {!! Form::textarea('address', old('address'), ['class'=>'form-control','id'=>'addressLoan', 'readonly' => 'true']) !!}
                    @if ($errors->has('address'))
                        <span class="help-block">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- /.box-body -->
</div>

{{-- Collateral --}}
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Collateral</b>
            @if($edit)
                {{-- {!! Form::text('customercollateral_no', $cash->customercollateral['customercollateral_no'], ['class'=>'form-control']) !!} --}}
            @else
                {!! Form::hidden('customercollateral_no', null, ['class'=>'form-control']) !!}
                {!! Form::hidden('id_collateral', null, ['class'=>'form-control', 'id'=>'id_customercollateral']) !!}
            @endif
        </h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toogle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            @if($edit)
                <div class="col-md-4 col-offset-md-1">
                    <div class="form-group{{ $errors->has('customercollateral_no') ? ' has-error' : '' }}">
                        {!! Form::label('customercollateral_no', "Customer Collateral No.") !!}
                        {!! Form::text('customercollateral_no', $cash->customercollateral->customercollateral_no, ['class'=>'form-control','id'=>'customercollateral_no', 'readonly'=>'true']) !!}
                        @if ($errors->has('customercollateral_no'))
                        <span class="help-block">
                            <strong>{{ $errors->first('customercollateral_no') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('stnk') ? ' has-error' : '' }}">
                        {!! Form::label('stnk', "Stnk No.") !!}
                        {!! Form::text('stnk', $cash->customercollateral->stnk, ['class'=>'form-control','id'=>'stnk']) !!}
                        @if ($errors->has('stnk'))
                        <span class="help-block">
                            <strong>{{ $errors->first('stnk') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('bpkb') ? ' has-error' : '' }}">
                        {!! Form::label('bpkb', "Bpkb No.") !!}
                        {!! Form::text('bpkb', $cash->customercollateral->bpkb, ['class'=>'form-control','id'=>'bpkb']) !!}
                        @if ($errors->has('bpkb'))
                        <span class="help-block">
                            <strong>{{ $errors->first('bpkb') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('machine_number') ? ' has-error' : '' }}">
                        {!! Form::label('machine_number', "Machine No.") !!}
                        {!! Form::text('machine_number', $cash->customercollateral->machine_number, ['class'=>'form-control','id'=>'machine_number']) !!}
                        @if ($errors->has('machine_number'))
                        <span class="help-block">
                            <strong>{{ $errors->first('machine_number') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('chassis_number') ? ' has-error' : '' }}">
                        {!! Form::label('chassis_number', "Chasis No.") !!}
                        {!! Form::text('chassis_number', $cash->customercollateral->chassis_number, ['class'=>'form-control','id'=>'chassis_number']) !!}
                        @if ($errors->has('chassis_number'))
                        <span class="help-block">
                            <strong>{{ $errors->first('chassis_number') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('vehicle_color') ? ' has-error' : '' }}">
                        {!! Form::label('vehicle_color', "Vehicle Color") !!}
                        {!! Form::select('vehicle_color', $vehicle_colorlist, $cash->customercollateral->vehicle_color, ['class'=>'form-control','id'=>'vehicle_color']) !!}
                        @if ($errors->has('vehicle_color'))
                        <span class="help-block">
                            <strong>{{ $errors->first('vehicle_color') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('vehicle_cc') ? ' has-error' : '' }}">
                        {!! Form::label('vehicle_cc', "Vehicle CC") !!}
                        {!! Form::select('vehicle_cc', $vehicle_cclist, $cash->customercollateral->vehicle_cc, ['class'=>'form-control','id'=>'vehicle_cc']) !!}
                        @if ($errors->has('vehicle_cc'))
                        <span class="help-block">
                            <strong>{{ $errors->first('vehicle_cc') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('collateral_name') ? ' has-error' : '' }}">
                        {!! Form::label('collateral_name', "Product Name") !!}
                        {!! Form::text('collateral_name', $cash->customercollateral->collateral_name, ['class'=>'form-control','id'=>'collateral_name']) !!}
                        @if ($errors->has('collateral_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('collateral_name') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('vehicle_date') ? ' has-error' : '' }}">
                        {!! Form::label('vehicle_date', "Vehicle Date") !!}
                        {!! Form::text('vehicle_date', $cash->customercollateral->vehicle_date, ['class'=>'form-control','id'=>'vehicle_date']) !!}
                        @if ($errors->has('vehicle_date'))
                        <span class="help-block">
                            <strong>{{ $errors->first('vehicle_date') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('stnk_due_date') ? ' has-error' : '' }}">
                        {!! Form::label('stnk_due_date', "Masa Berlaku STNK") !!}
                        {!! Form::date('stnk_due_date', $cash->customercollateral->stnk_due_date, ['class'=>'form-control','id'=>'stnk_due_date']) !!}
                        @if ($errors->has('stnk_due_date'))
                        <span class="help-block">
                            <strong>{{ $errors->first('stnk_due_date') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            @else
                <div class="col-md-4 col-offset-md-1">
                    <div class="form-group{{ $errors->has('customercollateral_no') ? ' has-error' : '' }}">
                        {!! Form::label('customercollateral_no', "Customer Collateral No.") !!}
                        {!! Form::text('customercollateral_no', old('customercollateral_no'), ['class'=>'form-control','id'=>'customercollateral_no', 'readonly'=>'true']) !!}
                        @if ($errors->has('customercollateral_no'))
                        <span class="help-block">
                            <strong>{{ $errors->first('customercollateral_no') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('stnk') ? ' has-error' : '' }}">
                        {!! Form::label('stnk', "Stnk No.") !!}
                        {!! Form::text('stnk', old('stnk'), ['class'=>'form-control','id'=>'stnk']) !!}
                        @if ($errors->has('stnk'))
                        <span class="help-block">
                            <strong>{{ $errors->first('stnk') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('bpkb') ? ' has-error' : '' }}">
                        {!! Form::label('bpkb', "Bpkb No.") !!}
                        {!! Form::text('bpkb', old('bpkb'), ['class'=>'form-control','id'=>'bpkb']) !!}
                        @if ($errors->has('bpkb'))
                        <span class="help-block">
                            <strong>{{ $errors->first('bpkb') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('machine_number') ? ' has-error' : '' }}">
                        {!! Form::label('machine_number', "Machine No.") !!}
                        {!! Form::text('machine_number', old('machine_number'), ['class'=>'form-control','id'=>'machine_number']) !!}
                        @if ($errors->has('machine_number'))
                        <span class="help-block">
                            <strong>{{ $errors->first('machine_number') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('chassis_number') ? ' has-error' : '' }}">
                        {!! Form::label('chassis_number', "Chassis No.") !!}
                        {!! Form::text('chassis_number', old('chassis_number'), ['class'=>'form-control','id'=>'chassis_number']) !!}
                        @if ($errors->has('chassis_number'))
                        <span class="help-block">
                            <strong>{{ $errors->first('chassis_number') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('vehicle_color') ? ' has-error' : '' }}">
                        {!! Form::label('vehicle_color', "Vehicle Color") !!}
                        {!! Form::select('vehicle_color', $vehicle_colorlist, old('vehicle_color'), ['class'=>'form-control','id'=>'vehicle_color']) !!}
                        @if ($errors->has('vehicle_color'))
                        <span class="help-block">
                            <strong>{{ $errors->first('vehicle_color') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('vehicle_cc') ? ' has-error' : '' }}">
                        {!! Form::label('vehicle_cc', "Vehicle CC") !!}
                        {!! Form::select('vehicle_cc', $vehicle_cclist, old('vehicle_cc'), ['class'=>'form-control','id'=>'vehicle_cc']) !!}
                        @if ($errors->has('vehicle_cc'))
                        <span class="help-block">
                            <strong>{{ $errors->first('vehicle_cc') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="input-group{{ $errors->has('collateral_name') ? ' has-error' : '' }}">
                        
                        {!! Form::text('collateral_name', null, ['class'=>'form-control','id'=>'collateral_name', 'readonly' => 'true', 'placeholder' => 'Motor Type']) !!}
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-default" onclick="AddVehicleCollateral()">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </button>
                        </span>
                        @if ($errors->has('collateral_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('collateral_name') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('vehicle_date') ? ' has-error' : '' }}">
                        {!! Form::label('vehicle_date', "Manufactur Year") !!}
                        {!! Form::text('vehicle_date', old('vehicle_date'), ['class'=>'form-control','id'=>'vehicle_date', 'readonly' => 'true']) !!}
                        @if ($errors->has('vehicle_date'))
                        <span class="help-block">
                            <strong>{{ $errors->first('vehicle_date') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('stnk_due_date') ? ' has-error' : '' }}">
                        {!! Form::label('stnk_due_date', "Masa Berlaku STNK") !!}
                        {!! Form::date('stnk_due_date', old('stnk_due_date'), ['class'=>'form-control','id'=>'stnk_due_date']) !!}
                        @if ($errors->has('stnk_due_date'))
                        <span class="help-block">
                            <strong>{{ $errors->first('stnk_due_date') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!-- /.box-body -->
</div>

{{-- Attachment --}}
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Attachment</b></h3>
        <input type="text" class="dial" id="dial" value="0" data-width="48" data-height="48" data-fgColor="#0788a5" data-bgColor="#3e4043" style="display: none;" />
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toogle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
        @if($edit)
            <div id="uploadcollateral">
                <ul class="list-inline"></ul>
            </div>
        @else
            <button type="button" class="btn btn-default start upload-collateral dz-clickable">
                <i class="fa fa-upload" aria-hidden="true"> Upload</i>
            </button>
            <div id="uploadcollateral">
                <ul class="list-inline"></ul>
            </div>
        @endif
    </div>

    <div class="box-footer">
        @if($edit)
            <button type="button" class="btn btn-primary" onclick="save()">Update</button>
        @else
            <button type="button" class="btn btn-primary" onclick="save()">Save</button>
        @endif
    </div>
</div>

{{-- Dana Tunai  --}}
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Cash </h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toogle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-4 col-offset-md-1">
                <div class="form-group{{ $errors->has('credit_ceiling_request') ? ' has-error' : '' }}">
                {!! Form::label('credit_ceiling_request', "Plafond Credit Request") !!}
                {!! Form::text('credit_ceiling_request', old('credit_ceiling_request'), ['class'=>'form-control','required','autofocus','id'=>'credit_ceiling_request', 'readonly' => 'true']) !!}
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
            </div>
          
            <!-- /.col -->
            <div class="col-md-4">
                <div class="form-group{{ $errors->has('leasing_no') ? ' has-error' : '' }}">
                    {!! Form::label('leasing_no', "Leasing") !!}
                    {!! Form::select('leasing_no', $leasing_list, old('leasing_no'), ['class'=>'form-control','required', 'readonly' => 'true']) !!}
                    @if ($errors->has('leasing_no'))
                        <span class="help-block">
                            <strong>{{ $errors->first('leasing_no') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('branch_id') ? ' has-error' : '' }}">
                    {!! Form::label('branch_id', "Branch") !!}
                    {!! Form::select('branch_id', $branch_list, old('branch_id'), ['class'=>'form-control','id'=>'branchidCash', 'readonly' => 'true']) !!}
                    @if ($errors->has('branch_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('branch_id') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('credittype_id') ? ' has-error' : '' }}">
                    {!! Form::label('credittype_id', "Branch") !!}
                    {!! Form::select('credittype_id', $credittype_list, old('credittype_id'), ['class'=>'form-control','id'=>'branchidCash']) !!}
                    @if ($errors->has('credittype_id'))
                        <span class="help-bcredittype_idlock">
                            <strong>{{ $errors->first('credittype_id') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
       </div>
    </div>
    <!-- /.box-body -->
    {!! Form::close() !!}
</div>

{{-- Plafond Fix --}}
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Plafond Fix</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toogle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-4 col-offset-md-1">

                <div class="form-group{{ $errors->has('cashfix_no') ? ' has-error' : '' }}">
                    {!! Form::label('cashfix_no', "No. Pinjaman Fix") !!}
                    {{-- {!! Form::text('cashfix_no', old('cashfix_no'), ['class'=>'form-control','required','autofocus','id'=>'cashfix_no']) !!} --}}
                    {!! Form::text('cashfix_no', $plafondnumber, ['class'=>'form-control', 'readonly'=>'true']) !!}
                    @if ($errors->has('cashfix_no'))
                        <span class="help-block">
                            <strong>{{ $errors->first('cashfix_no') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('cash_no') ? ' has-error' : '' }}">
                    {!! Form::label('cash_no', "No. Pinjaman") !!}
                    {!! Form::text('cash_no', $cash->cash_no, ['class'=>'form-control', 'readonly'=>'true', 'id'=>'cashApprove']) !!}
                    @if ($errors->has('cash_no'))
                        <span class="help-block">
                            <strong>{{ $errors->first('cash_no') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('tenor_approve') ? ' has-error' : '' }}">
                    {!! Form::label('tenor_approve', "Tenor Approve") !!}
                    {!! Form::select('tenor_approve', $tenor_requestlist, old('tenor_approve'), ['class'=>'form-control','required','autofocus','id'=>'tenor_approve']) !!}
                    @if ($errors->has('tenor_approve'))
                        <span class="help-block">
                            <strong>{{ $errors->first('tenor_approve') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('payment') ? ' has-error' : '' }}">
                    {!! Form::label('payment', "Angsuran") !!}
                    {!! Form::text('payment', old('payment'), ['class'=>'form-control','required','id'=>'payment']) !!}
                    @if ($errors->has('payment'))
                        <span class="help-block">
                            <strong>{{ $errors->first('payment') }}</strong>
                        </span>
                    @endif
                </div>

            </div>
          
            <!-- /.col -->
            <div class="col-md-4">

                <div class="form-group{{ $errors->has('plafond_approve') ? ' has-error' : '' }}">
                    {!! Form::label('plafond_approve', "Plafond Approve") !!}
                    {!! Form::text('plafond_approve', old('plafond_approve'), ['class'=>'form-control','required','id'=>'plafond_approve']) !!}
                    @if ($errors->has('plafond_approve'))
                        <span class="help-block">
                            <strong>{{ $errors->first('plafond_approve') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('approve_date') ? ' has-error' : '' }}">
                    {!! Form::label('approve_date', "Approve Date") !!}
                    {!! Form::date('approve_date', old('approve_date'), ['class'=>'form-control','required','id'=>'approve_date']) !!}
                    @if ($errors->has('approve_date'))
                        <span class="help-block">
                            <strong>{{ $errors->first('approve_date') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('leasing_no') ? ' has-error' : '' }}">
                    {!! Form::label('leasing_no', "Leasing Fix") !!}
                    {!! Form::select('leasing_no', $leasing_list, old('leasing_no'), ['class'=>'form-control','required']) !!}
                    @if ($errors->has('leasing_no'))
                        <span class="help-block">
                            <strong>{{ $errors->first('leasing_no') }}</strong>
                        </span>
                    @endif
                </div>

            </div>
        </div>
    </div>
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
                        {!!Form::select('customer_list', $customer_list, null, ['class'=>'customer_select2 form-control', 'id'=>'customer_list', 'onchange'=>'getCustomerList(this.value)']) !!}
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
        <h3 class="box-title">Collateral</b></h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toogle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            @if($edit)
                <div class="col-md-4 col-offset-md-1">
                    <div class="form-group{{ $errors->has('stnk') ? ' has-error' : '' }}">
                        {!! Form::label('stnk', "Stnk No.") !!}
                        {!! Form::text('stnk', $cash->customerCollateral->stnk, ['class'=>'form-control','id'=>'stnk', 'readonly' => 'true']) !!}
                        @if ($errors->has('stnk'))
                        <span class="help-block">
                            <strong>{{ $errors->first('stnk') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('bpkb') ? ' has-error' : '' }}">
                        {!! Form::label('bpkb', "Bpkb No.") !!}
                        {!! Form::text('bpkb', $cash->customerCollateral->bpkb, ['class'=>'form-control','id'=>'bpkb', 'readonly' => 'true']) !!}
                        @if ($errors->has('bpkb'))
                        <span class="help-block">
                            <strong>{{ $errors->first('bpkb') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('machine_number') ? ' has-error' : '' }}">
                        {!! Form::label('machine_number', "Machine No.") !!}
                        {!! Form::text('machine_number', $cash->customerCollateral->machine_number, ['class'=>'form-control','id'=>'machine_number', 'readonly' => 'true']) !!}
                        @if ($errors->has('machine_number'))
                        <span class="help-block">
                            <strong>{{ $errors->first('machine_number') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('chassis_number') ? ' has-error' : '' }}">
                        {!! Form::label('chassis_number', "Chasis No.") !!}
                        {!! Form::text('chassis_number', $cash->customerCollateral->chassis_number, ['class'=>'form-control','id'=>'chassis_number', 'readonly' => 'true']) !!}
                        @if ($errors->has('chassis_number'))
                        <span class="help-block">
                            <strong>{{ $errors->first('chassis_number') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('vehicle_color') ? ' has-error' : '' }}">
                        {!! Form::label('vehicle_color', "Vehicle Color") !!}
                        {!! Form::select('vehicle_color', $vehicle_colorlist, $cash->customerCollateral->vehicle_color, ['class'=>'form-control','id'=>'vehicle_color', 'readonly' => 'true']) !!}
                        @if ($errors->has('vehicle_color'))
                        <span class="help-block">
                            <strong>{{ $errors->first('vehicle_color') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('vehicle_cc') ? ' has-error' : '' }}">
                        {!! Form::label('vehicle_cc', "Vehicle CC") !!}
                        {!! Form::select('vehicle_cc', $vehicle_cclist, $cash->customerCollateral->vehicle_cc, ['class'=>'form-control','id'=>'vehicle_cc', 'readonly' => 'true']) !!}
                        @if ($errors->has('vehicle_cc'))
                        <span class="help-block">
                            <strong>{{ $errors->first('vehicle_cc') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('collateral_name') ? ' has-error' : '' }}">
                        {!! Form::label('collateral_name', "Collateral Name") !!}
                        {!! Form::text('collateral_name', $cash->customerCollateral->collateral_name, ['class'=>'form-control','id'=>'collateral_name', 'readonly' => 'true']) !!}
                        @if ($errors->has('collateral_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('collateral_name') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('vehicle_date') ? ' has-error' : '' }}">
                        {!! Form::label('vehicle_date', "Vehicle Date") !!}
                        {!! Form::selectYear('vehicle_date', 2009, 2018, $cash->customerCollateral->vehicle_date, ['class'=>'form-control','id'=>'vehicle_date', 'readonly' => 'true']) !!}
                        @if ($errors->has('vehicle_date'))
                        <span class="help-block">
                            <strong>{{ $errors->first('vehicle_date') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('stnk_due_date') ? ' has-error' : '' }}">
                        {!! Form::label('stnk_due_date', "Masa Berlaku STNK") !!}
                        {!! Form::date('stnk_due_date', $cash->customerCollateral->stnk_due_date, ['class'=>'form-control','id'=>'stnk_due_date', 'readonly' => 'true']) !!}
                        @if ($errors->has('stnk_due_date'))
                        <span class="help-block">
                            <strong>{{ $errors->first('stnk_due_date') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            @else
                <div class="col-md-4 col-offset-md-1">
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

                    <div class="form-group{{ $errors->has('vehicle_color') ? ' has-error' : '' }}">
                        {!! Form::label('vehicle_color', "Vehicle Color") !!}
                        {!! Form::select('vehicle_color', $vehicle_colorlist, old('vehicle_color'), ['class'=>'form-control','id'=>'vehicle_color']) !!}
                        @if ($errors->has('vehicle_color'))
                        <span class="help-block">
                            <strong>{{ $errors->first('vehicle_color') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('vehicle_cc') ? ' has-error' : '' }}">
                        {!! Form::label('vehicle_cc', "Vehicle CC") !!}
                        {!! Form::select('vehicle_cc', $vehicle_cclist, old('vehicle_cc'), ['class'=>'form-control','id'=>'vehicle_cc']) !!}
                        @if ($errors->has('vehicle_cc'))
                        <span class="help-block">
                            <strong>{{ $errors->first('vehicle_cc') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('collateral_name') ? ' has-error' : '' }}">
                        {!! Form::label('collateral_name', "Collateral Name") !!}
                        {!! Form::text('collateral_name', old('collateral_name'), ['class'=>'form-control','id'=>'collateral_name']) !!}
                        @if ($errors->has('collateral_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('collateral_name') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('vehicle_date') ? ' has-error' : '' }}">
                        {!! Form::label('vehicle_date', "Vehicle Date") !!}
                        {{-- {!! Form::date('vehicle_date', old('vehicle_date'), ['class'=>'form-control','id'=>'vehicle_date']) !!} --}}
                        {!! Form::selectYear('vehicle_date', 2009, 2018, old('vehicle_date'), ['class'=>'form-control','id'=>'vehicle_date']) !!}
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
    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    <!-- / .box-footer -->
</div>

    
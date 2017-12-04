@if($edit)
    <div class="box-header with-border">
        <h3 class="box-title">Mokas</h3>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-4 col-lg-offset-1">
                <div class="form-group">
                    {!! Form::text('mokas_no', old('mokas_no'), ['class'=>'form-control', 'readonly'=>'true']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('type_id', 'Type:') !!}
                    {!! Form::text('merk_id', $mokas->types['name'], ['class'=>'form-control', 'readonly'=>'true', 'id'=>'merkMokas']) !!}
                </div>
                <div class="form-group{{ $errors->has('sales_id') ? ' has-error' : '' }}">
                    {!! Form::label('sales_id', "Sales Id") !!}
                    {!! Form::text('sales_id', old('sales_id'), ['class'=>'form-control detail-purchasing','required','autofocus','id'=>'sales_id', 'readonly'=>'true']) !!}
                    @if ($errors->has('sales_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('sales_id') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('purchase_price') ? ' has-error' : '' }}">
                    {!! Form::label('purchase_price', "Purchase Price") !!}
                    {!! Form::text('purchase_price', old('purchase_price'), ['class'=>'form-control detail-purchasing','required','autofocus','id'=>'purchase_price', 'onkeyup'=>'formatNumber(this)', 'onkeypress'=>'formatNumber(this)']) !!}
                    @if ($errors->has('purchase_price'))
                        <span class="help-block">
                            <strong>{{ $errors->first('purchase_price') }}</strong>
                        </span>
                    @endif
                </div> 

                <div class="form-group{{ $errors->has('selling_price') ? ' has-error' : '' }}">
                    {!! Form::label('selling_price', "Selling Price") !!}
                    {!! Form::text('selling_price', old('selling_price'), ['class'=>'form-control detail-purchasing','required','autofocus','id'=>'selling_price', 'onkeyup'=>'formatNumber(this)', 'onkeypress'=>'formatNumber(this)']) !!}
                    @if ($errors->has('selling_price'))
                        <span class="help-block">
                            <strong>{{ $errors->first('selling_price') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group{{ $errors->has('discount') ? ' has-error' : '' }}">
                    {!! Form::label('discount', "Discount") !!}
                    {!! Form::text('discount', old('discount'), ['class'=>'form-control detail-purchasing','required','autofocus','id'=>'discount', 'onkeyup'=>'formatNumber(this)', 'onkeypress'=>'formatNumber(this)']) !!}
                    @if ($errors->has('discount'))
                        <span class="help-block">
                            <strong>{{ $errors->first('discount') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('branch_id') ? ' has-error' : '' }}">
                    {!! Form::label('branch_id', "Branch") !!}
                    {!! Form::select('branch_id', $branch_list, old('branch_id'), ['class'=>'form-control','id'=>'branchidCash', 'placeholder' => '-- Select Branch --']) !!}
                    @if ($errors->has('branch_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('branch_id') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('note') ? ' has-error' : '' }}">
                    {!! Form::label('note', 'Note') !!}
                    {!! Form::textarea('note', old('note'), ['class' =>'form-control', 'id'=>'noteCash']) !!}
                    @if ($errors->has('note'))
                        <span class="help-block">
                            <strong>{{ $errors->first('note') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Save
        </button>
    </div>
@else
    <div class="box-header with-border">
        <h3 class="box-title">Mokas - <b>{{ App\Mokas::Maxno() }}</b>
            {!! Form::hidden('mokas_no', old('mokas_no'), ['class'=>'form-control']) !!}
        </h3>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-4 col-lg-offset-1">
                <div class="form-group">
                    {!! Form::label('merk_id', 'Motor Type') !!}
                    <div class="input-group">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <select name="merk_id" id="merk_id" class="form-control">
                            <option value="">--- Select Merk ---</option>
                            @foreach ($merkall as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-default" onclick="AddPriceSalesHistory()">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <select name="type_id" id="type_id" class="form-control">
                        <option value="">--- Select Type ---</option>
                    </select>
                </div>
                <div class="checkbox">
                    <label>
                        {!! Form::checkbox('cek_ok',1) !!} <b>Cek Ok</b>
                    </label>
                </div>
                <div class="form-group{{ $errors->has('sales_id') ? ' has-error' : '' }}">
                    {!! Form::label('sales_id', "Sales Id") !!}
                    {!! Form::text('sales_id', old('sales_id'), ['class'=>'form-control detail-purchasing','required','autofocus','id'=>'sales_id', 'readonly'=>'true']) !!}
                    @if ($errors->has('sales_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('sales_id') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('purchase_price') ? ' has-error' : '' }}">
                    {!! Form::label('purchase_price', "Purchase Price") !!}
                    {!! Form::text('purchase_price', old('purchase_price'), ['class'=>'form-control detail-purchasing','required','autofocus','id'=>'purchase_price', 'onkeyup'=>'formatNumber(this)', 'onkeypress'=>'formatNumber(this)']) !!}
                    @if ($errors->has('purchase_price'))
                        <span class="help-block">
                            <strong>{{ $errors->first('purchase_price') }}</strong>
                        </span>
                    @endif
                </div> 

                <div class="form-group{{ $errors->has('selling_price') ? ' has-error' : '' }}">
                    {!! Form::label('selling_price', "Selling Price") !!}
                    {!! Form::text('selling_price', old('selling_price'), ['class'=>'form-control detail-purchasing','required','autofocus','id'=>'selling_priceMokas', 'onkeyup'=>'formatNumber(this)', 'onkeypress'=>'formatNumber(this)']) !!}
                    @if ($errors->has('selling_price'))
                        <span class="help-block">
                            <strong>{{ $errors->first('selling_price') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group{{ $errors->has('discount') ? ' has-error' : '' }}">
                    {!! Form::label('discount', "Discount") !!}
                    {!! Form::text('discount', old('discount'), ['class'=>'form-control detail-purchasing','required','autofocus','id'=>'discountMokas', 'onkeyup'=>'formatNumber(this)', 'onkeypress'=>'formatNumber(this)']) !!}
                    @if ($errors->has('discount'))
                        <span class="help-block">
                            <strong>{{ $errors->first('discount') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('branch_id') ? ' has-error' : '' }}">
                    {!! Form::label('branch_id', "Branch") !!}
                    {!! Form::select('branch_id', $branch_list, old('branch_id'), ['class'=>'form-control','id'=>'branchidCash', 'placeholder' => '-- Select Branch --']) !!}
                    @if ($errors->has('branch_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('branch_id') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('note') ? ' has-error' : '' }}">
                    {!! Form::label('note', 'Note') !!}
                    {!! Form::textarea('note', old('note'), ['class' =>'form-control', 'id'=>'noteCash']) !!}
                    @if ($errors->has('note'))
                        <span class="help-block">
                            <strong>{{ $errors->first('note') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endif
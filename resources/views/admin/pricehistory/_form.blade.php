<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Mokas Price History</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toogle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
	<div class="box-body">
		<div class="row">
			@if($edit)
			<div class="col-md-4">
				<div class="form-group">
                    <div class="input-group">
                        {!!Form::select('customer_list', $mokas_list, null, ['class'=>'customer_select2 form-control', 'placeholder'=>'Sarch Mokas','id'=>'mokas_list', 'onchange'=>'getMokasList(this.value)']) !!}
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-default" onclick="AddCustomer()">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </button>
                        </span>
                    </div><!-- /input-group -->
                </div>
			</div>
			<div class="col-md-4">
				<div class="form-group{{ $errors->has('selling_price') ? ' has-error' : '' }}">
	                {!! Form::label('selling_price', "Selling Price") !!}
	                {!! Form::text('selling_price', null, ['class'=>'form-control detail-purchasing','required','autofocus','id'=>'selling_price', 'onkeyup'=>'formatNumber(this)', 'onkeypress'=>'formatNumber(this)']) !!}
	                @if ($errors->has('selling_price'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('selling_price') }}</strong>
	                    </span>
	                @endif
	            </div>
	            <div class="form-group{{ $errors->has('discount') ? ' has-error' : '' }}">
	                {!! Form::label('discount', "Discount") !!}
	                {!! Form::text('discount', null, ['class'=>'form-control detail-purchasing','required','autofocus','id'=>'discount', 'onkeyup'=>'formatNumber(this)', 'onkeypress'=>'formatNumber(this)']) !!}
	                @if ($errors->has('discount'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('discount') }}</strong>
	                    </span>
	                @endif
	            </div>
	            <div class="form-group{{ $errors->has('note') ? ' has-error' : '' }}">
	                {!! Form::label('note', "note") !!}
	                {!! Form::textarea('note', null, ['required','autofocus','id'=>'note']) !!}
	                @if ($errors->has('note'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('note') }}</strong>
	                    </span>
	                @endif
	            </div>
			</div>
			@else
			<div class="col-md-4">
				
			</div>
			<div class="col-md-4">
				<div class="form-group{{ $errors->has('selling_price') ? ' has-error' : '' }}">
	                {!! Form::label('selling_price', "Selling Price") !!}
	                {!! Form::text('selling_price', null, ['class'=>'form-control detail-purchasing','required','autofocus','id'=>'selling_price', 'onkeyup'=>'formatNumber(this)', 'onkeypress'=>'formatNumber(this)']) !!}
	                @if ($errors->has('selling_price'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('selling_price') }}</strong>
	                    </span>
	                @endif
	            </div>
	            <div class="form-group{{ $errors->has('discount') ? ' has-error' : '' }}">
	                {!! Form::label('discount', "Discount") !!}
	                {!! Form::text('discount', null, ['class'=>'form-control detail-purchasing','required','autofocus','id'=>'discount', 'onkeyup'=>'formatNumber(this)', 'onkeypress'=>'formatNumber(this)']) !!}
	                @if ($errors->has('discount'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('discount') }}</strong>
	                    </span>
	                @endif
	            </div>
	            <div class="form-group{{ $errors->has('note') ? ' has-error' : '' }}">
	                {!! Form::label('note', "note") !!}
	                {!! Form::textarea('note', null, ['required','autofocus','id'=>'note']) !!}
	                @if ($errors->has('note'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('note') }}</strong>
	                    </span>
	                @endif
	            </div>
			</div>
			@endif
		</div>
	</div>
	<div class="box-footer">
		{!! Form::submit('save' , ['class' =>'btn btn-primary']) !!}
	</div>
</div>
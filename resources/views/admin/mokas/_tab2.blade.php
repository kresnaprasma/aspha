<div class="box-body">
	<div class="row">
    	<div class="col-md-4 col-lg-offset-1">
            <div class="form-group{{ $errors->has('stnk') ? ' has-error' : '' }}">
                {!! Form::label('stnk', "STNK") !!}
                {!! Form::text('stnk', old('stnk'), ['class'=>'form-control','required','id'=>'stnkCash']) !!}
                @if ($errors->has('stnk'))
                    <span class="help-block">
                        <strong>{{ $errors->first('stnk') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('bpkb') ? ' has-error' : '' }}">
                {!! Form::label('bpkb', "BPKB") !!}
                {!! Form::text('bpkb', old('bpkb'), ['class'=>'form-control','id'=>'bpkbCash']) !!}
                @if ($errors->has('bpkb'))
                    <span class="help-bcredittype_idlock">
                        <strong>{{ $errors->first('bpkb') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('manufacture_year') ? ' has-error' : '' }}">
                {!! Form::label('manufacture_year', "Manufacture Year") !!}
                {!! Form::selectYear('manufacture_year', 2009, date('Y'), old('manufacture_year'), ['class'=>'form-control', 'id'=>'manufactureCash']) !!}
                @if ($errors->has('manufacture_year'))
                    <span class="help-bcredittype_idlock">
                        <strong>{{ $errors->first('manufacture_year') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('stnk_due_date') ? ' has-error' : '' }}">
                {!! Form::label('stnk_due_date', 'STNK Due Date') !!}
                {!! Form::date('stnk_due_date', old('stnk_due_date'), ['class' =>'form-control', 'id'=>'stnkdateCash']) !!}
                @if ($errors->has('stnk_due_date'))
                    <span class="help-block">
                        <strong>{{ $errors->first('stnk_due_date') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('period_tax') ? ' has-error' : '' }}">
                {!! Form::label('period_tax', 'Period Tax') !!}
                {!! Form::date('period_tax', old('period_tax'), ['class' =>'form-control', 'id'=>'periodtaxCash']) !!}
                @if ($errors->has('period_tax'))
                    <span class="help-block">
                        <strong>{{ $errors->first('period_tax') }}</strong>
                    </span>
                @endif
            </div>
    	</div>
    	<div class="col-md-4">

            <div class="form-group{{ $errors->has('machine_number') ? ' has-error' : '' }}">
                {!! Form::label('machine_number', "Machine Number") !!}
                {!! Form::text('machine_number', old('machine_number'), ['class'=>'form-control','required', 'id'=>'machinenumberCash']) !!}
                @if ($errors->has('machine_number'))
                    <span class="help-block">
                        <strong>{{ $errors->first('machine_number') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('chassis_number') ? ' has-error' : '' }}">
                {!! Form::label('chassis_number', "Chassis Number") !!}
                {!! Form::text('chassis_number', old('chassis_number'), ['class'=>'form-control','required', 'id'=>'chassisnumberCash']) !!}
                @if ($errors->has('chassis_number'))
                    <span class="help-block">
                        <strong>{{ $errors->first('chassis_number') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('plat') ? ' has-error' : '' }}">
                {!! Form::label('plat', 'Plat') !!}
                {!! Form::text('plat', old('plat'), ['class' =>'form-control', 'id'=>'platCash']) !!}
                @if ($errors->has('plat'))
                    <span class="help-block">
                        <strong>{{ $errors->first('plat') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('kilometers') ? ' has-error' : '' }}">
                {!! Form::label('kilometers', 'Kilometers') !!}
                {!! Form::text('kilometers', old('kilometers'), ['class' =>'form-control', 'id'=>'kilometersCash']) !!}
                @if ($errors->has('kilometers'))
                    <span class="help-block">
                        <strong>{{ $errors->first('kilometers') }}</strong>
                    </span>
                @endif
            </div>
    	</div>
	</div>
</div>
{!! Form::close() !!}
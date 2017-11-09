<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Mokas Checklist</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toogle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
    	<div class="row">
    		@if($edit)
	    		<div class="col-md-4">
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox($mokaschecklist->checklists['Mesin'], 1) !!} Mesin
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox($mokaschecklist->checklists['Karburator'], 1) !!} Karburator
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox($mokaschecklist->checklists['Tutup Oli'], 1) !!} Tutup Oli
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox($mokaschecklist->checklists['Kabel Busi'], 1) !!} Kabel Busi
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox($mokaschecklist->checklists['Knalpot'], 1) !!} Knalpot
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox($mokaschecklist->checklists['Standar'], 1) !!} Standar
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox($mokaschecklist->checklists['Kick Stater'], 1) !!} Kick Stater
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox($mokaschecklist->checklists['Pijakan Rem'], 1) !!} Pijakan Rem
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox($mokaschecklist->checklists['Pijakan Perseneleng'], 1) !!} Pijakan Perseneleng
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox($mokaschecklist->checklists['Foot Step Depan'], 1) !!} Foot Step Depan
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox($mokaschecklist->checklists['Foot Step Belakang'], 1) !!} Foot Step Belakang
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox('rantai', 1) !!} Rantai
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox('tutup rantai', 1) !!} Tutup Rantai
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox('swing arm', 1) !!} Swing Arm
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox('gear belakang', 1) !!} Gear Belakang
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox('rem depan', 1) !!} Rem Depan
	    				</label>
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
	    		<div class="col-md-4">	
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox('rem belakang', 1) !!} Rem Belakang
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox('shock depan', 1) !!} Shock Depan
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox('shock belakang', 1) !!} Shock Belakang
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox('velg depan', 1) !!} Velg Depan
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox('velg belakang', 1) !!} Velg Belakang
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox('tanki bensin', 1) !!} Tanki Bensin
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox('cakram rem', 1) !!} Cakram Rem
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox('tutup tanki bensin', 1) !!} Tutup Tanki Bensin
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox('kunci kontak', 1) !!} Kunci Kontak
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox('speedo meter', 1) !!} Speedo Meter
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox('riting depan', 1) !!} Riting Depan
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox('riting belakang', 1) !!} Riting Belakang
	    				</label>
	    			</div>
	    		</div>
	    		<div class="col-md-4">  			
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox('lampu depan', 1) !!} Lampu Depan
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox('lampu belakang', 1) !!} Lampu Belakang
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox('stang', 1) !!} Stang
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox('spion', 1) !!} Spion
	    				</label>
	    			</div>
	    			<div class="checkbox"> 
	    				<label>
	    					{!! Form::checkbox('slebor depan', 1) !!} Slebor Depan
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox('slebor belakang', 1) !!} Slebor Belakang
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox('fairing', 1) !!} Fairing
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox('front guard sayap', 1) !!} Front Guard Sayap
	    				</label>
	    			</div>
	    			<div class="checkbox"> 
	    				<label>
	    					{!! Form::checkbox('body', 1) !!} Body
	    				</label>
	    			</div>
	    			<div class="checkbox"> 
	    				<label>
	    					{!! Form::checkbox('Strip body', 1) !!} Strip Body
	    				</label>
	    			</div>
	    			<div class="checkbox"> 
	    				<label>
	    					{!! Form::checkbox('STNK', 1) !!} STNK
	    				</label>
	    			</div>
	    			<div class="checkbox"> 
	    				<label>
	    					{!! Form::checkbox('tool kit', 1) !!} Tool Kit
	    				</label>
	    			</div>
	    			<div class="checkbox"> 
	    				<label>
	    					{!! Form::checkbox('filter udara', 1) !!} Filter Udara
	    				</label>
	    			</div>
	    			<div class="checkbox"> 
	    				<label>
	    					{!! Form::checkbox('pegangan belakang', 1) !!} Pegangan Belakang
	    				</label>
	    			</div>
	    			<div class="checkbox"> 
	    				<label>
	    					{!! Form::checkbox('peredam gas', 1) !!} Peredam Gas
	    				</label>
	    			</div>
	    			<div class="checkbox"> 
	    				<label>
	    					{!! Form::checkbox($mc, 1) !!} Klakson
	    				</label>
	    			</div>
	    		</div>
			@else
				<div class="col-md-4">
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox($mokaschecklist->checklists['Mesin'], 1) !!} Mesin
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox($mokaschecklist->checklists['Karburator'], 1) !!} Karburator
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox($mokaschecklist->checklists['Tutup Oli'], 1) !!} Tutup Oli
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox($mokaschecklist->checklists['Kabel Busi'], 1) !!} Kabel Busi
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox($mokaschecklist->checklists['Knalpot'], 1) !!} Knalpot
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox($mokaschecklist->checklists['Standar'], 1) !!} Standar
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox($mokaschecklist->checklists['Kick Stater'], 1) !!} Kick Stater
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox($mokaschecklist->checklists['Pijakan Rem'], 1) !!} Pijakan Rem
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox($mokaschecklist->checklists['Pijakan Perseneleng'], 1) !!} Pijakan Perseneleng
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox($mokaschecklist->checklists['Foot Step Depan'], 1) !!} Foot Step Depan
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox($mokaschecklist->checklists['Foot Step Belakang'], 1) !!} Foot Step Belakang
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox('rantai', 1) !!} Rantai
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox('tutup rantai', 1) !!} Tutup Rantai
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox('swing arm', 1) !!} Swing Arm
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox('gear belakang', 1) !!} Gear Belakang
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox('rem depan', 1) !!} Rem Depan
	    				</label>
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
	    		<div class="col-md-4">	
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox('rem belakang', 1) !!} Rem Belakang
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox('shock depan', 1) !!} Shock Depan
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox('shock belakang', 1) !!} Shock Belakang
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox('velg depan', 1) !!} Velg Depan
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox('velg belakang', 1) !!} Velg Belakang
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox('tanki bensin', 1) !!} Tanki Bensin
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox('cakram rem', 1) !!} Cakram Rem
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox('tutup tanki bensin', 1) !!} Tutup Tanki Bensin
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox('kunci kontak', 1) !!} Kunci Kontak
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox('speedo meter', 1) !!} Speedo Meter
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox('riting depan', 1) !!} Riting Depan
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox('riting belakang', 1) !!} Riting Belakang
	    				</label>
	    			</div>
	    		</div>
	    		<div class="col-md-4">  			
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox('lampu depan', 1) !!} Lampu Depan
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox('lampu belakang', 1) !!} Lampu Belakang
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox('stang', 1) !!} Stang
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox('spion', 1) !!} Spion
	    				</label>
	    			</div>
	    			<div class="checkbox"> 
	    				<label>
	    					{!! Form::checkbox('slebor depan', 1) !!} Slebor Depan
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox('slebor belakang', 1) !!} Slebor Belakang
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox('fairing', 1) !!} Fairing
	    				</label>
	    			</div>
	    			<div class="checkbox">
	    				<label>
	    					{!! Form::checkbox('front guard sayap', 1) !!} Front Guard Sayap
	    				</label>
	    			</div>
	    			<div class="checkbox"> 
	    				<label>
	    					{!! Form::checkbox('body', 1) !!} Body
	    				</label>
	    			</div>
	    			<div class="checkbox"> 
	    				<label>
	    					{!! Form::checkbox('Strip body', 1) !!} Strip Body
	    				</label>
	    			</div>
	    			<div class="checkbox"> 
	    				<label>
	    					{!! Form::checkbox('STNK', 1) !!} STNK
	    				</label>
	    			</div>
	    			<div class="checkbox"> 
	    				<label>
	    					{!! Form::checkbox('tool kit', 1) !!} Tool Kit
	    				</label>
	    			</div>
	    			<div class="checkbox"> 
	    				<label>
	    					{!! Form::checkbox('filter udara', 1) !!} Filter Udara
	    				</label>
	    			</div>
	    			<div class="checkbox"> 
	    				<label>
	    					{!! Form::checkbox('pegangan belakang', 1) !!} Pegangan Belakang
	    				</label>
	    			</div>
	    			<div class="checkbox"> 
	    				<label>
	    					{!! Form::checkbox('peredam gas', 1) !!} Peredam Gas
	    				</label>
	    			</div>
	    			<div class="checkbox"> 
	    				<label>
	    					{!! Form::checkbox('klakson', 1) !!} Klakson
	    				</label>
	    			</div>
	    		</div>
			@endif
    	</div>
    </div>
</div>
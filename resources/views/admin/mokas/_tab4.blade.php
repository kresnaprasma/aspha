@if($edit)
	<div class="box-body">
		<div class="row">
            <div class="form-group">
                {!! Form::text('mokascheck_no', old('mokascheck_no'), ['class'=>'form-control', 'readonly'=>'true', 'id'=>'mokascheckform']) !!}
                {!! Form::hidden('mokas_no', old('mokas_no'), ['class'=>'form-control', 'readonly'=>'true', 'id'=>'mokasform']) !!}
            </div>
	    	<div class="col-md-3">
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox($mokas->mokas_checklists['mesin'], 1) !!} Mesin
    				</label>
    			</div>
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('karburator', 1) !!} Karburator
    				</label>
    			</div>
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('tutup_oli', 1) !!} Tutup Oli
    				</label>
    			</div>
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('kabel_busi', 1) !!} Kabel Busi
    				</label>
    			</div>
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('knalpot', 1) !!} Knalpot
    				</label>
    			</div>
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('standar', 1) !!} Standar
    				</label>
    			</div>
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('kickstater', 1) !!} Kick Stater
    				</label>
    			</div>
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('pijakan_rem', 1) !!} Pijakan Rem
    				</label>
    			</div>
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('pijakan_perseneleng', 1) !!} Pijakan Perseneleng
    				</label>
    			</div>
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('footstep_depan', 1) !!} Foot Step Depan
    				</label>
    			</div>
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('footstep_belakang', 1) !!} Foot Step Belakang
    				</label>
    			</div>
    		</div>
	    	<div class="col-md-3">
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('rantai', 1) !!} Rantai
    				</label>
    			</div>
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('tutup_rantai', 1) !!} Tutup Rantai
    				</label>
    			</div>
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('swingarm', 1) !!} Swing Arm
    				</label>
    			</div>
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('gear_belakang', 1) !!} Gear Belakang
    				</label>
    			</div>
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('rem_depan', 1) !!} Rem Depan
    				</label>
    			</div>	
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('rem_belakang', 1) !!} Rem Belakang
    				</label>
    			</div>
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('shock_depan', 1) !!} Shock Depan
    				</label>
    			</div>
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('shock_belakang', 1) !!} Shock Belakang
    				</label>
    			</div>
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('velg_depan', 1) !!} Velg Depan
    				</label>
    			</div>
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('velg_belakang', 1) !!} Velg Belakang
    				</label>
    			</div>
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('tanki_bensin', 1) !!} Tanki Bensin
    				</label>
    			</div>
	    	</div>
	    	<div class="col-md-3">  
	    		<div class="checkbox">
    				<label>
    					{!! Form::checkbox('cakram_rem', 1) !!} Cakram Rem
    				</label>
    			</div>
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('tutup_tanki_bensin', 1) !!} Tutup Tanki Bensin
    				</label>
    			</div>
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('kunci_kontak', 1) !!} Kunci Kontak
    				</label>
    			</div>
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('speedo_meter', 1) !!} Speedo Meter
    				</label>
    			</div>
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('riting_depan', 1) !!} Riting Depan
    				</label>
    			</div>
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('riting_belakang', 1) !!} Riting Belakang
    				</label>
    			</div>			
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('lampu_depan', 1) !!} Lampu Depan
    				</label>
    			</div>
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('lampu_belakang', 1) !!} Lampu Belakang
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
    					{!! Form::checkbox('slebor_depan', 1) !!} Slebor Depan
    				</label>
    			</div>
    		</div>
    		<div class="col-md-3">
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('slebor_belakang', 1) !!} Slebor Belakang
    				</label>
    			</div>
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('fairing', 1) !!} Fairing
    				</label>
    			</div>
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('front_guard_sayap', 1) !!} Front Guard Sayap
    				</label>
    			</div>
    			<div class="checkbox"> 
    				<label>
    					{!! Form::checkbox('body', 1) !!} Body
    				</label>
    			</div>
    			<div class="checkbox"> 
    				<label>
    					{!! Form::checkbox('strip_body', 1) !!} Strip Body
    				</label>
    			</div>
    			<div class="checkbox"> 
    				<label>
    					{!! Form::checkbox('stnk', 1) !!} STNK
    				</label>
    			</div>
    			<div class="checkbox"> 
    				<label>
    					{!! Form::checkbox('toolkit', 1) !!} Tool Kit
    				</label>
    			</div>
    			<div class="checkbox"> 
    				<label>
    					{!! Form::checkbox('filter_udara', 1) !!} Filter Udara
    				</label>
    			</div>
    			<div class="checkbox"> 
    				<label>
    					{!! Form::checkbox('pegangan_belakang', 1) !!} Pegangan Belakang
    				</label>
    			</div>
    			<div class="checkbox"> 
    				<label>
    					{!! Form::checkbox('peredam_gas', 1) !!} Peredam Gas
    				</label>
    			</div>
    			<div class="checkbox"> 
    				<label>
    					{!! Form::checkbox('klakson', 1) !!} Klakson
    				</label>
    			</div>
    		</div>
		</div>
	</div>
@else
	<div class="box-header">
		<h3 class="box-title">Motor Checklist</b>
            {!! Form::hidden('mokascheck_no', App\MokasChecklist::Maxno(), ['class'=>'form-control', 'readonly'=>'true']) !!}
            {!! Form::hidden('mokas_no', App\Mokas::Maxno(), ['class'=>'form-control', 'readonly'=>'true']) !!}
        </h3>
        <br/>
        <br/>
        <th><input type="checkbox" id="check_all" /> Select All</th>
	</div>
	<div class="box-body">
		<div class="row">
	    	<div class="col-md-3">

    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('mesin', 1) !!} Mesin
    				</label>
    			</div>
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('karburator', 1) !!} Karburator
    				</label>
    			</div>
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('tutup_oli', 1) !!} Tutup Oli
    				</label>
    			</div>
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('kabel_busi', 1) !!} Kabel Busi
    				</label>
    			</div>
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('knalpot', 1) !!} Knalpot
    				</label>
    			</div>
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('standar', 1) !!} Standar
    				</label>
    			</div>
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('kickstater', 1) !!} Kick Stater
    				</label>
    			</div>
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('pijakan_rem', 1) !!} Pijakan Rem
    				</label>
    			</div>
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('pijakan_perseneleng', 1) !!} Pijakan Perseneleng
    				</label>
    			</div>
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('footstep_depan', 1) !!} Foot Step Depan
    				</label>
    			</div>
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('footstep_belakang', 1) !!} Foot Step Belakang
    				</label>
    			</div>
    		</div>
	    	<div class="col-md-3">
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('rantai', 1) !!} Rantai
    				</label>
    			</div>
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('tutup_rantai', 1) !!} Tutup Rantai
    				</label>
    			</div>
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('swingarm', 1) !!} Swing Arm
    				</label>
    			</div>
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('gear_belakang', 1) !!} Gear Belakang
    				</label>
    			</div>
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('rem_depan', 1) !!} Rem Depan
    				</label>
    			</div>	
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('rem_belakang', 1) !!} Rem Belakang
    				</label>
    			</div>
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('shock_depan', 1) !!} Shock Depan
    				</label>
    			</div>
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('shock_belakang', 1) !!} Shock Belakang
    				</label>
    			</div>
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('velg_depan', 1) !!} Velg Depan
    				</label>
    			</div>
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('velg_belakang', 1) !!} Velg Belakang
    				</label>
    			</div>
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('tanki_bensin', 1) !!} Tanki Bensin
    				</label>
    			</div>
	    	</div>
	    	<div class="col-md-3">  
	    		<div class="checkbox">
    				<label>
    					{!! Form::checkbox('cakram_rem', 1) !!} Cakram Rem
    				</label>
    			</div>
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('tutup_tanki_bensin', 1) !!} Tutup Tanki Bensin
    				</label>
    			</div>
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('kunci_kontak', 1) !!} Kunci Kontak
    				</label>
    			</div>
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('speedo_meter', 1) !!} Speedo Meter
    				</label>
    			</div>
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('riting_depan', 1) !!} Riting Depan
    				</label>
    			</div>
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('riting_belakang', 1) !!} Riting Belakang
    				</label>
    			</div>			
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('lampu_depan', 1) !!} Lampu Depan
    				</label>
    			</div>
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('lampu_belakang', 1) !!} Lampu Belakang
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
    					{!! Form::checkbox('slebor_depan', 1) !!} Slebor Depan
    				</label>
    			</div>
    		</div>
    		<div class="col-md-3">
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('slebor_belakang', 1) !!} Slebor Belakang
    				</label>
    			</div>
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('fairing', 1) !!} Fairing
    				</label>
    			</div>
    			<div class="checkbox">
    				<label>
    					{!! Form::checkbox('front_guard_sayap', 1) !!} Front Guard Sayap
    				</label>
    			</div>
    			<div class="checkbox"> 
    				<label>
    					{!! Form::checkbox('body', 1) !!} Body
    				</label>
    			</div>
    			<div class="checkbox"> 
    				<label>
    					{!! Form::checkbox('stripbody', 1) !!} Strip Body
    				</label>
    			</div>
    			<div class="checkbox"> 
    				<label>
    					{!! Form::checkbox('stnk', 1) !!} STNK
    				</label>
    			</div>
    			<div class="checkbox"> 
    				<label>
    					{!! Form::checkbox('toolkit', 1) !!} Tool Kit
    				</label>
    			</div>
    			<div class="checkbox"> 
    				<label>
    					{!! Form::checkbox('filter_udara', 1) !!} Filter Udara
    				</label>
    			</div>
    			<div class="checkbox"> 
    				<label>
    					{!! Form::checkbox('pegangan_belakang', 1) !!} Pegangan Belakang
    				</label>
    			</div>
    			<div class="checkbox"> 
    				<label>
    					{!! Form::checkbox('peredam_gas', 1) !!} Peredam Gas
    				</label>
    			</div>
    			<div class="checkbox"> 
    				<label>
    					{!! Form::checkbox('klakson', 1) !!} Klakson
    				</label>
    			</div>
    		</div>
		</div>
	</div>
@endif
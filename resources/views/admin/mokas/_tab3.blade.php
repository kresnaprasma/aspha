<div class="box-body">
	<div class="row">
		{!! Form::open(array('route' => 'api.uploadmokas.store', 'method'=>'POST', 'files'=>'true')) !!}
    	
    	<div class="col-md-4">
    		<label>Select image to upload:</label>
			<br/>
			{!! Form::file('mokasimage', array('class'=>'form-control')) !!}
		</div>
		<div class="col-md-4">
			<br/>
			<button type="submit" class="btn btn-primary">Upload</button>
		</div>
	</div>
	{!! Form::close() !!}

	@if (count($errors) > 0)
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
          <p class="error_item">{{ $error }}</p>
        @endforeach
    </div>
    @endif
    @if (Session::get('success'))
    
    <div class="row">
        <div class="col-md-12" style="margin-top:10px;">
	        <div class="col-md-4">
	            <strong>Upload</strong>
	        </div>
	        <div class="col-md-8">    
	            <img src="{{storage('MotorBekas/'.Session::get('filename')) }}" />
	        </div>
        </div>
    </div>
    @endif
</div>
<div class="box-footer">
    <button type="submit" class="btn btn-primary">Save
    </button>
</div>



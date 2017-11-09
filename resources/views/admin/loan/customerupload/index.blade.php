@extends('layout.admin')

@section('content')

    <div class="row">
    	<div class="col-md-12">
    		<div class="box box-primary">
    			<div class="box-header with-border">
    				<h3 class="box-title">Attachment</b></h3>
    				<div class="box-tools pull-right">
    					<button class="btn btn-box-tool" data-widget="collapse" data-toogle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
    				</div>
    			</div>
    			<div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            {!! Form::open(['route' => ['admin.loan.customerupload.store'], 'files'=>true, 'enctype' => 'multipart/form-data', 'class'=>'dropzone', 'id'=>'upload-image']) !!}
                            <div>
                                <h3>Upload Image</h3>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
    			</div>
    		</div>
    	</div>
    </div>

@stop
@extends('layout.admin')

@section('content')

    <div class="row">
    	<div class="col-md-12">
    		<div class="box box-primary">
    			<div class="box-header with-border">
    				<h3 class="box-title">Leasing - <b>{{ App\Leasing::Maxno() }}</b></h3>
    				<div class="box-tools pull-right">
                        <a href="/admin/master/leasing/">
                            {{-- <i aria-hidden="true"></i>
                            <b>Back</b> --}}
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
    					<button class="btn btn-box-tool" data-widget="collapse" data-toogle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
    				</div>
    			</div>
                {!! Form::model($leasing, ['route'=>['master.leasing.update',$leasing->id],'id'=>'formCreateLeasing','method'=>'PATCH', 'class'=>'form-horizontal']) !!}
    			<div class="box-body">
                    <form role="form">
                        @include('admin.master.leasing._form',['edit'=>true])
                    </form>
              <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                {!! Form::close() !!}
            </form>
    			</div>
    		</div>
    	</div>
    </div>

@stop
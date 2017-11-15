@extends('layout.admin')

@section('content')

    <div class="row">
    	<div class="col-md-12">
    		<div class="box box-primary">
    			<div class="box-header with-border">
    				<h3 class="box-title">Leasing - <b>{{ App\Leasing::Maxno() }}</b></h3>
    				<div class="box-tools pull-right">
                        <a href="/admin/master/leasing/">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
    					<button class="btn btn-box-tool" data-widget="collapse" data-toogle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
    				</div>
    			</div>
                {!! Form::model($leasing = new \App\Leasing, ['route'=>'master.leasing.store','id'=>'formCreateLeasing', 'class'=>'form-horizontal']) !!}
    			<div class="box-body">
                    @include('admin.master.leasing._form',['edit'=>false])
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
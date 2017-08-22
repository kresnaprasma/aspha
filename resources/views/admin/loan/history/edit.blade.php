@extends('layout.admin')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">History - <b>{{ App\History::Maxno() }}</b></h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toogle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                {!! Form::model($history = new \App\History, ['route'=>'admin.loan.history.update','id'=>'formHistory', 'class'=>'form-horizontal']) !!}
                <div class="box-body">
                    <form role="form">
                        @include('admin.loan.history._form',['edit'=>true])
                    </form>
              <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@stop
@extends('layout.admin')

@section('content')

    {!! Form::model($sales = new \App\Sales, ['route'=>'sales.store','id'=>'formSales', 'method'=> 'POST']) !!}
    <div class="row">
        <div class="col-md-12">
            @include('admin.sales._form',['edit'=>false])
        </div>
    </div>
    {!! Form::close() !!}
    @include('admin.sales._modal')
@stop

@section('scripts')
    @include('admin.sales._js')
@stop
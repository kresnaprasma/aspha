@extends('layout.admin')

@section('content')
    {!! Form::model($cash = new \App\Cash, ['route'=>'admin.cash.store','id'=>'formCash']) !!}
    <div class="row">
        <div class="col-md-12">
            @include('admin.cash._form',['edit'=>false])
        </div>
    </div>
    {!! Form::close() !!}
    @include('admin.cash._modal')
@stop

@section('scripts')
    @include('admin.cash._js')
@stop
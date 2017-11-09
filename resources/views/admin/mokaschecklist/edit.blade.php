@extends('layout.admin')

@section('content')
    {!! Form::model($mokaschecklist ,['route'=>['admin.mokaschecklist.update', $mokaschecklist->id],'id'=>'formMokasChecklist', 'method'=>'PUT']) !!}
    <div class="row">
        <div class="col-md-12">
            @include('admin.mokaschecklist._form',['edit'=>true])
        </div>
    </div>
    {!! Form::close() !!}
@stop

@section('scripts')
    @include('admin.mokaschecklist._js')
@stop
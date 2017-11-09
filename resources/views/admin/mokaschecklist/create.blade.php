@extends('layout.admin')

@section('content')

    {!! Form::model($mokaschecklist = new \App\MokasChecklist, ['route'=>'admin.mokaschecklist.store','id'=>'formMokasChecklist']) !!}
    <div class="row">
        <div class="col-md-12">
            @include('admin.mokaschecklist._form',['edit'=>false])
        </div>
    </div>
    {!! Form::close() !!}
    @include('admin.mokaschecklist._modal')
@stop

@section('scripts')
    @include('admin.mokaschecklist._js')
@stop
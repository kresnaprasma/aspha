@extends('layout.admin')

@section('content-header')
  <section class="content-header">
    <h1>
      <i class="fa fa-newspaper-o"></i> Employee Form
    </h1>
    <ol class="breadcrumb">
      <li>Human Resource</li>
      <li><a href="{{ route('human-resource.employee.index') }}">Employee</a></li>
      <li class="active">Edit</li>
    </ol>
  </section>
@stop


@section('content')
  <section class="content">
    {!! Form::model($emp, ['route' => ['human-resource.employee.update',$emp->id],'id'=>'formEmployee','method'=>'PATCH']) !!}
      @include('human-resource.employee._form',['edit'=>true])
    {!! Form::close() !!}
  </section>
@stop

@section('scripts')
  @include('human-resource.employee._js')
  <script type="text/javascript">
    getPicture();
  </script>
@stop
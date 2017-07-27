@extends('layout.admin')

@section('content')
  <section class="content">
    {!! Form::model($supplier, ['route' => ['admin.master.supplier.update', $supplier->id],'class'=>'form-horizontal','id'=>'formCreateSupplier','method'=>'PATCH']) !!}
      @include('admin.master.supplier._form',['edit'=>true])
    {!! Form::close() !!}
  </section>
@stop

@section('scripts')
  @include('admin.master.supplier._js')
@stop
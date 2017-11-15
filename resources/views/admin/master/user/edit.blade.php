@extends('layout.admin')

@section('content')
  <section class="content">
    {!! Form::model($user, ['route' => ['master.user.update', $user->id],'class'=>'form-horizontal','id'=>'formCreateUser','method'=>'PATCH']) !!}
      @include('admin.master.user._form')
    {!! Form::close() !!}
  </section>
@stop

@section('scripts')
  <script type="text/javascript">
    
  </script>
@stop
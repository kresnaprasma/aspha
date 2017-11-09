@extends('layout.admin')

@section('content-header')
  <section class="content-header">
    <h1>
      <i class="fa fa-newspaper-o"></i> Employee Form
    </h1>
    <ol class="breadcrumb">
      <li>Human Resource</li>
      <li><a href="{{ route('human-resource.employee.index') }}">Employee</a></li>
      <li class="active">Create</li>
    </ol>
  </section>
@stop


@section('content')
  <section class="content">
    {!! Form::model($emp = new \App\Employee, ['route' => 'human-resource.employee.store','id'=>'formEmployee']) !!}
      @include('human-resource.employee._form',['edit'=>false])
    {!! Form::close() !!}
  </section>
@stop

@section('scripts')
  @include('human-resource.employee._js')

  <script type="text/javascript">
    window.onbeforeunload = function (e) {
      var id = $('#id_employee').val();
      alert(checkload);
      alert(id);
      
      if (checkload == true) {
        $.ajax({
          url: '/api/human-resource/employee/'+id,
          type: 'DELETE',
          success: function(response){
            e = e || window.event;

            // For IE and Firefox prior to version 4
            if (e) {
              e.returnValue = 'Any string';
            }

            // For Safari
            return 'Any string';
          }
        });
      }
    }
    @if (!$errors->any())
      createNo();
    @else 
      getPicture();
    @endif
  </script>
@stop
{{ Form::open(['route' => ['maintainers.type-specialities.destroy', $type_speciality], 'method' => 'DELETE', 'id' => 'form-delete']) }}

    <button class="btn btn-block btn-squared btn-danger waves-effect waves-light btn-delete" data-id="{{ $type_speciality->id }}" data-toggle="modal" data-target="#mi_delete"><i class="fa fa-trash-o fa-lg"></i> Eliminar Registro</button>

{{ Form::close() }}

@include('layout.modal.delete')


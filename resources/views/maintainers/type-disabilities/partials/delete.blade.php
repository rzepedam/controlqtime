{{ Form::open(array('route' => array('maintainers.type-disabilities.destroy', $type_disability), 'method' => 'DELETE', 'id' => 'form-delete')) }}

    <button class="btn btn-block btn-squared btn-danger waves-effect waves-light btn-delete" data-id="{{ $type_disability->id }}" data-toggle="modal" data-target="#mi_delete"><i class="fa fa-trash-o fa-lg"></i> Eliminar Registro</button>

{{ Form::close() }}

@include('layout.modal.delete')


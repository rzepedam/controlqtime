{!! Form::open(['route' => ['maintainers.areas.destroy', $area], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
    <button class="btn btn-block btn-squared btn-danger waves-effect waves-light btn-delete" data-id="{{ $area->id }}" data-toggle="modal" data-target="#mi_delete"><i class="fa fa-trash-o fa-lg"></i> Eliminar Registro</button>
{!! Form::close() !!}

@include('layout.modal.delete')


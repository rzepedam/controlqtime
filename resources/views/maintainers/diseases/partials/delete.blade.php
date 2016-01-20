{!! Form::open(['route' => ['maintainers.diseases.destroy', $disease], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
    <button class="btn btn-danger btn-block btn-flat btn-delete" data-id="{{ $disease->id }}" data-toggle="modal" data-target="#mi_delete"><i class="fa fa-trash-o fa-lg"></i> Eliminar Registro</button>
{!! Form::close() !!}

@include('layout.modal.delete')


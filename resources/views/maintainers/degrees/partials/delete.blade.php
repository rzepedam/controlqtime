{!! Form::open(['route' => ['maintainers.degrees.destroy', $degree], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
    <button class="btn btn-danger btn-block btn-flat btn-delete" data-id="{{ $degree->id }}" data-toggle="modal" data-target="#mi_delete"><i class="fa fa-trash-o fa-lg"></i> Eliminar Registro</button>
{!! Form::close() !!}

@include('layout.modal.delete')


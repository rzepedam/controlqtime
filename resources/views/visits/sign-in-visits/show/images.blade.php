<div class="panel">
    <div class="panel-body">
        <div class="alert alert-alt alert-info alert-dismissible" role="alert">
            <i class="fa fa-picture-o text-info"></i> Imágenes Asociadas
        </div>
        <div class="row">
            @if ($signInVisit->imagesable->count() > 0 )
                @foreach($signInVisit->imagesable as $image)
                    <div class="col-md-3 gallery_image">
                        <a href="{{ Storage::disk('s3')->url($image->path) }}" data-lity>
                            <img src="{{ Storage::disk('s3')->url($image->path) }}" alt="" style="height: 200px">
                        </a>
                        <form action="{{ route('sign-in-visits.show', $image->id) }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-block"><i class="fa fa-trash-o text-danger" aria-hidden="true"></i></button>
                        </form>
                    </div>
                @endforeach
            @else
                <br />
                <div class="text-center">
                    <h3 class="text-info">No existen Imágenes asociadas a la Visita actual</h3>
                    <span class="note">(Debe agregar a lo menos el anverso de la cédula de identidad para activar Visita)</span>
                </div>
                <br />
            @endif
        </div>
        <br />
        <hr />
        <br />
        <div class="alert alert-alt alert-success alert-dismissible" role="alert">
            <i class="fa fa-plus-circle text-success"></i> Añadir Imágenes
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('visitsAddPhotos', $signInVisit->id) }}" method="POST" class="dropzone" id="addPhotosForm">
                    {{ csrf_field() }}
                    <div class="dz-message">
                        <h3>Arrastre sus archivos hasta aquí</h3>
                        <span class="note">También puede hacer click y seleccionar los archivos manualmente</span>
                    </div>
                </form>
            </div>
        </div>
        <br />
    </div>
</div>
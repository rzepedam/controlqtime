<div class="alert alert-alt alert-info alert-dismissible" role="alert">
    <i class="fa fa-picture-o text-info"></i> Documentación Asociada
</div>
<div class="row">
    @if ($visit->imageable->count() > 0 )
        @foreach($visit->imageable as $image)
            <div class="col-xs-12 col-sm-4 col-md-3 gallery_image">
                <a href="{{ Storage::disk('s3')->url($image->path) }}" data-lity>
                    <img src="{{ Storage::disk('s3')->url($image->path) }}" alt="" style="height: 200px">
                </a>
            </div>
        @endforeach
    @else
        <br />
        <div class="text-center">
            <h3 class="text-info">No existe documentación asociada a la Visita actual</h3>
            <span class="note">(La visita aún no ha completado el proceso de ingresar la documentación)</span>
        </div>
        <br />
        <br />
    @endif
</div>
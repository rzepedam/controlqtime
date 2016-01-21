<div class="box-header with-border">
    <h3 class="box-title">Detalle del Registro : <span class="text-primary"><strong>{{ $disease->name }}</strong></span></h3>
    <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div><!-- /.box-tools -->
</div><!-- /.box-header -->
<div class="box-body">
    {{ $disease->description }}
</div><!-- /.box-body -->
<div class="box-footer">
    <a href="{{ route('maintainers.disabilities.index') }}">Volver</a>
</div>
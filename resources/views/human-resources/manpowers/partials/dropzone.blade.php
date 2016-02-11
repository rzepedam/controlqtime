<br />
{{ Form::open(["route" => "human-resources.manpowers.store", "method" => "POST", "files" => true, "class" => "dropzone", "id" => "my-dropzone"]) }}
<div class="row">
    <div class="col-md-12">
        <div class="dz-message">
            <h3 class="text-primary">Arrastre sus archivos hasta aquí</h3>
            <span class="note">(También puede hacer click y seleccionarlos manualmente)</span>
        </div>

        <div class="dropzone-previews"></div>
    </div>
</div>
{{ Form::close() }}
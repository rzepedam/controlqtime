<div class="modal fade modal-fade-in-scale-up example-modal-lg in" id="preview_contract" aria-hidden="true" aria-labelledby="exampleOptionalLarge" role="dialog" tabindex="-1" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h3 class="modal-title text-center">Contrato Laboral</h3>
            </div>
            <ul class="nav nav-tabs nav-tabs-line" data-plugin="nav-tabs" role="tablist">
                <li class="active font-size-16" role="presentation">
                    <a data-toggle="tab" href="#exampleLine1" aria-controls="exampleLine1" role="tab" aria-expanded="true"> Información </a>
                </li>
                <li role="presentation" class="font-size-16">
                    <a data-toggle="tab" href="#exampleLine2" aria-controls="exampleLine2" role="tab" aria-expanded="false"> Cláusulas y Ob. <span class="badge badge-sm up badge-primary">1</span></a>
                </li>
                <li role="presentation" class="font-size-16">
                    <a data-toggle="tab" href="#exampleLine3" aria-controls="exampleLine3" role="tab" aria-expanded="false"> Cláusulas y Ob. <span class="badge badge-sm up badge-primary">2</span></a>
                </li>
            </ul>
            <div class="modal-body">
                <div class="tab-content padding-top-10">
                    <div class="tab-pane active" id="exampleLine1" role="tabpanel">

                        @include('human-resources.contracts.partials.previews.datos_generales')

                    </div>
                    <div class="tab-pane" id="exampleLine2" role="tabpanel">

                        @include('human-resources.contracts.partials.previews.clausulas_y_obligaciones_1')
                        <br />
                        @include('human-resources.contracts.partials.previews.clausulas_y_obligaciones_2')
                        <br />
                        @include('human-resources.contracts.partials.previews.clausulas_y_obligaciones_3')
                        <br />
                        @include('human-resources.contracts.partials.previews.clausulas_y_obligaciones_4')
                        <br />
                        @include('human-resources.contracts.partials.previews.clausulas_y_obligaciones_5')

                    </div>
                    <div class="tab-pane" id="exampleLine3" role="tabpanel">

                        @include('human-resources.contracts.partials.previews.clausulas_y_obligaciones_6')
                        <br />
                        @include('human-resources.contracts.partials.previews.clausulas_y_obligaciones_7')
                        <br />
                        @include('human-resources.contracts.partials.previews.clausulas_y_obligaciones_8')
                        <br />
                        @include('human-resources.contracts.partials.previews.clausulas_y_obligaciones_9')
                        <br />
                        @include('human-resources.contracts.partials.previews.clausulas_y_obligaciones_10')

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
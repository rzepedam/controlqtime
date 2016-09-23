@if ($errors->any())
    <div class="clearfix">
        <div class="col-md-12 col-xs-12 alert alert-danger alert-dismissible" role="alert" id="js">
            <h4><i class="icon fa fa-ban"></i> Por favor corrige los siguientes errores: </h4>
            <ul>
                @foreach($errors->all() as $error)

                    <li>{!! $error !!}</li>

                @endforeach
            </ul>
        </div>
    </div>
@endif


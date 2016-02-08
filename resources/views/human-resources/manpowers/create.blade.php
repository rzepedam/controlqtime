@extends('layout.index')

@section('css')
    {{ Html::Style('assets/css/smart_wizard.css') }}
    {{ Html::Style('assets/css/dropzone.css') }}
@stop

@section('title_header') Crear Nuevo Trabajador @stop

@section('breadcumb')
    <li><a href="{{ url('human-resources') }}"><i class="fa fa-users"></i> RR.HH</a></li>
    <li><a href="{{ route('human-resources.manpowers.index') }}"><i class="fa fa-user"></i> Trabajadores</a></li>
    <li class="active">Nuevo</li>
@stop

@section('content')

    <span class="col-md-12 alert alert-danger hide" id="js"></span>

    <div id="wizard" class="swMain">
        <ul>
            <li>
                <a href="#step-1">
                    <label class="stepNumber">1</label>
                    <span class="stepDesc">
                        Información<br />
                        <small>Personal</small>
                    </span>
                </a>
            </li>
            <li>
                <a href="#step-2">
                    <label class="stepNumber">2</label>
                    <span class="stepDesc">
                        Declaración<br />
                        <small>de Salud</small>
                    </span>
                </a>
            </li>
            <li>
                <a href="#step-3">
                    <label class="stepNumber">3</label>
                    <span class="stepDesc">
                        Competencias<br />
                        <small>Laborales</small>
                    </span>
                </a>
            </li>
        </ul>
        <div id="step-1">

            @include('human-resources.manpowers.partials.step1.personal_data')

        </div>
        <div id="step-2">

            @include('human-resources.manpowers.partials.step2.health')

        </div>
        <div id="step-3">

            @include('human-resources.manpowers.partials.step3.job_skills')

        </div>
    </div>

@stop

@section('scripts')

    {{ Html::script('assets/js/jquery.smartWizard.js') }}
    {{ Html::script('assets/js/jquery.inputmask.js') }}
    {{ Html::script('assets/js/dropzone.js') }}
    {{ Html::script('assets/js/config.js') }}

    <script type="text/javascript">

        $(document).ready(function(){

            $("#birthday").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});

            $('#wizard').smartWizard({
                transitionEffect: 'slideleft',
                labelNext:'Siguiente',
                labelPrevious:'Anterior',
                labelFinish:'Guardar',
                onLeaveStep: leaveAStepCallback,
            });

            function leaveAStepCallback(obj, context){
                return validateSteps(obj.attr('rel'));
            }

            function validateSteps(step){
                var isStepValid = true;

                if(step == 1) {
                    if(validateStep1() == false ) {
                        isStepValid = false;
                        $('#wizard').smartWizard('showMessage','Please correct the errors in step'+step+ ' and click next.');
                        $('#wizard').smartWizard('setError',{stepnum:step,iserror:true});
                    }else {
                        $('#wizard').smartWizard('setError',{stepnum:step,iserror:false});
                    }
                }

                return isStepValid;
            }

            function validateStep1(){
                var isValid = true;

                /* male_surname */
                if($('#male_surname').val() == '') {
                    isValid = false;
                    $('#js').removeClass('hide');
                    $('#male_surname').closest('div').addClass('has-error');
                    $('#male_surname').focus();
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Apellido Paterno</strong> es obligatorio').removeClass('hide');
                    return false;
                }else{
                    $('#male_surname').closest('div').removeClass('has-error');
                    $('#js').addClass('hide');
                    $('#male_surname').focus();
                }


                if($('#male_surname').val().length > 30) {
                    isValid = false;
                    $('#js').removeClass('hide');
                    $('#male_surname').closest('div').addClass('has-error');
                    $('#male_surname').focus();
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Apellido Paterno</strong> no debe ser mayor que 30 caracteres.');
                    return false;
                }else{
                    $('#male_surname').closest('div').removeClass('has-error');
                    $('#js').addClass('hide');
                    $('#male_surname').focus();
                }

                /* female_surname */
                if($('#female_surname').val() == '') {
                    isValid = false;
                    $('#js').removeClass('hide');
                    $('#female_surname').closest('div').addClass('has-error');
                    $('#female_surname').focus();
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Apellido Materno</strong> es obligatorio').removeClass('hide');
                    return false;
                }else{
                    $('#female_surname').closest('div').removeClass('has-error');
                    $('#js').addClass('hide');
                    $('#female_surname').focus();
                }


                if($('#female_surname').val().length > 30) {
                    isValid = false;
                    $('#js').removeClass('hide');
                    $('#female_surname').closest('div').addClass('has-error');
                    $('#female_surname').focus();
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Apellido Materno</strong> no debe ser mayor que 30 caracteres.');
                    return false;
                }else{
                    $('#female_surname').closest('div').removeClass('has-error');
                    $('#js').addClass('hide');
                    $('#female_surname').focus();
                }

                /* first_name */
                if($('#first_name').val() == '') {
                    isValid = false;
                    $('#js').removeClass('hide');
                    $('#first_name').closest('div').addClass('has-error');
                    $('#first_name').focus();
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Primer Nombre</strong> es obligatorio').removeClass('hide');
                    return false;
                }else{
                    $('#first_name').closest('div').removeClass('has-error');
                    $('#js').addClass('hide');
                    $('#first_name').focus();
                }


                if($('#first_name').val().length > 30) {
                    isValid = false;
                    $('#js').removeClass('hide');
                    $('#first_name').closest('div').addClass('has-error');
                    $('#first_name').focus();
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Primer Nombre</strong> no debe ser mayor que 30 caracteres.');
                    return false;
                }else{
                    $('#first_name').closest('div').removeClass('has-error');
                    $('#js').addClass('hide');
                    $('#first_name').focus();
                }

                /* second_name */
                if($('#second_name').val().length > 30) {
                    isValid = false;
                    $('#js').removeClass('hide');
                    $('#second_name').closest('div').addClass('has-error');
                    $('#second_name').focus();
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Segundo Nombre</strong> no debe ser mayor que 30 caracteres.');
                    return false;
                }else{
                    $('#second_name').closest('div').removeClass('has-error');
                    $('#js').addClass('hide');
                    $('#second_name').focus();
                }

                /* rut */
                if($('#rut').val() == '') {
                    isValid = false;
                    $('#js').removeClass('hide');
                    $('#rut').closest('div').addClass('has-error');
                    $('#rut').focus();
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Rut</strong> es obligatorio').removeClass('hide');
                    return false;
                }else{
                    $('#rut').closest('div').removeClass('has-error');
                    $('#js').addClass('hide');
                    $('#rut').focus();
                }

                /* birthday */
                if($('#birthday').val() == '') {
                    isValid = false;
                    $('#js').removeClass('hide');
                    $('#birthday').closest('div').addClass('has-error');
                    $('#birthday').focus();
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Fecha de Nacimiento</strong> es obligatorio').removeClass('hide');
                    return false;
                }else{
                    $('#birthday').closest('div').removeClass('has-error');
                    $('#js').addClass('hide');
                    $('#birthday').focus();
                }

                /* forecast */
                if($('#forecast_id').val() == '') {
                    isValid = false;
                    $('#js').removeClass('hide');
                    $('#forecast_id').closest('div').addClass('has-error');
                    $('#forecast_id').focus();
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Previsión</strong> es obligatorio').removeClass('hide');
                    return false;
                }else{
                    $('#forecast_id').closest('div').removeClass('has-error');
                    $('#js').addClass('hide');
                    $('#forecast_id').focus();
                }

                /* country */
                if($('#country_id').val() == '') {
                    isValid = false;
                    $('#js').removeClass('hide');
                    $('#country_id').closest('div').addClass('has-error');
                    $('#country_id').focus();
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Nacionalidad</strong> es obligatorio').removeClass('hide');
                    return false;
                }else{
                    $('#country_id').closest('div').removeClass('has-error');
                    $('#js').addClass('hide');
                    $('#country_id').focus();
                }

                /* gender */
                if($('#gender_id').val() == '') {
                    isValid = false;
                    $('#js').removeClass('hide');
                    $('#gender_id').closest('div').addClass('has-error');
                    $('#gender_id').focus();
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Sexo</strong> es obligatorio').removeClass('hide');
                    return false;
                }else{
                    $('#gender_id').closest('div').removeClass('has-error');
                    $('#js').addClass('hide');
                    $('#gender_id').focus();
                }

                /* rating */
                if($('#rating_id').val() == '') {
                    isValid = false;
                    $('#js').removeClass('hide');
                    $('#rating_id').closest('div').addClass('has-error');
                    $('#rating_id').focus();
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Cargo</strong> es obligatorio').removeClass('hide');
                    return false;
                }else{
                    $('#rating_id').closest('div').removeClass('has-error');
                    $('#js').addClass('hide');
                    $('#rating_id').focus();
                }

                /* subarea */
                if($('#subarea_id').val() == '') {
                    isValid = false;
                    $('#js').removeClass('hide');
                    $('#subarea_id').closest('div').addClass('has-error');
                    $('#subarea_id').focus();
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Subárea</strong> es obligatorio').removeClass('hide');
                    return false;
                }else{
                    $('#subarea_id').closest('div').removeClass('has-error');
                    $('#js').addClass('hide');
                    $('#subarea_id').focus();
                }

                /* commune */
                if($('#commune_id').val() == '') {
                    isValid = false;
                    $('#js').removeClass('hide');
                    $('#commune_id').closest('div').addClass('has-error');
                    $('#commune_id').focus();
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Comuna</strong> es obligatorio').removeClass('hide');
                    return false;
                }else{
                    $('#commune_id').closest('div').removeClass('has-error');
                    $('#js').addClass('hide');
                    $('#commune_id').focus();
                }

                /* address */
                if($('#address').val() == '') {
                    isValid = false;
                    $('#js').removeClass('hide');
                    $('#address').closest('div').addClass('has-error');
                    $('#address').focus();
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Dirección</strong> es obligatorio').removeClass('hide');
                    return false;
                }else{
                    $('#address').closest('div').removeClass('has-error');
                    $('#js').addClass('hide');
                    $('#address').focus();
                }

                /* phone1 */
                if($('#phone1').val() == '') {
                    isValid = false;
                    $('#js').removeClass('hide');
                    $('#phone1').closest('div').addClass('has-error');
                    $('#phone1').focus();
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Teléfono 1</strong> es obligatorio').removeClass('hide');
                    return false;
                }else{
                    $('#phone1').closest('div').removeClass('has-error');
                    $('#js').addClass('hide');
                    $('#phone1').focus();
                }

                if($('#phone1').val().length > 20) {
                    isValid = false;
                    $('#js').removeClass('hide');
                    $('#phone1').closest('div').addClass('has-error');
                    $('#phone1').focus();
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Teléfono 1</strong> no debe ser mayor que 20 caracteres.');
                    return false;
                }else{
                    $('#phone1').closest('div').removeClass('has-error');
                    $('#js').addClass('hide');
                    $('#phone1').focus();
                }

                /* phone2 */
                if($('#phone2').val().length > 20) {
                    isValid = false;
                    $('#js').removeClass('hide');
                    $('#phone2').closest('div').addClass('has-error');
                    $('#phone2').focus();
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Teléfono 2</strong> no debe ser mayor que 20 caracteres.');
                    return false;
                }else{
                    $('#phone2').closest('div').removeClass('has-error');
                    $('#js').addClass('hide');
                    $('#phone2').focus();
                }

                /* email */
                if($('#email').val() == '') {
                    isValid = false;
                    $('#js').removeClass('hide');
                    $('#email').closest('div').addClass('has-error');
                    $('#email').focus();
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Email</strong> es obligatorio').removeClass('hide');
                    return false;
                }else{
                    $('#email').closest('div').removeClass('has-error');
                    $('#js').addClass('hide');
                    $('#email').focus();
                }

                if($('#email').val().length > 100) {
                    isValid = false;
                    $('#js').removeClass('hide');
                    $('#email').closest('div').addClass('has-error');
                    $('#email').focus();
                    $('#js').html('<i class="fa fa-times"></i> El campo <strong>Email</strong> no debe ser mayor que 100 caracteres.');
                    return false;
                }else{
                    $('#email').closest('div').removeClass('has-error');
                    $('#js').addClass('hide');
                    $('#email').focus();
                }


                return isValid;
            }

        });

    </script>
@stop
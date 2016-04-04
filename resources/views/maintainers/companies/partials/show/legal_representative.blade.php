<?php $i = 1 ?>
@foreach($company->legalRepresentatives as $legal)
    <h3 class="text-green">Representante Legal #{{ $i }}</h3>
    <table class="table table-bordered table-striped dataTable" role="grid">
        <tbody>
        <tr>
            <td><b>Nombre</b></td>
            <td class="text-center"><i class="fa fa-user"></i> {{ $legal->full_name }}</td>
        </tr>
        <tr>
            <td><b>Email</b></td>
            <td class="text-center"><i class="fa fa-envelope"></i> {{ Html::mailto($legal->email) }}</td>
        </tr>
        <tr>
            <td><b>Teléfono 1</b></td>
            <td class="text-center"><i class="fa fa-phone"></i> {{ $legal->phone1 }}</td>
        </tr>
        <tr>
            <td><b>Fecha Nacimiento</b></td>
            <td class="text-center text-capitalize"><i class="fa fa-calendar"></i> {{ Date::parse($legal->birthday)->format('l j F Y') }}</td>
        </tr>
        <tr>
            <td class="col-md-2"><b>Rut</b></td>
            <td class="text-center">{{ $legal->rut }}</td>
        </tr>
        <tr>
            <td><b>Edad</b></td>
            <td class="text-center">{{ $legal->birthday->age . " años" }}</td>
        </tr>
        <tr>
            <td><b>Nacionalidad</b></td>
            <td class="text-center">{{ $legal->nationality->name }}</td>
        </tr>
        @if($legal->phone2)
            <tr>
                <td><b>Teléfono 2</b></td>
                <td class="text-center"> {{ $legal->phone2 }}</td>
            </tr>
        @endif
        </tbody>
    </table>
    @if ($i > 1)
        <hr />
    @endif
    <?php $i++; ?>
@endforeach
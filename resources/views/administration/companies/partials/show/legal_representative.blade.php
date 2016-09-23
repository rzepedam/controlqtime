<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-body">
                <div class="col-md-offset-1 col-md-10">
                    <table class="table table-striped table-bordered">
                        <tbody>
                            <tr>
                                <td>Nombre</td>
                                <td class="text-center">
                                    {{ $company->legalRepresentative->full_name }}
                                </td>
                            </tr>
                            <tr>
                                <td>Rut</td>
                                <td class="text-center">
                                    {{ $company->legalRepresentative->rut_representative }}
                                </td>
                            </tr>
                            <tr>
                                <td>Edad</td>
                                <td class="text-center">
                                    {{ $company->legalRepresentative->birthday->age . " años" }}
                                </td>
                            </tr>
                            <tr>
                                <td>Nacionalidad</td>
                                <td class="text-center">
                                    {{ $company->legalRepresentative->nationality->name }}
                                </td>
                            </tr>
                            <tr>
                                <td>Teléfono 1</td>
                                <td class="text-center">
                                    <i class="fa fa-phone"></i> {{ $company->legalRepresentative->phone1_representative }}
                                </td>
                            </tr>
                            @if($company->legalRepresentative->phone2_representative)
                                <tr>
                                    <td>Teléfono 2</td>
                                    <td class="text-center">
                                        {{ $company->legalRepresentative->phone2_representative }}
                                    </td>
                                </tr>
                            @endif
                            <tr>
                                <td>Email</td>
                                <td class="text-center">
                                    <i class="fa fa-envelope"></i> {{ Html::mailto($company->legalRepresentative->email_representative, null, ['class' => 'text-muted']) }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
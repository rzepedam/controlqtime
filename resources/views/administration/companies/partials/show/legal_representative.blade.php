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
                                <td>Dirección</td>
                                <td class="text-center"><i class="fa fa-map-marker"></i>
                                    {{ $company->legalRepresentative->address->address }}{{ ($company->legalRepresentative->address->detailAddressLegalEmployee->depto) ? ', Depto ' . $company->legalRepresentative->address->detailAddressLegalEmployee->depto : '' }}{{ ($company->legalRepresentative->address->detailAddressLegalEmployee->block) ? ', Block ' . $company->legalRepresentative->address->detailAddressLegalEmployee->block : '' }}{{ ($company->legalRepresentative->address->detailAddressLegalEmployee->num_home) ? ', Nº Casa ' . $company->legalRepresentative->address->detailAddressLegalEmployee->num_home : '' }}{{ ". " . $company->legalRepresentative->address->commune->name . ". " . $company->legalRepresentative->address->commune->province->name . ". " . $company->legalRepresentative->address->commune->province->region->name }}
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
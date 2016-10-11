<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-body">
                <div class="col-md-offset-1 col-md-10">
                    <table class="table table-striped table-bordered">
                        <tbody>
                            <tr>
                                <td>Tipo Empresa</td>
                                <td class="text-center">
                                    <a href="{{ route('type-companies.index') }}" class="text-muted"><i class="md-city-alt" aria-hidden="true"></i> {{ $company->typeCompany->name }}</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Razón Social</td>
                                <td class="text-center"><i class="fa fa-building-o"></i> {{ $company->firm_name }}</td>
                            </tr>
                            <tr>
                                <td class="col-md-2">Rut</td>
                                <td class="text-center">
                                    {{ $company->rut }}
                                </td>
                            </tr>
                            <tr>
                                <td>Giro</td>
                                <td class="text-center">{{ $company->gyre }}</td>
                            </tr>
                            <tr>
                                <td>Dirección</td>
                                <td class="text-center"><i class="fa fa-map-marker"></i>
                                    {{ $company->address->address }}{{ ($company->address->detailAddressCompany->lot) ? ', Lote ' . $company->address->detailAddressCompany->lot : '' }}{{ ($company->address->detailAddressCompany->bod) ? ', Bodega ' . $company->address->detailAddressCompany->bod : '' }}{{ ($company->address->detailAddressCompany->ofi) ? ', Oficina ' . $company->address->detailAddressCompany->ofi : '' }}{{ ($company->address->detailAddressCompany->floor) ? ', Piso ' . $company->address->detailAddressCompany->floor : '' }}{{ ". " . $company->address->commune->name . ", " . $company->address->commune->province->name . ". " . $company->address->commune->province->region->name }}
                                </td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td class="text-center"><i class="fa fa-envelope"></i>
                                    {{ Html::mailto($company->email_company, null, ['class' => 'text-muted']) }}
                                </td>
                            </tr>
                            <tr>
                                <td>Teléfono 1</td>
                                <td class="text-center"><i class="fa fa-phone"></i>
                                    {{ $company->address->phone1 }}
                                </td>
                            </tr>
                            @if($company->address->phone2)
                                <tr>
                                    <td>Teléfono 2</td>
                                    <td class="text-center">
                                        {{ $company->address->phone2 }}
                                    </td>
                                </tr>
                            @endif
                            <tr>
                                <td>Inicio Actividad</td>
                                <td class="text-center text-capitalize"><i class="fa fa-calendar"></i>
                                    {{ Date::parse($company->start_act)->format('l j F Y') }}
                                </td>
                            </tr>
                            <tr>
                                <td>Patente Municipal</td>
                                <td class="text-center">
                                    {{ $company->muni_license }}
                                </td>
                            </tr>
                            <tr>
                                <td class="col-md-3">Ingresado</td>
                                <td class="text-center text-capitalize">
                                    {{ Date::parse($company->created_at)->format('l j F Y H:i:s') }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
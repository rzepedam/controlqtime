<div class="panel">

    @include('human-resources.employees.partials.show.partials.ribbon-bookmark')

    <div class="panel-body">
        <br/>
        <br/>
        <div class="row">
            <div class="col-sm-offset-2 col-md-offset-2 col-sm-6 col-md-6">
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr class="text-center">
                            <td><i class="fa fa-street-view"></i>
                                {{ $employee->full_name }}
                            </td>
                        </tr>
                        <tr class="text-center">
                            <td><i class="fa fa-envelope"></i>
                                {{ Html::mailto($employee->email_employee, null, ['class' => 'text-muted']) }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center"><i class="fa fa-phone" aria-hidden="true"></i>
                                {{ $employee->address->phone1 }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center"><i class="fa fa-flag" aria-hidden="true"></i>
                                {{ $employee->nationality->name }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-3 col-md-2" style="margin-top: 3px;">
                @if (! empty($employee->url))
                    <img src="{{ $employee->url }}" alt="{{ $employee->full_name }}" width="152" height="152" class="img-bordered img-bordered-primary">
                @else
                    <img src="{{ asset('img/logo.png') }}" alt="{{ $employee->full_name }}" width="152" height="152" class="img-bordered img-bordered-primary">
                @endif
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-md-offset-1 col-md-10">
                <table class="table table-striped table-bordered">
                    <tbody>
                    <tr>
                        <td class="col-md-3">Rut</td>
                        <td class="text-center">
                            {{ $employee->rut }}
                        </td>
                    </tr>
                    <tr>
                        <td class="col-md-3">Edad</td>
                        <td class="text-center">
                            {{ $employee->birthday->age . " años" }}
                        </td>
                    </tr>
                    <tr>
                        <td class="col-md-3">Fecha de Nacimiento</td>
                        <td class="text-center text-capitalize"><i class="fa fa-calendar" aria-hidden="true"></i>
                            {{ Date::parse($employee->birthday)->format('l j F Y') }}
                        </td>
                    </tr>
                    <tr>
                        <td class="col-md-3">Género</td>
                        <td class="text-center">
                            {{ $employee->gender->name }}
                        </td>
                    </tr>
                    <tr>
                        <td class="col-md-3">Estado Civil</td>
                        <td class="text-center">{{ $employee->maritalStatus->name }}</td>
                    </tr>
                    <tr>
                        <td class="col-md-3">Previsión</td>
                        <td class="text-center">{{ $employee->forecast->name }}</td>
                    </tr>
                    <tr>
                        <td class="col-md-3">AFP</td>
                        <td class="text-center">{{ $employee->pension->name }}</td>
                    </tr>
                    <tr>
                        <td class="col-md-3">Domicilio</td>
                        <td class="text-center"><i class="fa fa-map-marker" aria-hidden="true"></i>
                            {{ $employee->address->address }}{{ ($employee->address->detailAddressLegalEmployee->depto) ? ', Depto ' . $employee->address->detailAddressLegalEmployee->depto : '' }}{{ ($employee->address->detailAddressLegalEmployee->block) ? ', Block ' . $employee->address->detailAddressLegalEmployee->block : '' }}{{ ($employee->address->detailAddressLegalEmployee->num_home) ? ', Nº Casa ' . $employee->address->detailAddressLegalEmployee->num_home : '' }}{{ ". " . $employee->address->commune->name . ". " . $employee->address->commune->province->name . ". " . $employee->address->commune->province->region->name }}
                        </td>
                    </tr>
                    @if ($employee->address->phone2)
                        <tr>
                            <td class="col-md-3">Teléfono 2</td>
                            <td class="text-center">
                                {{ $employee->address->phone2 }}
                            </td>
                        </tr>
                    @endif
                    <tr>
                        <td class="col-md-3">Ingresado</td>
                        <td class="text-center text-capitalize">
                            {{ Date::parse($employee->created_at)->format('l j F Y H:i:s') }}
                        </td>
                    </tr>
                    <tr>
                        <td class="col-md-3">Actualizado</td>
                        <td class="text-center text-capitalize">
                            {{ Date::parse($employee->updated_at)->format('l j F Y H:i:s') }}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <br/>
    <div class="table-responsive">

        <div class="col-md-offset-1 col-md-10">
            <?php $i = 1; ?>
            <table class="table table-striped table-bordered">
                <tbody>
                <tr class="text-center success">
                    <td class="col-md-12" colspan="6"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        Información de Contacto
                    </td>
                </tr>
                @if (count($employee->contactEmployees) > 0)
                    <tr class="active">
                        <th class="col-md-1 text-center"><i class="fa fa-hashtag"></i></th>
                        <th class="col-md-1 text-center">Parentesco</th>
                        <th class="col-md-3 text-center">Nombre</th>
                        <th class="col-md-3 text-center">Email</th>
                        <th class="col-md-4 text-center">Dirección</th>
                        <th class="col-md-1 text-center">Teléfono</th>
                    </tr>
                    @foreach($employee->contactEmployees as $contact_employee)
                        <tr>
                            <td class="text-center">{{ $i }}</td>
                            <td class="text-center">{{ $contact_employee->relationship->name }}</td>
                            <td class="text-center">{{ $contact_employee->name_contact }}</td>
                            <td class="text-center">{{ Html::mailto($contact_employee->email_contact, null, ['class' => 'text-muted']) }}</td>
                            <td class="text-center">{{ $contact_employee->address_contact }}</td>
                            <td class="text-center">{{ $contact_employee->tel_contact }}</td>
                        </tr>
                        <?php $i ++; ?>
                    @endforeach
                @else
                    <tr>
                        <td style="border-bottom: hidden; background-color: #FAFAFA"></td>
                    </tr>
                    <tr>
                        <td colspan="6" class="text-center font-size-18">
                            No existe Información de Contacto Asociada
                        </td>
                    </tr>
                    <tr>
                        <td style="border-top: hidden; background-color: #FAFAFA"></td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
    <br/>
    <div class="table-responsive">
        <div class="col-md-offset-1 col-md-10">
            <?php $i = 1; ?>
            <table class="table table-striped table-bordered">
                <tbody>
                <tr class="text-center warning">
                    <td class="col-md-12" colspan="3"><i class="md-male-female font-size-18"></i>
                        Parentescos Familiares
                    </td>
                </tr>
                @if (count($employee->familyRelationships) > 0)
                    <tr class="active">
                        <th class="col-md-1 text-center"><i class="fa fa-hashtag"></i></th>
                        <th class="col-md-3 text-center">Relación</th>
                        <th class="col-md-8 text-center">Trabajador</th>
                    </tr>
                    @foreach($employee->familyRelationships as $family_relationship)
                        <tr>
                            <td class="text-center">{{ $i }}</td>
                            <td class="text-center">{{ $family_relationship->relationship->name }}</td>
                            <td class="text-center">{{ $family_relationship->employeeFamily->full_name }}</td>
                        </tr>
                        <?php $i ++; ?>
                    @endforeach
                @else
                    <tr>
                        <td style="border-bottom: hidden; background-color: #FAFAFA"></td>
                    </tr>
                    <tr>
                        <td colspan="5" class="text-center font-size-18">
                            No existen Parentescos Familiares Asociados
                        </td>
                    </tr>
                    <tr>
                        <td style="border-top: hidden; background-color: #FAFAFA"></td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
    <br/>
</div>
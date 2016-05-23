<div class="row">
    <div class="col-md-12">
        <div class="panel">

            @include('human-resources.employees.partials.show.partials.ribbon-bookmark')

            <div class="panel-body">
                <br />
                <br />
                <br />
                <div class="table-responsive">
                    <div class="row">
                        <div class="col-md-offset-1 col-md-10">
                            <table class="table table-striped table-bordered">
                                <?php $i = 1; ?>
                                <tbody>

                                    <tr class="text-center info">
                                        <td class="col-md-12" colspan="5"><i class="icon md-library font-size-18"></i> Estudios Académicos</td>
                                    </tr>

                                    @if (count($employee->studies) > 0)
                                        <tr class="active">
                                            <th class="col-md-1 text-center"><i class="fa fa-hashtag"></i></th>
                                            <th class="col-md-2 text-center">Grado Académico</th>
                                            <th class="col-md-4 text-center">Estudio</th>
                                            <th class="col-md-3 text-center">Universidad</th>
                                            <th class="col-md-2 text-center">Fecha Obtención</th>
                                        </tr>

                                        @foreach($employee->studies as $study)

                                            <tr>
                                                <td class="text-center">{{ $i }}</td>
                                                <td class="text-center">{{ $study->degree->name }}</td>
                                                <td class="text-center">{{ $study->name_study }}</td>
                                                <td class="text-center">{{ $study->institution->name }}</td>
                                                <td class="text-center">{{ $study->date_obtention->format('d-m-Y') }}</td>

                                            </tr>
                                            <?php $i++; ?>

                                        @endforeach
                                    @else
                                        <tr>
                                            <td style="border-bottom: hidden; background-color: #FAFAFA"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="5" class="text-center font-size-18">
                                                No existen Estudios Académicos Asociados
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-top: hidden; background-color: #FAFAFA"></td>
                                        </tr>
                                    @endif

                                </tbody>
                            </table>
                            <br />
                            <br />
                            <table class="table table-striped table-bordered">
                                <tbody>
                                    <?php $i = 1; ?>
                                    <tr class="text-center danger">
                                        <td class="col-md-12" colspan="5"><i class="icon md-badge-check font-size-18"></i> Certificaciones</td>
                                    </tr>

                                    @if (count($employee->certifications) > 0)
                                        <tr class="active">
                                            <th class="col-md-1 text-center"><i class="fa fa-hashtag"></i></th>
                                            <th class="col-md-4 text-center">Certificación</th>
                                            <th class="col-md-2 text-center">Emisión</th>
                                            <th class="col-md-2 text-center">Expiración</th>
                                            <th class="col-md-3 text-center">Institución</th>
                                        </tr>

                                        @foreach($employee->certifications as $certification)

                                            <tr>
                                                <td class="text-center">{{ $i }}</td>
                                                <td class="text-center">{{ $certification->typeCertification->name }}</td>
                                                <td class="text-center">{{ $certification->emission_certification->format('d-m-Y') }}</td>
                                                <td class="text-center">{{ $certification->expired_certification->format('d-m-Y') }}</td>
                                                <td class="text-center">{{ $certification->institution->name }}</td>

                                            </tr>
                                            <?php $i++; ?>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td style="border-bottom: hidden; background-color: #FAFAFA"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="5" class="text-center font-size-18">
                                                No existen Certificaciones Asociadas
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-top: hidden; background-color: #FAFAFA"></td>
                                        </tr>
                                    @endif

                                </tbody>
                            </table>
                            <br />
                            <br />
                            <table class="table table-striped table-bordered">
                                <tbody>
                                    <?php $i = 1; ?>
                                    <tr class="text-center warning">
                                        <td class="col-md-12" colspan="5"><i class="fa fa-wrench"></i> Especialidades</td>
                                    </tr>

                                    @if (count($employee->specialities) > 0)
                                        <tr class="active">
                                            <th class="col-md-1 text-center"><i class="fa fa-hashtag"></i></th>
                                            <th class="col-md-4 text-center">Especialidad</th>
                                            <th class="col-md-2 text-center">Emisión</th>
                                            <th class="col-md-2 text-center">Expiración</th>
                                            <th class="col-md-3 text-center">Institución</th>
                                        </tr>

                                        @foreach($employee->specialities as $speciality)

                                            <tr>
                                                <td class="text-center">{{ $i }}</td>
                                                <td class="text-center">{{ $speciality->typeSpeciality->name }}</td>
                                                <td class="text-center">{{ $speciality->emission_speciality->format('d-m-Y') }}</td>
                                                <td class="text-center">{{ $speciality->expired_speciality->format('d-m-Y') }}</td>
                                                <td class="text-center">{{ $speciality->institution->name }}</td>
                                            </tr>
                                            <?php $i++; ?>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td style="border-bottom: hidden; background-color: #FAFAFA"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="5" class="text-center font-size-18">
                                                No existen Especialidades Asociadas
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-top: hidden; background-color: #FAFAFA"></td>
                                        </tr>
                                    @endif

                                </tbody>
                            </table>
                            <br />
                            <br />
                            <table class="table table-striped table-bordered">
                                <tbody>
                                    <?php $i = 1; ?>
                                    <tr class="text-center success">
                                        <td class="col-md-12" colspan="6"><i class="fa fa-bookmark"></i> Licencias Profesionales</td>
                                    </tr>

                                    @if (count($employee->professionalLicenses) > 0)
                                        <tr class="active">
                                            <th class="col-md-1 text-center"><i class="fa fa-hashtag"></i></th>
                                            <th class="col-md-3 text-center">Licencia Profesional</th>
                                            <th class="col-md-2 text-center">Emisión</th>
                                            <th class="col-md-2 text-center">Expiración</th>
                                            <th class="col-md-1 text-center">Donante</th>
                                            <th class="col-md-3 text-center">Observación</th>
                                        </tr>

                                        @foreach($employee->professionalLicenses as $license)

                                            <tr>
                                                <td class="text-center">{{ $i }}</td>
                                                <td class="text-center">{{ $license->typeProfessionalLicense->name }}</td>
                                                <td class="text-center">{{ $license->emission_license->format('d-m-Y') }}</td>
                                                <td class="text-center">{{ $license->expired_license->format('d-m-Y') }}</td>

                                                @if ($license->is_donor)
                                                    <td class="text-center text-success"><i class="fa fa-check-circle font-size-18"></i></td>
                                                @else
                                                    <td class="text-center text-danger"><i class="fa fa-times-circle font-size-18"></i></td>
                                                @endif

                                                @if ($license->detail_license)
                                                    <td class="text-center">{{ $license->detail_license }}</td>
                                                @else
                                                    <td class="text-center">No puntualiza</td>
                                                @endif
                                            </tr>
                                            <?php $i++; ?>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td style="border-bottom: hidden; background-color: #FAFAFA"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="5" class="text-center font-size-18">
                                                No existen Licencias Profesionales Asociadas
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
                </div>
            </div>
        </div>
    </div>
</div>
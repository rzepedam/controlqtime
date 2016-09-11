<div class="row">
    <div class="col-md-12">
        <div class="panel">

            @include('human-resources.employees.partials.show.partials.ribbon-bookmark')

            <div class="panel-body">
                <br />
                <br />
                <br />
                <div class="table-responsive">
                    <div class="col-md-offset-1 col-md-10">
                        <table class="table table-striped table-bordered">
                            <tbody>
                                <?php $i = 1; ?>
                                <tr class="text-center warning">
                                    <td class="col-md-12" colspan="4"><i class="fa fa-wheelchair"></i> Discapacidades</td>
                                </tr>

                                @if (count($employee->disabilities) > 0)
                                    <tr class="active">
                                        <th class="col-md-1 text-center"><i class="fa fa-hashtag"></i></th>
                                        <th class="col-md-3 text-center">Discapacidad</th>
                                        <th class="col-md-1 text-center">Tratamiento</th>
                                        <th class="col-md-7 text-center">Observación</th>
                                    </tr>

                                    @foreach($employee->disabilities as $disability)

                                        <tr>
                                            <td class="text-center">{{ $i }}</td>
                                            <td class="text-center">{{ $disability->typeDisability->name }}</td>

                                            @if($disability->treatment_disability)
                                                <td class="text-center text-success"><i class="fa fa-check-circle font-size-18"></i></td>
                                            @else
                                                <td class="text-center text-danger"><i class="fa fa-times-circle font-size-18"></i></td>
                                            @endif

                                            @if ($disability->detail_disability)
                                                <td class="text-center">{{ $disability->detail_disability }}</td>
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
                                            No existen Discapacidades Asociadas
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
                                    <td class="col-md-12" colspan="4"><i class="fa fa-bed"></i> Enfermedades</td>
                                </tr>

                                @if (count($employee->diseases) > 0)
                                    <tr class="active">
                                        <th class="col-md-1 text-center"><i class="fa fa-hashtag"></i></th>
                                        <th class="col-md-3 text-center">Enfermedad</th>
                                        <th class="col-md-1 text-center">Tratamiento</th>
                                        <th class="col-md-7 text-center">Observación</th>
                                    </tr>

                                    @foreach($employee->diseases as $disease)

                                        <tr>
                                            <td class="text-center">{{ $i }}</td>
                                            <td class="text-center">{{ $disease->typeDisease->name }}</td>

                                            @if($disease->treatment_disease)
                                                <td class="text-center text-success"><i class="fa fa-check-circle font-size-18"></i></td>
                                            @else
                                                <td class="text-center text-danger"><i class="fa fa-times-circle font-size-18"></i></td>
                                            @endif

                                            @if ($disease->detail_disease)
                                                <td class="text-center">{{ $disease->detail_disease }}</td>
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
                                            No existen Enfermedades Asociadas
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
                                <tr class="text-center info">
                                    <td class="col-md-12" colspan="4"><i class="fa fa-stethoscope"></i> Exámenes Preocupacionales</td>
                                </tr>

                                @if (count($employee->exams) > 0)
                                    <tr class="active">
                                        <th class="col-md-1 text-center"><i class="fa fa-hashtag"></i></th>
                                        <th class="col-md-3 text-center">Examen Preocupacional</th>
                                        <th class="col-md-2 text-center">Expiración</th>
                                        <th class="col-md-6 text-center">Observación</th>
                                    </tr>

                                    @foreach($employee->exams as $exam)

                                        <tr>
                                            <td class="text-center">{{ $i }}</td>
                                            <td class="text-center">{{ $exam->typeExam->name }}</td>
                                            <td class="text-center">{{ $exam->expired_exam->format('d-m-Y') }}</td>

                                            @if ($exam->detail_exam)
                                                <td class="text-center">{{ $exam->detail_exam }}</td>
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
                                            No existen Exámenes Preocupacionales Asociados
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
                                    <td class="col-md-12" colspan="4"><i class="fa fa-child"></i> Cargas Familiares</td>
                                </tr>

                                @if (count($employee->familyResponsabilities) > 0)
                                    <tr class="active">
                                        <th class="col-md-1 text-center"><i class="fa fa-hashtag"></i></th>
                                        <th class="col-md-6 text-center">Nombre</th>
                                        <th class="col-md-2 text-center">Rut</th>
                                        <th class="col-md-3 text-center">Relación</th>
                                    </tr>

                                    @foreach($employee->familyResponsabilities as $family_responsability)

                                        <tr>
                                            <td class="text-center">{{ $i }}</td>
                                            <td class="text-center">{{ $family_responsability->name_responsability }}</td>
                                            <td class="text-center">{{ $family_responsability->rut_responsability }}</td>
                                            <td class="text-center">{{ $family_responsability->relationship->name }}</td>
                                        </tr>
                                        <?php $i++; ?>
                                    @endforeach
                                @else
                                    <tr>
                                        <td style="border-bottom: hidden; background-color: #FAFAFA"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="text-center font-size-18">
                                            No existen Cargas Familiares Asociadas
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
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="ribbon ribbon-bookmark ribbon-reverse ribbon-info">
                <span class="ribbon-inner"><i class="fa fa-gift"></i> {{ "Miembro hace " . \Carbon\Carbon::now()->diffInYears($manpower->created_at) . " años" }}</span>
            </div>
            <div class="ribbon ribbon-bookmark ribbon-info">
                <span class="ribbon-inner">COD REF : 234568765434567</span>
            </div>
            <div class="panel-body">
                <br />
                <br />
                <br />
                <div class="table-responsive">
                    <div class="row">
                        <div class="col-md-offset-1 col-md-10">
                            <table class="table table-striped table-bordered">
                                <tbody>

                                    <?php $i = 1; ?>
                                    <tr class="text-center warning">
                                        <td class="col-md-12" colspan="4"><i class="fa fa-wheelchair"></i> Discapacidades</td>
                                    </tr>
                                    <tr class="active">
                                        <th class="col-md-1 text-center"><i class="fa fa-hashtag"></i></th>
                                        <th class="col-md-3 text-center">Discapacidad</th>
                                        <th class="col-md-1 text-center">Tratamiento</th>
                                        <th class="col-md-7 text-center">Observación</th>
                                    </tr>

                                    @foreach($manpower->disabilities as $disability)

                                        <tr>
                                            <td class="text-center">{{ $i }}</td>
                                            <td class="text-center">{{ $disability->typeDisability->name }}</td>
                                            @if($disability->treatment_disability == true)
                                                <td class="text-center text-success"><i class="fa fa-check-circle font-size-18"></i></td>
                                            @else
                                                <td class="text-center text-danger"><i class="fa fa-times-circle font-size-18"></i></td>
                                            @endif
                                            <td class="text-center">{{ $disability->detail_disability }}</td>
                                        </tr>
                                        <?php $i++; ?>
                                    @endforeach

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
                                    <tr class="active">
                                        <th class="col-md-1 text-center"><i class="fa fa-hashtag"></i></th>
                                        <th class="col-md-3 text-center">Enfermedad</th>
                                        <th class="col-md-1 text-center">Tratamiento</th>
                                        <th class="col-md-7 text-center">Observación</th>
                                    </tr>

                                    @foreach($manpower->diseases as $disease)

                                        <tr>
                                            <td class="text-center">{{ $i }}</td>
                                            <td class="text-center">{{ $disease->typeDisease->name }}</td>
                                            @if($disease->treatment_disease == true)
                                                <td class="text-center text-success"><i class="fa fa-check-circle font-size-18"></i></td>
                                            @else
                                                <td class="text-center text-danger"><i class="fa fa-times-circle font-size-18"></i></td>
                                            @endif
                                            <td class="text-center">{{ $disease->detail_disease }}</td>
                                        </tr>
                                        <?php $i++; ?>
                                    @endforeach

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
                                    <tr class="active">
                                        <th class="col-md-1 text-center"><i class="fa fa-hashtag"></i></th>
                                        <th class="col-md-3 text-center">Examen Preocupacional</th>
                                        <th class="col-md-2 text-center">Expiración</th>
                                        <th class="col-md-6 text-center">Observación</th>
                                    </tr>

                                    @foreach($manpower->exams as $exam)

                                        <tr>
                                            <td class="text-center">{{ $i }}</td>
                                            <td class="text-center">{{ $exam->typeExam->name }}</td>
                                            <td class="text-center">{{ $exam->expired_exam->format('d-m-Y') }}</td>
                                            <td class="text-center">{{ $exam->detail_exam }}</td>
                                        </tr>
                                        <?php $i++; ?>
                                    @endforeach

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
                                <tr class="active">
                                    <th class="col-md-1 text-center"><i class="fa fa-hashtag"></i></th>
                                    <th class="col-md-6 text-center">Nombre</th>
                                    <th class="col-md-2 text-center">Rut</th>
                                    <th class="col-md-3 text-center">Relación</th>
                                </tr>

                                @foreach($manpower->familyResponsabilities as $family_responsability)

                                    <tr>
                                        <td class="text-center">{{ $i }}</td>
                                        <td class="text-center">{{ $family_responsability->name_responsability }}</td>
                                        <td class="text-center">{{ $family_responsability->rut }}</td>
                                        <td class="text-center">{{ $family_responsability->relationship->name }}</td>
                                    </tr>
                                    <?php $i++; ?>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
                                <?php $i = 1; ?>
                                <tbody>

                                    <tr class="text-center info">
                                        <td class="col-md-12" colspan="5"><i class="icon md-library font-size-18"></i> Estudios Académicos</td>
                                    </tr>
                                    <tr class="active">
                                        <th class="col-md-1 text-center"><i class="fa fa-hashtag"></i></th>
                                        <th class="col-md-2 text-center">Grado Académico</th>
                                        <th class="col-md-4 text-center">Estudio</th>
                                        <th class="col-md-3 text-center">Universidad</th>
                                        <th class="col-md-2 text-center">Fecha Obtención</th>
                                    </tr>

                                    @foreach($manpower->studies as $study)

                                        <tr>
                                            <td class="text-center">{{ $i }}</td>
                                            <td class="text-center">{{ $study->degree->name }}</td>
                                            <td class="text-center">{{ $study->name_study }}</td>
                                            <td class="text-center">{{ $study->institution->name }}</td>
                                            <td class="text-center">{{ $study->date_obtention->format('d-m-Y') }}</td>

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
                                        <td class="col-md-12" colspan="4"><i class="icon md-badge-check font-size-18"></i> Certificaciones</td>
                                    </tr>
                                    <tr class="active">
                                        <th class="col-md-1 text-center"><i class="fa fa-hashtag"></i></th>
                                        <th class="col-md-4 text-center">Certificación</th>
                                        <th class="col-md-2 text-center">Expiración</th>
                                        <th class="col-md-5 text-center">Institución</th>
                                    </tr>

                                    @foreach($manpower->certifications as $certification)

                                        <tr>
                                            <td class="text-center">{{ $i }}</td>
                                            <td class="text-center">{{ $certification->typeCertification->name }}</td>
                                            <td class="text-center">{{ $certification->expired_certification->format('d-m-Y') }}</td>
                                            <td class="text-center">{{ $certification->institution->name }}</td>

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
                                <tr class="text-center warning">
                                    <td class="col-md-12" colspan="4"><i class="fa fa-wrench"></i> Especialidades</td>
                                </tr>
                                <tr class="active">
                                    <th class="col-md-1 text-center"><i class="fa fa-hashtag"></i></th>
                                    <th class="col-md-4 text-center">Especialidad</th>
                                    <th class="col-md-2 text-center">Expiración</th>
                                    <th class="col-md-5 text-center">Institución</th>
                                </tr>

                                @foreach($manpower->specialities as $speciality)

                                    <tr>
                                        <td class="text-center">{{ $i }}</td>
                                        <td class="text-center">{{ $speciality->typeSpeciality->name }}</td>
                                        <td class="text-center">{{ $speciality->expired_speciality->format('d-m-Y') }}</td>
                                        <td class="text-center">{{ $speciality->institution->name }}</td>
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
                                    <td class="col-md-12" colspan="4"><i class="fa fa-bookmark"></i> Licencias Profesionales</td>
                                </tr>
                                <tr class="active">
                                    <th class="col-md-1 text-center"><i class="fa fa-hashtag"></i></th>
                                    <th class="col-md-4 text-center">Licencia Profesional</th>
                                    <th class="col-md-2 text-center">Expiración</th>
                                    <th class="col-md-5 text-center">Observación</th>
                                </tr>

                                @foreach($manpower->professionalLicenses as $license)

                                    <tr>
                                        <td class="text-center">{{ $i }}</td>
                                        <td class="text-center">{{ $license->typeProfessionalLicense->name }}</td>
                                        <td class="text-center">{{ $license->expired_license->format('d-m-Y') }}</td>
                                        <td class="text-center">{{ $license->detail_license }}</td>
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
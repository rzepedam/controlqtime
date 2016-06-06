@if ($employee->num_certifications > 0)
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <strong>#</strong> Certificaciones [{{ $employee->num_certifications }}]
                    </h3>
                </div>
                <div class="panel-body">
                    <br />
                    @for ($i = 0; $i < $employee->num_certifications; $i++)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-dark">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <strong>#</strong> {{ $i + 1 }}
                                        </h3>
                                    </div>
                                    <div class="panel-body">

                                        <br />
                                        <input id="certification{{ $i }}" type="file" class="file-loading" multiple>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
    <br />
@endif
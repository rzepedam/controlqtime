@if ($employee->num_exams > 0)
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <strong>#</strong> Exámenes Preocupacionales [{{ $employee->num_exams }}]
                    </h3>
                </div>
                <div class="panel-body">
                    <br />
                    @for ($i = 0; $i < $employee->num_exams; $i++)
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
                                        <input id="exam{{ $i }}" type="file" class="file-loading" multiple>

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
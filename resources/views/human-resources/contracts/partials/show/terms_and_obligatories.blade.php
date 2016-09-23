<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-offset-1 col-md-10">
                        <ul class="list-task list-group">
                            @foreach($contract->termsAndObligatories as $termAndObligatory)
                                <li class="list-group-item task-done">
                                    <div class="checkbox-custom checkbox-primary text-justify">
                                        <input type="checkbox" id="{{ $termAndObligatory->id }}" checked="checked" disabled>
                                        <label for="{{ $termAndObligatory->id }}">
                                            <span class="text-justify">{{ $termAndObligatory->name }}</span>
                                        </label>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
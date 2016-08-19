@php ($i = 0)
<ul class="list-task list-group margin_terms_and_obligatories">
    @foreach($termsAndObligatories as $termAndObligatory)
        <li class="list-group-item task-done">
            <div class="checkbox-custom checkbox-primary text-justify">
                <input type="checkbox" id="default{{ $i }}" name="default" {{ ($termAndObligatory->default) ? 'checked' : null }}>
                <label for="default{{ $i }}">
                    <span>{{ $termAndObligatory->name }}</span>
                </label>
            </div>
        </li>
        @php ($i ++)

    @endforeach
</ul>
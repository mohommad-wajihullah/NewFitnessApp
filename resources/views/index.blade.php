
<form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="dropdown-item">Logout</button>
        </form>
        <select id="bodyPart" name="part_id" class="form-control">
            <option value="">Select Body Part</option>
            @foreach($bodyParts as  $bodyPart)
                <option value="{{ $bodyPart->id }}">{{ $bodyPart->name }}</option>
            @endforeach
        </select>
        <select id="exercise" name="exercise_id" class="form-control">
            <option value="">Select Exercise</option>
        </select>
<select id="bodyLevel" name="level_id" class="form-control">
    <option value="">Select Body Level</option>
    @foreach($bodyLevels as $bodyLevel)
        <option value="{{ $bodyLevel->id }}">{{ $bodyLevel->name }}</option>
    @endforeach
</select>

<select id="levelExercise" name="exercise_id" class="form-control">
    <option value="">Select Exercise</option>
</select>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
            $('#bodyPart').on('change', function () {
                let id = $(this).val();
                $.get(`/get-exercises/${id}`, function(data) {
                    let $exercise = $('#exercise');
                    $exercise.empty().append('<option value="">Select Exercise</option>');
                    $.each(data, function(i, item){
                        $exercise.append(`<option value="${item.id}">${item.title}</option>`);
                    });
                });
            });



            $('#bodyLevel').on('change', function () {
                let id = $(this).val();
                $.get(`/get-exercises/${id}`, function(data){
                    let $levelExercise = $('#levelExercise');
                    $levelExercise.empty().append('<option value="">Select Exercise</option>');
                    $.each(data, function(i, item){
                        $levelExercise.append(`<option value="${item.id}">${item.title}</option>`);
                    });
                });
            });



    // OPTIONAL: If editing an exercise, pre-load its data
    $(document).ready(function(){
        let initialBodyPartId = $('#bodyPart').val();
        let initialBodyLevelId = $('#bodyLevel').val();
        let selectedExerciseId = $('#exercise').data('selected'); // set via Blade: data-selected="{{ $exercise->id ?? '' }}"
        let selectedLevelExerciseId = $('#levelExercise').data('selected');
        if(initialBodyPartId) loadExercises(initialBodyPartId, selectedExerciseId);
        if(initialBodyLevelId) loadLevelExercises(initialBodyLevelId, selectedLevelExerciseId);
    });
</script>



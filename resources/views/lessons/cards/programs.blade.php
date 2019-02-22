<div class="card">
    <div class="card-header">
        Программы
    </div>
    <div class="card-body" v-for='(program, i) in programs'>

        <textarea :name="`programs[${i}][program]`" v-model="program.program"
        type="text" class="form-control form-control-lg" id="description" placeholder="Описание"></textarea>

        @foreach($roles as $role)
        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <div class="input-group-text">

                <input type="checkbox" aria-label="Checkbox for following text input"
                v-model="program['{{$role->role}}']" :name="`programs[${i}][{{$role->role}}]`">

              </div>
            </div>
            <input type="text" class="form-control" aria-label="Text input with checkbox" 
            value='{{$role->name}}' disabled>
        </div>
        @endforeach

        <a class="btn btn-danger" 
        @click="delProgram(i)">Удалить</a>

    </div>
    <div style='width: 300px; max-width: 100%'>

       <a class="btn btn-success" style='margin-bottom: 10px;margin-left: 19px;' 
       @click='addProgram()'>Добавить</a>

    </div>
</div>
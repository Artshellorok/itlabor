<div class="card">
    <div class="card-header">
        Ссылки
    </div>
    <div class="card-body" v-for='(link, count) in links'>

        <input v-model="link.link" :name="`links[${count}][link]`" 
        type="text" class="form-control form-control-lg" id="description" placeholder="Описание">

        @foreach($roles as $role)
        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <div class="input-group-text">

                <input type="checkbox" aria-label="Checkbox for following text input"
                v-model="link['{{$role->role}}']" :name="`links[${count}][{{$role->role}}]`">

              </div>
            </div>
            <input type="text" class="form-control" aria-label="Text input with checkbox"
            value='{{$role->name}}' disabled>
        </div>
        @endforeach

        <a class="btn btn-danger" 
        @click="delLink(count)">Удалить</a>

    </div>
    <div style='width: 300px; max-width: 100%'>

       <a class="btn btn-success" style='margin-bottom: 10px;margin-left: 19px;' 
       @click='addLink'>Добавить</a>

    </div>
</div>
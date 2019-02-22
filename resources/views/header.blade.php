<nav class="navbar navbar-expand-sm navbar-dark bg-primary">
    <a class="navbar-brand" href="#">Some brand</a>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="/dashboard">Главная</a>
            </li>
            @role('teacher')
            <li class="nav-item">
                <a class="nav-link" href="/lessons/create">Добавить урок</a>
            </li>
            @endrole
            <li class="nav-item">
                <a class="nav-link" href="/lessons/">Просмотреть уроки</a>
            </li>
            @role('ancestor')
            <li class="nav-item">
                <a class="nav-link" href="#">Оплатить урок</a>
            </li>
            @endrole
        </ul>
    </div>
</nav>
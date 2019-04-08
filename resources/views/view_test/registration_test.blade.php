<form hidden id class="form-custom-foodrorum " method="post" action="{{ route('users.store') }}">
        <div class="form-group">
            @csrf

            <label for="fist_name">Имя:</label>
            <input type="text" name="fist_name" id="fist_name" class="form-control custom-control-inline"
                placeholder="">

            <label for="last_name">Фамилия:</label>
            <input type="text" name="last_name" id="last_name" class="form-control custom-control-inline"
                placeholder="">

            <label for=""></label>
            <input type="text" name="" id="" class="form-control custom-control-inline" placeholder="">

            <label for="password">Пароль:</label>
            <input type="password" class="form-control custom-control-inline" name="password" id="password"
                placeholder="">

            <label for="password_second">Подтверждение пароля:</label>
            <input type="password" class="form-control custom-control-inline" name="password_second" id="password_second"
                placeholder="">

        </div>
    </form>
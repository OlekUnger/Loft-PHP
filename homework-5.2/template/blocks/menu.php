
<?php if (Auth::isGuest()): ?>

    <ul class='clearfix'>
            <li class='left'><a href='/'>Главная</a></li>
            <li class='left'><a href='users'>Список пользователей</a></li>
            <li class='right'><a href='logout'>Выход</a></li>
            <li class='right'><a href='profile'>Личный кабинет</a></li>
            <li class='right'><a class='user'><?php Auth::setName();;?></a></li>
        </ul>
<?php else: ?>

    <ul class='clearfix'>
            <li class='left'><a href='/'>Главная</a></li>
            <li class='right'><a href='login'>Вход</a></li>
            <li class='right'><a href='register'>Регистрация</a></li>
        </ul>
<?php endif;?>



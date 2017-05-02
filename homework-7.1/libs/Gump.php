<?php
class Validate
{

    public static function is_valid($data, $data_rules = null)
    {
        $gump = new GUMP();
        $data = $gump->sanitize($data);
        $gump->validation_rules($data_rules);

        $gump->filter_rules(array(
            'login' => 'trim|sanitize_string',
            'name' => 'trim|sanitize_string',
            'email' => 'trim|sanitize_email',
            'description' => 'trim|sanitize_string',
            'password' => 'trim',
            'password2' => 'trim',
        ));

        GUMP::set_field_name('login', 'Логин');
        GUMP::set_field_name('name', 'Имя');
        GUMP::set_field_name('email', 'Почта');
        GUMP::set_field_name('description', 'Описание');
        GUMP::set_field_name('password', 'Пароль');
        GUMP::set_field_name('password2', 'Повторный пароль');

        $validated_data = $gump->run($data);

        if ($validated_data === false) {
            $errors = $gump->get_readable_errors();
            return $errors;
        }
    }

    public static function is_validRegister()
    {
        $data = array('login' => $_POST['login'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'password2' => $_POST['password2'],
        );
        $data_rules = array(
            'login' => 'required|max_len,100|min_len,6',
            'email' => 'required|valid_email',
            'password' => 'required',
            'password2' => 'required|equalsfield,password',
            'ip' => 'valid_ip',
        );
        $errors = Validate::is_valid($data, $data_rules);
        return $errors;
    }

    public static function is_validEnter()
    {
        $data = array('login' => $_POST['login'], 'password' => $_POST['password']);
        $data_rules = array(
            'login' => 'required',
            'password' => 'required',
        );
        $errors = Validate::is_valid($data, $data_rules);
        return $errors;
    }

    public static function is_validUserData()
    {
        $data = array('name' => $_POST['name'],'description' => $_POST['description']);

        $data_rules = array(
            'name' => 'required|max_len,100|min_len,5',
            'description' => 'required|max_len,300|min_len,50',
        );
        $errors = Validate::is_valid($data, $data_rules);
        return $errors;
    }

    public static function is_validUserPost()
    {
        $data = array('sendTitle' => $_POST['sendTitle'],'sendText' => $_POST['sendText']);

        $data_rules = array(
            'sendTitle' => 'required|max_len,200|min_len,1',
            'sendText' => 'required|max_len,300|min_len,5',
        );
        $errors = Validate::is_valid($data, $data_rules);
        return $errors;
    }

    public static function is_validEditPost()
    {
        $data = array('editTitle' => $_POST['editTitle'],'editText' => $_POST['editText']);

        $data_rules = array(
            'editTitle' => 'required|max_len,200|min_len,1',
            'editText' => 'required|max_len,300|min_len,50',
        );
        $errors = Validate::is_valid($data, $data_rules);
        return $errors;
    }
}
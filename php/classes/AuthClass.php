<?php

class AuthClass {
    private $_name = "тест"; //Устанавливаем логин
    private $_password = "1234"; //Устанавливаем пароль

    /**
     * Авторизация пользователя
     * @param string $name
     * @param string $password
     */
    public function auth($name, $password) {
        if ($name == $this->_name && $password == $this->_password) {
            return true;
        }
        else { //Логин и пароль не подошел
            return false;
        }
    }

}

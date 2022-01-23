<?php
require_once( "../classes/AuthClass.php");

$auth = new AuthClass();
$data = json_decode(trim(file_get_contents('php://input')),true);

if (isset($data["name"]) && isset($data["password"]))
{
    if (!$auth->auth($data["name"], $data["password"]))
    {
        $result = array(
            'status' => false,
            'caption' => 'Некорректные данные',
        );
    }
    else
    {
        $result = array(
            'status' => true,
            'caption' => 'Успешно',
        );
    }
    echo json_encode($result);
}

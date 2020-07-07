<?php 
require_once("../../includes/core.php");

if(!Site::ajaxRequest() || User::isLogged()) die(header("HTTP/1.0 404 Not Found"));

usleep(700000);
$data = [];
$posts = filter_input_array(INPUT_POST, FILTER_DEFAULT);

foreach($posts as $key => $value)
{
    if(empty($_POST[$key]))
    {
        $data['type'] = "error";
        $data['message'] = "Oops, algum dos campos ficou vázio.";
        echo json_encode($data);
        exit;
    }
}

$username = Site::filter($_POST['username']) ?? null;
$password = Site::filter($_POST['password']) ?? null;

$uPassword = User::userData('password', $username) ?? null;
$getUsername =User::userData('username', $username) ?? null;
if(!User::mailExists($username))
{
    $data['type'] = "error";
    $data['message'] = "O e-mail digitado não existe.";
} else if(!Site::verifyPassword($password, $uPassword)) {
    $data['type'] = "error";
    $data['message'] = "A senha informada está incorreta.";
} else {
    $_SESSION['username'] = $getUsername;
    $_SESSION['email'] = $username;
    $data['type'] = "success";
    $data['message'] = 'Seja bem-vind@ ' .$getUsername;
}

echo json_encode($data, JSON_UNESCAPED_UNICODE);
exit;
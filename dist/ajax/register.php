<?php 
header("Access-Control-Allow-Origin: *");
require_once("../../includes/core.php");

if(!Site::ajaxRequest() || User::isLogged()) die(header("HTTP/1.0 404 Not Found"));

usleep(700000);
$data = [];
$posts = filter_input_array(INPUT_POST, FILTER_DEFAULT);

foreach($posts as $key => $value)
{
    if($key == "indicator_name") continue;
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
$rep_password = Site::filter($_POST['rep_password']) ?? null;
$email = Site::filter($_POST['email']) ?? null;
$cpf = Site::filter($_POST['cpf']) ?? null;
$type_people = Site::filter($_POST['type_people']) ?? null;
$name_complete = Site::filter($_POST['name_complete']) ?? null;
$security_password = Site::filter($_POST['security_password']) ?? null;
$security_rep_password = Site::filter($_POST['security_rep_password']) ?? null;

$personType = ['Fisica', 'Juridica'];
$pattern = "/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}\-[0-9]{2}$/";

if(!filter_var($email, FILTER_VALIDATE_EMAIL))
{
    $data['type'] = "error";
    $data['message'] = "Somente letras (a - z), números (0 - 9) e pontos (.) são permitidos.";
} else if(strlen($email) < 8 || strlen($email) > 50)
{
    $data['type'] = "error";
    $data['message'] = "Use 50 caracteres ou menos (min.: 8) para o seu e-mail"; 
 
} else if($rep_password !== $password)
{
    $data['type'] = "error";
    $data['message'] = "Oops, a senha repetida está errada."; 
} else if(strlen($cpf) > 14 || !preg_match($pattern, $cpf))
{
    $data['type'] = "error";
    $data['message'] = "Oops, o CPF digitado é inválido."; 
} else if(!in_array($type_people, $personType))
{
    $data['type'] = "error";
    $data['message'] = "O tipo de pessoa específicado está incorreto."; 
} else if(strlen($username) < 4 || strlen($username) > 34 || !ctype_alnum($username))
{
    $data['type'] = "error";
    $data['message'] = "Use 24 caracteres ou menos (min.: 4) para o seu nome de usuário. (Apenas letras e números)"; 
}  else if($security_rep_password !== $security_password)
{
    $data['type'] = "error";
    $data['message'] = "A senha de segurança repetida está errada."; 
} else if(strlen($password) < 6 || strlen($password) > 32)
{
    $data['type'] = "error";
    $data['message'] = "Use 32 caracteres ou menos (min.: 6) para a sua senha."; 
} else if(strlen($security_password) < 3 || strlen($security_password) > 12)
{
    $data['type'] = "error";
    $data['message'] = "Use 12 caracteres ou menos (min.: 3) para a sua senha de segurança."; 
}  else if(User::mailExists($email)){
    $data['type'] = "error";
    $data['message'] = "O e-mail inserido já foi cadastrado."; 

} else if(User::userExists($username)){
    $data['type'] = "error";
    $data['message'] = "O usuário inserido já foi cadastrado."; 

} else {
    foreach($posts as $key => $value)
    {
        if($key == "rep_password" || $key == "security_rep_password") continue;  
        User::setVar($key, $value);   
    }


    if(User::registerUser()){
        $data['type'] = "success";
        $data['message'] = "Cadastrado com sucesso!";
        
        User::loginUser();

    } else {
        $data['type'] = "error";
        $data['message'] = User::registerUser(); 
    }
}

echo json_encode($data, JSON_UNESCAPED_UNICODE);
exit;

?>
<?php

if(isset($_POST['submit'])){
    $login = filter_input(INPUT_POST, 'login');
    $password = filter_input(INPUT_POST, 'password');
    
    if(checkLogin($login, $password)){
        //Enregistrement des informations d'authentification
        session_regenerate_id(true);
        $_SESSION['role']='client';
        $_SESSION['login'] = $login;
        header('location:http://chapitre.local');
    } else {
        setFlash('Les informations de connexion sont incorrectes');
        $response = getResponse('view-login', array('login' => $login));
    }
   
} else {
    $response = getResponse('view-login', array('login' => ''));
}
echo $response;


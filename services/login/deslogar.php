<?php
    session_start();
    unset($_SESSION['login_matricula'],$_SESSION['login_nome'],$_SESSION['login_email'], $_SESSION['login_senha'], $_SESSION['login_projeto']);  
    $function = '(() => document.getElementById("aviso").innerHTML = "")()';       
    $_SESSION['msg'] = "<div id='aviso'><p class='p-2 mb-2 text-center bg-success text-white mr-2'>Até logo!<button class='btn btn-success btn-sm' onClick='$function'>X</button></p></div>";
    header('location: ../../pages/login/login.php');
?>
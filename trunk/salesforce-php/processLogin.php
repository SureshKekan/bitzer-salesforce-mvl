<?php
    session_start();

    include("includes/custom/bal/loginBAL.php");

    $username = $_POST["username"];
    $password = $_POST["password"];

    $bal_login = new LoginBAL();

    $auth_result = $bal_login->checkCredentials($username, $password);

    $location = "library.php";

    if($auth_result != 0)
    {
        $bal_login->setProperties($username, $password);

        $_SESSION["username"] = $username;
        $_SESSION["password"] = $password;

        $bal_login->logout();
    }
    else
    {
        $location = "login.php";
    }

    header("Location: " . $location);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Login - Bitzer</title>
</head>
<body>
        
</body>
</html>
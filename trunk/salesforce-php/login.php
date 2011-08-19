<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<meta name="bitzer-page-type" content="login">
<title>Login - Bitzer</title>
</head>
<body>
<form name="Login"
                      data-bitzer-login-form="true"
                      action="processLogin.php" method="post"
                      enctype="application/x-www-form-urlencoded"
                      data-bitzer-session-cookie-1="<?php echo session_name(); ?>">

			<input data-bitzer-username="true"
                                       type="text" name="username"
                                       size="25"
                                       maxlength="100"
                                       value=""
                                       id="username" >

                        <input data-bitzer-password="true"
                                       type="password" name="password"
                                       size="25"
                                       maxlength="100"
                                       value="" >
                        
                        <input type="submit" value="LogIn"/>
                </form>
</body>
</html>
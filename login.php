<?php
$sProjectTitle = 'Login';
require_once('header.php');

    $sEmail      = 'test@gmail.com';
    $sPassword   = '12345';
    if(!empty($_POST)){
        $sUserEmail         = $_POST['txtEmail'];
        $sUserPassword      = $_POST['txtPassword'];
        if( $sEmail ==  $sUserEmail &&
            $sPassword == $sUserPassword
        ){
            session_start();
            $_SESSION['email'] = $sUserEmail;
            header('Location: admin.php');
            exit();
        }
    }

?>

<form action="login.php" method="POST">
    <input name="txtEmail" type="text" placeholder="email">
    <input name="txtPassword" type="text" placeholder="password">
    <button>LOGIN</button>
</form>

<?php
 require_once('footer.php');
?>
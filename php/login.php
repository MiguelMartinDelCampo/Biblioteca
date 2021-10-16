<?php
    session_start();
?>

<?php
    $pass=$_POST['pass'];
    $conexion = new mysqli("localhost","root","","biblioteca");

    if(!empty ($pass)){
        $sql = "SELECT id, contra FROM admin WHERE id = 1";
        $result = $conexion->query($sql);
        
        $row = $result->fetch_array(MYSQLI_ASSOC);

        if($pass==$row['contra']) {
            $_SESSION['loggedin'] = true;
            $_SESSION['pass'] = $pass;
            $_SESSION['start'] = time();
            header('Location: ../admin.php');
        } else {
            header('Location: ../login.html');
        }
    } else {
        echo '<script language="javascript">alert("Contraseña invalida");</script>';
        header('Location: ../login.html');
    }
?>
<?php
    session_start();
    unset ($SESSION['pass']);
    session_destroy();

    header('Location: http://localhost/Biblioteca/index.php');
?>
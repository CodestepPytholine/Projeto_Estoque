<?php 
    setcookie ('pf', "", time() - 3600);
    setcookie ('nm', "", time() - 3600);
    header('Location: index.php');
?>
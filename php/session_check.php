<?php 
if(!isset($_COOKIE['pf']) && empty($_COOKIE['pf'])){
    header('Location: index.php');
}
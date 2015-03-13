<?php
@session_start();

$_SESSION['idioma'] = '';
echo $_SESSION['idioma'] = $_POST['lingua'];

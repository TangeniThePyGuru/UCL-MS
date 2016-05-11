<?php

// Begin the session.
session_start();

// Unset all of the session variablles.
session_unset();

// Destroy the session.
session_destroy();

// delete the cookie. 
$_SESSION = array();

// redirect to login.php
header('Location: index.php');
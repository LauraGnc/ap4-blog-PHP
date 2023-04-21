<?php
include 'config/constants.php';

// Destroy session & redirect User to signin page
session_destroy();
header('location: ' . 'signin.php');
die();
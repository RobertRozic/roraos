<?php

$header = '';

$header .= <<<HTML
  <!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link rel="shortcut icon" href="../../src/img/favicon.ico" />

    <title>Roraos.ba | Login</title>

    <link href="../../src/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../src/css/fontawesome-all.min.css" rel="stylesheet" type="text/css">
    <link href="../../src/css/navbar.css" rel="stylesheet" type="text/css">
    <link href="../../src/css/login.css" rel="stylesheet" type="text/css">

  </head>
  <body>

HTML;

echo $header;

require 'navbar.php';

?>
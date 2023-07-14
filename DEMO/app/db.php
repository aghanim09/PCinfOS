<?php
$connect = mysqli_connect(
  'db', # service name
  'php_docker', # username
  'password', # password
  'dbback' # database name
);

if (mysqli_connect_errno()) {
  die("Failed to connect to MySQL: " . mysqli_connect_error());
}



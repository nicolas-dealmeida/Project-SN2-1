<?php
$BDD = new PDO('mysql:host=192.168.64.50;dbname=GPS; charset=utf8', 'admin', 'root');
require "../class/user.php";
$user = new user($BDD);

$user-> getuser(12);

$user-> connexion("kiki", "321");


echo $user->getnom()."\n";
echo $user->getprenom()."\n";
echo $user->getlogin()."\n";
echo $user->getid()."\n";
echo $user->getadmin()."\n";
echo $user->getmdp()."\n";















































?>
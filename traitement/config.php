<?php
define("db_server","localhost");
define("db_user","root");
define("db_psswrd","");
define("db_name","test");

$link= mysqli_connect(db_server,db_user,db_psswrd,db_name);

if($link==false){
    die("error". mysqli_connect_error());
}
// else{
//     echo"connexion réussite";
// }
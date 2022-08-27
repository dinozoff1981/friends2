<?php
if (isset($_GET["id"])){

$id=$_GET["id"];

$servername='remotemysql.com';
$username='TNc9n7Q4wO';
$password='4ho7UVCSBM';
$database='TNc9n7Q4wO';

$connection=new mysqli($servername,$username,$password,$database);

$sql="DELETE FROM kompisar WHERE idnummer=$id";
$connection->query($sql);

}
header("location:/Friends/index.php");
exit;





?>
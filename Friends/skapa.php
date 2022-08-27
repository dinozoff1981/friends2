<?php
 $servername='remotemysql.com';
 $username='TNc9n7Q4wO';
 $password='4ho7UVCSBM';
 $database='TNc9n7Q4wO';

$connection=new mysqli($servername,$username,$password,$database);

$fname="";
$ename="";
$mobil="";
$epost="";
$errorMessage="";
$sucessMessage="";

if($_SERVER ['REQUEST_METHOD']=='POST'){

$fname=$_POST["förname"];
$ename=$_POST["efternamn"];
$mobil=$_POST["mobil"];
$epost=$_POST["epost"];

do  {

if(empty($fname)||empty($ename)||empty($mobil)||empty($epost)){

    $errorMessage="Alla Fällt Måste Vara Ifyllda";
    break;

}

//add new friend here 

$sql="INSERT INTO kompisar(förnamn,efternamn,mobil,epost)".
"VALUES ('$fname','$ename','$mobil','$epost')";
$result=$connection->query($sql);

if (!$result){

$errorMessage="Ogiltig Query:".$connection->error;
break;

}

$fname="";
$ename="";
$mobil="";
$epost="";

$sucessMessage="BRAVO!!! Ny Kompis Skapad!!!";
header("location:/Friends/index.php");
exit;

}while(false);



}


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <title>MInaKompisar</title>
</head>
<body>
    <div class="container my-5">
     <h2>SKAPA NY KOMPIS</h2>

            <?php
            
            if (!empty($errorMessage)){
               echo "
               
               <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
               </div>
               ";

            }
            ?>



      <form method="post">

        <div class="row mb-3">

            <label class="col-sm-3 col-form-label">FörNamn</label>
            <div class="col-sm-6">
            <input type="text" class="form-control" name="förname" value="<?php echo $fname;?>">
            </div>

        </div>

        <div class="row mb-3">

                <label class="col-sm-3 col-form-label">EfterNamn</label>
                <div class="col-sm-6">
                <input type="text" class="form-control" name="efternamn" value="<?php echo $ename;?>">
                </div>

        </div>

         <div class="row mb-3">

                <label class="col-sm-3 col-form-label">Mobil</label>
                <div class="col-sm-6">
                <input type="text" class="form-control" name="mobil" value="<?php echo $mobil;?>">
                </div>

        </div>

         <div class="row mb-3">

                <label class="col-sm-3 col-form-label">E-post</label>
                <div class="col-sm-6">
                <input type="text" class="form-control" name="epost" value="<?php echo $epost;?>">
                </div>

        </div>

        <?php
            
            if (!empty($sucessMessage)){
               echo "
               <div class='row mb-3>
               <div class='offset-sm-3 col-sm-6'>
               <div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>$sucessMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
               </div>
               </div>
               </div>
               ";

            }
            ?>



         
        <div class="row mb-3">
            <div class="offset-sm-3 col-sm-3 d-grid">
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>

            <div class="col-sm-3 d-grid">
            <a class="btn-btn-outline-primary" href="/Friends/index.php" role="button">Avbryt</a>

            </div>


        </div>


      </form>



    </div>
</body>
</html>
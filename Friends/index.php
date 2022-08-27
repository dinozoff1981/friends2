<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <title>MInaKompisar</title>
</head>
<body>
      <div class="container my-5"></div>
      <h2>MINNA KOMPISAR</h2>
      <a class="btn btn-primary" href="/Friends/skapa.php" role="button">NY KOMPIS</a>
       <br>


       <table class="table">
            <thead>

                <tr>
                    <th>ID</th>
                    <th>FörNamn</th>
                    <th>EfterNamn</th>
                    <th>Mobile</th>
                    <th>E-post</th>
                    <th>Datum</th>
                    <th>Redigera</th>


                </tr>

            </thead>

            <tbody>

               <?php
      //local         
              // $servername="localhost";
               //$username="root";
               //$password="";
               //$database="friends";

//remote
               $servername='remotemysql.com';
               $username='TNc9n7Q4wO';
               $password='4ho7UVCSBM';
               $database='TNc9n7Q4wO';

               $connection=new mysqli($servername,$username,$password,$database);

                if ($connection->connect_error){

                die("Connection Failed:".$connection->$connect_error);
                }

                $sql="SELECT * FROM kompisar";
                $result=$connection->query($sql);

                if(!$result){

                die("Ogiltig query:".$connection->error);

                }
                



                while($row=$result->fetch_assoc()){

                    echo "
                    
                    <tr>

                    <td>$row[idnummer]</td>
                    <td>$row[förnamn]</td>
                    <td>$row[efternamn]</td>
                    <td>$row[mobil]</td>
                    <td>$row[epost]</td>
                    <td>$row[datum]</td>

                    <td>

                        <a class='btn btn-primary btn-sm' href='/Friends/redigera.php?id=$row[idnummer]'>Uppdatera</a>
                        <a class='btn btn-danger btn-sm' href='/Friends/tabort.php?id=$row[idnummer]'>Tabort</a>

                    </td>

                </tr>
                    
                    
                    ";

                }

               ?>


               


            </tbody>




       </table>
    
</body>
</html>
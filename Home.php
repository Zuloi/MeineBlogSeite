<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
  $dbh = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
  $stmt = $dbh->query('SELECT summe_bewertungen FROM blogs');
  $id = $_POST["Id"] ?? '';
  if(isset($_POST["kill"])){
    $bewertung= "Kill";
  }
  if(isset($_POST["hate"])){
    $bewertung= "Hate";
  }
  if(isset($_POST["ok"])){
    $bewertung= "Ok";
  }
  if(isset($_POST["good"])){
    $bewertung= "Good";
  }
  if(isset($_POST["great"])){
    $bewertung= "Great";
  }

  if($bewertung == "Kill"){
      $stmt = $dbh->query("UPDATE blogs SET summe_bewertungen = summe_bewertungen +1 WHERE Id ='$id'");
      $stmt1 = $dbh->query("UPDATE blogs SET anzahl_bewertungen = anzahl_bewertungen +1 WHERE Id ='$id'");
  }
  if($bewertung == "Hate"){
      $stmt = $dbh->query("UPDATE blogs SET summe_bewertungen = summe_bewertungen +2 WHERE Id ='$id'");
      $stmt1 = $dbh->query("UPDATE blogs SET anzahl_bewertungen = anzahl_bewertungen +1 WHERE Id ='$id'");
  }
  if($bewertung == "Ok"){
      $stmt = $dbh->query("UPDATE blogs SET summe_bewertungen = summe_bewertungen +3 WHERE Id ='$id'");
      $stmt1 = $dbh->query("UPDATE blogs SET anzahl_bewertungen = anzahl_bewertungen +1 WHERE Id ='$id'");
  }
  if($bewertung == "Good"){
      $stmt = $dbh->query("UPDATE blogs SET summe_bewertungen = summe_bewertungen +4 WHERE Id ='$id'");
      $stmt1 = $dbh->query("UPDATE blogs SET anzahl_bewertungen = anzahl_bewertungen +1 WHERE Id ='$id'");
  }
  if($bewertung == "Great"){
      $stmt = $dbh->query("UPDATE blogs SET summe_bewertungen = summe_bewertungen +5 WHERE Id ='$id'");
      $stmt1 = $dbh->query("UPDATE blogs SET anzahl_bewertungen = anzahl_bewertungen +1 WHERE Id ='$id'");
  }


}?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=§, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="../blog/blog.css" rel="stylesheet" />
  <title>Document</title>
</head>
<body>

<div id=titel>RBWS  <div id=Home> <a href="http://localhost/Blog/blog.php">Blog schreiben</a><br></div></div>
  <div style="clear: both;"></div>

  <div class=nav>
    <div id=links>
      <h2>BLJ</h2>
      <ul>
        <div id="main">

                    <?php
                    $dbconnection = new PDO('mysql:host=10.20.16.107;dbname=ipadressen','DB_BLJ','BLJ12345l');
                    $stmt = $dbconnection->query("SELECT ip,home FROM t_ipadress order by ID");
                    $ipArray = $stmt -> fetchAll();
                    ?>


                    <p><li><a href="http://<?php echo $ipArray[2][0] ?><?php echo $ipArray[2][1] ?>">Fynn's Blog</a></li>

                    <p><li><a href="http://<?php echo $ipArray[1][0]?><?php echo $ipArray[1][1] ?>">Carolina's Blog</a></li>

                    <p><li><a href="http://<?php echo $ipArray[6][0]?><?php echo $ipArray[6][1] ?>">Björn's Blog</a></li>

                    <p><li><a href="http://<?php echo $ipArray[0][0]?><?php echo $ipArray[0][1] ?>">David's Blog</a></li>

                    <p><li><a href="http://<?php echo $ipArray[3][0]?><?php echo $ipArray[3][1] ?>">Céline's Blog</a></li>

                    <p><li><a href="http://<?php echo $ipArray[4][0]?><?php echo $ipArray[4][1] ?>">Jennifer's Blog</a></li>

                    <p><li><a href="http://<?php echo $ipArray[5][0]?><?php echo $ipArray[5][1] ?>">Timon's Blog</a></li>
                </div>

      </ul>

  </div>
</div>
<div id=Blogs>
<?php
 if (empty($errors)) {
?> <h1 class="Blog"><strong class="ribbon-content">Blogs</strong></h1><?php

$dbh = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
$stmt = $dbh->query('SELECT * FROM blogs Order BY id DESC');//where z.b id like '%' %ist ein platzhalter.
foreach($stmt->fetchAll() as $x) {
  ?> <div class="ausgabe"> <?php
echo 'Vorname: ' .$x["Vorname"].'<br />';
echo 'Nachname: ' .$x["Nachname"].'<br />';
echo 'Blog: ' .$x["Blog"].'<br />';
echo 'Datum: ' .$x["Datum"].'<br />';
echo '<form action="Home.php" method="post">';
echo '<button class="horrible" name="kill" type="submit" ><br>kill me</button>
      <button class="horrible" name="hate" type="submit" ><br>hate it</button>
      <button class="horrible" name="ok" type="submit" ><br>its ok</button>
      <button class="horrible" name="good" type="submit" ><br>its good</button>
      <button class="horrible" name="great" type="submit" ><br>its great</button>'. '<br />';
echo '<input name = "Id" type="hidden" value="'. $x["Id"] . '" />';
 if($x["anzahl_bewertungen"] > 0) {
   $zahl = $x["summe_bewertungen"] / $x["anzahl_bewertungen"];
   if($bewertung != NULL) {
               if($zahl < 2){
                echo 'Durchschnittsbewertung: 1 Stern';}
               if($zahl >=2 && $zahl < 3){
                echo 'Durchschnittsbewertung: 2 Sterne';}
               if($zahl >=3 && $zahl < 4){
                echo 'Durchschnittsbewertung: 3 Sterne';}
               if($zahl >=4 && $zahl < 4.6){
                echo 'Durchschnittsbewertung: 4 Sterne';}
               if($zahl== 5 || $zahl > 4.6){
                 echo 'Durchschnittsbewertung: 5 Sterne';}
    }
}

 else {
   echo 'Seien Sie der erste der bewertet! :C';
 }
 echo '</form>';
  echo '<hr />';
}
  }





?> </div>
</div>
</body>
<footer>
    <div><p><a href="http://localhost/Blog/home.php">Go to top</a></p></div>
  </footer>
</html>

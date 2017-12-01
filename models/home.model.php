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

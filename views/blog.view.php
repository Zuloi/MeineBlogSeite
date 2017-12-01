
<?php
$errors = [];

 if ($_SERVER['REQUEST_METHOD'] === 'POST') {


  $vorname = $_POST["vorname"] ?? '';

  if (empty($vorname)) {
    array_push($errors, "Bitte geben Sie einen Vornamen ein.");
  }


  $nachname = $_POST["nachname"] ?? '';

  if (empty($nachname)) {
    array_push($errors, "Bitte geben Sie einen Nachnamen ein.");
    // $errors[] = "Bitte geben Sie einen Namen ein.";
  }

  $schreiben = $_POST["schreiben"] ?? '';

  if (empty($schreiben)) {
    array_push($errors, "Bitte machen sie ein Blog ein.");
  }

     if (!empty($schreiben)) {
      if(strpos($schreiben, ' ') === false){
        array_push($errors,"Ihr Text enthält keine Leerzeichen");
       }
     }







  if(empty($errors)){
    $schreiben = nl2br($schreiben);
    $schreiben = strip_tags($schreiben, '<img><a><br>');
    $vorname = htmlspecialchars($vorname);
    $nachname = htmlspecialchars($nachname);
    $dbh = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
    $stmt = $dbh->query("INSERT INTO blogs (Vorname, Nachname, Blog, Datum) VALUES ('$vorname', '$nachname', '$schreiben',now())");
    //$stmt->execute();
  }

}?>

<div id=titel>RBWS  <div id=Home> <a href="home.php">Home</a><br></div></div>
<h1 style="color:white;">blog.view</h1>

<div class>
<div class="wrapper">
    <form action="blog.php" method="POST">
        <fieldset>
            <legend class="form-legend"></legend>
            <div class="form-group">
                <label class="form-label" for="vorname">Ihr Vorname</label>
                <input class="form-control" type="text" id="vorname" name="vorname" value="<?php echo isset($vorname) ? $vorname : ''; ?>">
            </div>
            <legend class="form-legend"></legend>
            <div class="form-group">
                <label class="form-label" for="nachname">Ihr Nachname</label>
                <input class="form-control" type="text" id="nachname" name="nachname" value="<?php echo isset($nachname) ? $nachname : ''; ?>">
            </div>

            <div class="form-group">
                <label class="form-label" for="schreiben"><div>Hier kannst du deinen Blog schreiben :)</div></label>
                <textarea class="form-control" id="schreiben" name="schreiben" cols="30" rows="10" value="<?php echo isset($schreiben) ? $schreiben : ''; ?>"></textarea>



<?php if (!empty($errors)) { ?>
          <div class="fehler">
              <ul>

<?php foreach ($errors as $ausgabe) {
          echo '<li>' . $ausgabe . '</li>';
                                    }?>
              </ul>
                </div>
<?php                       }?>

<?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(empty($errors)){?>

        <div class="versendet">
          <ul>
              <li><p>Ihr Blog wurde Hochgeladen</p></li>
        </div>
<?php                      }                       }?>

              <div class="form-actions">
                  <input class="btn btn-primary" type="submit" value="Speichern">
            </div>


        </form>
    </div>

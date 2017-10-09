<?php
error_reporting(0);

## SETTINGS
$addressToReportTo = "mail@yourdomain.com";
$yourDomain = "https://yourdomain.com";
$yourDomainForTitle = "yourdomain.com";
## SETTINGS END

$path = "uploads/";
$numberOfSuccessfullUploadedFiles = 0;
$filenames = "";

if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
    // Loop $_FILES to execute all files
    foreach ($_FILES['files']['name'] as $f => $filename) {
        if ($_FILES['files']['error'][$f] == 4) {
            continue; // Skip file if any error found
        }
        if ($_FILES['files']['error'][$f] == 0) {
            $filename = str_replace(" ", "_", $filename);
            if (move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path . $filename)) {
                $filenames = $filenames . "\r\n" . $filename . " <=> " . $yourDomain . "/upload/uploads/" . $filename;
                $numberOfSuccessfullUploadedFiles++;
            }
        }
    }
    $header = 'From: ' . $addressToReportTo . "\r\n" . 'Reply-To: ' . $addressToReportTo . "\r\n" . 'X-Mailer: PHP/' . phpversion();
    $message = "Es wurden (" . $numberOfSuccessfullUploadedFiles . ") neue Dateien mit dem Uploadscript hochgeladen. IP: " . $_SERVER['REMOTE_ADDR'] . "  Dateinamen: " . $filenames;
    mail($addressToReportTo, "Neuer Dateiupload", $message, $header);
}
?>

<!doctype html>
<html lang="de">
<head>
  <meta charset="UTF-8"/>
  <title>Sende mir Dateien | <?php echo $yourDomainForTitle; ?></title>
  <style type="text/css">
    .logo {
      padding-top: 10px;
    }

    a {
      text-decoration: none;
      color: #333
    }

    h1 {
      font-size: 1.9em;
      margin: 10px 0
    }

    p {
      margin: 8px 0
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      -webkit-font-smoothing: antialiased;
      -moz-font-smoothing: antialiased;
      -o-font-smoothing: antialiased;
      font-smoothing: antialiased;
      text-rendering: optimizeLegibility;
    }

    body
    {
      width: 50em;
      margin: 0 auto;
      font: 12px Arial, Tahoma, Helvetica, FreeSans, sans-serif;
      text-transform: inherit;
      color: #333;
      background: #e7edee;
      line-height: 18px;
    }

    .wrap {
      text-align: center;
      margin: 15px auto;
      padding: 20px 25px;
      background: white;
      border: 2px solid #DBDBDB;
      -webkit-border-radius: 5px;
      -moz-border-radius: 5px;
      border-radius: 5px;
      overflow: hidden;
    }

    .status {
      /*display: none;*/
      padding: 8px 35px 8px 14px;
      margin: 20px 0;
      text-shadow: 0 1px 0 rgba(255, 255, 255, 0.5);
      color: #468847;
      background-color: #dff0d8;
      border-color: #d6e9c6;
      -webkit-border-radius: 4px;
      -moz-border-radius: 4px;
      border-radius: 4px;
    }

    input[type="submit"] {
      cursor: pointer;
      width: 100%;
      border: none;
      background: #991D57;
      background-image: linear-gradient(bottom, #8C1C50 0%, #991D57 52%);
      background-image: -moz-linear-gradient(bottom, #8C1C50 0%, #991D57 52%);
      background-image: -webkit-linear-gradient(bottom, #8C1C50 0%, #991D57 52%);
      color: #FFF;
      font-weight: bold;
      margin: 20px 0;
      padding: 10px;
      border-radius: 5px;
    }

    input[type="submit"]:hover {
      background-image: linear-gradient(bottom, #9C215A 0%, #A82767 52%);
      background-image: -moz-linear-gradient(bottom, #9C215A 0%, #A82767 52%);
      background-image: -webkit-linear-gradient(bottom, #9C215A 0%, #A82767 52%);
      -webkit-transition: background 0.3s ease-in-out;
      -moz-transition: background 0.3s ease-in-out;
      transition: background-color 0.3s ease-in-out;
    }

    input[type="submit"]:active {
      box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.5);
    }
  </style>

</head>
<body>
<div class="logo" style="text-align: center;"><img src="Circle-icons-speedometer.svg" width="150px" height="150px"></div>
<div class="wrap">
  <h1>Sende mir Dateien:</h1>
    <?php
    # error messages
    if (isset($message)) {
        foreach ($message as $msg) {
            printf("<p class='status'>%s</p><br />\n", $msg);
        }
    }
    # success message
    if ($numberOfSuccessfullUploadedFiles != 0) {
        printf("<p class='status'>%d Datei(en) wurden erfolgreich hochgeladen - Danke!</p>\n", $numberOfSuccessfullUploadedFiles);
    }
    ?>
  <!-- Multiple file upload html form-->
  <form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="files[]" multiple="multiple" accept="*">
    <p><br/>Das Hochladen kann abh&auml;ngig von deiner Internetverbindung einen kurzen Moment
      dauern.</p>
    <input type="submit" value="Hochladen">
  </form>
  <p>Es k&ouml;nnen auch mehrere Dateien ausgew&auml;hlt und gleichzeitig hochgeladen werden.</p>
</div>
</body>
</html>
<?php
error_reporting(0);

## SETTINGS
//include("assets/texts_de_DE.php");
include("assets/texts_en_US.php");
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
    $message = textMailMessage($numberOfSuccessfullUploadedFiles, $_SERVER['REMOTE_ADDR'], $filenames);
    mail($addressToReportTo, textNewFileUpload(), $message, $header);
}
?>

<!doctype html>
<html>
<head>
  <meta charset="UTF-8"/>
  <META NAME="ROBOTS" CONTENT="NOINDEX,NOFOLLOW">
  <title><?php echo textTitle() . " | " . $yourDomainForTitle; ?></title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="logo" style="text-align: center;">
  <img src="assets/Circle-icons-speedometer.svg" width="150px" height="150px">
</div>
<div class="wrap">
  <h1><?php echo textTitle() . ":"; ?></h1>
    <?php
    # error messages
    if (isset($message)) {
        foreach ($message as $msg) {
            printf("<p class='status'>%s</p><br />\n", $msg);
        }
    }
    # success message
    if ($numberOfSuccessfullUploadedFiles != 0) {
        printf("<p class='status'>%d " . textSuccessfulUploaded() . "</p>\n", $numberOfSuccessfullUploadedFiles);
    }
    ?>

  <form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="files[]" multiple="multiple" accept="*">
    <p><?php echo textUploadSubline(); ?></p>
    <input type="submit" value="<?php echo textUploadButton(); ?>">
  </form>
  <p style="font-style: italic;"><?php echo textUploadBottomLine(); ?></p>
</div>
<div class="footer" >
  <a href="https://github.com/timluedtke/minimalistic-PHP-Upload" target="_blank">minimalistic-PHP-Upload
    v1.2<br />
  <img src="assets/GitHub_Logo.png"></a>
</div>
</body>
</html>
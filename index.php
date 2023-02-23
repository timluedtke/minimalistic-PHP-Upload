<?php
error_reporting(0);

include("settings.php");

$availableLanguages = array("en", "de");  # see ./assets/translations for available languages (USE IEFT language codes: https://en.wikipedia.org/wiki/IETF_language_tag#List_of_common_primary_language_subtags)
$chossenLanguage = in_array(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2), $availableLanguages) ? substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) : "en";
include("assets/translations/texts_" . $chossenLanguage . ".php");

$numberOfSuccessfullUploadedFiles = 0;
$collectedFilenames = "";
$yourDomainForTitle = parse_url($yourDomain, PHP_URL_HOST);;

if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
    // Loop through $_FILES to treat all files
    foreach ($_FILES['files']['name'] as $f => $filename) {
        if ($_FILES['files']['error'][$f] == 4) {
            continue; // Skip file if any error found
        }
        if ($_FILES['files']['error'][$f] == 0) {
            $filename = str_replace(" ", "_", $filename);
            if (move_uploaded_file($_FILES["files"]["tmp_name"][$f], $uploadDirectory . $filename)) {
                $collectedFilenames = $collectedFilenames . "\r\n" . $filename . " <=> " . $yourDomain . "/upload/uploads/" . $filename;
                $numberOfSuccessfullUploadedFiles++;
            }
        }
    }
    if ($numberOfSuccessfullUploadedFiles > 0) {
        $header = 'From: ' . $addressToReportTo . "\r\n" . 'Reply-To: ' . $addressToReportTo . "\r\n" . 'X-Mailer: PHP/' . phpversion();
        $message = textMailMessage($numberOfSuccessfullUploadedFiles, $_SERVER['REMOTE_ADDR'], $collectedFilenames);
        mail($addressToReportTo, textNewFileUpload(), $message, $header);
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <META NAME="ROBOTS" CONTENT="NOINDEX,NOFOLLOW">
    <title><?php echo textTitle() . " | " . $yourDomainForTitle; ?></title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="logo" style="text-align: center;">
    <img src="assets/Circle-icons-speedometer.svg" width="150px" height="150px" alt="logo">
</div>
<div class="wrap">
    <h1>
        <?php
        echo textTitle() . ":</h1>";

        # show error messages if upload failed
        if (isset($message)) {
            foreach ($message as $msg) {
                printf("<p class='status'>%s</p><br />\n", $msg);
            }
        }
        # success message if upload has finisched
        if ($numberOfSuccessfullUploadedFiles > 0) {
            printf("<p class='status'>%d " . textSuccessfulUploaded() . "</p>\n", $numberOfSuccessfullUploadedFiles);
        }
        ?>

        <form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="files[]" multiple="multiple" accept="*">
            <!-- TODO TIM set language according to browsers -->
            <p><?php echo textUploadSubline(); ?></p>
            <input type="submit" value="<?php echo textUploadButton(); ?>">
        </form>
        <p style="font-style: italic;"><?php echo textUploadBottomLine(); ?></p>
</div>
<div class="footer">
    <a href="https://github.com/timluedtke/minimalistic-PHP-Upload" target="_blank">minimalistic-PHP-Upload v1.3<br/>
        <img src="assets/GitHub_Logo.png" alt="logo github"></a>
</div>
</body>
</html>
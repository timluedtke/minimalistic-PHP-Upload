<?php

function textMailMessage($numberOfSuccessfullUploadedFiles, $remoteIp, $filenames): string {
    return "Es wurden (" . $numberOfSuccessfullUploadedFiles . ") neue Dateien mit dem Uploadscript hochgeladen. IP: " . $remoteIp . "  Dateinamen: " . $filenames;
}

function textNewFileUpload(): string {
    return "Neuer Dateiupload";
}

function textTitle(): string {
    return "Sende mir Dateien";
}

function textSuccessfulUploaded(): string {
    return "Datei(en) wurden erfolgreich hochgeladen - Danke!";
}

function textUploadSubline(): string {
    return "<b>Es k&ouml;nnen mehrere Dateien ausgew&auml;hlt und gleichzeitig hochgeladen werden.</b>";
}

function textUploadBottomLine(): string {
    return "Das Hochladen kann abh&auml;ngig von deiner Internetverbindung einen kurzen Moment dauern.";
}

function textUploadButton(): string {
    return "Hochladen";
}

?>
<?php

function textMailMessage(int $numberOfSuccessfullUploadedFiles, string $remoteIp, string $filenames): string {
    return "Es wurden (" . $numberOfSuccessfullUploadedFiles . ") neue Dateien mit dem Uploadscript hochgeladen. IP: " . $remoteIp . "  Dateinamen: 
    
    " . $filenames;
}

function textNewFileUpload(string $simplifiedDomainname, int $numberOfFiles): string {
    if ($numberOfFiles > 1) {
        $plural = "en";
    }
    return "Neuer Dateiupload auf " . $simplifiedDomainname . " (" . $numberOfFiles . " neue Datei" . $plural . ")";
}

function textTitle(): string {
    return "Sende mir Dateien";
}

function textSuccessfulUploaded(): string {
    return "Datei(en) wurden erfolgreich hochgeladen - Danke!";
}

function textUploadSubline(): string {
    return "Es k&ouml;nnen mehrere Dateien ausgew&auml;hlt und gleichzeitig hochgeladen werden.";
}

function textUploadBottomLine(): string {
    return "Das Hochladen kann abh&auml;ngig von deiner Internetverbindung einen kurzen Moment dauern.";
}

function textUploadButton(): string {
    return "Hochladen";
}

?>
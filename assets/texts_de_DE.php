<?php

function textMailMessage($numberOfSuccessfullUploadedFiles, $remoteIp, $filenames)
{
    return "Es wurden (" . $numberOfSuccessfullUploadedFiles . ") neue Dateien mit dem Uploadscript hochgeladen. IP: " . $remoteIp . "  Dateinamen: " . $filenames;
}

function textNewFileUpload()
{
    return "Neuer Dateiupload";
}

function textTitle()
{
    return "Sende mir Dateien";
}

function textSuccessfulUploaded()
{
    return "Datei(en) wurden erfolgreich hochgeladen - Danke!";
}

function textUploadSubline()
{
    return "<b>Es k&ouml;nnen mehrere Dateien ausgew&auml;hlt und gleichzeitig hochgeladen werden.</b>";
}

function textUploadBottomLine()
{
    return "Das Hochladen kann abh&auml;ngig von deiner Internetverbindung einen kurzen Moment dauern.";
}

function textUploadButton()
{
    return "Hochladen";
}

?>
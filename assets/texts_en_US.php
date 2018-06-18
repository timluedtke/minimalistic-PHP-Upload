<?php

function textMailMessage($numberOfSuccessfullUploadedFiles, $remoteIp, $filenames)
{
    return "(" . $numberOfSuccessfullUploadedFiles . ") new files have been uploaded via the minimalistic-upload-script. IP: " . $remoteIp . "  Filenames: " . $filenames;
}

function textNewFileUpload()
{
    return "New fileupload";
}

function textTitle()
{
    return "Send me files";
}

function textSuccessfulUploaded()
{
    return "files have been uploaded successfully - Thank you!";
}

function textUploadSubline()
{
    return "<b>It is possible to upload multiple files at once</b> <br />by selecting them all together in the upload window.";
}

function textUploadBottomLine()
{
    return "The process of uploading can take a while depending on your internet connection speed.";
}

function textUploadButton() {
    return "Upload";
}

?>
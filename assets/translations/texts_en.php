<?php

function textMailMessage($numberOfSuccessfullUploadedFiles, $remoteIp, $filenames): string {
    return "(" . $numberOfSuccessfullUploadedFiles . ") new files have been uploaded via the minimalistic-upload-script. IP: " . $remoteIp . "  Filenames: " . $filenames;
}

function textNewFileUpload(): string {
    return "New fileupload";
}

function textTitle(): string {
    return "Send me files";
}

function textSuccessfulUploaded(): string {
    return "files have been uploaded successfully - Thank you!";
}

function textUploadSubline(): string {
    return "<b>It is possible to upload multiple files at once</b> <br />by selecting them all together in the upload window.";
}

function textUploadBottomLine(): string {
    return "The process of uploading can take a while depending on your internet connection speed.";
}

function textUploadButton(): string {
    return "Upload";
}

?>
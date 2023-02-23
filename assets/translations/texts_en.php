<?php

function textMailMessage(int $numberOfSuccessfullUploadedFiles, string $remoteIp, string $filenames): string {
    return "(" . $numberOfSuccessfullUploadedFiles . ") new files have been uploaded via the minimalistic-upload-script. IP: " . $remoteIp . "  Filenames: 
    
    " . $filenames;
}

function textNewFileUpload(string $simplifiedDomainname, int $numberOfFiles): string {
    if ($numberOfFiles > 1) {
        $plural = "s";
    }
    return "New fileupload on " . $simplifiedDomainname . " (" . $numberOfFiles . " file" . $plural . " uploaded)";
}

function textTitle(): string {
    return "Send me files";
}

function textSuccessfulUploaded(): string {
    return "files have been uploaded successfully - Thank you!";
}

function textUploadSubline(): string {
    return "It is possible to upload multiple files at once<br />by selecting them all together in the upload window.";
}

function textUploadBottomLine(): string {
    return "The process of uploading can take a while depending on your internet connection speed.";
}

function textUploadButton(): string {
    return "Upload";
}

?>
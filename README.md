# minimalistic PHP Upload

Need a minimalistic upload script for sharing files? Use this! 

* **simple installation**
* **File Upload to server directory**
* **eMail notification**

![Example Installation](assets/minimalisticPhpUpload.png "Example Installation")

Installation
------------
1. Open settings.php with your favorite editor and **change the values** accordingly
1. **Copy all the files** and folders to you websever (e.g. to ./upload/*) - double check that you've copied the .htaccess file too.
1. Create a new folder on your webserver with the name **uploadedFiles** (name is changeable in settings.php)

Done. Open https://yourdomain.com/upload and try your **new minimalistic upload script for sharing files** - you should recieve an email with further information directly after someone uploaded a file.

Project details
-------------
Author: Tim Lüdtke (https://timluedtke.de)

**Version 1.3.1 (Feb 2023)**

Licencend Images
----
All graphics used in this project are licensed under the GPL license:
* [Circle-icons-speedometer](https://commons.wikimedia.org/wiki/File:Circle-icons-speedometer.svg) (used as favicon as well)
* [GitHub_Logo](https://github.com/logos) 

The project itself is although licenced under GPL - see here for [license details](LICENSE)

Changelog
-----------
### Version 1.3.1
* made server-directory for Link-generation configurable via settings.php to support non default installation paths
* favicons added

### Version 1.3
* support for php 8.x ensured
* sending email is now prevented if zero files have been uploaded
* language handling changed
* language is now choosen to match browsers language if available, english is default
* setting $yourDomainForTitle is not necessary anymore, since it is now calculated with parse_url()

### Version 1.2.1
* Swapped the text in the bottom and the sublines to ensure the user reads the helping hints in the correct order

### Version 1.2
* language support added (de/eng) 
* SEO noindex added 
* cleaned up filestructure

### Version 1.1
* styling fixes and text changes
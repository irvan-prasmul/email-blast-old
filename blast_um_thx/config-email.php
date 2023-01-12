<?php
////////////////////////////////////////////////////////////
/////   BE SURE THAT THIS FILE NOT ACCESSED DIRECTLY   /////
////////////////////////////////////////////////////////////
if (!defined('INDEX_AUTH')) {
    die("can not access this file directly");
} else if (INDEX_AUTH != 1) {
    die("can not access this file directly");
} else { // do nothing
}

//////////////////////////////////
/////   MAIN CONFIGURATION   /////
//////////////////////////////////

//SMTP host (default: localhost)
$mailer_host = 'smtp.gmail.com';
// $mailer_host = 'smtp.office365.com';

//SMTP username
$mailer_user = 'no-reply@pmbs.ac.id';
// $mailer_user = 'finance.s1@prasetiyamulya.ac.id';

//SMTP password
$mailer_pass = 'Prasmul1234';
// $mailer_pass = 'prasmul123PRASMUL';

//SMTP port (default: 25)
$mailer_port = 465; // or 587
// $mailer_port = 587;

//Method to sending mail ('mail', 'sendmail', or 'smtp') (default: 'mail')
$mailer_method = 'smtp';


////////////////////////////////////
/////   OTHER CONFIGURATION   //////
////////////////////////////////////

//SMTP encryption (ssl, tls or [empty]) (default: [empty])
if ($mailer_port == 465) {
    $mailer_secure = 'ssl';
} elseif ($mailer_port == 587) {
    $mailer_secure = 'tls';
} else {
    $mailer_secure = '';
}

//The 'From email address' for the message (any valid email address)
//$mailer_from = 'no-reply@prasetiyamulya.ac.id';
$mailer_from = 'finance.s1@prasetiyamulya.ac.id';

//The 'From name' of the message
$mailer_from_name = 'Keuangan UPM';

//The 'Sender email' (Return-Path) of the message
//If not empty, will be sent via -f to sendmail or as 'MAIL FROM' in smtp mode
//$mailer_sender = 'no-reply@prasetiyamulya.ac.id';
$mailer_sender = 'finance.s1@prasetiyamulya.ac.id';

//The email address that a reading confirmation will be sent (default: [empty])
$mailer_readingto = '';

//The path of the sendmail program (default: /usr/sbin/sendmail)
$mailer_sendmail = '/usr/sbin/sendmail';

//Word wrapping on the body of the message to a given number of characters (any positive integer) (default: 0)
$mailer_wordwrap = 10;

//The hostname to use in Message-Id and Received headers and as default HELO string (default: SERVER_NAME or localhost.localdomain)
//If empty, the value returned by SERVER_NAME is used or 'localhost.localdomain'
$mailer_hostname = 'prasetiyamulya.ac.id';

//The SMTP HELO of the message (default: $mailer_hostname).
$mailer_helo = $mailer_hostname;

//E-Mail priority (default: 3). (1 = High, 3 = Normal, 5 = low)
$mailer_priority = 3;

//E-mail character-set (any allowed character set) (default: iso-8859-1)
$mailer_charset = 'iso-8859-1';

//E-mail content-type ('text/plain', 'text/html') (default: text/plain)
$mailer_contenttype = 'text/html';

//E-mail encoding ('8bit', '7bit', 'binary', 'base64', 'quoted-printable') (default: 8bit)
$mailer_encoding = 'quoted-printable';

//X-Mailer Header
$mailer_xmailer = 'PM_Auto_Mailer';

//The SMTP server timeout in seconds (any positive integer) (default: 10)
//This function will not work with the win32 version
$mailer_timeout = 10;

//Provides the ability to have the TO field process individual emails, instead of sending to entire TO addresses (default: false) (true or false)
$mailer_singleto = false;

//Holds the most recent mailer error message (default: [empty])
$mailer_error = '';

//Prevents the SMTP connection from being closed after each mail sending (true or false) (default: false)
//If this is set to true then to close the connection requires an explicit call to SmtpClose()
$mailer_keepalive = false;

//Set email format to HTML
$mailer_html = ($mailer_contenttype == 'text/html') ? true : false;

//SMTP authentication, utilizes the Username and Password variables (true or false) (default: false)
$mailer_auth = (($mailer_user == '') && ($mailer_pass == '')) ? false : true;

//Error message language (default: en)
$mailer_lang = 'id';

//language path
if (version_compare(PHP_VERSION, '5.5.0', '>=')) {
    $mailer_langpath = 'PHPMailer/6.0/language/';
} else {
    $mailer_langpath = 'PHPMailer/5.2/language/';
}

//PHPMailer debug (0 = no debug, 1 = debug or 2 = verbose) (default: 0)
$mailer_debug = 0;

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

// use PHPMailer\PHPMailer\PHPMailer;
// key to authenticate
define('INDEX_AUTH', '1');

// including email configuration file
require_once 'config-email.php';



$wait = rand(3, 7);
// require_once 'get_data.php';

// exit();
// Variables
$email_subject = 'Reminder Pembayaran Biaya Semester';
if (true) {
  $email_body = '
  <!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
<!--[if gte mso 9]>
<xml>
  <o:OfficeDocumentSettings>
    <o:AllowPNG/>
    <o:PixelsPerInch>96</o:PixelsPerInch>
  </o:OfficeDocumentSettings>
</xml>
<![endif]-->
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="x-apple-disable-message-reformatting">
  <!--[if !mso]><!--><meta http-equiv="X-UA-Compatible" content="IE=edge"><!--<![endif]-->
  <title></title>
  
    <style type="text/css">
      @media only screen and (min-width: 920px) {
  .u-row {
    width: 900px !important;
  }
  .u-row .u-col {
    vertical-align: top;
  }

  .u-row .u-col-100 {
    width: 900px !important;
  }

}

@media (max-width: 920px) {
  .u-row-container {
    max-width: 100% !important;
    padding-left: 0px !important;
    padding-right: 0px !important;
  }
  .u-row .u-col {
    min-width: 320px !important;
    max-width: 100% !important;
    display: block !important;
  }
  .u-row {
    width: 100% !important;
  }
  .u-col {
    width: 100% !important;
  }
  .u-col > div {
    margin: 0 auto;
  }
}
body {
  margin: 0;
  padding: 0;
}

table,
tr,
td {
  vertical-align: top;
  border-collapse: collapse;
}

p {
  margin: 0;
}

.ie-container table,
.mso-container table {
  table-layout: fixed;
}

* {
  line-height: inherit;
}

a[x-apple-data-detectors="true"] {
  color: inherit !important;
  text-decoration: none !important;
}

table, td { color: #000000; } </style>
  
  

</head>

<body class="clean-body u_body" style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #00000000;color: #000000">
  <!--[if IE]><div class="ie-container"><![endif]-->
  <!--[if mso]><div class="mso-container"><![endif]-->
  <table style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: #00000000;width:100%" cellpadding="0" cellspacing="0">
  <tbody>
  <tr style="vertical-align: top">
    <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">
    <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color: #00000000;"><![endif]-->
    

<div class="u-row-container" style="padding: 0px;background-color: transparent">
  <div class="u-row" style="Margin: 0 auto 0 0;min-width: 320px;max-width: 900px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
    <div style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
      <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="left"><table cellpadding="0" cellspacing="0" border="0" style="width:900px;"><tr style="background-color: transparent;"><![endif]-->
      
<!--[if (mso)|(IE)]><td align="center" width="900" style="width: 900px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
<div class="u-col u-col-100" style="max-width: 320px;min-width: 900px;display: table-cell;vertical-align: top;">
  <div style="height: 100%;width: 100% !important;">
  <!--[if (!mso)&(!IE)]><!--><div style="height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;"><!--<![endif]-->
  
<table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
  <tbody>
    <tr>
      <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;" align="left">
        
  <div style="line-height: 140%; text-align: left; word-wrap: break-word;">
    <p style="font-size: 14px; line-height: 140%;">Kepada,</p>
<p style="font-size: 14px; line-height: 140%;"><strong>#NAME#</strong></p>
<p style="font-size: 14px; line-height: 140%;">Di Tempat</p>
  </div>

      </td>
    </tr>
  </tbody>
</table>

<table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
  <tbody>
    <tr>
      <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;" align="left">
        
  <table height="0px" align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 1px solid #BBBBBB;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
    <tbody>
      <tr style="vertical-align: top">
        <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 0px;line-height: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
          <span>&#160;</span>
        </td>
      </tr>
    </tbody>
  </table>

      </td>
    </tr>
  </tbody>
</table>

<table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
  <tbody>
    <tr>
      <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;" align="left">
        
  <div style="line-height: 140%; text-align: left; word-wrap: break-word;">
    <p style="font-size: 14px; line-height: 140%;">Dengan hormat,<br />Bersama ini kami informasikan menurut catatan kami, masih ada biaya sampai dengan periode semester ganjil Tahun Ajaran 2021/2022 yang belum dibayarkan, dengan data sebagai berikut:</p>
  </div>

      </td>
    </tr>
  </tbody>
</table>

<table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
  <tbody>
    <tr>
      <td style="overflow-wrap:break-word;word-break:break-word;padding:10px 10px 10px 50px;font-family:arial,helvetica,sans-serif;" align="left">
        
  <div style="line-height: 140%; text-align: left; word-wrap: break-word;">
    <p style="font-size: 14px; line-height: 140%;"><strong>Nama : #NAME#</strong></p>
<p style="font-size: 14px; line-height: 140%;"><strong>Nomor VA : 71129#BP#</strong><br /><strong>Prodi : S1 #PRODI#</strong><br /><strong>Tagihan Semester : Rp #TOTAL#</strong></p>
  </div>

      </td>
    </tr>
  </tbody>
</table>

<table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
  <tbody>
    <tr>
      <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;" align="left">
        
  <div style="line-height: 140%; text-align: left; word-wrap: break-word;">
    <p style="font-size: 14px; line-height: 140%;">Untuk pembayaran tersebut dapat dilakukan melalui rekening Virtual Account selambatnya tanggal 30 Januari 2022. Terima kasih atas kerjasama yang baik.</p>
  </div>

      </td>
    </tr>
  </tbody>
</table>

<table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
  <tbody>
    <tr>
      <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;" align="left">
        
  <table height="0px" align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 1px solid #BBBBBB;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
    <tbody>
      <tr style="vertical-align: top">
        <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 0px;line-height: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
          <span>&#160;</span>
        </td>
      </tr>
    </tbody>
  </table>

      </td>
    </tr>
  </tbody>
</table>

<table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
  <tbody>
    <tr>
      <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;" align="left">
        
  <div style="line-height: 140%; text-align: left; word-wrap: break-word;">
    <p style="font-size: 14px; line-height: 140%;">Salam,<br />FebiA</p>
<p style="font-size: 14px; line-height: 140%;">Finance</p>
  </div>

      </td>
    </tr>
  </tbody>
</table>

  <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
  </div>
</div>
<!--[if (mso)|(IE)]></td><![endif]-->
      <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
    </div>
  </div>
</div>


    <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
    </td>
  </tr>
  </tbody>
  </table>
  <!--[if mso]></div><![endif]-->
  <!--[if IE]></div><![endif]-->
</body>

</html> 
  ';
}

$email_body_alt = 'Hello, This is tes email from server ' . $_SERVER['HTTP_HOST'] . ' on ' . date('Y-m-d H:i:s') . '.';


$email_to = array(
  0 => array(
    'total' => '25000000',
    'email' => 'irvan.erdika@pmbs.ac.id',
    'name' => 'irvan',
    'bp' => '1000007715',
    'prodi' => 'Business'
  ),
);

$key = 0;
sendEmail(
  $email_to[$key]['email'],
  $email_to[$key]['name'],
  $email_to[$key]['bp'],
  $email_to[$key]['prodi'],
  $email_to[$key]['total'],
  $email_subject,
  $email_body,
  $email_body_alt
);

$i = 1;
if (false)
  foreach ($email_to as $key => $value) {


    // if (!empty($email_to[$key]['sks_fee'])) {
    //     $email_to[$key]['p_sks_fee'] = $email_to[$key]['sks_fee'] * 10 / 100;
    // }else{
    //     $email_to[$key]['p_sks_fee'] = '0';
    // }
    $email_to[$key]['total'] = empty($email_to[$key]['total']) ? '0' : str_replace(',', '.', $email_to[$key]['total']);
    // $email_to[$key]['fixed_fee'] = empty($email_to[$key]['fixed_fee']) ? '0' : str_replace(',', '.', $email_to[$key]['fixed_fee']);
    // $email_to[$key]['sks_fee'] = empty($email_to[$key]['sks_fee']) ? '0' : str_replace(',', '.', $email_to[$key]['sks_fee']);
    // $email_to[$key]['lab_fee'] = empty($email_to[$key]['lab_fee']) ? '0' : str_replace(',', '.', $email_to[$key]['lab_fee']);
    // $email_to[$key]['orie_fee'] = empty($email_to[$key]['orie_fee']) ? '0' : str_replace(',', '.', $email_to[$key]['orie_fee']);
    $email_to[$key]['total'] = number_format($email_to[$key]['total'], 0, ",", ".");
    // $email_to[$key]['fixed_fee'] = number_format($email_to[$key]['fixed_fee'],0,",",".");
    // $email_to[$key]['sks_fee'] = number_format($email_to[$key]['sks_fee'],0,",",".");
    // $email_to[$key]['lab_fee'] = number_format($email_to[$key]['lab_fee'],0,",",".");
    // $email_to[$key]['orie_fee'] = number_format($email_to[$key]['orie_fee'],0,",",".");
    // $email_to[$key]['p_sks_fee'] = number_format($email_to[$key]['p_sks_fee'],0,",",".");

    // $email_to[$key]['due_date'] = date("j F Y", strtotime($email_to[$key]['due_date']));
    // $email_to[$key]['due_date'] = tanggal_indo($email_to[$key]['due_date']);

    // Sending email
    sendEmail($email_to[$key]['email'], $email_to[$key]['name'], $email_to[$key]['bp'], $email_to[$key]['prodi'], $email_to[$key]['total'], $email_subject, $email_body, $email_body_alt);
    echo 'Sending email #' . $i . ' to ' . $email_to[$key]['email'] . ' ...<br>';

    flush();
    ob_flush();
    sleep($wait);
    $i++;
  }


// Function for sending email
function sendEmail($email_to, $name, $bp, $prodi, $total, $email_subject, $email_body, $email_body_alt = '')
{
  global $mailer_keepalive, $mailer_error, $mailer_readingto, $mailer_sender, $mailer_from, $mailer_from_name;
  include 'conn.php';
  date_default_timezone_set('Asia/Jakarta');

  // Send email process
  $mail = new PHPMailer(true); // Instantiation and passing 'true' param means it will throw exceptions on errors, which we need to catch

  try {
    // Load mailer configuration
    loadMailerConfig($mail);

    // Confirm Reading To
    if ($mailer_readingto != '') {
      $mail->ConfirmReadingTo = $mailer_readingto;                // Sets confirm reading to
    } else { // do nothing
    }

    //Sender
    $mail->Sender = $mailer_sender;                                 // Sets sender (not always work for secure SMTP)
    $mail->setFrom($mailer_from, $mailer_from_name);                // Sets email From (not always work for secure SMTP)

    //Reply To
    //$mail->addReplyTo($mailer_from, $mailer_from_name);             // Add Reply-To

    //Recipients
    //for ($i = 0 ; $i < count($email_to) ; $i++) {
    //    $mail->addAddress($email_to[$i]['email'], $email_to[$i]['name']); // Add a recipient
    //}
    $mail->addAddress($email_to, $name);                       // Add a recipient (name is optional)

    // CC and BCC
    // $mail->addCC('adrian.teja@pmbs.ac.id');                                // Add CC #1
    //$mail->addCC('cc2@example.com');                                // Add CC #2
    $mail->addBCC('finance.s1@prasetiyamulya.ac.id');                              // Add BCC #1
    //$mail->addBCC('bcc2@example.com');                              // Add BCC #2

    // Attachments
    //$mail->addAttachment('/var/www/html/web/card.jpg');             // Add attachments #1
    //$mail->addAttachment('pub/image/logo.jpg', 'pm_logo.jpg');      // Add Attachments #2 (with optional name)

    //$signature = '<img src="cid:logo" alt="" height="50">';
    $signature = '';
    //$mail->AddEmbeddedImage('twitter-bird.png', 'logo');

    $body_var = array('#NAME#', '#BP#', '#PRODI#', '#TOTAL#');
    $body_newval = array($name, $bp, $prodi, $total);
    $email_body = str_replace($body_var, $body_newval, $email_body);

    // Content
    $mail->Subject = $email_subject;                                // Email subject
    $mail->Body    = $email_body;                                   // HTML email content
    $mail->AltBody = $email_body_alt;                               // Plain text email content

    // Sending email
    $mail->send();                                                  // Sends email

    // Close SMTP connection
    if ($mailer_keepalive) {
      $mail->SmtpClose();                                         // Close SMTP connection
    } else { // do nothing
    }
    $now = date("Y-m-d H:i:s");
    // $sql = "UPDATE blast_email_semester1 SET email_send='Y', email_sendDtm='$now' WHERE bp=$bp";

    echo 'Email <strong>BERHASIL</strong> dikirim!';
    // if ($conn->query($sql) === TRUE) {
    //   echo " Record updated successfully ";
    // } else {
    //   echo " Error updating record: " . $conn->error . " ";
    // }
  } catch (Exception $e) {
    if ($mailer_error != '') {
      $msg = $mailer_error;
    } else {
      $msg = $mail->ErrorInfo;
    }

    echo 'Email <strong>GAGAL</strong> dikirim! Pesan: ' . $msg;

    echo '<br />$email_body:<br />';
    echo $email_body;
  }
}


// Function for mailer config loader
function loadMailerConfig(&$mail)
{
  global $mailer_method, $mailer_lang, $mailer_langpath, $mailer_debug, $mailer_host, $mailer_auth, $mailer_user, $mailer_pass, $mailer_secure, $mailer_port, $mailer_xmailer, $mailer_helo, $mailer_timeout, $mailer_keepalive, $mailer_priority, $mailer_singleto, $mailer_charset, $mailer_contenttype, $mailer_encoding, $mailer_wordwrap, $mailer_html;

  //Sets Mailer method
  if (strtolower(trim($mailer_method)) == 'mail') {
    $mail->IsMail(); // Sets Mailer to send message using PHP mail() function
  } else if (strtolower(trim($mailer_method)) == 'sendmail') {
    $mail->IsSendmail(); // Sets Mailer to send message using the Sendmail program
  } else if (strtolower(trim($mailer_method)) == 'smtp') {
    $mail->IsSMTP(); // Sets Mailer to send message using SMTP
  } else {
    $mail->IsQmail(); // Sets Mailer to send message using the qmail MTA
  }

  // Sets localisation
  if (strtolower(trim($mailer_lang)) != 'en') {
    $mail->setLanguage($mailer_lang, $mailer_langpath);         // Sets error message language
  } else { // do nothing
  }

  //Server settings
  $mail->SMTPDebug     = $mailer_debug;                           // Sets debug output
  $mail->Host          = $mailer_host;                            // Specify main and backup SMTP servers
  $mail->SMTPAuth      = $mailer_auth;                            // Sets SMTP authentication
  $mail->Username      = $mailer_user;                            // SMTP username
  $mail->Password      = $mailer_pass;                            // SMTP password
  $mail->SMTPSecure    = $mailer_secure;                          // Sets SMTP encryption
  $mail->Port          = $mailer_port;                            // TCP port to connect to
  $mail->XMailer       = $mailer_xmailer;                         // Sets X-Mailer Header
  $mail->Helo          = $mailer_helo;                            // Sets HELO
  $mail->Timeout       = $mailer_timeout;                         // Sets SMTP timeout
  $mail->SMTPKeepAlive = $mailer_keepalive;                       // Sets SMTP keep alive
  $mail->Priority      = $mailer_priority;                        // Sets Email priority
  $mail->SingleTo      = $mailer_singleto;                        // Sets single email
  $mail->CharSet       = $mailer_charset;                         // Sets charset of the message
  $mail->ContentType   = $mailer_contenttype;                     // Sets content-type of the message
  $mail->Encoding      = $mailer_encoding;                        // Sets encoding of the message
  $mail->WordWrap      = $mailer_wordwrap;                        // Sets wordwrap the message
  $mail->isHTML($mailer_html);                                    // Sets email content format
}

function tanggal_indo($tanggal)
{
  $bulan = array(
    1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $split = explode('-', $tanggal);
  return $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];
}

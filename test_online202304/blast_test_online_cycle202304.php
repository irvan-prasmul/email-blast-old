<?php
// key to authenticate
define('INDEX_AUTH', '1');

// including email configuration file
require_once 'config-email.php';

// including PHPMailer file
if (version_compare(PHP_VERSION, '5.5.0', '>=')) {
    require_once '../PHPMailer/6.0/src/PHPMailer.php';
    require_once '../PHPMailer/6.0/src/SMTP.php';
    //require_once 'PHPMailer/6.0/src/POP3.php'; // Keep this line commented, unless you are know what you are doing.
    //require_once 'PHPMailer/6.0/src/OAuth.php'; // Keep this line commented, unless you are know what you are doing.
} else {
    require_once '../PHPMailer/5.2/PHPMailerAutoload.php';
}

$wait = rand (5, 8);
require_once 'get_data.php';

// exit();
// Variables
$email_subject = 'Username, Password, Link Zoom Tes Online, dan Link Kuesioner Gelombang 4 Angkatan 2023 Universitas Prasetiya Mulya';
$email_body = '
<p>
    Dear #NAME#,
</p>
<p>
    <br>
</p>
<p>
    <b>Berikut informasi penting terkait pelaksanaan <i>Online Test</i> Universitas Prasetiya Mulya Gelombang 4 angkatan 2023. Tes dilaksanakan pada:</b>
    <table>
        <tr>
            <td style="padding: 1em;">Hari/Tanggal</td>      
            <td style="padding: 1em;">: Minggu / 18 Desember 2022</td>
        </tr>
        <tr>
            <td style="padding: 1em;">Pukul</td>
            <td style="padding: 1em;">: 08.00 - 12.00 WIB</td>
        </tr>
    </table>
</p>
<p>
    <b>Link Tes:</b>
    <ol>
        <li>Link Psikotest (Tes Psikologi) : <br> 
            <br>#LINK_PSIKO#<br><br>
        </li>
        <li>
            Link Tes (Matematika & Bahasa Inggris) : <br>
            <br>https://admissiontest.prasetiyamulya.ac.id/ <br>
            <table border=0>
                <tr>
                    <td style="padding: 1em;"><b>Username</b></td>
                    <td style="padding: 1em;">: #USERNAME#</td>
                </tr>
                <tr>
                    <td style="padding: 1em;"><b>Password</b></td>
                    <td style="padding: 1em;">: #PASSWORD#</td>
                </tr>
            </table>
        </li>
    </ol>
</p>
<p>
    <b>Ruang Tes (Zoom):</b>
    <table border=0>
        <tr>
            <td style="padding: 1em;"><b>Kelas</b></td>
            <td style="padding: 1em;">: #KELAS#</td>
        </tr>
        <tr>
            <td style="padding: 1em;"><b>Link Zoom</b></td>
            <td style="padding: 1em;">: #LINK_ZOOM#</td>
        </tr>
        <tr>
            <td style="padding: 1em;"><b>Meeting ID</b></td>
            <td style="padding: 1em;">: #MEETING_ID#</td>
        </tr>
        <tr>
            <td style="padding: 1em;"><b>Nama akun Zoom</b></td>
            <td style="padding: 1em;">: #MEETING_NAME#</td>
        </tr>
    </table>
</p>
<p>
    <b>Akun <i>zoom</i> harus dinamakan sesuai dengan nama akun zoom yang di infokan di email ini. (contoh: 1_Bambang Haryono)</b>
</p>
<p>
    <br>
</p>
<p>
    <b>Satu hari sebelum pelaksanaan tes, Anda dapat mencoba dahulu untuk <i>log in</i> agar pada hari tes tidak terjadi kendala dalam mengerjakan <i>online tes</i>.
</p>
<p>
    Pada hari tes silakan <i>log in</i> ke <i>Zoom</i> mulai pukul 07.30 WIB, karena akan dilakukan presensi terlebih dahulu.
</p>
<p>
    <b>*Anda dilarang untuk memulai tes sebelum petugas tes selesai menyampaikan seluruh instruksi tes*</b>
</p>
<p>
    Best regards,
</p>
<p>
    Admission S1
</p>
';
$email_body_alt = 'Hello, This is tes email from server ' . $_SERVER['HTTP_HOST'] . ' on '. date('Y-m-d H:i:s') . '.';
// print_r($email_body);
/*$email_to[0]['email'] = 'ghimawan@pmbs.ac.id';
$email_to[0]['name'] = 'Himawan';
$email_to[1]['email'] = 'irawan.ekasurya@pmbs.ac.id';
$email_to[1]['name'] = 'Irawan Ekasurya';*/

$body_duedate = '28 Juli 2020';

// $email_to = array(
// 	0 => array(
// 		'EMAIL' => 'andronikus.marintan@pmbs.ac.id',
// 		'NAME' => 'Andro',
// 		'USERNAME' => 'andronikus.marintan@pmbs.ac.id',
// 		'PASSWORD' => '123456',
// 		'KELAS' => '99',
// 		'LINK_ZOOM' => 'https://zoom.us/j/93004780944?pwd=YnIxaTIzaDlyL3JOZnptSDY5YXpzdz09',
// 		'MEETING_ID' => '930 0478 0944',
// 		'MEETING_PASS' => 'admisi',
// 		'MEETING_NAME' => '1_Bambang Haryono'
// 	),
// );
// $email_to = array(
	
// );

if (empty($data)) {
	print_r(" Data kosong");
	exit();
}else{
	$email_to = $data;	
}

// $email_to = array(
//  0 => array(
//      'EMAIL' => 'andronikus.marintan@pmbs.ac.id',
//      'NAME' => 'Andro',
//      'USERNAME' => 'andronikus.marintan@pmbs.ac.id',
//      'PASSWORD' => '123456',
//      'KELAS' => '99',
//      'LINK_ZOOM' => 'https://zoom.us/j/93004780944?pwd=YnIxaTIzaDlyL3JOZnptSDY5YXpzdz09',
//      'MEETING_ID' => '930 0478 0944',
//      'MEETING_PASS' => 'admisi',
//      'MEETING_NAME' => '99_Andronikus Marintan'
//  ),
// );


echo 'Total email to send: <strong>' . count($email_to) . '</strong><br>';
flush();
ob_flush();
$i = 1;
foreach ($email_to as $key => $value) {
    // $email_to[$key]['totalfee'] = empty($email_to[$key]['totalfee']) ? '0' : str_replace(',', '.', $email_to[$key]['totalfee']);
    // $email_to[$key]['orientationfee'] = empty($email_to[$key]['orientationfee']) ? '0' : str_replace(',', '.', $email_to[$key]['orientationfee']);
    // $email_to[$key]['labfee'] = empty($email_to[$key]['labfee']) ? '0' : str_replace(',', '.', $email_to[$key]['labfee']);
    // $email_to[$key]['sksfee'] = empty($email_to[$key]['sksfee']) ? '0' : str_replace(',', '.', $email_to[$key]['sksfee']);
    // $email_to[$key]['fixedfee'] = empty($email_to[$key]['fixedfee']) ? '0' : str_replace(',', '.', $email_to[$key]['fixedfee']);
    
    // Sending email
    sendEmail ($email_to[$key]['EMAIL'], $email_to[$key]['NAME'], $email_to[$key]['USERNAME'], $email_to[$key]['PASSWORD'], $email_to[$key]['KELAS'], $email_to[$key]['LINK_PSIKO'], $email_to[$key]['LINK_ZOOM'], $email_to[$key]['MEETING_ID'], $email_to[$key]['MEETING_PASS'], $email_to[$key]['MEETING_NAME'], $body_duedate, $email_subject, $email_body, $email_body_alt);
    echo 'Sending email #' . $i . ' to ' . $email_to[$key]['EMAIL'] . ' ...<br>';
    
    flush();
    ob_flush();
    sleep($wait);
    $i++;
}


// Function for sending email
function sendEmail ($email_to, $email_name, $USERNAME, $PASSWORD, $KELAS, $LINK_PSIKO, $LINK_ZOOM, $MEETING_ID, $MEETING_PASS, $MEETING_NAME, $duedate, $email_subject, $email_body, $email_body_alt = '')
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
        $mail->addAddress($email_to, $email_name);                       // Add a recipient (name is optional)
        
        // CC and BCC
        // $mail->addbCC('bernadete.muliawan@pmbs.ac.id');                                // Add CC #1
        $mail->addbCC('laras.permatahati@pmbs.ac.id');                                // Add CC #2
        // $mail->addBCC('rumy.haryanti@prasetiyamulya.ac.id');                              // Add BCC #1
        // $mail->addBCC('bernadete.muliawan@pmbs.ac.id');                              // Add BCC #2
        
        // Attachments
        //$mail->addAttachment('/var/www/html/web/card.jpg');             // Add attachments #1
        //$mail->addAttachment('pub/image/logo.jpg', 'pm_logo.jpg');      // Add Attachments #2 (with optional name)
        
        //$signature = '<img src="cid:logo" alt="" height="50">';
        $signature = '';
        //$mail->AddEmbeddedImage('twitter-bird.png', 'logo');
        
        $body_var = array('#NAME#', '#USERNAME#', '#PASSWORD#', '#KELAS#', '#LINK_PSIKO#', '#LINK_ZOOM#', '#MEETING_ID#', '#MEETING_PASS#', '#MEETING_NAME#', '#EMAIL#');
        $body_newval = array($email_name, $USERNAME, $PASSWORD, $KELAS, $LINK_PSIKO, $LINK_ZOOM, $MEETING_ID, $MEETING_PASS, $MEETING_NAME, $email_to);
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
        $sql = "UPDATE blast_email_test_online SET email_send='Y', email_sendDtm='$now' WHERE username='$USERNAME'";

        echo 'Email <strong>BERHASIL</strong> dikirim!';
		if ($conn->query($sql) === TRUE) {
		  echo " Record updated successfully ";
		} else {
		  echo " Error updating record: " . $conn->error . " ";
		}
    } catch (Exception $e) {
        if ($mailer_error != '') {
            $msg = $mailer_error;
        } else {
            $msg = $mail->ErrorInfo;
        }
        
        echo 'Email <strong>GAGAL</strong> dikirim! Pesan: ' . $msg;
    }
}


// Function for mailer config loader
function loadMailerConfig (&$mail)
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

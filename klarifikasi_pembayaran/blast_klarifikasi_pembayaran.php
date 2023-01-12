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

$wait = rand (3, 5);
require_once 'get_data.php';

// exit();
// Variables
$email_subject = 'Pembayaran Uang Kuliah Semester Ganjil 2020/2021';
$email_body = '
<p>
    Kepada 
    #NAME#
    <br>
    Di Tempat
</p>
<p>
    Dengan hormat,  
    <br><br>
    Bersama ini kami informasikan menurut catatan kami, #FIRST_NAME# belum melakukan pembayaran Biaya Semester ganjil - September 2020/1 ,  dengan data sebagai berikut:
</p>
<p>
    <table>
        <tr>
            <td>Nama </td>
            <td>: #NAME#</td>
        </tr>
        <tr>
            <td>Nomor VA </td>
            <td>: 711291#BP#</td>
        </tr>
        <tr>
            <td>Prodi </td>
            <td>: #PRODI#</td>
        </tr>
    </table>
</p>
<p>
    sebesar Rp. #TOTAL#,  terdiri atas :  
</p>
<p>
    <table>
        <tr>
            <td>Biaya Tetap (fixed fee) </td>
            <td>     semester ganjil - 2020/1  </td>
            <td>Rp.  </td>
            <td style="text-align:right">#FIXED_FEE#</td>
        </tr>
        <tr>
            <td>Biaya SKS (SKS fee) </td>
            <td>      semester ganjil - 2020/1 </td>
            <td>Rp. </td>
            <td style="text-align:right">#SKS_FEE#</td>
        </tr>
        <tr>
            <td>Biaya Laboratorium </td>
            <td>       semester ganjil - 2020/1 </td>
            <td>Rp. </td>
            <td style="text-align:right">#LAB_FEE#</td>
        </tr>
    </table>
</p>
<p>
    Untuk klarifikasi pembayaran di atas, mohon #FIRST_NAME# segera menghubungi kami Bagian Keuangan,  dengan mempersiapkan data dan atau bukti pembayaran sebelum tanggal  #DUE_DATE#  di email finance.s1@prasetiyamulya.ac.id, atau dapat menghubungi nomor wa : 08568113457.
</p>
<p>                        
    Kami mohon maaf jika klarifikasi ini membuat #FIRST_NAME#  kurang nyaman dan atas perhatian serta kerjasamanya kami mengucapkan terimakasih.
</p>
<p>
    Salam 
</p>
<p>
    Febia<br>
    Finance
</p>
';
$email_body_alt = 'Hello, This is tes email from server ' . $_SERVER['HTTP_HOST'] . ' on '. date('Y-m-d H:i:s') . '.';
/*$email_to[0]['email'] = 'ghimawan@pmbs.ac.id';
$email_to[0]['name'] = 'Himawan';
$email_to[1]['email'] = 'irawan.ekasurya@pmbs.ac.id';
$email_to[1]['name'] = 'Irawan Ekasurya';*/

// $body_duedate = '28 Juli 2020';

// $email_to = array(
// 	0 => array(
// 		'total' => '25.000.000',
// 		'email' => 'andronikus.marintan@pmbs.ac.id',
// 		'name' => 'Andro',
// 		'vabca' => '1000007715',
// 		'prodi' => 'Business',
// 		'orientationfee' => '4.000.000',
// 		'lab_fee' => '',
// 		'sks_fee' => '9.500.000',
// 		'fixed_fee' => '11.500.000'
// 	),
// );
$email_to = array(
	
);

if (empty($data)) {
	print_r(" Data kosong");
	exit();
}else{
	$email_to = $data;	
}

// $email_to = array(
// 	0 => array(
// 		'total' => '25.000.000',
// 		'email' => 'andronikus.marintan@pmbs.ac.id',
// 		'name' => 'Andro',
// 		'vabca' => '1000007715',
// 		'prodi' => 'Business',
// 		'orientationfee' => '4.000.000',
// 		'lab_fee' => '',
// 		'sks_fee' => '9.500.000',
// 		'fixed_fee' => '11.500.000'
// 	),
// );

echo 'Total email to send: <strong>' . count($email_to) . '</strong><br>';
flush();
ob_flush();
$i = 1;
foreach ($email_to as $key => $value) {
    $email_to[$key]['total'] = empty($email_to[$key]['total']) ? '0' : str_replace(',', '.', $email_to[$key]['total']);
    $email_to[$key]['fixed_fee'] = empty($email_to[$key]['fixed_fee']) ? '0' : str_replace(',', '.', $email_to[$key]['fixed_fee']);
    $email_to[$key]['sks_fee'] = empty($email_to[$key]['sks_fee']) ? '0' : str_replace(',', '.', $email_to[$key]['sks_fee']);
    $email_to[$key]['lab_fee'] = empty($email_to[$key]['lab_fee']) ? '0' : str_replace(',', '.', $email_to[$key]['lab_fee']);
    // $email_to[$key]['orientationfee'] = empty($email_to[$key]['orientationfee']) ? '0' : str_replace(',', '.', $email_to[$key]['orientationfee']);
    $email_to[$key]['total'] = number_format($email_to[$key]['total'],0,",",".");
    $email_to[$key]['fixed_fee'] = number_format($email_to[$key]['fixed_fee'],0,",",".");
    $email_to[$key]['sks_fee'] = number_format($email_to[$key]['sks_fee'],0,",",".");
    $email_to[$key]['lab_fee'] = number_format($email_to[$key]['lab_fee'],0,",",".");

    // $email_to[$key]['due_date'] = date("j F Y", strtotime($email_to[$key]['due_date']));
    $email_to[$key]['due_date'] = tanggal_indo($email_to[$key]['due_date']);
    
    // Sending email
    sendEmail ($email_to[$key]['email'], $email_to[$key]['name'], $email_to[$key]['first_name'], $email_to[$key]['nim'], $email_to[$key]['bp'], $email_to[$key]['prodi'], $email_to[$key]['total'], $email_to[$key]['fixed_fee'], $email_to[$key]['sks_fee'], $email_to[$key]['lab_fee'], $email_to[$key]['due_date'], $email_subject, $email_body, $email_body_alt);
    echo 'Sending email #' . $i . ' to ' . $email_to[$key]['email'] . ' ...<br>';
    
    flush();
    ob_flush();
    sleep($wait);
    $i++;
}


// Function for sending email
function sendEmail ($email_to, $name, $first_name, $nim, $bp, $prodi, $total, $fixed_fee, $sks_fee, $lab_fee, $due_date, $email_subject, $email_body, $email_body_alt = '')
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
        //$mail->addBCC('finance.s1@prasetiyamulya.ac.id');                              // Add BCC #1
        //$mail->addBCC('bcc2@example.com');                              // Add BCC #2
        
        // Attachments
        //$mail->addAttachment('/var/www/html/web/card.jpg');             // Add attachments #1
        //$mail->addAttachment('pub/image/logo.jpg', 'pm_logo.jpg');      // Add Attachments #2 (with optional name)
        
        //$signature = '<img src="cid:logo" alt="" height="50">';
        $signature = '';
        //$mail->AddEmbeddedImage('twitter-bird.png', 'logo');
        
        $body_var = array('#NAME#', '#FIRST_NAME#', '#BP#', '#PRODI#', '#TOTAL#', '#FIXED_FEE#', '#SKS_FEE#', '#LAB_FEE#', '#DUE_DATE#');
        $body_newval = array($name, $first_name, $bp, $prodi, $total, $fixed_fee, $sks_fee, $lab_fee, $due_date);
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
        $sql = "UPDATE blast_email_klarifikasi_pembayaran SET email_send='Y', email_sendDtm='$now' WHERE nim=$nim";

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

function tanggal_indo($tanggal)
{
    $bulan = array (1 =>   'Januari',
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
    return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
}
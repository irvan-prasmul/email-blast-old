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

$wait = rand (3, 7);
// require_once 'get_data.php';

// exit();
// Variables
$email_subject = 'Reminder Pembayaran Biaya Semester';
$email_body = '
<p>
    Kepada,
    <br>
    <strong>#NAME#</strong>
    <br>
    Di Tempat
</p>
<p>&nbsp;</p>
<p>
    Dengan hormat,
</p>
<p>
    Bersama ini kami informasikan menurut catatan kami, masih ada biaya yang belum dibayarkan, dengan data sebagai berikut:
</p>
<table border="0">
    <tr>
        <td><strong>Nama</strong></td>
        <td>&nbsp;<strong>:</strong>&nbsp;</td>
        <td><strong>#NAME#</strong></td>
    </tr>
    <tr>
        <td><strong>Nomor VA</strong></td>
        <td>&nbsp;<strong>:</strong>&nbsp;</td>
        <td><strong>71129#BP#</strong></td>
    </tr>
    <tr>
        <td><strong>Prodi</strong></td>
        <td>&nbsp;<strong>:</strong>&nbsp;</td>
        <td><strong>S1 #PRODI#</strong></td>
    </tr>
    <tr>
        <td><strong>Tagihan Semester</strong></td>
        <td>&nbsp;<strong>:</strong>&nbsp;</td>
        <td><strong>Rp #TOTAL#</strong></td>
    </tr>
</table>
<p>
    Untuk pembayaran tersebut dapat dilakukan melalui rekening Virtual Account selambatnya tanggal 30 Agustus 2021.  Terima kasih atas kerjasama yang baik.
</p>
<p>&nbsp;</p>
<p>
    Salam,
</p>
<p>
    FebiA
    <br>
    Finance
    <br>
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

// if (empty($data)) {
// 	print_r(" Data kosong");
// 	exit();
// }else{
// 	$email_to = $data;	
// }


$email_to = array(
    0 => array(
        'total' => '3847500',
        'email' => '02310171015@student.prasetiyamulya.ac.id',
        'name' => 'Billy Sugiarto',
        'bp' => '1000000679',
        'prodi' => 'Business Mathematics'
    ),
    1 => array(
        'total' => '1282500',
        'email' => '02310171018@student.prasetiyamulya.ac.id',
        'name' => 'Anggo Hamidisyafiq Irfan',
        'bp' => '1000000682',
        'prodi' => 'Business Mathematics'
    ),
    2 => array(
        'total' => '15775000',
        'email' => '02320171014@student.prasetiyamulya.ac.id',
        'name' => 'Vero Nobellenskvia',
        'bp' => '1000000715',
        'prodi' => 'Food Business Technology'
    ),
    3 => array(
        'total' => '15775000',
        'email' => '02320171017@student.prasetiyamulya.ac.id',
        'name' => 'Rr. Andira Claribel Wijanarko',
        'bp' => '1000000718',
        'prodi' => 'Food Business Technology'
    ),
    4 => array(
        'total' => '3847500',
        'email' => '02350171002@student.prasetiyamulya.ac.id',
        'name' => 'Stanley Wyatt Adema',
        'bp' => '1000000730',
        'prodi' => 'Software Engineering'
    ),
    5 => array(
        'total' => '3847500',
        'email' => '02350171003@student.prasetiyamulya.ac.id',
        'name' => 'Dimas Pratama Widyatmojo',
        'bp' => '1000000731',
        'prodi' => 'Software Engineering'
    ),
    6 => array(
        'total' => '15340000',
        'email' => '23101810001@student.prasetiyamulya.ac.id',
        'name' => 'Edward Eldson',
        'bp' => '1000005092',
        'prodi' => 'Business Mathematics'
    ),
    7 => array(
        'total' => '8550000',
        'email' => '23101810008@student.prasetiyamulya.ac.id',
        'name' => 'Vincentius Christopher Calvin',
        'bp' => '1000001898',
        'prodi' => 'Business Mathematics'
    ),
    8 => array(
        'total' => '20477500',
        'email' => '23101810018@student.prasetiyamulya.ac.id',
        'name' => 'Imelda Averina',
        'bp' => '1000005002',
        'prodi' => 'Business Mathematics'
    ),
    9 => array(
        'total' => '3847500',
        'email' => '23101810023@student.prasetiyamulya.ac.id',
        'name' => 'Evelyne Natalie Wijaya',
        'bp' => '1000000735',
        'prodi' => 'Business Mathematics'
    ),
    10 => array(
        'total' => '21760000',
        'email' => '23101810041@student.prasetiyamulya.ac.id',
        'name' => 'Oliver Wang Surjadi',
        'bp' => '1000004351',
        'prodi' => 'Business Mathematics'
    ),
    11 => array(
        'total' => '23820500',
        'email' => '23101810073@student.prasetiyamulya.ac.id',
        'name' => 'Alicia Sophie Suroso',
        'bp' => '1000000827',
        'prodi' => 'Business Mathematics'
    ),
    12 => array(
        'total' => '3847500',
        'email' => '23101810094@student.prasetiyamulya.ac.id',
        'name' => 'reynanda adhima purwoko',
        'bp' => '1000004582',
        'prodi' => 'Business Mathematics'
    ),
    13 => array(
        'total' => '3847500',
        'email' => '23201810003@student.prasetiyamulya.ac.id',
        'name' => 'Joe Vincent Chandra',
        'bp' => '1000000298',
        'prodi' => 'Food Business Technology'
    ),
    14 => array(
        'total' => '3847500',
        'email' => '23201810013@student.prasetiyamulya.ac.id',
        'name' => 'Tania Arivia',
        'bp' => '1000000943',
        'prodi' => 'Food Business Technology'
    ),
    15 => array(
        'total' => '3847500',
        'email' => '23201810015@student.prasetiyamulya.ac.id',
        'name' => 'Alwin Winardi',
        'bp' => '1000000255',
        'prodi' => 'Food Business Technology'
    ),
    16 => array(
        'total' => '3847500',
        'email' => '23201810018@student.prasetiyamulya.ac.id',
        'name' => 'Aldi Prambarwara',
        'bp' => '1000000823',
        'prodi' => 'Food Business Technology'
    ),
    17 => array(
        'total' => '3375000',
        'email' => '23201810019@student.prasetiyamulya.ac.id',
        'name' => 'Irvan .',
        'bp' => '1000000098',
        'prodi' => 'Food Business Technology'
    ),
    18 => array(
        'total' => '3847500',
        'email' => '23201810020@student.prasetiyamulya.ac.id',
        'name' => 'Giovani Benvin',
        'bp' => '1000004425',
        'prodi' => 'Food Business Technology'
    ),
    19 => array(
        'total' => '3847500',
        'email' => '23201810026@student.prasetiyamulya.ac.id',
        'name' => 'Rexy Setiawan',
        'bp' => '1000004504',
        'prodi' => 'Food Business Technology'
    ),
    20 => array(
        'total' => '3847500',
        'email' => '23201810027@student.prasetiyamulya.ac.id',
        'name' => 'Catya .',
        'bp' => '1000005220',
        'prodi' => 'Food Business Technology'
    ),
    21 => array(
        'total' => '3847500',
        'email' => '23201810032@student.prasetiyamulya.ac.id',
        'name' => 'Richard Marvel Wijaya',
        'bp' => '1000004490',
        'prodi' => 'Food Business Technology'
    ),
    22 => array(
        'total' => '427500',
        'email' => '23401810006@student.prasetiyamulya.ac.id',
        'name' => 'Nathanael Jeremy Andrianto',
        'bp' => '1000000444',
        'prodi' => 'Computer Systems Engineering'
    ),
    23 => array(
        'total' => '897500',
        'email' => '23601810005@student.prasetiyamulya.ac.id',
        'name' => 'Medelyn Angel Hartono',
        'bp' => '1000000478',
        'prodi' => 'Product Design Engineering'
    ),
    24 => array(
        'total' => '17912500',
        'email' => '23101910033@student.prasetiyamulya.ac.id',
        'name' => 'Laura Stephanie Chandra',
        'bp' => '1000009094',
        'prodi' => 'Business Mathematics'
    ),
    25 => array(
        'total' => '17912500',
        'email' => '23101910052@student.prasetiyamulya.ac.id',
        'name' => 'Wesley Mulia Salim',
        'bp' => '1000008622',
        'prodi' => 'Business Mathematics'
    ),
    26 => array(
        'total' => '14920000',
        'email' => '23101910063@student.prasetiyamulya.ac.id',
        'name' => 'Gilbert Chandra',
        'bp' => '1000006159',
        'prodi' => 'Business Mathematics'
    ),
    27 => array(
        'total' => '22519300',
        'email' => '23301910007@student.prasetiyamulya.ac.id',
        'name' => 'David Setianto Yustus',
        'bp' => '1000005645',
        'prodi' => 'Renewable Energy Engineering'
    ),
    28 => array(
        'total' => '20050000',
        'email' => '23401910009@student.prasetiyamulya.ac.id',
        'name' => 'Yashafi Yan Arsala',
        'bp' => '1000007694',
        'prodi' => 'Computer Systems Engineering'
    ),
    29 => array(
        'total' => '19622500',
        'email' => '23501910010@student.prasetiyamulya.ac.id',
        'name' => 'Surya chandra',
        'bp' => '1000008224',
        'prodi' => 'Software Engineering'
    ),
    30 => array(
        'total' => '427500',
        'email' => '23601910002@student.prasetiyamulya.ac.id',
        'name' => 'Anthony Johan Gunawan',
        'bp' => '1000006442',
        'prodi' => 'Product Design Engineering'
    ),
    31 => array(
        'total' => '1800000',
        'email' => '23102010023@student.prasetiyamulya.ac.id',
        'name' => 'Phillip Fabian',
        'bp' => '1000010416',
        'prodi' => 'Business Mathematics'
    ),
    32 => array(
        'total' => '1800000',
        'email' => '23102010064@student.prasetiyamulya.ac.id',
        'name' => 'Christopher Hidayat',
        'bp' => '1000012623',
        'prodi' => 'Business Mathematics'
    ),
    33 => array(
        'total' => '18450000',
        'email' => '23102010076@student.prasetiyamulya.ac.id',
        'name' => 'Benaya Given Janto',
        'bp' => '1000013188',
        'prodi' => 'Business Mathematics'
    ),
);

// $email_to = array(
// 	0 => array(
// 		'total' => '25000000',
// 		'email' => 'andronikus.marintan@pmbs.ac.id',
// 		'name' => 'Andro',
// 		'bp' => '1000007715',
// 		'prodi' => 'Business'
// 	),
// );

echo 'Total email to send: <strong>' . count($email_to) . '</strong><br>';
flush();
ob_flush();
$i = 1;
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
    $email_to[$key]['total'] = number_format($email_to[$key]['total'],0,",",".");
    // $email_to[$key]['fixed_fee'] = number_format($email_to[$key]['fixed_fee'],0,",",".");
    // $email_to[$key]['sks_fee'] = number_format($email_to[$key]['sks_fee'],0,",",".");
    // $email_to[$key]['lab_fee'] = number_format($email_to[$key]['lab_fee'],0,",",".");
    // $email_to[$key]['orie_fee'] = number_format($email_to[$key]['orie_fee'],0,",",".");
    // $email_to[$key]['p_sks_fee'] = number_format($email_to[$key]['p_sks_fee'],0,",",".");

    // $email_to[$key]['due_date'] = date("j F Y", strtotime($email_to[$key]['due_date']));
    // $email_to[$key]['due_date'] = tanggal_indo($email_to[$key]['due_date']);
    
    // Sending email
    sendEmail ($email_to[$key]['email'], $email_to[$key]['name'], $email_to[$key]['bp'], $email_to[$key]['prodi'], $email_to[$key]['total'], $email_subject, $email_body, $email_body_alt);
    echo 'Sending email #' . $i . ' to ' . $email_to[$key]['email'] . ' ...<br>';
    
    flush();
    ob_flush();
    sleep($wait);
    $i++;
}


// Function for sending email
function sendEmail ($email_to, $name, $bp, $prodi, $total, $email_subject, $email_body, $email_body_alt = '')
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
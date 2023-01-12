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

// foreach ($data as $key => $value) {
//     print_r($data[$key]['nik']."<br>");
//     $sql1 = "SELECT * FROM blast_email_um WHERE `email_send` = 'N' AND nik = '".$data[$key]['nik']."' LIMIT 1000;";
//     // print_r($sql1);
//     $result1 = $conn->query($sql1);

//     // print_r($result1);
//     if ($result1->num_rows > 0) {
//         // output data of each row
//         $tbl_row = "";
//         $g_total = 0;
//         while($row1 = $result1->fetch_assoc()) {
//             // print_r($row1);
//             // $temp1["tgl_um"] = $row1["tgl_um"];
//             // $temp1["keterangan"] = $row1["keterangan"];
//             // $temp1["total"] = $row1["total"];
//             // $temp1["outs_day"] = $row1["outs_day"];
//             $g_total = $g_total + $row1['total'];
//             $row1['total'] = empty($row1['total']) ? '0' : str_replace(',', '.', $row1['total']);
//             $row1['total'] = number_format($row1['total'],0,",",".");

//             $row1['tgl_um'] = tanggal_indo($row1['tgl_um']);

//             $tbl_row .= '<tr><td align="center">'.$row1["tgl_um"].'</td>'.
//             '<td>'.$row1["keterangan"].'</td>'.
//             '<td align="right">'.$row1["total"].'</td>'.
//             '<td align="center">'.$row1["outs_day"].'</td></tr>';
//             // $outs[] = $temp1;
//             // print_r($tbl_row);
//             // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
//         }
//         $data[$key]['tbl_row'] = $tbl_row;
//         $data[$key]['g_total'] = $g_total;
//     }
// }    
// $conn->close();
// print_r("<pre>");
// print_r($data);
// print_r("</pre>");

// exit();
// Variables
$email_subject = '(REMINDER) Pertanggungjawaban Uang Muka';
$email_body = '
<p>
    Kepada Yth #TITLE# #NAME#
</p>
<p>
    Bersama ini kami mengingatkan adanya Uang Muka atas nama #TITLE# yang belum dipertanggungjawabkan sebesar <b>Rp #G_TOTAL#,-</b> , dengan rincian sebagai berikut :
</p>
<p>
    <table border="1">
        <tr>
            <th>
                Tgl Uang Muka Diterima
            </th>
            <th>
                Keterangan
            </th>
            <th>
                Grand Total
            </th>
            <th>
                Lama Outstanding (Hari)
            </th>            
        </tr>
        #TBL_ROW#
    </table>
</p>
<p>
    Sehubungan dengan hal tersebut di atas, kami mohon kerjasama #TITLE# untuk segera menyerahkan Laporan Pertanggungjawaban uang muka tersebut ke Bagian Keuangan - #PIC# (#PIC_EMAIL#). Apabila laporan pertanggungjawaban sudah pernah diserahkan, mohon mengonfirmasi kembali ke Bagian Keuangan.
</p>
<p>
    Sebagai informasi, posisi uang muka yang belum dipertanggung jawabkan akan mempengaruhi persetujuan pengajuan uang muka berikutnya.
</p>
<p>
    Demikian hal ini kami sampaikan, mohon bantuan dan konfirmasinya. Atas perhatian dan kerjasamanya kami ucapkan terima kasih.
</p>
<p>&nbsp;</p>
<p>
    Hormat Kami,
</p>
<p>
    Febia
    <br>
    Keuangan
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


    
    // if (!empty($email_to[$key]['sks_fee'])) {
    //     $email_to[$key]['p_sks_fee'] = $email_to[$key]['sks_fee'] * 10 / 100;
    // }else{
    //     $email_to[$key]['p_sks_fee'] = '0';
    // }
    // $email_to[$key]['total'] = empty($email_to[$key]['total']) ? '0' : str_replace(',', '.', $email_to[$key]['total']);
    // $email_to[$key]['fixed_fee'] = empty($email_to[$key]['fixed_fee']) ? '0' : str_replace(',', '.', $email_to[$key]['fixed_fee']);
    // $email_to[$key]['sks_fee'] = empty($email_to[$key]['sks_fee']) ? '0' : str_replace(',', '.', $email_to[$key]['sks_fee']);
    // $email_to[$key]['lab_fee'] = empty($email_to[$key]['lab_fee']) ? '0' : str_replace(',', '.', $email_to[$key]['lab_fee']);
    // $email_to[$key]['orie_fee'] = empty($email_to[$key]['orie_fee']) ? '0' : str_replace(',', '.', $email_to[$key]['orie_fee']);
    // $email_to[$key]['total'] = number_format($email_to[$key]['total'],0,",",".");
    // $email_to[$key]['fixed_fee'] = number_format($email_to[$key]['fixed_fee'],0,",",".");
    // $email_to[$key]['sks_fee'] = number_format($email_to[$key]['sks_fee'],0,",",".");
    // $email_to[$key]['lab_fee'] = number_format($email_to[$key]['lab_fee'],0,",",".");
    // $email_to[$key]['orie_fee'] = number_format($email_to[$key]['orie_fee'],0,",",".");
    // $email_to[$key]['p_sks_fee'] = number_format($email_to[$key]['p_sks_fee'],0,",",".");

    $sql1 = "SELECT * FROM blast_email_um WHERE `email_send` = 'N' AND email = '".$email_to[$key]['email']."' LIMIT 1000;";
    // print_r($sql1);
    $result1 = $conn->query($sql1);

    // print_r($result1);
    if ($result1->num_rows > 0) {
        // output data of each row
        $tbl_row = "";
        $g_total = 0;
        $send_id = "|";
        while($row1 = $result1->fetch_assoc()) {
            // print_r($row1);
            // $temp1["tgl_um"] = $row1["tgl_um"];
            // $temp1["keterangan"] = $row1["keterangan"];
            // $temp1["total"] = $row1["total"];
            // $temp1["outs_day"] = $row1["outs_day"];
            $g_total = $g_total + $row1['total'];
            $row1['total'] = empty($row1['total']) ? '0' : str_replace(',', '.', $row1['total']);
            $row1['total'] = number_format($row1['total'],0,",",".");
            
            $row1['tgl_um'] = tanggal_indo($row1['tgl_um']);

            $tbl_row .= '<tr><td align="center">'.$row1["tgl_um"].'</td>'.
            '<td>'.$row1["keterangan"].'</td>'.
            '<td align="right">'.$row1["total"].'</td>'.
            '<td align="center">'.$row1["outs_day"].'</td></tr>';
            $send_id .= $row1['id']."|";
            // $outs[] = $temp1;
            // print_r($tbl_row);
            // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        }
        $g_total = empty($g_total) ? '0' : str_replace(',', '.', $g_total);
        $g_total = number_format($g_total,0,",",".");
        $tbl_row.= '<tr><td align="center"></td>'.
            '<td></td>'.
            '<td align="right"><b>'.$g_total.'</b></td>'.
            '<td align="center"></td></tr>';
        $email_to[$key]['tbl_row'] = $tbl_row;
        $email_to[$key]['g_total'] = $g_total;
        $email_to[$key]['send_id'] = $send_id;
    }


    // $email_to[$key]['g_total'] = empty($email_to[$key]['g_total']) ? '0' : str_replace(',', '.', $email_to[$key]['g_total']);
    // $email_to[$key]['g_total'] = number_format($email_to[$key]['g_total'],0,",",".");
    // $email_to[$key]['due_date'] = date("j F Y", strtotime($email_to[$key]['due_date']));
    // $email_to[$key]['due_date'] = tanggal_indo($email_to[$key]['due_date']);

    
    // Sending email
    sendEmail ($email_to[$key]['email'], $email_to[$key]['nik'], $email_to[$key]['name'], $email_to[$key]['title'], $email_to[$key]['pic'], $email_to[$key]['pic_email'], $email_to[$key]['tbl_row'], $email_to[$key]['g_total'], $email_to[$key]['send_id'], $email_subject, $email_body, $email_body_alt);
    echo 'Sending email #' . $i . ' to ' . $email_to[$key]['email'] . ' ...<br>';
    
    flush();
    ob_flush();
    sleep($wait);
    $i++;
}
$conn->close();
print_r("<pre>");
// print_r($pieces);
print_r($email_to);
print_r("</pre>");

exit();


// Function for sending email
function sendEmail ($email_to, $nik, $name, $title, $pic, $pic_email, $tbl_row, $g_total, $send_id, $email_subject, $email_body, $email_body_alt = '')
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
        $mail->addBCC($pic_email);//'finance.s1@prasetiyamulya.ac.id');                              // Add BCC #1
        //$mail->addBCC('bcc2@example.com');                              // Add BCC #2
        
        // Attachments
        //$mail->addAttachment('/var/www/html/web/card.jpg');             // Add attachments #1
        //$mail->addAttachment('pub/image/logo.jpg', 'pm_logo.jpg');      // Add Attachments #2 (with optional name)
        
        //$signature = '<img src="cid:logo" alt="" height="50">';
        $signature = '';
        //$mail->AddEmbeddedImage('twitter-bird.png', 'logo');
        
        $body_var = array('#NAME#', '#TITLE#', '#G_TOTAL#', '#TBL_ROW#', '#PIC#', '#PIC_EMAIL#');
        $body_newval = array($name, $title, $g_total, $tbl_row, $pic, $pic_email);
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

        echo 'Email <strong>BERHASIL</strong> dikirim!';

        $pieces = explode("|", $send_id);
        foreach ($pieces as $key2 => $value2) {
            if ($value2 != "" && !empty($value2)) {
                $sql3 = "UPDATE blast_email_um SET email_send='Y', email_sendDtm='$now' WHERE id=$value2";
                // print_r($key2."-".$value2);                
                if ($conn->query($sql3) === TRUE) {
                  echo " Record updated successfully ".$key2."-".$value2;
                } else {
                  echo " Error updating record: " . $conn->error . " ";
                }
            }
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
<?php

use PHPMailer\PHPMailer\PHPMailer;
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
    // require_once '../PHPMailer/5.2/PHPMailerAutoload.php';
    // require_once '../../vendor/PHPMailer/6.0/src/PHPMailer.php';
    // require_once '../../vendor/PHPMailer/6.0/src/SMTP.php';
}

$wait = rand(3, 7);
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
    Bersama ini kami informasikan menurut catatan kami, masih ada biaya sampai dengan periode semester ganjil Tahun Ajaran 2021/2022 yang belum dibayarkan, dengan data sebagai berikut:
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
    Untuk pembayaran tersebut dapat dilakukan melalui rekening Virtual Account selambatnya tanggal 30 Januari 2022. Terima kasih atas kerjasama yang baik.
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
$email_body_alt = 'Hello, This is tes email from server ' . $_SERVER['HTTP_HOST'] . ' on ' . date('Y-m-d H:i:s') . '.';
/*$email_to[0]['email'] = 'ghimawan@pmbs.ac.id';
$email_to[0]['name'] = 'Himawan';
$email_to[1]['email'] = 'irawan.ekasurya@pmbs.ac.id';
$email_to[1]['name'] = 'Irawan Ekasurya';*/

// $body_duedate = '28 Juli 2020';

// $email_to = array(
// 	0 => array(
//         'total' => '5750000',
//         'email' => 'andronikus.marintan@pmbs.ac.id',
//         'name' => 'Dani Firmansyah',
//         'bp' => '1000008618',
//         'prodi' => 'Business'
// 	),
//     1 => array(
//         'total' => '8550000',
//         'email' => 'yustinus_ricky@pmbs.ac.id',
//         'name' => 'Melvernson Janlie',
//         'bp' => '1000006167',
//         'prodi' => 'Business'
//     ),
// );

// if (empty($data)) {
// 	print_r(" Data kosong");
// 	exit();
// }else{
// 	$email_to = $data;	
// }


$email_to = array(
    // 0 => array('total' => '5750000', 'email' => 'work.danifirmansyah@gmail.com', 'name' => 'Dani Firmansyah', 'bp' => '1000008618', 'prodi' => 'Business'),
    // 1 => array('total' => '8550000', 'email' => 'evernjanlie@gmail.com', 'name' => 'Melvernson Janlie', 'bp' => '1000006167', 'prodi' => 'Business'),
    // 2 => array('total' => '8550000', 'email' => 'yavin0304@gmail.com', 'name' => 'Nicholas Yavin', 'bp' => '1000008084', 'prodi' => 'Business'),
    // 3 => array('total' => '2115000', 'email' => 'glennslvr@gmail.com', 'name' => 'Glenn Silver Ang Putra', 'bp' => '1000005231', 'prodi' => 'Business Management'),
    // 4 => array('total' => '8550000', 'email' => 'jonathan96macenver@gmail.com', 'name' => 'jonathan mac enver', 'bp' => '1000006124', 'prodi' => 'Business Management'),
    // 5 => array('total' => '8550000', 'email' => 'ryan.edbert@yahoo.com', 'name' => 'Ryan Nurtanio', 'bp' => '1000006947', 'prodi' => 'Business'),
    // 6 => array('total' => '8550000', 'email' => 'dimaszulkarnain11@gmail.com', 'name' => 'Dimas Adhitya Zulkarnain', 'bp' => '1000008898', 'prodi' => 'Business'),
    // 7 => array('total' => '8550000', 'email' => 'jos26123@gmail.com', 'name' => 'jose andreas', 'bp' => '1000006566', 'prodi' => 'Business'),
    // 8 => array('total' => '522500', 'email' => 'yoelfredriks@gmail.com', 'name' => 'Yoel Fredrik', 'bp' => '1000005495', 'prodi' => 'Business Management'),
    // 9 => array('total' => '8550000', 'email' => 'ahmadmarta@yahoo.com', 'name' => 'Ahmad Fadhil Marta', 'bp' => '1000007783', 'prodi' => 'Business'),
    // 10 => array('total' => '8550000', 'email' => 'albertbaptista02@gmail.com', 'name' => 'Albert Baptista', 'bp' => '1000005632', 'prodi' => 'Business Management'),
    // 11 => array('total' => '8550000', 'email' => 'ireneyo889@gmail.com', 'name' => 'Irene Tiara Susanti', 'bp' => '1000007272', 'prodi' => 'Business'),
    // 12 => array('total' => '8550000', 'email' => 'antonius.matthew@gmail.com', 'name' => 'Antonius Matthew Arifin', 'bp' => '1000006358', 'prodi' => 'Business'),
    // 13 => array('total' => '8550000', 'email' => 'jeffersonimanuel07@gmail.com', 'name' => 'jefferson imannuel', 'bp' => '1000007134', 'prodi' => 'Business'),
    // 14 => array('total' => '8550000', 'email' => 'ryanchandra275@gmail.com', 'name' => 'Ryan Dewantara Chandra', 'bp' => '1000005437', 'prodi' => 'Business Management'),
    // 15 => array('total' => '8550000', 'email' => 'karelbillyjun3@gmail.com', 'name' => 'Karel Billy Jun', 'bp' => '1000005964', 'prodi' => 'Business Management'),
    // 16 => array('total' => '8550000', 'email' => 'mikovids@gmail.com', 'name' => 'Akmal Daniswara', 'bp' => '1000008435', 'prodi' => 'Business'),
    // 17 => array('total' => '8550000', 'email' => 'kenjichilwin5@gmail.com', 'name' => 'Kenji Chilwin', 'bp' => '1000007498', 'prodi' => 'Business'),
    // 18 => array('total' => '8550000', 'email' => 'andrewchrist007@gmail.com', 'name' => 'Andrew Christiansen Ridawaputra', 'bp' => '1000007545', 'prodi' => 'Business'),
    // 19 => array('total' => '8550000', 'email' => 'joshuabryan.candra@gmail.com', 'name' => 'Joshua Bryan Candra', 'bp' => '1000005237', 'prodi' => 'Business Management'),
    // 20 => array('total' => '8550000', 'email' => 'jasonardhrt@gmail.com', 'name' => 'Jason Ardian Hartanto', 'bp' => '1000006198', 'prodi' => 'Business'),
    // 21 => array('total' => '5985000', 'email' => 'Jehanfp@gmail.com', 'name' => 'Jehan Figlio Primo', 'bp' => '1000008746', 'prodi' => 'Business'),
    // 22 => array('total' => '8550000', 'email' => 'akbar2404@gmail.com', 'name' => 'Muhammad Rizki Akbar', 'bp' => '1000009186', 'prodi' => 'Business'),
    // 23 => array('total' => '8550000', 'email' => 'Valencia_law05@yahoo.com', 'name' => 'Valencia Lawrence', 'bp' => '1000008282', 'prodi' => 'Business'),
    // 24 => array('total' => '7695000', 'email' => 'francesco.sebastian23@gmail.com', 'name' => 'Franscesco Sebastian', 'bp' => '1000005846', 'prodi' => 'Business Management'),
    // 25 => array('total' => '8550000', 'email' => 'roy.stanley42@yahoo.com', 'name' => 'Stanley Teja', 'bp' => '1000006415', 'prodi' => 'Business'),
    // 26 => array('total' => '11500000', 'email' => 'franswega7@gmail.com', 'name' => 'Frans Wega', 'bp' => '1000005346', 'prodi' => 'Business Management'),
    // 27 => array('total' => '8550000', 'email' => 'josephphilip160202@gmail.com', 'name' => 'Joseph Jonathan Philip', 'bp' => '1000006030', 'prodi' => 'Business Management'),
    // 28 => array('total' => '2875000', 'email' => 'edodrmwn23@gmail.com', 'name' => 'Muhammad Edo Darmawan', 'bp' => '1000007560', 'prodi' => 'Business'),
    // 29 => array('total' => '2875000', 'email' => 'rizky.hartawan1212@gmail.com', 'name' => 'KMS. M. RIZKY HARTAWAN SYAPUTRA', 'bp' => '1000007623', 'prodi' => 'Business'),
    // 30 => array('total' => '8550000', 'email' => 'johnpiersjason2001@gmail.com', 'name' => 'John Pier\'s Jason Boanerges', 'bp' => '1000006293', 'prodi' => 'Business'),
    // 31 => array('total' => '7695000', 'email' => 'jonathanchristianhartono12@gmail.com', 'name' => 'Jonathan Christian Hartono', 'bp' => '1000006463', 'prodi' => 'Business'),
    // 32 => array('total' => '11500000', 'email' => 'frhnadhi@gmail.com', 'name' => 'Farhan Adhi Widiarsono', 'bp' => '1000008285', 'prodi' => 'Business'),
    // 33 => array('total' => '9405000', 'email' => 'adamberlian@gmail.com', 'name' => 'Adam Azisu Berlian', 'bp' => '1000009532', 'prodi' => 'Business'),
    // 34 => array('total' => '8122500', 'email' => 'gladysagatha9@gmail.com', 'name' => 'Gladys Agatha', 'bp' => '1000008287', 'prodi' => 'Branding'),
    // 35 => array('total' => '8122500', 'email' => 'williamsuryawiguna@gmail.com', 'name' => 'William Suryawiguna', 'bp' => '1000005748', 'prodi' => 'Branding'),
    // 36 => array('total' => '8122500', 'email' => 'sean.indrijanto@gmail.com', 'name' => 'Sean Indrijanto', 'bp' => '1000006264', 'prodi' => 'Branding'),
    // 37 => array('total' => '2875000', 'email' => 'the.andrekusuma@gmail.com', 'name' => 'Andre Kusuma', 'bp' => '1000007204', 'prodi' => 'Branding'),
    // 38 => array('total' => '665000', 'email' => 'rayhan_alvaro148@yahoo.com', 'name' => 'Rayhan Alvaro', 'bp' => '1000009400', 'prodi' => 'Branding'),
    // 39 => array('total' => '8122500', 'email' => 'donnybima@gmail.com', 'name' => 'Anasthasia Calista Pradnya Herjuno', 'bp' => '1000007339', 'prodi' => 'Branding'),
    // 40 => array('total' => '41715000', 'email' => 'willsonfww@gmail.com', 'name' => 'Willson Ferdinan Wiryanto', 'bp' => '1000008700', 'prodi' => 'Branding'),
    // 41 => array('total' => '2115000', 'email' => 'margaretpynthn@gmail.com', 'name' => 'Margaret Putri Yonathan', 'bp' => '1000006263', 'prodi' => 'Branding'),
    // 42 => array('total' => '8122500', 'email' => 'veronicaangela84@gmail.com', 'name' => 'Veronica Angela', 'bp' => '1000006196', 'prodi' => 'Branding'),
    // 43 => array('total' => '8122500', 'email' => 'ivan.nathaniels@gmail.com', 'name' => 'Ivan Nathaniel Susanto', 'bp' => '1000005986', 'prodi' => 'Branding'),
    // 44 => array('total' => '8550000', 'email' => 'averose.infinityblade@gmail.com', 'name' => 'Nicholas Khaleb Solagratia Budiman', 'bp' => '1000005917', 'prodi' => 'Finance and Banking'),
    // 45 => array('total' => '8122500', 'email' => 'nicholasalbert09@gmail.com', 'name' => 'Nicholas Albert Hermawan', 'bp' => '1000008265', 'prodi' => 'Finance and Banking'),
    // 46 => array('total' => '8550000', 'email' => 'lindatjhie@ymail.com', 'name' => 'Linda .', 'bp' => '1000005435', 'prodi' => 'Finance and Banking'),
    // 47 => array('total' => '8122500', 'email' => 'raissabintal@gmail.com', 'name' => 'Raissa Rengganis', 'bp' => '1000009596', 'prodi' => 'Finance and Banking'),
    // 48 => array('total' => '5557500', 'email' => 'mico2299wp@gmail.com', 'name' => 'Mico Wijaya Putra', 'bp' => '1000006450', 'prodi' => 'Finance and Banking'),
    // 49 => array('total' => '40290000', 'email' => 'patriciaejr23@gmail.com', 'name' => 'Alfred .', 'bp' => '1000005499', 'prodi' => 'Finance and Banking'),
    // 50 => array('total' => '25990000', 'email' => 'applefaiz504@gmail.com', 'name' => 'Faiz Fauzani Rinaldy', 'bp' => '1000005426', 'prodi' => 'Finance and Banking'),
    // 51 => array('total' => '8550000', 'email' => 'yeremiah.harianto@gmail.com', 'name' => 'yeremia Alexander Harianto', 'bp' => '1000005731', 'prodi' => 'Finance and Banking'),
    // 52 => array('total' => '8122500', 'email' => 'marsela.novica22@gmail.com', 'name' => 'Marsela Novica', 'bp' => '1000007463', 'prodi' => 'Finance and Banking'),
    // 53 => array('total' => '20787500', 'email' => 'daffarizqii218@gmail.com', 'name' => 'Daffa Rizqianaufal Maulidsyah', 'bp' => '1000008632', 'prodi' => 'Finance and Banking'),
    // 54 => array('total' => '5750000', 'email' => 'sabio.cns@gmail.com', 'name' => 'Charlie Napoleon Sendra', 'bp' => '1000009145', 'prodi' => 'Business Economics'),
    // 55 => array('total' => '8550000', 'email' => 'henshen.chandra.hc@gmail.com', 'name' => 'Henshen Chandra', 'bp' => '1000006530', 'prodi' => 'Business Economics'),
    // 56 => array('total' => '8550000', 'email' => 'livia.pricilla01@gmail.com', 'name' => 'Livia Pricilla', 'bp' => '1000009311', 'prodi' => 'Business Economics'),
    // 57 => array('total' => '8550000', 'email' => 'Clementiuswesleys@gmail.com', 'name' => 'Wesley .', 'bp' => '1000006174', 'prodi' => 'Business Economics'),
    // 58 => array('total' => '8550000', 'email' => 'io_imba@yahoo.com', 'name' => 'Christopher Kurnia Tjong', 'bp' => '1000006290', 'prodi' => 'Business Economics'),
    // 59 => array('total' => '8550000', 'email' => 'derryho88@gmail.com', 'name' => 'Derry Ho', 'bp' => '1000007626', 'prodi' => 'Business Economics'),
    // 60 => array('total' => '8550000', 'email' => 'williamgabriel002@gmail.com', 'name' => 'William .', 'bp' => '1000008308', 'prodi' => 'Business Economics'),
    // 61 => array('total' => '8977500', 'email' => 'tanializal25@gmail.com', 'name' => 'Tania Lizal', 'bp' => '1000005910', 'prodi' => 'Hospitality Business'),
    // 62 => array('total' => '8977500', 'email' => 'novaldichrist@gmail.com', 'name' => 'Christopher Novaldi', 'bp' => '1000006277', 'prodi' => 'Hospitality Business'),
    // 63 => array('total' => '8977500', 'email' => 'jennifermandagi22@yahoo.co.id', 'name' => 'Jennifer Fortunata Mandagi', 'bp' => '1000005905', 'prodi' => 'Hospitality Business'),
    // 64 => array('total' => '8977500', 'email' => 'welly.vin@gmail.com', 'name' => 'Welly Vincensius', 'bp' => '1000005627', 'prodi' => 'Hospitality Business'),
    // 65 => array('total' => '8977500', 'email' => 'karen.darmosuwito@yahoo.com', 'name' => 'Karen Hannah', 'bp' => '1000006703', 'prodi' => 'Hospitality Business'),
    // 66 => array('total' => '6577500', 'email' => 'aristonzidane6@gmail.com', 'name' => 'Dewangga Arieston Zidane', 'bp' => '1000006199', 'prodi' => 'Hospitality Business'),
    // 67 => array('total' => '2875000', 'email' => 'tashacendrawan@gmail.com', 'name' => 'Natasha .', 'bp' => '1000005192', 'prodi' => 'Event'),
    // 68 => array('total' => '8977500', 'email' => 'aureilieesalsabilla@gmail.com', 'name' => 'Aureilie Salsabilla', 'bp' => '1000005763', 'prodi' => 'Event'),
    // 69 => array('total' => '7695000', 'email' => 'naminyamnyam@gmail.com', 'name' => 'Gusti Namira Nurhafizha', 'bp' => '1000009287', 'prodi' => 'Event'),
    // 70 => array('total' => '8977500', 'email' => 'tasyamichaela@gmail.com', 'name' => 'Tasya Michaela Tjahjono', 'bp' => '1000008544', 'prodi' => 'Event'),
    // 71 => array('total' => '19679500', 'email' => 'alyssasukandar@gmail.com', 'name' => 'Deasyna Alyssa Putri Sukandar', 'bp' => '1000006122', 'prodi' => 'Event'),
    // 72 => array('total' => '8977500', 'email' => 'brainbija1@gmail.com', 'name' => 'Brains Pong Bija', 'bp' => '1000009296', 'prodi' => 'Event'),
    // 73 => array('total' => '7695000', 'email' => 'mzidany1@gmail.com', 'name' => 'Muhammad Zidany Raihan', 'bp' => '1000008560', 'prodi' => 'Event'),
    // 74 => array('total' => '7695000', 'email' => 'shivrauli@gmail.com', 'name' => 'Shivra Uli Meilya', 'bp' => '1000009392', 'prodi' => 'Event'),
    // 75 => array('total' => '8977500', 'email' => 'ariqarfiansyah@yahoo.co.id', 'name' => 'Mohammad Ariq Afiansyah Fauzan', 'bp' => '1000007787', 'prodi' => 'Event'),
    // 76 => array('total' => '7695000', 'email' => 'David_xaviar@yahoo.com', 'name' => 'David Xaviar Rizky Purboyo', 'bp' => '1000009142', 'prodi' => 'International Business Law'),
    // 77 => array('total' => '7695000', 'email' => 'rayryond@gmail.com', 'name' => 'Ryon Dylan Wijaya', 'bp' => '1000006162', 'prodi' => 'International Business Law'),
    // 78 => array('total' => '9000000', 'email' => 'kesyagiovanna@gmail.com', 'name' => 'Kesya Giovanna', 'bp' => '1000010012', 'prodi' => 'Business'),
    // 79 => array('total' => '9000000', 'email' => 'anddrew76@gmail.com', 'name' => 'Andrew Hartono Thio', 'bp' => '1000010027', 'prodi' => 'Business'),
    // 80 => array('total' => '9000000', 'email' => 'kristyindira22@gmail.com', 'name' => 'Kristy Indira Tulus', 'bp' => '1000010065', 'prodi' => 'Business'),
    // 81 => array('total' => '6750000', 'email' => 'bernardoraphael0312@gmail.com', 'name' => 'Bernardo Raphael', 'bp' => '1000010124', 'prodi' => 'Business'),
    // 82 => array('total' => '9000000', 'email' => 'e_pratomo@hotmail.com', 'name' => 'Edward Pratomo', 'bp' => '1000011366', 'prodi' => 'Business'),
    // 83 => array('total' => '9000000', 'email' => 'maseriricky@gmail.com', 'name' => 'Ricky .', 'bp' => '1000010086', 'prodi' => 'Business'),
    // 84 => array('total' => '9000000', 'email' => 'willymandias95@gmail.com', 'name' => 'Daniel Gifford Mandias', 'bp' => '1000011614', 'prodi' => 'Business'),
    // 85 => array('total' => '3000000', 'email' => 'stevensavio60@gmail.com', 'name' => 'Steven Savio Budiyono', 'bp' => '1000011790', 'prodi' => 'Business'),
    // 86 => array('total' => '8100000', 'email' => 'vaniasalim7@gmail.com', 'name' => 'Vania Salim', 'bp' => '1000011238', 'prodi' => 'Business'),
    // 87 => array('total' => '9000000', 'email' => 'dghastlovers@gmail.com', 'name' => 'Sean Arden', 'bp' => '1000011489', 'prodi' => 'Business'),
    // 88 => array('total' => '8100000', 'email' => 'clementjonathan14@yahoo.com', 'name' => 'Clement Jonathan Lucas', 'bp' => '1000010568', 'prodi' => 'Business'),
    // 89 => array('total' => '9000000', 'email' => 'cindyclaudia2@yahoo.co.id', 'name' => 'Cindy Claudia', 'bp' => '1000010691', 'prodi' => 'Business'),
    // 90 => array('total' => '9000000', 'email' => 'mikhaelkusuma@gmail.com', 'name' => 'Mikhael Evans Kusuma', 'bp' => '1000010814', 'prodi' => 'Business'),
    // 91 => array('total' => '9000000', 'email' => 'ignatiusap08@outlook.com', 'name' => 'Ignatius Anggara Purba', 'bp' => '1000010848', 'prodi' => 'Business'),
    // 92 => array('total' => '9000000', 'email' => 'dillonthecreator@gmail.com', 'name' => 'Dillon Henry Richard Hilliard', 'bp' => '1000011147', 'prodi' => 'Business'),
    // 93 => array('total' => '9000000', 'email' => 'michaelnicolas333@gmail.com', 'name' => 'Michael Nicolas', 'bp' => '1000011705', 'prodi' => 'Business'),
    // 94 => array('total' => '9000000', 'email' => 'laurentmichellee@gmail.com', 'name' => 'Laurent Michelle Easterline', 'bp' => '1000010443', 'prodi' => 'Business'),
    // 95 => array('total' => '9000000', 'email' => 'evanemanuel00@gmail.com', 'name' => 'Emanuel Evan Santuri', 'bp' => '1000011179', 'prodi' => 'Business'),
    // 96 => array('total' => '9000000', 'email' => 'nathanael.haniar@gmail.com', 'name' => 'Nathanael Silwanus Haniar', 'bp' => '1000010612', 'prodi' => 'Business'),
    // 97 => array('total' => '9000000', 'email' => 'carolineliao23@gmail.com', 'name' => 'Caroline Gemma Tjong', 'bp' => '1000011887', 'prodi' => 'Business'),
    // 98 => array('total' => '9000000', 'email' => 'vincentkho97@gmail.com', 'name' => 'Vincent Kho', 'bp' => '1000011698', 'prodi' => 'Business'),
    // 99 => array('total' => '9000000', 'email' => 'rezonroderick@gmail.com', 'name' => 'Rezon Roderick', 'bp' => '1000011137', 'prodi' => 'Business'),
    // 100 => array('total' => '9000000', 'email' => 'kevinfernandi1@gmail.com', 'name' => 'Kevin Fernandi', 'bp' => '1000011844', 'prodi' => 'Business'),
    // 101 => array('total' => '9000000', 'email' => 'jasonwisma@gmail.com', 'name' => 'I Wayan Jason Abhijana Wisma', 'bp' => '1000011199', 'prodi' => 'Business'),
    // 102 => array('total' => '4575000', 'email' => 'enricofaustinee@gmail.com', 'name' => 'Enrico Faustine', 'bp' => '1000011067', 'prodi' => 'Business'),
    // 103 => array('total' => '7650000', 'email' => 'wil.355wc@gmail.com', 'name' => 'William Leejaya', 'bp' => '1000011449', 'prodi' => 'Business'),
    // 104 => array('total' => '9000000', 'email' => 'aojasonn8@gmail.com', 'name' => 'Jason Alexander Owen', 'bp' => '1000011291', 'prodi' => 'Business'),
    // 105 => array('total' => '9000000', 'email' => 'feifarren19@gmail.com', 'name' => 'Farren Julia Kuswanto', 'bp' => '1000011022', 'prodi' => 'Business'),
    // 106 => array('total' => '9000000', 'email' => 'joshmoeis888@gmail.com', 'name' => 'Josh Madison Moeis', 'bp' => '1000011085', 'prodi' => 'Business'),
    // 107 => array('total' => '9000000', 'email' => 'daffa.rifqi@icloud.com', 'name' => 'M. Daffa Rifqi', 'bp' => '1000012751', 'prodi' => 'Business'),
    // 108 => array('total' => '7650000', 'email' => 'Reihansulthan158@gmail.com', 'name' => 'Muhammad Sulthan Reihan', 'bp' => '1000011132', 'prodi' => 'Business'),
    // 109 => array('total' => '8100000', 'email' => 'hansc02@yahoo.com', 'name' => 'Hans Christopher Widjaja', 'bp' => '1000010243', 'prodi' => 'Business'),
    // 110 => array('total' => '9000000', 'email' => 'msulthan.algamar@gmail.com', 'name' => 'Mohamad Sulthan Algamar', 'bp' => '1000012748', 'prodi' => 'Business'),
    // 111 => array('total' => '28200000', 'email' => 'aaronvincentius21@gmail.com', 'name' => 'Aaron Vincentius Chia', 'bp' => '1000011283', 'prodi' => 'Business'),
    // 112 => array('total' => '9000000', 'email' => 'novendrasavio@gmail.com', 'name' => 'Dominikus Savio Novendra Gracia', 'bp' => '1000012569', 'prodi' => 'Business'),
    // 113 => array('total' => '9000000', 'email' => 'vanessatjahyadikarta@gmail.com', 'name' => 'Vanessa Audra Tjahyadikarta', 'bp' => '1000011370', 'prodi' => 'Business'),
    // 114 => array('total' => '9000000', 'email' => 'theodorus.edward4111@gmail.com', 'name' => 'Edward Theodorus', 'bp' => '1000011198', 'prodi' => 'Business'),
    // 115 => array('total' => '9000000', 'email' => 'monikapermatasari1@gmail.com', 'name' => 'Monika Permatasari', 'bp' => '1000011250', 'prodi' => 'Business'),
    // 116 => array('total' => '3000000', 'email' => 'namakuabelrajendra@gmail.com', 'name' => 'Abel Rajendra', 'bp' => '1000010677', 'prodi' => 'Business'),
    // 117 => array('total' => '9000000', 'email' => 'vincentlimardi01@gmail.com', 'name' => 'Vincent Davin Limardi', 'bp' => '1000012861', 'prodi' => 'Business'),
    // 118 => array('total' => '9000000', 'email' => 'jerrytans2002@gmail.com', 'name' => 'Jerry Tandiago Suwondo', 'bp' => '1000010341', 'prodi' => 'Business'),
    // 119 => array('total' => '9000000', 'email' => 'stellaavril19@gmail.com', 'name' => 'Stella Avril', 'bp' => '1000011804', 'prodi' => 'Business'),
    // 120 => array('total' => '9000000', 'email' => 'josekwayera@gmail.com', 'name' => 'Jose Kwayera', 'bp' => '1000010823', 'prodi' => 'Business'),
    // 121 => array('total' => '9000000', 'email' => 'avryllbryan1@gmail.com', 'name' => 'Avryll Bryan', 'bp' => '1000012979', 'prodi' => 'Business'),
    // 122 => array('total' => '6000000', 'email' => 'jennyfransiscaa03@gmail.com', 'name' => 'Jenny Fransisca', 'bp' => '1000013548', 'prodi' => 'Business'),
    // 123 => array('total' => '9000000', 'email' => 'mellyhalim25@gmail.com', 'name' => 'Elyzabet Halim', 'bp' => '1000013505', 'prodi' => 'Business'),
    // 124 => array('total' => '9000000', 'email' => 'catherineck1725@gmail.com', 'name' => 'Catherine Kusuma', 'bp' => '1000010633', 'prodi' => 'Branding'),
    // 125 => array('total' => '7650000', 'email' => 'matthew.grusli@gmail.com', 'name' => 'Matthew Geraldo', 'bp' => '1000011164', 'prodi' => 'Branding'),
    // 126 => array('total' => '750000', 'email' => 'f.f.tanto@gmail.com', 'name' => 'Ferix Febryanto Tanto', 'bp' => '1000011099', 'prodi' => 'Branding'),
    // 127 => array('total' => '19650000', 'email' => 'viallinoinoputra@gmail.com', 'name' => 'Viallino Putra Octavianus', 'bp' => '1000011428', 'prodi' => 'Branding'),
    // 128 => array('total' => '8100000', 'email' => 'alfindarmawan90@gmail.com', 'name' => 'Alfin Darmawan', 'bp' => '1000010522', 'prodi' => 'Branding'),
    // 129 => array('total' => '7650000', 'email' => 'nicojustin2002@gmail.com', 'name' => 'Nicholas Justin Tjahyadi', 'bp' => '1000011208', 'prodi' => 'Branding'),
    // 130 => array('total' => '6300000', 'email' => 'albertjanitra.jr@gmail.com', 'name' => 'Albert Ryan Janitra', 'bp' => '1000011256', 'prodi' => 'Branding'),
    // 131 => array('total' => '9000000', 'email' => 'michaelnuttreps@gmail.com', 'name' => 'Michael Angelo', 'bp' => '1000011047', 'prodi' => 'Branding'),
    // 132 => array('total' => '9000000', 'email' => 'ferinangelica.tren@gmail.com', 'name' => 'Ferrin Angelica Honggowasito', 'bp' => '1000013116', 'prodi' => 'Branding'),
    // 133 => array('total' => '9000000', 'email' => 'marcelinalicia02@gmail.com', 'name' => 'Licia Anastacia', 'bp' => '1000012697', 'prodi' => 'Branding'),
    // 134 => array('total' => '7650000', 'email' => 'nathanielsumarna@gmail.com', 'name' => 'Nathaniel Sumarna', 'bp' => '1000013703', 'prodi' => 'Branding'),
    // 135 => array('total' => '9000000', 'email' => 'ricardorafaellee888@gmail.com', 'name' => 'Ricardo Rafael', 'bp' => '1000013831', 'prodi' => 'Branding'),
    // 136 => array('total' => '24000000', 'email' => 'bintangnarendra100@gmail.com', 'name' => 'Narendra Bintang Ramadhan Yulianto', 'bp' => '1000013851', 'prodi' => 'Branding'),
    // 137 => array('total' => '6000000', 'email' => 'Jesse.reynard18@gmail.com', 'name' => 'Jesse Reynard', 'bp' => '1000010669', 'prodi' => 'Finance and Banking'),
    // 138 => array('total' => '9000000', 'email' => 'santosogani10@gmail.com', 'name' => 'Santoso Setiawan Gani', 'bp' => '1000010896', 'prodi' => 'Finance and Banking'),
    // 139 => array('total' => '9000000', 'email' => 'celine_soetanto@yahoo.com', 'name' => 'Celine Soetanto', 'bp' => '1000011424', 'prodi' => 'Accounting'),
    // 140 => array('total' => '9000000', 'email' => 'byeef1@gmail.com', 'name' => 'Muhammad Zahran Yeef', 'bp' => '1000012762', 'prodi' => 'Accounting'),
    // 141 => array('total' => '17850000', 'email' => 'natassyaardila@gmail.com', 'name' => 'Natassya .', 'bp' => '1000013381', 'prodi' => 'Accounting'),
    // 142 => array('total' => '9000000', 'email' => 'asns0709@gmail.com', 'name' => 'Steve Nathaniel Steward', 'bp' => '1000013538', 'prodi' => 'Accounting'),
    // 143 => array('total' => '9900000', 'email' => 'aureliamichelletjong@gmail.com', 'name' => 'Michelle Tjong', 'bp' => '1000010191', 'prodi' => 'Hospitality Business'),
    // 144 => array('total' => '8910000', 'email' => 'carisshamaureen@gmail.com', 'name' => 'Carissha Maureen', 'bp' => '1000010329', 'prodi' => 'Hospitality Business'),
    // 145 => array('total' => '7620000', 'email' => 'ramadhammika1510@gmail.com', 'name' => 'Rama Dhammika Hendrawan', 'bp' => '1000010694', 'prodi' => 'Hospitality Business'),
    // 146 => array('total' => '9900000', 'email' => 'firhanbalfas@gmail.com', 'name' => 'Muhamad Firhan Balfas', 'bp' => '1000006504', 'prodi' => 'Hospitality Business'),
    // 147 => array('total' => '6300000', 'email' => 'helenalioe08@gmail.com', 'name' => 'Helena Eleonora', 'bp' => '1000012696', 'prodi' => 'Event'),
    // 148 => array('total' => '2700000', 'email' => 'samueljustin40@gmail.com', 'name' => 'Justin Samuel', 'bp' => '1000010653', 'prodi' => 'International Business Law'),
    // 149 => array('total' => '8550000', 'email' => 'clvnalwrga@gmail.com', 'name' => 'Calvin Timothy Kasuma', 'bp' => '1000010955', 'prodi' => 'International Business Law'),
    // 150 => array('total' => '8550000', 'email' => 'ezrajeremiaa29@gmail.com', 'name' => 'Ezra Reinhard Jeremia Manullang', 'bp' => '1000010424', 'prodi' => 'International Business Law'),
    // 151 => array('total' => '8550000', 'email' => 'muhammadbayufarhanata@gmail.com', 'name' => 'Mohammad Bayu Farhannanta', 'bp' => '1000012560', 'prodi' => 'International Business Law'),
    // 152 => array('total' => '8550000', 'email' => 'mnlazuardi@gmail.com', 'name' => 'Muhammad Nathan Lazuardi', 'bp' => '1000013853', 'prodi' => 'International Business Law'),
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

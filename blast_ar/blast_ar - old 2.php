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
    // 0 => array(
    //     'total' => '9832500',
    //     'email' => '0131151040@student.prasetiyamulya.ac.id',
    //     'name' => 'Lucky Aditya',
    //     'bp' => '1000001831',
    //     'prodi' => 'Business Management'
    // ),
    // 1 => array(
    //     'total' => '7125000',
    //     'email' => '0131151159@student.prasetiyamulya.ac.id',
    //     'name' => 'Reynaldo .',
    //     'bp' => '1000001954',
    //     'prodi' => 'Business Management'
    // ),
    // 2 => array(
    //     'total' => '1282500',
    //     'email' => '0131151344@student.prasetiyamulya.ac.id',
    //     'name' => 'Nugroho Triputra Anadityoh',
    //     'bp' => '1000002132',
    //     'prodi' => 'Business Management'
    // ),
    // 3 => array(
    //     'total' => '1282500',
    //     'email' => '0131151345@student.prasetiyamulya.ac.id',
    //     'name' => 'Lorenzo Immanuel Deyan Da Lopez',
    //     'bp' => '1000002133',
    //     'prodi' => 'Business Management'
    // ),
    // 4 => array(
    //     'total' => '27597500',
    //     'email' => '0132151095@student.prasetiyamulya.ac.id',
    //     'name' => 'Naufal Fataqi',
    //     'bp' => '1000002401',
    //     'prodi' => 'Branding'
    // ),
    // 5 => array(
    //     'total' => '6507500',
    //     'email' => '0132151127@student.prasetiyamulya.ac.id',
    //     'name' => 'Dirga Maulana Prashanda',
    //     'bp' => '1000002431',
    //     'prodi' => 'Branding'
    // ),
    // 6 => array(
    //     'total' => '15675000',
    //     'email' => '0134151057@student.prasetiyamulya.ac.id',
    //     'name' => 'Falih Anwar Siregar',
    //     'bp' => '1000001784',
    //     'prodi' => 'Accounting'
    // ),
    // 7 => array(
    //     'total' => '1054500',
    //     'email' => '0131161082@student.prasetiyamulya.ac.id',
    //     'name' => 'Kelvin Yusuf',
    //     'bp' => '1000002630',
    //     'prodi' => 'Business Management'
    // ),
    // 8 => array(
    //     'total' => '1900000',
    //     'email' => '0131161266@student.prasetiyamulya.ac.id',
    //     'name' => 'Robert Anwar',
    //     'bp' => '1000002820',
    //     'prodi' => 'Business Management'
    // ),
    // 9 => array(
    //     'total' => '855000',
    //     'email' => '0131161348@student.prasetiyamulya.ac.id',
    //     'name' => 'Aditya Santosa Putra',
    //     'bp' => '1000002899',
    //     'prodi' => 'Business Management'
    // ),
    // 10 => array(
    //     'total' => '5130000',
    //     'email' => '0131161398@student.prasetiyamulya.ac.id',
    //     'name' => 'Kent Rick Cars Well',
    //     'bp' => '1000002949',
    //     'prodi' => 'Business Management'
    // ),
    // 11 => array(
    //     'total' => '2137500',
    //     'email' => '0131161480@student.prasetiyamulya.ac.id',
    //     'name' => 'Kevin Lukito',
    //     'bp' => '1000003030',
    //     'prodi' => 'Business Management'
    // ),
    // 12 => array(
    //     'total' => '1282500',
    //     'email' => '0131161524@student.prasetiyamulya.ac.id',
    //     'name' => 'Wirya Hartadinata',
    //     'bp' => '1000003073',
    //     'prodi' => 'Business Management'
    // ),
    // 13 => array(
    //     'total' => '4902000',
    //     'email' => '0132161046@student.prasetiyamulya.ac.id',
    //     'name' => 'Vina Ramadhani',
    //     'bp' => '1000003260',
    //     'prodi' => 'Branding'
    // ),
    // 14 => array(
    //     'total' => '3420000',
    //     'email' => '0132161064@student.prasetiyamulya.ac.id',
    //     'name' => 'Muhammad Bintang Firmansyah',
    //     'bp' => '1000003279',
    //     'prodi' => 'Branding'
    // ),
    // 15 => array(
    //     'total' => '855000',
    //     'email' => '0132161150@student.prasetiyamulya.ac.id',
    //     'name' => 'Ghiffari Fardhana Hamid',
    //     'bp' => '1000003361',
    //     'prodi' => 'Branding'
    // ),
    // 16 => array(
    //     'total' => '2565000',
    //     'email' => '0133161030@student.prasetiyamulya.ac.id',
    //     'name' => 'Daniel Aaron Budiarta',
    //     'bp' => '1000003161',
    //     'prodi' => 'Finance and Banking'
    // ),
    // 17 => array(
    //     'total' => '2337000',
    //     'email' => '0133161049@student.prasetiyamulya.ac.id',
    //     'name' => 'Alvin Surianto',
    //     'bp' => '1000003179',
    //     'prodi' => 'Finance and Banking'
    // ),
    // 18 => array(
    //     'total' => '855000',
    //     'email' => '0133161056@student.prasetiyamulya.ac.id',
    //     'name' => 'John Frederick Kristian Lie',
    //     'bp' => '1000003187',
    //     'prodi' => 'Finance and Banking'
    // ),
    // 19 => array(
    //     'total' => '1197000',
    //     'email' => '0134161057@student.prasetiyamulya.ac.id',
    //     'name' => 'Rafelle Purnomo',
    //     'bp' => '1000002526',
    //     'prodi' => 'Accounting'
    // ),
    // 20 => array(
    //     'total' => '2565000',
    //     'email' => '0134161070@student.prasetiyamulya.ac.id',
    //     'name' => 'Fachriza Sri Ramadianto',
    //     'bp' => '1000002539',
    //     'prodi' => 'Accounting'
    // ),
    // 21 => array(
    //     'total' => '3847500',
    //     'email' => '0135161012@student.prasetiyamulya.ac.id',
    //     'name' => 'Mohammad Brillian Frahma Genies',
    //     'bp' => '1000003095',
    //     'prodi' => 'Event Management'
    // ),
    // 22 => array(
    //     'total' => '2992500',
    //     'email' => '0135161020@student.prasetiyamulya.ac.id',
    //     'name' => 'Rachmadi Ramadan',
    //     'bp' => '1000003103',
    //     'prodi' => 'Event Management'
    // ),
    // 23 => array(
    //     'total' => '2337000',
    //     'email' => '0135161034@student.prasetiyamulya.ac.id',
    //     'name' => 'Balqis Dinda Sahirah',
    //     'bp' => '1000003117',
    //     'prodi' => 'Event Management'
    // ),
    // 24 => array(
    //     'total' => '18767500',
    //     'email' => '01311171015@student.prasetiyamulya.ac.id',
    //     'name' => 'Michael Adrian Susilo',
    //     'bp' => '1000003531',
    //     'prodi' => 'Business Management'
    // ),
    // 25 => array(
    //     'total' => '14065000',
    //     'email' => '01311171033@student.prasetiyamulya.ac.id',
    //     'name' => 'Filbert Giovanni Kharisma',
    //     'bp' => '1000003548',
    //     'prodi' => 'Business Management'
    // ),
    // 26 => array(
    //     'total' => '3847500',
    //     'email' => '01311171064@student.prasetiyamulya.ac.id',
    //     'name' => 'Alexander Akeno Hadiantoro',
    //     'bp' => '1000003579',
    //     'prodi' => 'Business Management'
    // ),
    // 27 => array(
    //     'total' => '3847500',
    //     'email' => '01311171084@student.prasetiyamulya.ac.id',
    //     'name' => 'Jason Rich Darmawan Onggo Putra',
    //     'bp' => '1000003599',
    //     'prodi' => 'Business Management'
    // ),
    // 28 => array(
    //     'total' => '1282500',
    //     'email' => '01311171085@student.prasetiyamulya.ac.id',
    //     'name' => 'Binsar Trinoved',
    //     'bp' => '1000003600',
    //     'prodi' => 'Business Management'
    // ),
    // 29 => array(
    //     'total' => '2137500',
    //     'email' => '01311171096@student.prasetiyamulya.ac.id',
    //     'name' => 'Deborah Eirene Mai',
    //     'bp' => '1000003611',
    //     'prodi' => 'Business Management'
    // ),
    // 30 => array(
    //     'total' => '855000',
    //     'email' => '01311171114@student.prasetiyamulya.ac.id',
    //     'name' => 'Johanes Baptista Suluk Praginanto Aji',
    //     'bp' => '1000003629',
    //     'prodi' => 'Business Management'
    // ),
    // 31 => array(
    //     'total' => '2565000',
    //     'email' => '01311171118@student.prasetiyamulya.ac.id',
    //     'name' => 'Pandu Dwi Putranto',
    //     'bp' => '1000003633',
    //     'prodi' => 'Business Management'
    // ),
    // 32 => array(
    //     'total' => '1282500',
    //     'email' => '01311171141@student.prasetiyamulya.ac.id',
    //     'name' => 'Michael Daniel',
    //     'bp' => '1000003655',
    //     'prodi' => 'Business Management'
    // ),
    // 33 => array(
    //     'total' => '1282500',
    //     'email' => '01311171161@student.prasetiyamulya.ac.id',
    //     'name' => 'I Made Handandi Hadiprojo',
    //     'bp' => '1000003674',
    //     'prodi' => 'Business Management'
    // ),
    // 34 => array(
    //     'total' => '2565000',
    //     'email' => '01311171171@student.prasetiyamulya.ac.id',
    //     'name' => 'Aditya Muliawan Subarkah',
    //     'bp' => '1000003684',
    //     'prodi' => 'Business Management'
    // ),
    // 35 => array(
    //     'total' => '1282500',
    //     'email' => '01311171182@student.prasetiyamulya.ac.id',
    //     'name' => 'Ferriyale Muhammad',
    //     'bp' => '1000003695',
    //     'prodi' => 'Business Management'
    // ),
    // 36 => array(
    //     'total' => '1282500',
    //     'email' => '01311171188@student.prasetiyamulya.ac.id',
    //     'name' => 'Andaru Ramadhan',
    //     'bp' => '1000003701',
    //     'prodi' => 'Business Management'
    // ),
    // 37 => array(
    //     'total' => '2137500',
    //     'email' => '01311171189@student.prasetiyamulya.ac.id',
    //     'name' => 'Kendrick Leonardy',
    //     'bp' => '1000003702',
    //     'prodi' => 'Business Management'
    // ),
    // 38 => array(
    //     'total' => '855000',
    //     'email' => '01311171203@student.prasetiyamulya.ac.id',
    //     'name' => 'Nadia Adiwangsa',
    //     'bp' => '1000003716',
    //     'prodi' => 'Business Management'
    // ),
    // 39 => array(
    //     'total' => '14065000',
    //     'email' => '01311171220@student.prasetiyamulya.ac.id',
    //     'name' => 'Felisha Destiny Chia',
    //     'bp' => '1000003733',
    //     'prodi' => 'Business Management'
    // ),
    // 40 => array(
    //     'total' => '1282500',
    //     'email' => '01311171224@student.prasetiyamulya.ac.id',
    //     'name' => 'Andreas Harris Putranto',
    //     'bp' => '1000003737',
    //     'prodi' => 'Business Management'
    // ),
    // 41 => array(
    //     'total' => '2565000',
    //     'email' => '01311171282@student.prasetiyamulya.ac.id',
    //     'name' => 'Giand Dzaki Ginandjar',
    //     'bp' => '1000003792',
    //     'prodi' => 'Business Management'
    // ),
    // 42 => array(
    //     'total' => '855000',
    //     'email' => '01311171284@student.prasetiyamulya.ac.id',
    //     'name' => 'Jerremy Noah Loekito',
    //     'bp' => '1000003794',
    //     'prodi' => 'Business Management'
    // ),
    // 43 => array(
    //     'total' => '15347500',
    //     'email' => '01311171291@student.prasetiyamulya.ac.id',
    //     'name' => 'Andy William',
    //     'bp' => '1000003801',
    //     'prodi' => 'Business Management'
    // ),
    // 44 => array(
    //     'total' => '1282500',
    //     'email' => '01311171302@student.prasetiyamulya.ac.id',
    //     'name' => 'Jonathan  Christ Allen',
    //     'bp' => '1000003812',
    //     'prodi' => 'Business Management'
    // ),
    // 45 => array(
    //     'total' => '19622500',
    //     'email' => '01311171306@student.prasetiyamulya.ac.id',
    //     'name' => 'Aaron Linartha',
    //     'bp' => '1000003816',
    //     'prodi' => 'Business Management'
    // ),
    // 46 => array(
    //     'total' => '855000',
    //     'email' => '01311171307@student.prasetiyamulya.ac.id',
    //     'name' => 'Erric .',
    //     'bp' => '1000003817',
    //     'prodi' => 'Business Management'
    // ),
    // 47 => array(
    //     'total' => '15347500',
    //     'email' => '01311171313@student.prasetiyamulya.ac.id',
    //     'name' => 'Kevin Giovanni',
    //     'bp' => '1000003823',
    //     'prodi' => 'Business Management'
    // ),
    // 48 => array(
    //     'total' => '13637500',
    //     'email' => '01311171324@student.prasetiyamulya.ac.id',
    //     'name' => 'Fernando Montero',
    //     'bp' => '1000003834',
    //     'prodi' => 'Business Management'
    // ),
    // 49 => array(
    //     'total' => '1282500',
    //     'email' => '01311171340@student.prasetiyamulya.ac.id',
    //     'name' => 'Gabriel Christian',
    //     'bp' => '1000003849',
    //     'prodi' => 'Business Management'
    // ),
    // 50 => array(
    //     'total' => '3847500',
    //     'email' => '01311171341@student.prasetiyamulya.ac.id',
    //     'name' => 'Andrew Rhesa',
    //     'bp' => '1000003850',
    //     'prodi' => 'Business Management'
    // ),
    // 51 => array(
    //     'total' => '1710000',
    //     'email' => '01311171345@student.prasetiyamulya.ac.id',
    //     'name' => 'Darell Sonofal',
    //     'bp' => '1000003854',
    //     'prodi' => 'Business Management'
    // ),
    // 52 => array(
    //     'total' => '1282500',
    //     'email' => '01311171348@student.prasetiyamulya.ac.id',
    //     'name' => 'Fernando Lazuardi',
    //     'bp' => '1000003857',
    //     'prodi' => 'Business Management'
    // ),
    // 53 => array(
    //     'total' => '4275000',
    //     'email' => '01311171357@student.prasetiyamulya.ac.id',
    //     'name' => 'Muhammad Aulia Ichwansyah',
    //     'bp' => '1000003866',
    //     'prodi' => 'Business Management'
    // ),
    // 54 => array(
    //     'total' => '1282500',
    //     'email' => '01311171361@student.prasetiyamulya.ac.id',
    //     'name' => 'Nicholas Gunawan',
    //     'bp' => '1000003870',
    //     'prodi' => 'Business Management'
    // ),
    // 55 => array(
    //     'total' => '1282500',
    //     'email' => '01311171365@student.prasetiyamulya.ac.id',
    //     'name' => 'Go Vincentsius Witono',
    //     'bp' => '1000003874',
    //     'prodi' => 'Business Management'
    // ),
    // 56 => array(
    //     'total' => '74209000',
    //     'email' => '01311171367@student.prasetiyamulya.ac.id',
    //     'name' => 'Vincentius Pangestu',
    //     'bp' => '1000003876',
    //     'prodi' => 'Business Management'
    // ),
    // 57 => array(
    //     'total' => '1710000',
    //     'email' => '01311171372@student.prasetiyamulya.ac.id',
    //     'name' => 'Albert Hartanto',
    //     'bp' => '1000003881',
    //     'prodi' => 'Business Management'
    // ),
    // 58 => array(
    //     'total' => '1282500',
    //     'email' => '01311171377@student.prasetiyamulya.ac.id',
    //     'name' => 'Stefanus Gregorio',
    //     'bp' => '1000003886',
    //     'prodi' => 'Business Management'
    // ),
    // 59 => array(
    //     'total' => '5130000',
    //     'email' => '01311171382@student.prasetiyamulya.ac.id',
    //     'name' => 'Faiz Muhammad A’Riq',
    //     'bp' => '1000003891',
    //     'prodi' => 'Business Management'
    // ),
    // 60 => array(
    //     'total' => '855000',
    //     'email' => '01312171014@student.prasetiyamulya.ac.id',
    //     'name' => 'Michael Nugraha Rusli',
    //     'bp' => '1000004034',
    //     'prodi' => 'Branding'
    // ),
    // 61 => array(
    //     'total' => '1282500',
    //     'email' => '01312171026@student.prasetiyamulya.ac.id',
    //     'name' => 'Ananggadighia Armann Nugroho',
    //     'bp' => '1000004046',
    //     'prodi' => 'Branding'
    // ),
    // 62 => array(
    //     'total' => '2565000',
    //     'email' => '01312171030@student.prasetiyamulya.ac.id',
    //     'name' => 'Abimanyu Ghani A\'Sad',
    //     'bp' => '1000004050',
    //     'prodi' => 'Branding'
    // ),
    // 63 => array(
    //     'total' => '855000',
    //     'email' => '01312171035@student.prasetiyamulya.ac.id',
    //     'name' => 'Bagus Prakoso Sastro',
    //     'bp' => '1000004055',
    //     'prodi' => 'Branding'
    // ),
    // 64 => array(
    //     'total' => '5557500',
    //     'email' => '01312171047@student.prasetiyamulya.ac.id',
    //     'name' => 'Muhammad Rio Henza Pradana',
    //     'bp' => '1000004066',
    //     'prodi' => 'Branding'
    // ),
    // 65 => array(
    //     'total' => '1282500',
    //     'email' => '01312171061@student.prasetiyamulya.ac.id',
    //     'name' => 'Bernardo Lauda',
    //     'bp' => '1000004079',
    //     'prodi' => 'Branding'
    // ),
    // 66 => array(
    //     'total' => '17658900',
    //     'email' => '01313171021@student.prasetiyamulya.ac.id',
    //     'name' => 'Nadya Junita Natasha',
    //     'bp' => '1000003964',
    //     'prodi' => 'Finance and Banking'
    // ),
    // 67 => array(
    //     'total' => '14065000',
    //     'email' => '01313171069@student.prasetiyamulya.ac.id',
    //     'name' => 'Alicia Jeane Susanto',
    //     'bp' => '1000004012',
    //     'prodi' => 'Finance and Banking'
    // ),
    // 68 => array(
    //     'total' => '427500',
    //     'email' => '01320171033@student.prasetiyamulya.ac.id',
    //     'name' => 'Daniel Sului',
    //     'bp' => '1000003496',
    //     'prodi' => 'Accounting'
    // ),
    // 69 => array(
    //     'total' => '1282500',
    //     'email' => '01320171034@student.prasetiyamulya.ac.id',
    //     'name' => 'Alfaridzy Try Budimantana',
    //     'bp' => '1000003497',
    //     'prodi' => 'Accounting'
    // ),
    // 70 => array(
    //     'total' => '1282500',
    //     'email' => '01320171039@student.prasetiyamulya.ac.id',
    //     'name' => 'Barak Gomulia',
    //     'bp' => '1000003502',
    //     'prodi' => 'Accounting'
    // ),
    // 71 => array(
    //     'total' => '855000',
    //     'email' => '01341171007@student.prasetiyamulya.ac.id',
    //     'name' => 'Richard Gennady',
    //     'bp' => '1000004137',
    //     'prodi' => 'Hospitality Business'
    // ),
    // 72 => array(
    //     'total' => '20042500',
    //     'email' => '01341171020@student.prasetiyamulya.ac.id',
    //     'name' => 'Dhiya Lathifa',
    //     'bp' => '1000004150',
    //     'prodi' => 'Hospitality Business'
    // ),
    // 73 => array(
    //     'total' => '20050000',
    //     'email' => '13111810002@student.prasetiyamulya.ac.id',
    //     'name' => 'Jenny Prasetio',
    //     'bp' => '1000000297',
    //     'prodi' => 'Business Management'
    // ),
    // 74 => array(
    //     'total' => '20050000',
    //     'email' => '13111810060@student.prasetiyamulya.ac.id',
    //     'name' => 'Gabriella Rasiman',
    //     'bp' => '1000000947',
    //     'prodi' => 'Business Management'
    // ),
    // 75 => array(
    //     'total' => '427500',
    //     'email' => '13111810083@student.prasetiyamulya.ac.id',
    //     'name' => 'Felix .',
    //     'bp' => '1000004390',
    //     'prodi' => 'Business Management'
    // ),
    // 76 => array(
    //     'total' => '2137500',
    //     'email' => '13111810135@student.prasetiyamulya.ac.id',
    //     'name' => 'Valerio Brilliant Pratama',
    //     'bp' => '1000000855',
    //     'prodi' => 'Business Management'
    // ),
    // 77 => array(
    //     'total' => '427500',
    //     'email' => '13111810167@student.prasetiyamulya.ac.id',
    //     'name' => 'bryan wise lie',
    //     'bp' => '1000004126',
    //     'prodi' => 'Business Management'
    // ),
    // 78 => array(
    //     'total' => '855000',
    //     'email' => '13111810207@student.prasetiyamulya.ac.id',
    //     'name' => 'Brandon Thompson',
    //     'bp' => '1000004568',
    //     'prodi' => 'Business Management'
    // ),
    // 79 => array(
    //     'total' => '20050000',
    //     'email' => '13111810235@student.prasetiyamulya.ac.id',
    //     'name' => 'Hans Benito',
    //     'bp' => '1000005086',
    //     'prodi' => 'Business Management'
    // ),
    // 80 => array(
    //     'total' => '1282500',
    //     'email' => '13111810269@student.prasetiyamulya.ac.id',
    //     'name' => 'Christoforus Alvin',
    //     'bp' => '1000004487',
    //     'prodi' => 'Business Management'
    // ),
    // 81 => array(
    //     'total' => '427500',
    //     'email' => '13111810274@student.prasetiyamulya.ac.id',
    //     'name' => 'cristine fedora',
    //     'bp' => '1000000595',
    //     'prodi' => 'Business Management'
    // ),
    // 82 => array(
    //     'total' => '427500',
    //     'email' => '13111810280@student.prasetiyamulya.ac.id',
    //     'name' => 'Renaldi Fandhana',
    //     'bp' => '1000000834',
    //     'prodi' => 'Business Management'
    // ),
    // 83 => array(
    //     'total' => '20050000',
    //     'email' => '13111810304@student.prasetiyamulya.ac.id',
    //     'name' => 'Marcello Leandro',
    //     'bp' => '1000000963',
    //     'prodi' => 'Business Management'
    // ),
    // 84 => array(
    //     'total' => '22615000',
    //     'email' => '13111810351@student.prasetiyamulya.ac.id',
    //     'name' => 'Nicholas Alexander Sujono',
    //     'bp' => '1000000273',
    //     'prodi' => 'Business Management'
    // ),
    // 85 => array(
    //     'total' => '1282500',
    //     'email' => '13111810352@student.prasetiyamulya.ac.id',
    //     'name' => 'Stevanus Glen Lie',
    //     'bp' => '1000001227',
    //     'prodi' => 'Business Management'
    // ),
    // 86 => array(
    //     'total' => '427500',
    //     'email' => '13111810414@student.prasetiyamulya.ac.id',
    //     'name' => 'Michelle Vanessa',
    //     'bp' => '1000001714',
    //     'prodi' => 'Business Management'
    // ),
    // 87 => array(
    //     'total' => '1282500',
    //     'email' => '13111810423@student.prasetiyamulya.ac.id',
    //     'name' => 'Edward Benjamin Hartono',
    //     'bp' => '1000004534',
    //     'prodi' => 'Business Management'
    // ),
    // 88 => array(
    //     'total' => '20050000',
    //     'email' => '13111810435@student.prasetiyamulya.ac.id',
    //     'name' => 'Leonard Bima Putera Ganidi',
    //     'bp' => '1000005189',
    //     'prodi' => 'Business Management'
    // ),
    // 89 => array(
    //     'total' => '427500',
    //     'email' => '13111810449@student.prasetiyamulya.ac.id',
    //     'name' => 'Aufa Muhammad Athaya',
    //     'bp' => '1000004449',
    //     'prodi' => 'Business Management'
    // ),
    // 90 => array(
    //     'total' => '20050000',
    //     'email' => '13111810465@student.prasetiyamulya.ac.id',
    //     'name' => 'Matthew Verrell Saputra',
    //     'bp' => '1000004516',
    //     'prodi' => 'Business Management'
    // ),
    // 91 => array(
    //     'total' => '855000',
    //     'email' => '13111810516@student.prasetiyamulya.ac.id',
    //     'name' => 'Marcellio Adithia',
    //     'bp' => '1000005158',
    //     'prodi' => 'Business Management'
    // ),
    // 92 => array(
    //     'total' => '1282500',
    //     'email' => '13121810045@student.prasetiyamulya.ac.id',
    //     'name' => 'Davin Ciawi',
    //     'bp' => '1000003283',
    //     'prodi' => 'Branding'
    // ),
    // 93 => array(
    //     'total' => '1282500',
    //     'email' => '13121810056@student.prasetiyamulya.ac.id',
    //     'name' => 'Kezia Marishka Panggabean',
    //     'bp' => '1000001950',
    //     'prodi' => 'Branding'
    // ),
    // 94 => array(
    //     'total' => '427500',
    //     'email' => '13121810062@student.prasetiyamulya.ac.id',
    //     'name' => 'Nicole Catherine Kartasasmita',
    //     'bp' => '1000003463',
    //     'prodi' => 'Branding'
    // ),
    // 95 => array(
    //     'total' => '38912500',
    //     'email' => '13121810071@student.prasetiyamulya.ac.id',
    //     'name' => 'Kelvien Kurniawan',
    //     'bp' => '1000004500',
    //     'prodi' => 'Branding'
    // ),
    // 96 => array(
    //     'total' => '855000',
    //     'email' => '13121810086@student.prasetiyamulya.ac.id',
    //     'name' => 'Dionysius Arvianto',
    //     'bp' => '1000004539',
    //     'prodi' => 'Branding'
    // ),
    // 97 => array(
    //     'total' => '1282500',
    //     'email' => '13121810094@student.prasetiyamulya.ac.id',
    //     'name' => 'ivander anders',
    //     'bp' => '1000003438',
    //     'prodi' => 'Branding'
    // ),
    // 98 => array(
    //     'total' => '1282500',
    //     'email' => '13121810096@student.prasetiyamulya.ac.id',
    //     'name' => 'Raffi Abelard Pratikto',
    //     'bp' => '1000004532',
    //     'prodi' => 'Branding'
    // ),
    // 99 => array(
    //     'total' => '20240000',
    //     'email' => '13121810100@student.prasetiyamulya.ac.id',
    //     'name' => 'abeth kastara putra',
    //     'bp' => '1000004547',
    //     'prodi' => 'Branding'
    // ),
    // 100 => array(
    //     'total' => '20905000',
    //     'email' => '13121810109@student.prasetiyamulya.ac.id',
    //     'name' => 'steffanny tanner',
    //     'bp' => '1000004463',
    //     'prodi' => 'Branding'
    // ),
    // 101 => array(
    //     'total' => '1282500',
    //     'email' => '13121810111@student.prasetiyamulya.ac.id',
    //     'name' => 'Erwin Junior',
    //     'bp' => '1000005167',
    //     'prodi' => 'Branding'
    // ),
    // 102 => array(
    //     'total' => '1282500',
    //     'email' => '13121810120@student.prasetiyamulya.ac.id',
    //     'name' => 'Alriyo Triantio',
    //     'bp' => '1000000437',
    //     'prodi' => 'Branding'
    // ),
    // 103 => array(
    //     'total' => '855000',
    //     'email' => '13121810125@student.prasetiyamulya.ac.id',
    //     'name' => 'Christopher Bradlee',
    //     'bp' => '1000000792',
    //     'prodi' => 'Branding'
    // ),
    // 104 => array(
    //     'total' => '427500',
    //     'email' => '13121810133@student.prasetiyamulya.ac.id',
    //     'name' => 'Jan Asher Hydanta',
    //     'bp' => '1000003388',
    //     'prodi' => 'Branding'
    // ),
    // 105 => array(
    //     'total' => '1282500',
    //     'email' => '13121810137@student.prasetiyamulya.ac.id',
    //     'name' => 'Shane Matheus',
    //     'bp' => '1000004169',
    //     'prodi' => 'Branding'
    // ),
    // 106 => array(
    //     'total' => '855000',
    //     'email' => '13121810139@student.prasetiyamulya.ac.id',
    //     'name' => 'Aquilla Irdana',
    //     'bp' => '1000000175',
    //     'prodi' => 'Branding'
    // ),
    // 107 => array(
    //     'total' => '855000',
    //     'email' => '13121810171@student.prasetiyamulya.ac.id',
    //     'name' => 'Tristan Ibrahim Aji',
    //     'bp' => '1000005106',
    //     'prodi' => 'Branding'
    // ),
    // 108 => array(
    //     'total' => '1282500',
    //     'email' => '13121810224@student.prasetiyamulya.ac.id',
    //     'name' => 'kelvin sucipto',
    //     'bp' => '1000004491',
    //     'prodi' => 'Branding'
    // ),
    // 109 => array(
    //     'total' => '1282500',
    //     'email' => '13121810228@student.prasetiyamulya.ac.id',
    //     'name' => 'Pasha Fernanda Fauzi',
    //     'bp' => '1000004497',
    //     'prodi' => 'Branding'
    // ),
    // 110 => array(
    //     'total' => '13577500',
    //     'email' => '13131810031@student.prasetiyamulya.ac.id',
    //     'name' => 'Phoebe Christabel',
    //     'bp' => '1000000575',
    //     'prodi' => 'Finance and Banking'
    // ),
    // 111 => array(
    //     'total' => '855000',
    //     'email' => '13131810053@student.prasetiyamulya.ac.id',
    //     'name' => 'Bryan Leandro Wahyu',
    //     'bp' => '1000000629',
    //     'prodi' => 'Finance and Banking'
    // ),
    // 112 => array(
    //     'total' => '15775000',
    //     'email' => '13131810116@student.prasetiyamulya.ac.id',
    //     'name' => 'Russell Reinaldo',
    //     'bp' => '1000004599',
    //     'prodi' => 'Finance and Banking'
    // ),
    // 113 => array(
    //     'total' => '19622500',
    //     'email' => '13201810006@student.prasetiyamulya.ac.id',
    //     'name' => 'Gracia Marcoa',
    //     'bp' => '1000000654',
    //     'prodi' => 'Accounting'
    // ),
    // 114 => array(
    //     'total' => '17057500',
    //     'email' => '13201810017@student.prasetiyamulya.ac.id',
    //     'name' => 'Fernanda .',
    //     'bp' => '1000004612',
    //     'prodi' => 'Accounting'
    // ),
    // 115 => array(
    //     'total' => '427500',
    //     'email' => '13301810019@student.prasetiyamulya.ac.id',
    //     'name' => 'Farel Muhammad Efra',
    //     'bp' => '1000004450',
    //     'prodi' => 'Business Economics'
    // ),
    // 116 => array(
    //     'total' => '20477500',
    //     'email' => '13411810030@student.prasetiyamulya.ac.id',
    //     'name' => 'gracia millenia',
    //     'bp' => '1000000520',
    //     'prodi' => 'Hospitality Business'
    // ),
    // 117 => array(
    //     'total' => '1282500',
    //     'email' => '13411810037@student.prasetiyamulya.ac.id',
    //     'name' => 'Shahnaz Zulietta',
    //     'bp' => '1000004609',
    //     'prodi' => 'Hospitality Business'
    // ),
    // 118 => array(
    //     'total' => '427500',
    //     'email' => '13421810034@student.prasetiyamulya.ac.id',
    //     'name' => 'Virya Dwipa Prawira',
    //     'bp' => '1000004584',
    //     'prodi' => 'Event'
    // ),
    // 119 => array(
    //     'total' => '427500',
    //     'email' => '13421810035@student.prasetiyamulya.ac.id',
    //     'name' => 'Daffa Prasetya Putra',
    //     'bp' => '1000004468',
    //     'prodi' => 'Event'
    // ),
    // 120 => array(
    //     'total' => '20050000',
    //     'email' => '13501810003@student.prasetiyamulya.ac.id',
    //     'name' => 'Jose Yonantha',
    //     'bp' => '1000005097',
    //     'prodi' => 'International Business Law'
    // ),
    // 121 => array(
    //     'total' => '1282500',
    //     'email' => '13501810012@student.prasetiyamulya.ac.id',
    //     'name' => 'Figgo Secenko',
    //     'bp' => '1000004316',
    //     'prodi' => 'International Business Law'
    // ),
    // 122 => array(
    //     'total' => '2875000',
    //     'email' => '13111910006@student.prasetiyamulya.ac.id',
    //     'name' => 'Dani Firmansyah',
    //     'bp' => '1000008618',
    //     'prodi' => 'Business'
    // ),
    // 123 => array(
    //     'total' => '2115000',
    //     'email' => '13111910013@student.prasetiyamulya.ac.id',
    //     'name' => 'Glenn Silver Ang Putra',
    //     'bp' => '1000005231',
    //     'prodi' => 'Business Management'
    // ),
    // 124 => array(
    //     'total' => '1282500',
    //     'email' => '13111910157@student.prasetiyamulya.ac.id',
    //     'name' => 'Nicky Moris',
    //     'bp' => '1000005990',
    //     'prodi' => 'Business Management'
    // ),
    // 125 => array(
    //     'total' => '1282500',
    //     'email' => '13111910160@student.prasetiyamulya.ac.id',
    //     'name' => 'Muhammad Akmal Yazid',
    //     'bp' => '1000008271',
    //     'prodi' => 'Business'
    // ),
    // 126 => array(
    //     'total' => '522500',
    //     'email' => '13111910172@student.prasetiyamulya.ac.id',
    //     'name' => 'Yoel Fredrik',
    //     'bp' => '1000005495',
    //     'prodi' => 'Business Management'
    // ),
    // 127 => array(
    //     'total' => '1282500',
    //     'email' => '13111910189@student.prasetiyamulya.ac.id',
    //     'name' => 'Clarisni .',
    //     'bp' => '1000007586',
    //     'prodi' => 'Business'
    // ),
    // 128 => array(
    //     'total' => '19622500',
    //     'email' => '13111910195@student.prasetiyamulya.ac.id',
    //     'name' => 'Ahmad Fadhil Marta',
    //     'bp' => '1000007783',
    //     'prodi' => 'Business'
    // ),
    // 129 => array(
    //     'total' => '1282500',
    //     'email' => '13111910201@student.prasetiyamulya.ac.id',
    //     'name' => 'Lionel Lesmana',
    //     'bp' => '1000008269',
    //     'prodi' => 'Business'
    // ),
    // 130 => array(
    //     'total' => '1282500',
    //     'email' => '13111910249@student.prasetiyamulya.ac.id',
    //     'name' => 'devinna nadila',
    //     'bp' => '1000006444',
    //     'prodi' => 'Business'
    // ),
    // 131 => array(
    //     'total' => '1282500',
    //     'email' => '13111910274@student.prasetiyamulya.ac.id',
    //     'name' => 'Winson Morren',
    //     'bp' => '1000007539',
    //     'prodi' => 'Business'
    // ),
    // 132 => array(
    //     'total' => '1282500',
    //     'email' => '13111910354@student.prasetiyamulya.ac.id',
    //     'name' => 'Bragi Ghaniyu Annafi',
    //     'bp' => '1000009106',
    //     'prodi' => 'Business'
    // ),
    // 133 => array(
    //     'total' => '855000',
    //     'email' => '13111910386@student.prasetiyamulya.ac.id',
    //     'name' => 'Stanley Teja',
    //     'bp' => '1000006415',
    //     'prodi' => 'Business'
    // ),
    // 134 => array(
    //     'total' => '2875000',
    //     'email' => '13111910447@student.prasetiyamulya.ac.id',
    //     'name' => 'Hana Salsabila',
    //     'bp' => '1000006188',
    //     'prodi' => 'Business'
    // ),
    // 135 => array(
    //     'total' => '19622500',
    //     'email' => '13111910454@student.prasetiyamulya.ac.id',
    //     'name' => 'John Pier\'s Jason Boanerges',
    //     'bp' => '1000006293',
    //     'prodi' => 'Business'
    // ),
    // 136 => array(
    //     'total' => '20050000',
    //     'email' => '13121910017@student.prasetiyamulya.ac.id',
    //     'name' => 'Made Larasati Puteri Astawa',
    //     'bp' => '1000008761',
    //     'prodi' => 'Branding'
    // ),
    // 137 => array(
    //     'total' => '427500',
    //     'email' => '13121910056@student.prasetiyamulya.ac.id',
    //     'name' => 'Felik Han\'s Lim',
    //     'bp' => '1000005391',
    //     'prodi' => 'Branding'
    // ),
    // 138 => array(
    //     'total' => '427500',
    //     'email' => '13121910064@student.prasetiyamulya.ac.id',
    //     'name' => 'Muhammad Mirza Fadillah',
    //     'bp' => '1000009666',
    //     'prodi' => 'Branding'
    // ),
    // 139 => array(
    //     'total' => '427500',
    //     'email' => '13121910085@student.prasetiyamulya.ac.id',
    //     'name' => 'Sheli Nur Ramasari',
    //     'bp' => '1000006373',
    //     'prodi' => 'Branding'
    // ),
    // 140 => array(
    //     'total' => '39340000',
    //     'email' => '13121910093@student.prasetiyamulya.ac.id',
    //     'name' => 'Natanael Yosua Pangalila',
    //     'bp' => '1000005735',
    //     'prodi' => 'Branding'
    // ),
    // 141 => array(
    //     'total' => '41715000',
    //     'email' => '13121910107@student.prasetiyamulya.ac.id',
    //     'name' => 'Willson Ferdinan Wiryanto',
    //     'bp' => '1000008700',
    //     'prodi' => 'Branding'
    // ),
    // 142 => array(
    //     'total' => '2115000',
    //     'email' => '13121910132@student.prasetiyamulya.ac.id',
    //     'name' => 'Margaret Putri Yonathan',
    //     'bp' => '1000006263',
    //     'prodi' => 'Branding'
    // ),
    // 143 => array(
    //     'total' => '427500',
    //     'email' => '13121910150@student.prasetiyamulya.ac.id',
    //     'name' => 'Ivan Nathaniel Susanto',
    //     'bp' => '1000005986',
    //     'prodi' => 'Branding'
    // ),
    // 144 => array(
    //     'total' => '427500',
    //     'email' => '13121910162@student.prasetiyamulya.ac.id',
    //     'name' => 'Antitazira Putri Yunas',
    //     'bp' => '1000008072',
    //     'prodi' => 'Branding'
    // ),
    // 145 => array(
    //     'total' => '20477500',
    //     'email' => '13131910036@student.prasetiyamulya.ac.id',
    //     'name' => 'jeanette .',
    //     'bp' => '1000006161',
    //     'prodi' => 'Finance and Banking'
    // ),
    // 146 => array(
    //     'total' => '20477500',
    //     'email' => '13131910044@student.prasetiyamulya.ac.id',
    //     'name' => 'Dio Putra Nagara',
    //     'bp' => '1000006381',
    //     'prodi' => 'Finance and Banking'
    // ),
    // 147 => array(
    //     'total' => '17912500',
    //     'email' => '13131910061@student.prasetiyamulya.ac.id',
    //     'name' => 'Mico Wijaya Putra',
    //     'bp' => '1000006450',
    //     'prodi' => 'Finance and Banking'
    // ),
    // 148 => array(
    //     'total' => '40290000',
    //     'email' => '13131910071@student.prasetiyamulya.ac.id',
    //     'name' => 'Alfred .',
    //     'bp' => '1000005499',
    //     'prodi' => 'Finance and Banking'
    // ),
    // 149 => array(
    //     'total' => '25990000',
    //     'email' => '13131910089@student.prasetiyamulya.ac.id',
    //     'name' => 'Faiz Fauzani Rinaldy',
    //     'bp' => '1000005426',
    //     'prodi' => 'Finance and Banking'
    // ),
    // 150 => array(
    //     'total' => '19195000',
    //     'email' => '13131910091@student.prasetiyamulya.ac.id',
    //     'name' => 'yeremia Alexander Harianto',
    //     'bp' => '1000005731',
    //     'prodi' => 'Finance and Banking'
    // ),
    // 151 => array(
    //     'total' => '17912500',
    //     'email' => '13131910098@student.prasetiyamulya.ac.id',
    //     'name' => 'Daffa Rizqianaufal Maulidsyah',
    //     'bp' => '1000008632',
    //     'prodi' => 'Finance and Banking'
    // ),
    // 152 => array(
    //     'total' => '2875000',
    //     'email' => '13301910003@student.prasetiyamulya.ac.id',
    //     'name' => 'Charlie Napoleon Sendra',
    //     'bp' => '1000009145',
    //     'prodi' => 'Business Economics'
    // ),
    // 153 => array(
    //     'total' => '19679500',
    //     'email' => '13421910045@student.prasetiyamulya.ac.id',
    //     'name' => 'Deasyna Alyssa Putri Sukandar',
    //     'bp' => '1000006122',
    //     'prodi' => 'Event'
    // ),
    // 154 => array(
    //     'total' => '18767500',
    //     'email' => '13421910053@student.prasetiyamulya.ac.id',
    //     'name' => 'Muhammad Zidany Raihan',
    //     'bp' => '1000008560',
    //     'prodi' => 'Event'
    // ),
    // 155 => array(
    //     'total' => '855000',
    //     'email' => '13421910059@student.prasetiyamulya.ac.id',
    //     'name' => 'Mohammad Ariq Afiansyah Fauzan',
    //     'bp' => '1000007787',
    //     'prodi' => 'Event'
    // ),
    // 156 => array(
    //     'total' => '20050000',
    //     'email' => '13501910043@student.prasetiyamulya.ac.id',
    //     'name' => 'Rafisya Rahma Fathanaila',
    //     'bp' => '1000009863',
    //     'prodi' => 'International Business Law'
    // ),
    // 157 => array(
    //     'total' => '21000000',
    //     'email' => '13112010301@student.prasetiyamulya.ac.id',
    //     'name' => 'Kevin Fernandi',
    //     'bp' => '1000011844',
    //     'prodi' => 'Business'
    // ),
    // 158 => array(
    //     'total' => '21000000',
    //     'email' => '13112010364@student.prasetiyamulya.ac.id',
    //     'name' => 'Maria Beatrice Yoana',
    //     'bp' => '1000010651',
    //     'prodi' => 'Business'
    // ),
    // 159 => array(
    //     'total' => '21000000',
    //     'email' => '13112010443@student.prasetiyamulya.ac.id',
    //     'name' => 'Domeniko Krisnaldi',
    //     'bp' => '1000011233',
    //     'prodi' => 'Business'
    // ),
    // 160 => array(
    //     'total' => '21000000',
    //     'email' => '13112010507@student.prasetiyamulya.ac.id',
    //     'name' => 'Avryll Bryan',
    //     'bp' => '1000012979',
    //     'prodi' => 'Business'
    // ),
    // 161 => array(
    //     'total' => '3000000',
    //     'email' => '13112010531@student.prasetiyamulya.ac.id',
    //     'name' => 'Jenny Fransisca',
    //     'bp' => '1000013548',
    //     'prodi' => 'Business'
    // ),
    // 162 => array(
    //     'total' => '21000000',
    //     'email' => '13122010206@student.prasetiyamulya.ac.id',
    //     'name' => 'Narendra Bintang Ramadhan Yulianto',
    //     'bp' => '1000013851',
    //     'prodi' => 'Branding'
    // ),
    // 163 => array(
    //     'total' => '17850000',
    //     'email' => '13202010053@student.prasetiyamulya.ac.id',
    //     'name' => 'Natassya .',
    //     'bp' => '1000013381',
    //     'prodi' => 'Accounting'
    // ),
    // 164 => array(
    //     'total' => '3000000',
    //     'email' => '13422010053@student.prasetiyamulya.ac.id',
    //     'name' => 'Helena Eleonora',
    //     'bp' => '1000012696',
    //     'prodi' => 'Event'
    // ),
    // 165 => array(
    //     'total' => '21900000',
    //     'email' => '13502010026@student.prasetiyamulya.ac.id',
    //     'name' => 'Mohammad Bayu Farhannanta',
    //     'bp' => '1000012560',
    //     'prodi' => 'International Business Law'
    // ),
    // 166 => array(
    //     'total' => '2865000',
    //     'email' => '01311171049@student.prasetiyamulya.ac.id',
    //     'name' => 'Yulissa Christie Yansah',
    //     'bp' => '1000003564',
    //     'prodi' => 'Business Management'
    // ),
    // 167 => array(
    //     'total' => '27025500',
    //     'email' => '01311171267@student.prasetiyamulya.ac.id',
    //     'name' => 'Lee Marvin Scorpianus',
    //     'bp' => '1000003778',
    //     'prodi' => 'Business Management'
    // ),
    // 168 => array(
    //     'total' => '4500000',
    //     'email' => '01312171111@student.prasetiyamulya.ac.id',
    //     'name' => 'Alexandra Aretha Louise',
    //     'bp' => '1000004129',
    //     'prodi' => 'Branding'
    // ),
    // 169 => array(
    //     'total' => '20932400',
    //     'email' => '13111810084@student.prasetiyamulya.ac.id',
    //     'name' => 'Jocelyn Juanita Ciputra',
    //     'bp' => '1000004530',
    //     'prodi' => 'Business Management'
    // ),
    // 170 => array(
    //     'total' => '20050000',
    //     'email' => '13111810359@student.prasetiyamulya.ac.id',
    //     'name' => 'Rachel Christine Putri Satrio',
    //     'bp' => '1000004533',
    //     'prodi' => 'Business Management'
    // ),
    // 171 => array(
    //     'total' => '129537500',
    //     'email' => '13121810190@student.prasetiyamulya.ac.id',
    //     'name' => 'Christian Marcell Purwanto',
    //     'bp' => '1000000299',
    //     'prodi' => 'Branding'
    // ),
    // 172 => array(
    //     'total' => '19622500',
    //     'email' => '13111910329@student.prasetiyamulya.ac.id',
    //     'name' => 'Natasha Margaretha',
    //     'bp' => '1000006308',
    //     'prodi' => 'Business'
    // ),
    // 173 => array(
    //     'total' => '17000000',
    //     'email' => '13111910332@student.prasetiyamulya.ac.id',
    //     'name' => 'Revano Savero',
    //     'bp' => '1000005650',
    //     'prodi' => 'Business Management'
    // ),
    // 174 => array(
    //     'total' => '4000000',
    //     'email' => '13411910039@student.prasetiyamulya.ac.id',
    //     'name' => 'Denissa Christie Yansah',
    //     'bp' => '1000005454',
    //     'prodi' => 'Hospitality Business'
    // ),
    // 175 => array(
    //     'total' => '9550000',
    //     'email' => '13421910047@student.prasetiyamulya.ac.id',
    //     'name' => 'Jeremiah Sean Harry S',
    //     'bp' => '1000007482',
    //     'prodi' => 'Event'
    // ),
    // 176 => array(
    //     'total' => '14000000',
    //     'email' => '13421910058@student.prasetiyamulya.ac.id',
    //     'name' => 'Ariel Tristan',
    //     'bp' => '1000007139',
    //     'prodi' => 'Event'
    // ),
    // 177 => array(
    //     'total' => '21000000',
    //     'email' => '13112010449@student.prasetiyamulya.ac.id',
    //     'name' => 'Aaron Vincentius Chia',
    //     'bp' => '1000011283',
    //     'prodi' => 'Business'
    // ),
    // 178 => array(
    //     'total' => '3750000',
    //     'email' => '13122010073@student.prasetiyamulya.ac.id',
    //     'name' => 'Brandley Yansah',
    //     'bp' => '1000011188',
    //     'prodi' => 'Branding'
    // ),
    // 179 => array(
    //     'total' => '19650000',
    //     'email' => '13122010093@student.prasetiyamulya.ac.id',
    //     'name' => 'Viallino Putra Octavianus',
    //     'bp' => '1000011428',
    //     'prodi' => 'Branding'
    // ),
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
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/vendor/autoload.php';


$host = "sql105.epizy.com";
$username = "epiz_33085239";
$password = "vg4GdonUhE4";
$dbname = "epiz_33085239_hotel";


$con = mysqli_connect($host, $username, $password, $dbname);
if (!$con)
{
    die("Connection failed!" . mysqli_connect_error());
}   

if(isset($_POST['submit']))
{
// $id = $_POST['id'];
$email = $_POST['email'];
$full_name = $_POST['fullname'];
$address = $_POST['address'];
$adharcard = $_POST['adharcard'];
$city = $_POST['city'];
$state = $_POST['state'];
$zipcode = $_POST['zipcode'];
$number = $_POST['number'];

$sql = "INSERT INTO `account` (`email`, `fullname`, `address`, `adharcard`, `city`, `state`, `zipcode`,`number`) VALUES ('$email', '$full_name', '$address', '$adharcard', '$city', '$state', '$zipcode','$number');";

$rs = mysqli_query($con, $sql);

if($rs)
{
    // echo "Message Send Successfully ";
    header('location:/html/wait.html');
    $mail = new PHPMailer(true);

    try {
    
        $mail->SMTPDebug = 3;           
        $mail->isSMTP();                               
        $mail->Host       = 'smtp.gmail.com';               
        $mail->SMTPAuth   = true;                              
        $mail->Username   ='adityachauhan9456923436@gmail.com';        
        $mail->Password   = 'hstcopbintzyonag';                               
        $mail->SMTPSecure = 'tls';            
        $mail->Port       = 587;                               
    
        $mail->setFrom('adityachauhan9456923436@gmail.com', 'Aditya Chauhan');
        $mail->addAddress($email, $full_name);                  
        $mail->addReplyTo('no-reply@gmail.com', 'No-reply');
     
       
    
        
        $mail->isHTML();                           
        $mail->Subject = "Room Booking From Shri Radhey Krishna Resort";
        $mail->Body    = " Hello , $full_name This Email Is Related to Your Hotel Booking From Shri Radhey Krishna Resort .\n This is The Address . We Are Waiting For You . \n \n \n https://www.google.com/maps/place/Vrindavan+Cottages+by+Sheosante/@27.5620482,77.6394061,18.08z/data=!4m8!3m7!1s0x39736d64678befe1:0xde577378b5ad921b!5m2!4m1!1i2!8m2!3d27.5621752!4d77.6393938" . " \n \n \n If You Face Any Problem Related To Our Location You Are Free to Call Us At : +919520166046 \n \n  Thanks";
        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }


	
}else{
      header('location:/index.html');
}
}
mysqli_close($con);

?>

<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "Hotel";


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
$receiver = $email;
$subject = "Room Booking From Shri Radhey Krishna Resort";
$body = " Hello , $full_name This Email Is Related to Your Hotel Booking From Shri Radhey Krishna Resort .\n This is The Address . We Are Waiting For You . \n \n \n https://www.google.com/maps/place/Vrindavan+Cottages+by+Sheosante/@27.5620482,77.6394061,18.08z/data=!4m8!3m7!1s0x39736d64678befe1:0xde577378b5ad921b!5m2!4m1!1i2!8m2!3d27.5621752!4d77.6393938" . " \n \n \n If You Face Any Problem Related To Our Location You Are Free to Call Us At : +919520166046 \n \n  Thanks"  ;
$sender = "From: adityachauhan9456923436@gmail.com";
if(mail($receiver, $subject, $body, $sender)){ //php function send mail


    //  Image function


	
}else{
      header('<location:/index.html');
}
}
mysqli_close($con);
}
?>
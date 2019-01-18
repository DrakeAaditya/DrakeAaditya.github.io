<?php
error_reporting(E_ALL & !E_NOTICE);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
//SMTP
require_once "vendor/autoload.php";


// $sql="SELECT Username,FirstName FROM signup WHERE EmployeeCode='$e_code'";
// $result = $conn->query($sql);

// if ($result->num_rows == 1) {
//      // output data of each row
//      while($row = $result->fetch_assoc()){
//         $empmail = $row["Username"];
//         $empname = $row["FirstName"];
//      }
// }

$mail = new PHPMailer;

//Enable SMTP debugging. 
$mail->SMTPDebug = 0;                               
//Set PHPMailer to use SMTP.
$mail->isSMTP();
//Set SMTP host name                          
$mail->Host = "email-smtp.us-east-1.amazonaws.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                          
//Provide username and password     
$mail->Username = "AKIAIWV676JVJX3LG4LA";                 
$mail->Password = "AtfDK4pjKEA9I5cqpiSlFLpi7gkkKRF8ngEMJJtMdU2Q";                     
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";                           
//Set TCP port to connect to 
$mail->Port = 587;                                   

$mail->From = "noreply@sivi.ml";
$mail->FromName = "Portfolio";

//$mail->addAddress("basudha@expressearth.com", "Basudha");
$mail->addAddress("addyrockx96@gmail.com", "Addy");
//$mail->addAddress("vk45800@gmail.com", "Vijay");

$mail->isHTML(true);

$mail->Subject = "$subject";
$mail->Body = " Name: $name <br>
                Email: $email <br><br>

                $message


";

$mail->AltBody = "This is the plain text version of the email content";

if(!$mail->send()) 
{
    echo "Mailer Error: " . $mail->ErrorInfo;
} 
else 
{
    echo "Mail has been sent successfully";
}
?>
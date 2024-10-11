<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php';

class Mailer extends PHPMailer{
    function mailServerSetup(){
        // $this->SMTPDebug = SMTP::DEBUG_SERVER;
        $this->isSMTP();
        $this->Host = "smtp.gmail.com";
        $this->SMTPAuth = true;
        $this->Username = "toni.fernandez@cirvianum.cat";
        $this->Password = "Cirvi@245302";
        $this->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $this->Port = 465;
    }

    function addRec($to, $cc, $bcc){
        $this->setFrom('phpmailer.daw@cirvianum.cat','Ins Cirvianum');
        foreach($to as $address){
            $this->addAddress($address);
        }
        foreach($cc as $address){
            $this->addCC($address);
        }
        foreach($bcc as $address){
            $this->addBCC($address);
        }
    }

    function addAttachments($att){
        foreach($att as $attachment){
            $this->addAttachment($attachment);
        }
    }

    function addVerifyContent($user = null){
        $this->isHTML(true);
        $this->Subject = "Verify your email please";
        $content = "<p> Hi " . $user['name'] . ",</p>";
        $content .= "<p>Click follow button in order to verify your email </p>";
        $content .= "<a style='padding: 4px; background-color: red; color: white; text-decoration-color: unset;' href='http://localhost/register/verify/?username=" . $user['username'] . "&token=" . $user['token'] . "'>Verify</a>";
        $this->Body = $content;
        }
}

$m= new Mailer();
$m->mailServerSetup();
$m->addRec([""], [], []);


?>
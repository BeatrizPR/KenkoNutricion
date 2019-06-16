<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/PHPMailer/src/Exception.php';
require 'phpmailer/PHPMailer/src/PHPMailer.php';
require 'phpmailer/PHPMailer/src/SMTP.php';
class Contact extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->view->message = " ";
        $this->view->datos = [];
    }

    function render()
    {
        session_start();
        $this->view->render('contact/index');
    }

    function sendEmail()
    {

        if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['comment'])) {
            //mandar correo
            $name = addslashes(trim($_POST['name'])) ?? " ";
            $email = addslashes(trim($_POST['email'])) ?? " ";
            $comment = addslashes(trim($_POST['comment'])) ?? " ";


            if (!empty($name) && !empty($email) && !empty($comment)) {

                $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
                try {
                    //Server settings                               // Enable verbose debug output
                    $mail->isSMTP();                                      // Set mailer to use SMTP
                    $mail->Host = ' ootlook.com';                   // Specify main and backup SMTP servers
                    $mail->SMTPAuth = true;                               // Enable SMTP authentication
                    $mail->Username = '.....@....';                 // SMTP username
                    $mail->Password = '*****************';                           // SMTP password
                    $mail->SMTPSecure = 'SSL';                            // Enable TLS encryption, `ssl` also accepted
                    $mail->Port = 465;                                    // TCP port to connect to

                    //Recipients  Destinatarios
                    $mail->setFrom('....@....', 'Mailer');  //********** */ TIENE QUE SER IGUAL QUE  EL MAIL DE USERNAME 
                    $mail->addAddress('k@....', 'Mailer');     // Add a recipient //LLEGA A ESTE CORREO EL MENSAJE
                    $mail->addAddress('....@gmail.com');               // Name is optional
                    //Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = 'Correo de contacto de Nutricion';
                    $mail->Body    = 'Nombre: ' . $name . '<br/>Correo: ' . $email . '<br/>' . $comment;
                    $mail->send();
                    $mail->ClearAllRecipients(); // clear all
                    $mail->ClearAddresses();  // each AddAddress add to list
                    $mail->ClearCCs();
                    $mail->ClearBCCs();
                    $message = 'El mensaje ha sido enviado correctamente.';

                } catch (Exception $e) {
 
                }
            } else {
                $message = "<h3 style='color:red'>Ha habido algún problema con los datos. Intentalo de nuevo.</h3>";

            }


            $data = array();
            $data["message"] = $message;
            //var_dump($data);

            $messageJson = json_encode($data);
            header('Content-type: application/json; charset=utf-8');
            echo $messageJson;
        }
    }
}

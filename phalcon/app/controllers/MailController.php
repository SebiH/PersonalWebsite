<?php

namespace Sehub\Controllers;

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\View;

class MailController extends Controller
{
    public function initialize()
    {
        $this->view->disable();
    }

    public function sendAction()
    {
        $post_data = json_decode(file_get_contents("php://input"));
        $result = array();

        // validation expected data exists
        if(!isset($post_data->name)
            || !isset($post_data->email)
            || !isset($post_data->message))
        {
            $result["error"] = "Not all required fields were submitted.";
            $result["success"] = false;
            echo json_encode($result);
            return;
        }

        $email_to = $this->config->application->contactEmail;
        $email_subject = "FORM SUBMITTED: " . $post_data->subject;

        $name = $post_data->name; // required
        $email_from = $post_data->email; // required
        $message = $post_data->message; // required

        $email_message = "Name: ".$name."\n";
        $email_message .= "Email: ".$email_from."\n";
        $email_message .= "Message: ".$message."\n";

        // create email headers
        $headers = 'From: '.$email_from."\r\n".
            'Reply-To: '.$email_from."\r\n" .
            'X-Mailer: PHP/' . phpversion();
        @mail($email_to, $email_subject, $email_message, $headers);  

        $result["success"] = true;

        header('Content-Type: application/json');
        echo json_encode($result);

    }
}



<?php

namespace App\controller;

class ContactController
{
    public function index()
    {
        $content = __DIR__ . '/../view/contact.php';
        include __DIR__ . '/../view/layout.php';
    }

    public function submitForm()
    {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];


        $to = '#'; // Replace with your email
        $subject = 'New Contact Form Submission';
        $headers = "From: $email" . "\r\n" .
            "Reply-To: $email" . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        $body = "You have received a new message from your website contact form.\n\n".
            "Here are the details:\n\n".
            "Name: $name\n\n".
            "Email: $email\n\n".
            "Message:\n$message\n";


        if(mail($to, $subject, $body, $headers)){
            echo 'Message sent successfully';
        } else{
            echo 'Message sending failed';
        }
    }
}
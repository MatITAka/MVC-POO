<?php
// app/controller/ContactController.php

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
        // Get the form data
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        // Prepare the email
        $to = 'm.slyemi@it-students.fr'; // Replace with your email
        $subject = 'New Contact Form Submission';
        $headers = "From: $email" . "\r\n" .
            "Reply-To: $email" . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        $body = "You have received a new message from your website contact form.\n\n".
            "Here are the details:\n\n".
            "Name: $name\n\n".
            "Email: $email\n\n".
            "Message:\n$message\n";

        // Send the email
        if(mail($to, $subject, $body, $headers)){
            echo 'Message sent successfully';
        } else{
            echo 'Message sending failed';
        }
    }
}
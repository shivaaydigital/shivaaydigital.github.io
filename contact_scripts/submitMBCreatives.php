<?php


$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$date = $_POST['date'];

if ($email == " " || $email == "") {
    echo "Error";
    header("Location: https://mb-creatives.com/404");
    die();
}

// Forwarding the data to the mail
// To
$to = "contact@mb-creatives.com";

// Subject
$subject = "New Contact Form Submission - MB Creatives";

// Message Template
$message = "
<!DOCTYPE html>
<html>
    <head>
        <style>
            body {
                font-family: Arial, Helvetica, sans-serif;
            }

            .table {
                font-family: Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            .table td,
            .table th {
                border: 1px solid #404040;
                padding: 8px;
            }

            .table tr:nth-child(even) {
                background-color: #f2f2f2;
            }

            .table tr:hover {
                background-color: #ddd;
            }

            .table th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: center;
                background-color: #404040;
                color: white;
            }
        </style>
    </head>
    <body>
        <h2>New Contact Form Submission - MB Creatives</h2>
        <p>Source : MB Creatives Contact Form</p>

        <table class='table'>
            <th>Field</th>
            <th>Data</th>
            <tr>
                <td>Name</td>
                <td>" . $name . "</td>
            </tr>
            <tr>
                <td>Email</td>
                <td><a href='mailto:" . $email . "'>" . $email . "</a></td>
            </tr>
            <tr>
                <td>Message</td>
                <td>" . $message . "</td>
            </tr>
            <tr>
                <td>Date</td>
                <td>" . $date . "</td>
            </tr>
        </table>
    </body>
</html>
";

$header = "From:no-reply@shivaaycreations.in \r\n";

$header .= "MIME-Version: 1.0 \r\n";

$header .= "Content-type: text/html;charset=UTF-8 \r\n";

$result_mail = mail($to, $subject, $message, $header);

// if ($result_mail == true) {
//   echo "Message sent successfully!";
// } else {
//   echo "Sorry, unable to send mail!";
// }

// Ending Redirect
if ($result_db == true && $result_mail == true) {
    echo "Message Sent!";
} else {
    echo "Error: " . mysqli_error($conn);
}
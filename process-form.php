<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $message = $_POST["message"];
  $secretKey = "6Lfp6RAmAAAAAHruBDpHyKeJ_q-8IezNp-cJ9f01";
  $response = $_POST['g-recaptcha-response'];
  $url = 'https://www.google.com/recaptcha/api/siteverify';
  $data = array('secret' => $secretKey, 'response' => $response);
   
  $options = array(
    'http' => array (
      'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
      'method' => 'POST',
      'content' => http_build_query($data)
    )
  );
   
  $context = stream_context_create($options);
  $result = file_get_contents($url, false, $context);
  $json = json_decode($result);

  if ($json->success == false) {
    die("Error: reCAPTCHA verification failed.");
  }

  // Set the email recipient
  $to = "adityadoneria995@gmail.com";

  // Set the email subject
  $subject = "New message from $name";

  // Set the email message
  $body = "Name: $name\nEmail: $email\nMessage: $message";

  // Send the email
  if (mail($to, $subject, $body)) {
    echo "Thank you for contacting us.";
  } else {
    echo "Error: Failed to send email.";
  }
}
?>

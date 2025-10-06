<?
  $email_to = "-----";
  $email_from = "-----";
  $subject = "Test subject";
  $body = "Test message from elginevents.org";

  mail($email_to, "$subject", "$body", "From: $email_from");

?>


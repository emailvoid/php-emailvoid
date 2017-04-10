<?php

require('EmailVoidClient.php');

// Settings
$host = 'www.emailvoid.com';
$port = 80;
$apikey = "b8818f4c8594021a9ca1489d135a2540d726f855767496788c6f1d76f2f5917d";

// Example usage
$c = new EmailVoidClient($apikey, $host, $port);

$user = "support";

$message_count = $c->msg_count($user);
print($message_count);

$messages = $c->msg_search("support");
foreach($messages as $message) {
    print_r($message);
    $msgid = $message->msgid;
    //
    $content = $c->msg_content($msgid);
    print_r($content);
}

$c->dispose();

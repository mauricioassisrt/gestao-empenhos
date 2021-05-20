<?php


return [
    'driver' => env('MAIL_DRIVER', 'smtp'),
    'host' => env('MAIL_HOST', 'mail.syspublico.com.br'),
    'port' => env('MAIL_PORT', 465),
    'from' => ['address' => 'noreply@syspublico.com.br', 'name' => 'não responda'],
    'encryption' => env('MAIL_ENCRYPTION', 'ssl'),
    'username' => env('MAIL_USERNAME'),
    'password' => env('MAIL_PASSWORD'),
    'sendmail' => '/usr/sbin/sendmail -bs',
    'pretend' => false,

];

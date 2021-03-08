<?php

/*
 * You can place your custom package configuration in here.
 */
return [


  'currency'=>env('INEX_CURRENCY'),

  'send_mail'=>env('INEX_SEND_MAIL'),

  "mail_from"=>env('INEX_MAIL_FROM','epmnzava@gmail.com'),

  "transaction_id_prefix"=>env("INEX_TRANSACTION_PREFIX","INEX"),

  "transaction_id_length"=>env('INEX_TRANSACTION_ID_LENGTH')


    
];
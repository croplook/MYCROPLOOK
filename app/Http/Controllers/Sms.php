<?php


class SmsGo
{
    // public function __construct(Array $numbers,String $template)
    // {

    //     foreach ($numbers as $every => $phone)
    //     {

    //         sms::send($phone, $template);

    //     }

    // }




    public static function send($number,$message) {

        self::smsgateway($number, $message);

        return;

       try {



           $basic  = new \Nexmo\Client\Credentials\Basic("0ddef89d", "NmN4myghr8BFCrnm");

           $client = new \Nexmo\Client($basic);

           $message = $client->message()->send([
               'to' => $number,
               'from' => '565656',
               'text' => $message
           ]);


       } catch(Exception $err) {

          // print_r($err->getMessage());

       }


    }





}

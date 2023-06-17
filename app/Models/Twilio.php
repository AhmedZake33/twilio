<?php

namespace App\Models;

use Twilio\Rest\Client;

class Twilio 
{
    protected $mobile = null;
    protected $code = null;
    
    public function __construct($mobile , $code)
    {
        $this->mobile = $mobile;
        $this->code = $code;
    }

    public function submit()
    {
        $account_sid = getenv('TWILIO_ACCOUNT_SID');
        $auth_token = getenv('TWILIO_AUTH_TOKEN');
        $twilio_number = getenv('TWILIO_NUMBER');
        $client = new Client($account_sid, $auth_token);

        $client->messages->create(
            // Where to send a text message (your cell phone?)
            // $this->mobile,
            '+201116028622',
            array(
                'from' => $twilio_number,
                'body' => "Verification Code is $this->code Valid For 3 Minutes"
            )
        );
    }

}



?>
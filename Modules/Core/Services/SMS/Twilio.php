<?php namespace Modules\Core\Services\SMS;

use Twilio\Rest\Client;

class Twilio implements SMSInterface
{
    public function send($to,$message)
    {
        $sid = config('services.twilio.sid');
        $token = config('services.twilio.token');
        $client = new Client($sid,$token);
        $client->messages->create(
        // the number you'd like to send the message to
            $to,
            array(
                // A Twilio phone number you purchased at twilio.com/console
                'from' => '+15412621714',
                // the body of the text message you'd like to send
                'body' => $message
            )
        );
    }
}
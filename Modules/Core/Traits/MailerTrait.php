<?php

namespace Modules\Core\Traits;

 use Mail;

trait MailerTrait {

    public function sendTo($email, $subject, $view, $data = array())
    {

        Mail::que($view, $data, function($message) use($email, $subject)
        {
            $message->from('noreply@mathetc.org','Math Enrichment Tutor Center');
            $message->to($email)
                ->subject($subject);
        });

    }
}
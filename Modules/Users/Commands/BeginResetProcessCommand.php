<?php namespace Modules\Users\Commands;

class BeginResetProcessCommand
{
    public $email;

    public function __construct($email)
    {
        $this->email = $email;
    }
}

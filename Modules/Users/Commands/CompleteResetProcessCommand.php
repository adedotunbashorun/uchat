<?php namespace Modules\Users\Commands;

class CompleteResetProcessCommand
{
    public $confirm_password;
    public $password;
    public $userId;
    public $code;

    public function __construct($password, $confirm_password, $userId, $code)
    {
        $this->confirm_password = $confirm_password;
        $this->password = $password;
        $this->userId = $userId;
        $this->code = $code;
    }
}

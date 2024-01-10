<?php

namespace App\Entity;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class LoggerClass
{

    protected string $userName;
    protected string $password;
    public function __construct()
    {

    }



    public function getUserName(): string
    {
        return $this->userName;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

}
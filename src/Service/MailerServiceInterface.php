<?php

namespace App\Service;

interface MailerServiceInterface
{
    public function sendConfirmationEmail($user);
}
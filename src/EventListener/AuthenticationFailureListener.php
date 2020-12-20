<?php

namespace App\EventListener;

use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationFailureEvent;
use Lexik\Bundle\JWTAuthenticationBundle\Response\JWTAuthenticationFailureResponse;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTInvalidEvent;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTNotFoundEvent;
use Symfony\Component\HttpFoundation\JsonResponse;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTExpiredEvent;

class AuthenticationFailureListener
{
    /**
    * @param AuthenticationFailureEvent $event
    */
    public function onAuthenticationFailureResponse(AuthenticationFailureEvent $event)
    {       
        $data = [
            'status'  => 'Permission Denied',
            'message' => 'Bad credentials, please verify that your username/password are correctly set',
        ];

        $response = new JWTAuthenticationFailureResponse($data);

        $event->setResponse($response);
    }



    /**
    * @param JWTInvalidEvent $event
    */
    public function onJWTInvalid(JWTInvalidEvent $event)
    {
        $response = new JWTAuthenticationFailureResponse('Your token is invalid, please login again to get a new one', 403);

        $event->setResponse($response);
    }

    /**
    * @param JWTNotFoundEvent $event
    */
    public function onJWTNotFound(JWTNotFoundEvent $event)
    {
        $data = [
            'status'  => 'Permission Denied',
            'message' => 'Missing token',
        ];

        $response = new JsonResponse($data, 403);

        $event->setResponse($response);
    }

    /**
    * @param JWTExpiredEvent $event
    */
    public function onJWTExpired(JWTExpiredEvent $event)
    {
        /** @var JWTAuthenticationFailureResponse */
        $response = $event->getResponse();

        $response->setMessage('Your token is expired, please renew it.');
    }

}
<?php
namespace App\EventListener;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;


class ExceptionListener
{
    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        
        $exception = $event->getException();
        
        $customResponse = new JsonResponse(['status'=>false, 'message' => $exception->getMessage()],403);
        
        $event->setResponse($customResponse);

    }
}
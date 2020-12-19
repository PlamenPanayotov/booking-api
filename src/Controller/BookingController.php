<?php

namespace App\Controller;

use App\Entity\Booking;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class BookingController extends AbstractController
{
    /**
     * @Route("/api/booking", name="booking", methods="post")
     */
    public function index(Request $request): Response
    {
        $data = json_decode($request->getContent(), true);
        $booking = new Booking();
        $booking->setUuid($data["uuid"])
        ->setOrderedStartTime(new DateTime($data['orderedStartTime']))
        ->setOrderedEndTime(new DateTime($data['orderedEndTime']))
        ->setRecordedStartTime(new DateTime($data['recrodedStartTime']))  
        ->setRecorderEndTime(new DateTime($data['recordedEndTime']))
        ->setCanceled($data['canceled']);          
        $em = $this->getDoctrine()->getManager();
        $em->persist($booking);
        $em->flush();
        return $this->json([
            'message' => $data
        ]);
    }
}

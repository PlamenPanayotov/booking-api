<?php

namespace App\Controller;

use App\Entity\Booking;
use App\Service\BookingServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class BookingController extends AbstractController
{
    private $bookingService;

    public function __construct(BookingServiceInterface $bookingService)
    {
        $this->bookingService = $bookingService;
    }
    /**
     * @Route("/api/booking", name="booking", methods="post")
     */
    public function index(Request $request): Response
    {
        $data = json_decode($request->getContent(), true);
        $booking = new Booking();

        $this->bookingService->setBooking($booking, $data);    

        $em = $this->getDoctrine()->getManager();
        $em->persist($booking);
        $em->flush();

        return $this->json([
            'message' => $data
        ]);
    }
}

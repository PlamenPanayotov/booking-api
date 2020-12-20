<?php

namespace App\Controller;

use App\Entity\Booking;
use App\Service\BookingServiceInterface;
use App\Service\MailerServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;


class BookingController extends AbstractController
{
    private $bookingService;

    private $security;

    private $mailerService;

    public function __construct(BookingServiceInterface $bookingService, Security $security, MailerServiceInterface $mailerService)
    {
        $this->bookingService = $bookingService;
        $this->security = $security;
        $this->mailerService = $mailerService;
    }
    /**
     * @Route("/api/add_booking", name="booking", methods="post")
     */
    public function index(Request $request): Response
    {
        $data = json_decode($request->getContent(), true);
        $booking = new Booking();

        $user = $this->security->getUser();

        $this->bookingService->setBooking($booking, $data, $user);    

        $em = $this->getDoctrine()->getManager();
        $em->persist($booking);
        $em->flush();

        $this->mailerService->sendConfirmationEmail($user);

        return $this->json([
            'message' => 'Successful booking'
        ]);
    }
}

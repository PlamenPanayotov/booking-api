<?php

namespace App\Service;

use App\Entity\Booking;
use DateTime;
use Symfony\Component\Security\Core\Security;

class BookingService implements BookingServiceInterface
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }
    public function setBooking(Booking $booking, $data)
    {
        $user = $this->security->getUser();
        $booking->setUuid($data["uuid"])
                ->setOrderedStartTime(new DateTime($data['orderedStartTime']))
                ->setOrderedEndTime(new DateTime($data['orderedEndTime']))
                ->setRecordedStartTime(new DateTime($data['recrodedStartTime']))  
                ->setRecorderEndTime(new DateTime($data['recordedEndTime']))
                ->setCanceled($data['canceled'])
                ->setUser($user);
       
        return $booking;
    }
}
<?php

namespace App\Service;

use App\Entity\Booking;
use DateTime;


class BookingService implements BookingServiceInterface
{

    public function setBooking(Booking $booking, $data, $user)
    {
       
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
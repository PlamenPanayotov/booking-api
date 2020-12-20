<?php

namespace App\Service;

use App\Entity\Booking;

interface BookingServiceInterface
{
    public function setBooking(Booking $booking, $data, $user);
}
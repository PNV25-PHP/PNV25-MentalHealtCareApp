<?php

namespace App\Controllers\Patient;

use App\Dtos\Patient\BookingReq;
use App\Dtos\Patient\DateReq;
use App\Models\Booking;
use App\Repositories\DoctorRepository;
use App\Repositories\BookingRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Laravel\Lumen\Routing\Controller;
use App\Repositories\UserRepository;

class BookingController extends Controller
{
    private UserRepository $userRepository;
    public function index()
    {
        $this->userRepository = new UserRepository();
        $this->userRepository->checkLogin();
        $request = new DoctorRepository;
        return view("pages\patient\HtmlBooking", ['doctor' => $request->getDoctorById($_GET['id'])], ['times' => $request->getAllTimeDoctor()]);
    }

    public function checkTime(Request $req)
    {
        $requestDay = new DateReq($req);
        $request = new DoctorRepository;
        $day = $requestDay->date;
        $listTime = $request->getAvailableTimesForBooking($day);
        return response()->json([
            'message' => 'List time user',
            'listTime' => $listTime
        ], 201);
    }

    public function booking(Request $req)
    {
        $requestBooking = new BookingReq($req);
        $newBooking = new Booking($requestBooking->patientId, $requestBooking->doctorId, $requestBooking->time, $requestBooking->date, $requestBooking->price);
        $booking = new BookingRepository();
        $result = $booking->insert($newBooking);

        return response()->json([
            'message' => 'You have successfully booked your appointment',
        ], 200);
    }
}

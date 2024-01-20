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

class BookingController extends Controller
{
    public function index()
    {
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
        if ($requestBooking->id == "") {
            return response()->json([
                'message' => 'Appointment failed',
            ], 404);
        }
        $newBooking = new Booking($requestBooking->patientId, $requestBooking->doctorId, $requestBooking->date, $requestBooking->id);
        $booking = new BookingRepository();
        $result = $booking->insert($newBooking);

        return response()->json([
            'message' => 'You have successfully booked your appointment',
        ], 200);
    }
}

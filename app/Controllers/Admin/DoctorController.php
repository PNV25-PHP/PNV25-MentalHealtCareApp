<?php

namespace App\Controllers\Admin;

use App\Repositories\AdminRepository;
use App\Repositories\DoctorRepository;
use App\Models\Doctor;
use App\Models\Role;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Dtos\Admin\DoctorReq;
use Laravel\Lumen\Routing\Controller;

class DoctorController extends Controller
{
    private $adminRepository;
    private $userRepository;
    private $doctorRepository;

    public function __construct(AdminRepository $adminRepository, UserRepository $userRepository, DoctorRepository $doctorRepository)
    {
        $this->adminRepository = $adminRepository;
        $this->userRepository = $userRepository;
        $this->doctorRepository = $doctorRepository;
    }

    public function index()
    {
        $doctors = $this->doctorRepository->getAllDoctor();
        return view('pages.admin.doctor')->with('doctors', $doctors);
    }
    public function getBooking()
    {
        return view('pages.admin.booking');
    }
    public function getDashboard()
    {
        return view('pages.admin.dashboard');
    }

    public function addDoctor(Request $request)
    {
       $req = new DoctorReq($request);
       $select = new AdminRepository();
       $addDoctor = new User(Role::Doctor,
       $req->email, 
       $req->password,
       $req->fullName, 
       $req->address,
       $req->phone,
       $req->imageurl,
    );
        $doctor = $select->addNewDoctor($addDoctor);
        $newDoctor = new Doctor($addDoctor->getId(), $req->hospital, $req->specialization);
        $useInsert = new DoctorRepository();
        $useInsert->insert_doctor($newDoctor);

        if ($doctor != null) {
            return response()->json([
                "message" => "add doctor",
                "doctor" => $doctor
            ], 200);
        }
    }

    public function updateDoctor(Request $request)
    {
       $req = new DoctorReq($request);
       $select = new AdminRepository();
       $newUser = new User(Role::Doctor,
       $req->email, 
       $req->password,
       $req->fullName, 
       $req->address,
       $req->phone,
       $req->imageurl);
        $newDoctor = new Doctor($req->id, $req->specialization, $req->hospital);
       $doctor = $select->updateDoctor($newUser, $newDoctor);
        if ($doctor != null) {
            return response()->json([
                "message" => "update doctor complete",
            ], 200);
        }
    }

    public function deleteDoctor($doctorId)
    {
        $admin = new AdminRepository();
        $admin->deleteDoctor($doctorId);
        
        return response()->json([
            "message" => "delete doctor complete"
        ], 200);
        
    }
}
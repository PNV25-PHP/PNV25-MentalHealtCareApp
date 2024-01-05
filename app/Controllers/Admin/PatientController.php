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
    private $patientRepository;

    public function __construct(AdminRepository $adminRepository, UserRepository $userRepository, DoctorRepository $patientRepository)
    {
        $this->adminRepository = $adminRepository;
        $this->userRepository = $userRepository;
        $this->doctorRepository = $patientRepository;
    }

    public function index()
    {
        $patients = $this->patientRepository->getAllDoctor();
        return view('pages/admin/patient')->with('patients', $patients);
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
        $useInsert->insert($newDoctor);

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
       $newDoctor = new User(Role::Doctor,
       $req->email, 
       $req->password,
       $req->fullName, 
       $req->address,
       $req->phone,
       $req->imageurl,
    );
       $doctor = $select->updateDoctor($newDoctor);
        if ($doctor != null) {
            return response()->json([
                "message" => "validation doctor",
                "doctor" => $doctor->getFullName()
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
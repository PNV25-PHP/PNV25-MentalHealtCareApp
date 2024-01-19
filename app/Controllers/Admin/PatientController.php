<?php

namespace App\Controllers\Admin;

use App\Repositories\AdminRepository;
use App\Models\Role;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Dtos\Patient\PatientReq;
use App\Models\Patient;
use App\Repositories\PatientRepository;
use Laravel\Lumen\Routing\Controller;

class PatientController extends Controller
{
    private $adminRepository;
    private $userRepository;
    private $patientRepository;

    public function __construct(AdminRepository $adminRepository, UserRepository $userRepository, PatientRepository $patientRepository)
    {
        $this->adminRepository = $adminRepository;
        $this->userRepository = $userRepository;
        $this->patientRepository = $patientRepository;
    }

    public function index()
    {
        $this->userRepository->checkLogin();
        $patients = $this->patientRepository->getAllPatients();
        return view('pages.admin.patient')->with('patients', $patients);
    }

    public function addPatient(Request $request)
    {
       $req = new PatientReq($request);
       $select = new AdminRepository();
       $addPatient = new User(Role::Patient,
       $req->email, 
       $req->password,
       $req->fullName, 
       $req->address,
       $req->phone,
       $req->imageurl,
    );
        $patient = $select->addNewPatient($addPatient);
        $newPatient = new Patient($addPatient->getId());
        $useInsert = new PatientRepository();
        $useInsert->insert($newPatient);

        if ($patient != null) {
            return response()->json([
                "message" => "add patient",
                "patient" => $patient
            ], 200);
        }
    }

    public function updatePatient(Request $request)
    {
       $req = new PatientReq($request);
       $select = new AdminRepository();
       $newPatient = new User(Role::Patient,
       $req->email, 
       $req->password,
       $req->fullName, 
       $req->address,
       $req->phone,
       $req->imageurl,
    );
       $patient = $select->updatePatient($newPatient);
        if ($patient != null) {
            return response()->json([
                "message" => "update patient complete",
                "patient" => $patient
            ], 200);
        }
    }

    public function deletePatient($patientID)
    {
        $admin = new AdminRepository();
        $admin->deletePatient($patientID);
        if ($admin != null) {
            return response()->json([
                "message" => "delete patient complete"
            ], 200);
        }
    }
}
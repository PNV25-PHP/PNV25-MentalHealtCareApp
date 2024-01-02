<?php

namespace App\Controllers\Admin;

use App\Repositories\AdminRepository;
use App\Repositories\DoctorRepository;
use App\Models\Doctor;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;

class AddDoctorController extends Controller
{
    private $adminRepository;
    private $userRepository;
    public function __construct(AdminRepository $adminRepository, UserRepository $userRepository)
    {
        $this->adminRepository = $adminRepository;
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $doctors = $this->adminRepository->getAllDoctor();
        return view("pages\admin\doctor", compact('doctors'));
    }


    public function addDoctor(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $fullName = $request->input('fullName');
        $phone = $request->input('phone');
        $address = $request->input('address');
        $urlImage = $request->input('urlImage');
        $specialization = $request->input('specialization');
        $hospital = $request->input('hospital');

        $user = $this->userRepository->insert($email, $password, 'doctor', $fullName, $phone, $address, $urlImage);

        $this->adminRepository->addNewDoctor($user, $specialization, $hospital);
    }

    public function deleteDoctor($id)
    {
        $this->adminRepository->deleteDoctor($id);
    }

    // public function updateDoctor(Request $request)
    // {
    //     $id = $request->input('id');
    //     $data = $request->only(['email', 'password', 'fullName', 'phone', 'address', 'urlImage', 'specialization', 'hospital']);

    //     $doctor = this->getDoctorById($id);


    //     if (!$doctor) {
    //         return response()->json(['error' => 'Doctor not found'], 404);
    //     }

    //     $doctor->fill($data);
    //     $doctor->save();

    //     return response()->json(['message' => 'Doctor updated successfully']);
    // }

    
}

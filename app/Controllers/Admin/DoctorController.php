<?php

namespace App\Controllers\Admin;

use App\Repositories\AdminRepository;
use App\Repositories\DoctorRepository;
use App\Models\Doctor;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;

class DoctorController extends Controller
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
        // return response()->json($doctors);
        return view('pages/admin/doctor')->with('doctors', $doctors);
    }

    public function addDoctor(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $fullName = $request->input('fullName');
        $phone = $request->input('phone');
        $address = $request->input('address');
        $specialization = $request->input('specialization');
        $hospital = $request->input('hospital');

        $user = $this->userRepository->insert($email, $password, 'doctor', $fullName, $phone, $address);

        $this->adminRepository->addNewDoctor($user, $specialization, $hospital);
    }

    public function updateDoctor(Request $request, $doctorId)
    {
        dd($doctorId); // In giá trị của doctorId để kiểm tra
        $email = $request->input('email');
        $fullName = $request->input('fullName');
        $phone = $request->input('phone');
        $address = $request->input('address');
        $specialization = $request->input('specialization');
        $hospital = $request->input('hospital');

        $user = (object) $this->adminRepository->getDoctorById($doctorId);

        $this->userRepository->updateUser(
            $user->getId(),
            $email,
            $fullName,
            $phone,
            $address
        );

        $this->adminRepository->editDoctor(
            $user->getId(),
            $specialization,
            $hospital
        );

        return redirect()->route('pages.admin.doctor')->with('success', 'Cập nhật thông tin bác sĩ thành công!');
    }



}

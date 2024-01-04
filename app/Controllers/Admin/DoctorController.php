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

    public function updateDoctor(Request $request)
    {
        $doctorId = $request->input('doctorId');
        $email = $request->input('email');
        $fullName = $request->input('fullName');
        $phone = $request->input('phone');
        $address = $request->input('address');
        $specialization = $request->input('specialization');
        $hospital = $request->input('hospital');

        $doctor = $this->doctorRepository->getDoctorById($doctorId);

        if ($doctor) {
            $doctor->setEmail($email);
            $doctor->setFullName($fullName);
            $doctor->setPhone($phone);
            $doctor->setAddress($address);
            $doctor->specialization = $specialization;
            $doctor->hospital = $hospital;
            $this->adminRepository->updateDoctor($doctor);

            return redirect()->route('pages.admin.doctor')->with('success', 'Cập nhật thông tin bác sĩ thành công!');
        } else {
            return redirect()->route('pages.admin.doctor')->with('error', 'Không tìm thấy bác sĩ.');
        }
    }


    public function deleteDoctor(Request $request)
    {
        $doctorId = $request->input('doctorId'); // Lấy giá trị doctorId từ request

        // Xóa thông tin bác sĩ từ repository
        $this->adminRepository->deleteDoctor($doctorId);

        return redirect()->route('pages.admin.doctor')->with('success', 'Xóa bác sĩ thành công!');
    }
}
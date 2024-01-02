<?php

// namespace App\Controllers\Patient;
namespace App\Controllers\Common;

use App\Dtos\Common\ProFileReq;
use App\Models\User;
use App\Dtos\Common\SignInRes;
use App\Repositories\PatientRepository;
use App\Repositories\AdminRepository;
use App\Repositories\DoctorRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Models\Role;
use Laravel\Lumen\Routing\Controller;
use Illuminate\Support\Facades\DB;


class ProFileController extends Controller
{
    private UserRepository $userRepository;
    private PatientRepository $patientRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
        $this->patientRepository = new PatientRepository();
    }
    public function viewProfile(){
        return view('pages\common\HtmlProfile');
    }
    public function index()
    {
        return view('pages\common\HtmlEditProfile');
    }

    public function findByEmail($email)
    {
        $result = DB::select("SELECT * FROM users WHERE email = ? LIMIT 1", [$email]);

        if (!empty($result)) {
            $newUser = $result[0];
            if ($newUser->Role == "Admin") {
                $role = Role::Admin;
            } elseif ($newUser->Role == "Doctor") {
                $role = Role::Doctor;
            } else {
                $role = Role::Patient;
            }
            return new User($role, $newUser->Email, $newUser->Password, $newUser->FullName, $newUser->Phone == null ? "Please update" : $newUser->Phone, $newUser->Address == null ? "Please update" : $newUser->Address, $newUser->Url_Image == null ? "Please update" : $newUser->Url_Image);
        }

        return null;
    }

    public function updateInformationUser(Request $req)
    {
        $proFileRequest = new ProFileReq($req);
        if ($proFileRequest->role == "Admin") {
            $role = Role::Admin;
        } elseif ($proFileRequest->role == "Doctor") {
            $role = Role::Doctor;
        } else {
            $role = Role::Patient;
        }
        $change = new UserRepository();

        $user = new User($role, $proFileRequest->email, $proFileRequest->password, $proFileRequest->fullname, $proFileRequest->address == null ? "Please update" : $proFileRequest->address, $proFileRequest->phone == null ? "Please update" : $proFileRequest->phone, $proFileRequest->url_image == null ? "Please update" : $proFileRequest->url_image);
        $result =  $change->updateUser($user);
        $createUpdateUser = $change->findByEmail($proFileRequest->email);

        if ($result) {
            return response()->json([
                'message' => 'Update user sucessful',
                'payload' => new SignInRes(
                    $createUpdateUser->getId(),
                    $createUpdateUser->getRole()->getValue(),
                    $createUpdateUser->getEmail(),
                    $createUpdateUser->getFullname(),
                    $createUpdateUser->getPassword(),
                    $createUpdateUser->getPhone(),
                    $createUpdateUser->getAddress(),
                    $createUpdateUser->getUrlImage()
                )
            ], 200);
        }
        return response()->json([
            'message' => 'Update user not sucessful',
        ], 404);
    }
}

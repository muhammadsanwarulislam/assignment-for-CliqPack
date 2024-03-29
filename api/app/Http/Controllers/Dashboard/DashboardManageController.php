<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Traits\JsonResponseTrait;
use Repository\User\UserRepository;
use App\Http\Controllers\Controller;
use Repository\Dashboard\DashboardRepository;

class DashboardManageController extends Controller
{
    use JsonResponseTrait;

    protected $userRepository,$dashboardRepository;

    public function __construct(UserRepository $userRepository, DashboardRepository $dashboardRepository)
    {
        $this->userRepository = $userRepository;
        $this->dashboardRepository = $dashboardRepository;
    }
    public function index(Request $request){
        return $this->successJsonResponse("Total users",[
            'users' =>$this->userRepository->getAllUsersWithRole(),
            'tasks' => $this->dashboardRepository->getAllTaskAccordingToTheLoggedInUser()
        ]);
    }
}

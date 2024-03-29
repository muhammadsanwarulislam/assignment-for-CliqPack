<?php

namespace Repository\Dashboard;

use App\Models\Task;
use Repository\BaseRepository;

class DashboardRepository extends BaseRepository {

    public function model()
    {
        return Task::class;
    }

    public function getAllTaskAccordingToTheLoggedInUser()
    {
        return $this->model()::all();
    }
}
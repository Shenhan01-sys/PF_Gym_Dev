<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use \App\Models\Title;
use \App\Models\motivation_pf;
use \App\Models\Fitness_Program;
use \App\Models\Personal_Trainer;
use \App\Models\Facilites;
use \App\Models\schedule;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function login_admin()
    {
        return view('PF_Gym_admin_login');
    }

    public function index()
    {
        $title = Title::all();
        $motivation = motivation_pf::all();
        $programs = Fitness_Program::all();
        $trainers = Personal_Trainer::all();
        $facilities = Facilites::all();
        $schedules = schedule::all();

        $mappedSchedules = $schedules->map(function ($schedule) {
            return [
                'day' => $schedule->day,
                'label' => $schedule->label,
                'time' => $schedule->time,
                'color' => $schedule->color,
                'icon' => $schedule->icon,
            ];
        });
        return view('PF_Gym', compact('title', 'motivation', 'programs', 'trainers', 'facilities', 'mappedSchedules'));
    }
}

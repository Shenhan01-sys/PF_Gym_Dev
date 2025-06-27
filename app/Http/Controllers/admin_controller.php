<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Title;
use \App\Models\motivation_pf;
use \App\Models\Fitness_Program;
use \App\Models\Personal_Trainer;
use \App\Models\Facilites;
use \App\Models\schedule;
use \App\Models\Membership_packages;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class admin_controller extends Controller
{
    public function index_admin()
    {
        Log::info('DB in index_admin', [
            'driver' => DB::connection()->getDriverName(),
            'db'     => DB::connection()->getDatabaseName(),
        ]);
        $title = Title::all();
        $motivation = motivation_pf::all();
        $programs = Fitness_Program::all();
        $trainers = Personal_Trainer::all();
        $facilities = Facilites::all();
        $schedules = schedule::all();
        $packages = Membership_packages::all();


        $mappedSchedules = $schedules->map(function ($schedule) {
            return [
                'day' => $schedule->day,
                'label' => $schedule->label,
                'time' => $schedule->time,
                'color' => $schedule->color,
                'icon' => $schedule->icon,
            ];
        });
        return view('PF_Gym_admin', compact('title', 'motivation', 'programs', 'trainers', 'facilities', 'mappedSchedules', 'packages'));
    }

    public function addTitle(Request $request)
    {
        $title = new Title();
        $title->title_description = $request->input('newTitle');
        $title->save();

        return response()->json([
        'new_title' => $title->title_description
    ]);
    }

    public function editTitle(Request $request, $id_Title)
    {
        $request->validate([
            'newTitle' => 'required|string|max:255',
        ]);

        $title = Title::findOrFail($id_Title);
        $title->title_description = $request->newTitle;
        $title->save();

        return response()->json([
            'updated_title' => $title->title_description
        ]);
    }

    public function deleteTitle(Request $request)
    {
        $request->validate([
            'id_Title' => 'required|integer|exists:title__pf,id_Title',
        ]);

        $title = Title::find($request->id_Title);
        $title->delete();

        return response()->json([
            'message' => 'Title deleted successfully'
        ]);
    }

    public function updateMotivation(Request $request, $id)
    {
        Log::info('DB in updateMotivation', [
            'driver' => DB::connection()->getDriverName(),
            'db'     => DB::connection()->getDatabaseName(),
        ]);
        $request->validate([
            'newAuthor' => 'required|string|max:255',
            'newMotivation' => 'required|string|max:255',
        ]);

        $motivation = motivation_pf::findOrFail($id);
        $motivation->author = $request->newAuthor;
        $motivation->motivation_letter = $request->newMotivation;
        $motivation->save();

        return response()->json([
            'updated_motivation' => 'Motivation letter edited successfully'
        ]);
    }

}

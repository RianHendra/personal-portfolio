<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Skill;
use App\Models\Project;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    public function index()
    {
        $users = User::all();
        $projects = Project::all();
        $skills = Skill::all();
        return view('personal.index', compact('users','skills','projects'));
    }
}

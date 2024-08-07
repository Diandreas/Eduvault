<?php

namespace App\Http\Controllers;

use App\Models\UsersHasLevel;
use Illuminate\Http\Request;

class UsersHasLevelController extends Controller
{
    public function index()
    {
        $usersHasLevels = UsersHasLevel::all();
        return view('users_has_levels.index', compact('usersHasLevels'));
    }

    public function create()
    {
        return view('users_has_levels.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'users_id' => 'required|exists:users,id',
            'grade_id' => 'required|exists:grades,id',
        ]);

        UsersHasLevel::create($request->all());

        return redirect()->route('users_has_levels.index')->with('success', 'UsersHasLevel created successfully.');
    }

    public function show(UsersHasLevel $usersHasLevel)
    {
        return view('users_has_levels.show', compact('usersHasLevel'));
    }

    public function edit(UsersHasLevel $usersHasLevel)
    {
        return view('users_has_levels.edit', compact('usersHasLevel'));
    }

    public function update(Request $request, UsersHasLevel $usersHasLevel)
    {
        $request->validate([
            'users_id' => 'required|exists:users,id',
            'grade_id' => 'required|exists:grades,id',
        ]);

        $usersHasLevel->update($request->all());

        return redirect()->route('users_has_levels.index')->with('success', 'UsersHasLevel updated successfully.');
    }

    public function destroy(UsersHasLevel $usersHasLevel)
    {
        $usersHasLevel->delete();

        return redirect()->route('users_has_levels.index')->with('success', 'UsersHasLevel deleted successfully.');
    }
}

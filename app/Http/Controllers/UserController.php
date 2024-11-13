<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function findUser($id)
    {
        $project = Project::find($id);
        //    dd($project->users()->get());
        return json_encode($project->users()->get());
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('Admin.Employer.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'description' => 'required|string',
            'profile' => 'required|string',
            'started_at' => 'required|date',
            'image' => 'required|file|image',
            'password' => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('users');
            $user = new User($request->all());
            $user->image = $image;
            $user->password = Hash::make($request->password);
            $user->save();
            return back()->with('success', 'Utilisateur crée avec succès');
        }

        return back()->with('error', 'Erreur de saisie');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('Admin.Employer.Profile.index', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

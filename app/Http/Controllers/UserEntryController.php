<?php

namespace App\Http\Controllers;

use App\Models\UserEntry;
use Illuminate\Http\Request;

class UserEntryController extends Controller
{
    public function index()
    {
        $userEntry = UserEntry::latest()->get();
        return view('user_entry.list', compact('userEntry'));
    }
    public function create()
    {
        return view('user_entry.create');
    }

    public function store(Request $request)
    {

        $startTime = microtime(true);
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
        ]);
        $executionTime = microtime(true) - $startTime;
        $userEntry = new UserEntry();
        $userEntry->first_name = $validatedData['first_name'];
        $userEntry->last_name = $validatedData['last_name'];
        $userEntry->execution_time = $executionTime;
        $userEntry->save();
        return redirect()->route('user_entry.list')->with('success', 'Data saved successfully with execution time!');
    }
}

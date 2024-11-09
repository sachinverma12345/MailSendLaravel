<?php

namespace App\Http\Controllers;

use App\Mail\MessageMail;
use App\Models\LoanDetail;
use App\Models\User;
use App\Models\UserEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;

class DashboardController extends Controller
{
    public function index()
    {
        $userEntryCount = UserEntry::count();
        $userCount = User::count();
        return view('dashboard', compact('userEntryCount', 'userCount'));
    }
}

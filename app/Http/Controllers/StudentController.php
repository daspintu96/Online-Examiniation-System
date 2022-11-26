<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    use PasswordValidationRules;

    public function create()
    {
        return view('student.create');
    }

    public function store(Request $request)
    {     
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'roll' => ['required', 'integer', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),          
        ]);

         User::create([
            'name' => $request['name'],
            'roll' => $request['roll'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect()->route('dashboard');
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class APIUserController extends Controller
{
    // List all users
    public function getUsers()
    {
        $users = User::all();
        return response()->json(['users' => $users], 200);
    }
    public function registerUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string',
        ]);

        // Create user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'message' => 'User registered successfully',
            'user' => $user
        ], 201);
    }
    // Create a new user
    public function register(Request $request)
    {
        // គេប្រើ validate ដើម្បីធ្វើការត្រួតពិនិត្យទិន្នន័យដែលបានបញ្ចូល
        // តាមរយៈ validate() នេះ អ្នកអាចកំណត់ច្បាប់នានាដែលត្រូវបានអនុវត្តលើទិន្នន័យដែលបានបញ្ចូល

        // របៀបដំណើរការដោយវាពិនិត្យមើលថាតើទិន្នន័យដែលបានបញ្ចូលគឺត្រឹមត្រូវឬអត់ទៅតាមច្បាប់ដែលបានកំណត់បើត្រូវវានិងទៅធ្វើការបង្កើត User ង
        // ថ្មីក្នុង class User::create() នោះ​ ។
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string',
        ]);
        
        // ប្រើ Hash::make() ដើម្បីបំលែងពាក្យសម្ងាត់ទៅជា hash មុននឹងរក្សាទុក
        // User::create() គឺជាវិធីសាស្រ្តមួយសម្រាប់បង្កើតអ្នកប្រើថ្មី ដោយប្រើទិន្នន័យដែលបានផ្តល់
        // User input data 
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return response()->json(['message' => 'User created successfully.', 'user' => $user], 201);
    }

    // Update a user
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => "required|string|email|unique:users,email,{$id}",
            'password' => 'nullable|string|min:6',
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return response()->json(['message' => 'User updated successfully.', 'user' => $user]);
    }

    // Delete a user
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['message' => 'User deleted successfully.']);
    }

    public function show($id)
    {
        $user = User::all();
        return response()->json(['user' => $user], 200);
    }
}

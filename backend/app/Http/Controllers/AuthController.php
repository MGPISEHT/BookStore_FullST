<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    // call login from view
    public function index()
    {
        // បើសិនជាអ្នកប្រើប្រាស់បានចូលរួចហើយ redirect ទៅកាន់ dashboard ហើយមិនអាចចូលទៅកាន់ login page បានទេ
        if (!empty(Auth::check())) {
            return redirect()->route('dashboard');
        }

        /* 
            convert password to hash value is  bcrypt 
            $pass = "1111";
            return bcrypt($pass);
        */
        
        return view('auth.login');
        // គេប្រើប្រាស់វាដើម្បីបង្ហាញទំព័រចូលប្រើប្រាស់ដែលគេអាចបញ្ចូលអ៊ីមែល និងពាក្យសម្ងាត់របស់ពួកគេ
    }

    

    // =================  login function =============================
    public function login(Request $request)
    {
        // គេត្រូវការបញ្ជាក់ថាអ៊ីមែល និងពាក្យសម្ងាត់ត្រូវបានផ្តល់ជូនដើម្បីធានាថាពួកគេមានទ្រង់ទ្រាយត្រឹមត្រូវ
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ], [
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'password.required' => 'The password field is required.',
        ]);

        // គេប្រើប្រាស់ Auth::attempt ដើម្បីពិនិត្យមើលថាតើអ្នកប្រើប្រាស់មានសិទ្ធិចូលប្រើប្រាស់ឬអត់
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            // ពេលដែលអ្នកប្រើប្រាស់បានចូលរួចហើយ គេនឹងបញ្ជូនពួកគេទៅកាន់ទំព័រដែលមានឈ្មោះ dashboard
            return redirect()->route('dashboard');  // Ensure you are using the correct route name for the dashboard?

        } else {

            // ប្រសិនបើការផ្ទៀងផ្ទាត់មិនជោគជ័យ គេនឹងបញ្ជូនអ្នកប្រើប្រាស់ត្រឡប់ទៅកាន់ទំព័រដែលមានឈ្មោះ login
            return redirect()->back()->with('error', 'Invalid email or password');
        }
    }
    
    // =================  logout function =============================

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    // protected function for login
    public function dashboard()
    {
        return "dashboard";
    }
    public function category()
    {
        return "category";
    }
}

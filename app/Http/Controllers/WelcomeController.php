<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function showWelcome()
    {
        // Pengecekan apakah ada bacaan "NOT FOUND"
        $content = 'NOT FOUND'; // Kamu bisa menggantinya sesuai logika yang diperlukan

        if ($content === 'NOT FOUND') {
            // Mengarahkan ke route '/home'
            return redirect('/home');
        }

        // Menampilkan welcome.blade.php jika tidak ada "NOT FOUND"
        return view('welcome');
    }
}

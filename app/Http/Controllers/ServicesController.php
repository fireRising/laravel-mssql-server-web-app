<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use Illuminate\Support\Facades\DB;

class ServicesController extends Controller
{
    public function index() {
        return view('services.index');
    }

    public function create() {
        DB::query()->get();
        return view('services.create');
    }

    public function post() {
        $this->validate(\request(), [
            'email' => 'required',
            'password' => 'required'
        ]);

        return redirect('/');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function showForm() {
        return view('form.showForm');
    }
    public function postForm(Request $request) {
       // dd($request->post('name', 3333));
        dd($request->input('name', 'IOUBRO)'));
    }
}

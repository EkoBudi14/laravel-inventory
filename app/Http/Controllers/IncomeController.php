<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IncomeController extends Controller
{
    public function allIncome() {

        
        return view('Admin.all_income');
    }
}

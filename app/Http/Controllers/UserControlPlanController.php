<?php

namespace App\Http\Controllers;

use App\Mail\Finance;
use Illuminate\Http\Request;
use App\Models\UserControlPlan;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UserControlPlanRequest;

class UserControlPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UserControlPlan $userControlPlan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserControlPlan $userControlPlan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserControlPlan $userControlPlan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserControlPlan $userControlPlan)
    {
        //
    }

    public function alter(Request $request) 
    {
       $userControlPlan = new UserControlPlan();
       $userControlPlan->name = $request->name; 
       $userControlPlan->email = $request->email; 
       $userControlPlan->cpfCnpj = $request->cpfCnpj; 
       $userControlPlan->plan_actual = $request->plan_actual; 
       $userControlPlan->new_plan = $request->new_plan;
       
       Mail::to('franciscoanto@gmail.com')->send(new Finance($userControlPlan));
    }
}

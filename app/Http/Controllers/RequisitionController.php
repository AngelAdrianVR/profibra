<?php

namespace App\Http\Controllers;

use App\Models\Requisition;
use Illuminate\Http\Request;

class RequisitionController extends Controller
{
    
    public function index()
    {
        return inertia('Requisition/Index');
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show(Requisition $requisition)
    {
        //
    }

    
    public function edit(Requisition $requisition)
    {
        //
    }

    
    public function update(Request $request, Requisition $requisition)
    {
        //
    }

    
    public function destroy(Requisition $requisition)
    {
        //
    }
}

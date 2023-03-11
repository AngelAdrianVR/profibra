<?php

namespace App\Http\Controllers;

use App\Models\InventoryMovement;
use Illuminate\Http\Request;

class InventoryMovementController extends Controller
{
    
    public function index()
    {
        return inertia('Movement/Index');
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show(InventoryMovement $inventoryMovement)
    {
        //
    }

    
    public function edit(InventoryMovement $inventoryMovement)
    {
        //
    }

    
    public function update(Request $request, InventoryMovement $inventoryMovement)
    {
        //
    }

    
    public function destroy(InventoryMovement $inventoryMovement)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Resources\InventoryResource;
use App\Models\Inventory;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;

class InventoryController extends Controller
{
    public function index()
    {
        $inventories = InventoryResource::collection(Inventory::with('product')->paginate(20));

        return inertia('Inventory/Index', compact('inventories'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Inventory $inventory)
    {
        //
    }

    public function edit($inventory_id)
    {
        $inventory = Inventory::with('product')->find($inventory_id);

        return inertia('Inventory/Edit', compact('inventory'));
    }

    public function update(Request $request, Inventory $inventory)
    {
        //
    }

    public function destroy(Request $request)
    {
        Inventory::whereIn('id', $request->selections)->delete();
    }

    public function generateConsumablesReport()
    {
        $data = Inventory::with('product')->all();
        return $data;

        // $pdf = Pdf::loadView('pdf-templates.consumables-report', $data);

        // return $pdf->download('reporte_consumibles.pdf');
    }
}

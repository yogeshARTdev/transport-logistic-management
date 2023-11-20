<?php

namespace App\Http\Controllers;

use App\Exports\WarehouseExport;
use App\Models\State;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class WarehouseController extends Controller
{
    public function index()
    {   
        $order= 'desc';
        $warehouses = Warehouse::orderBy('id', $order)->paginate(2); 
        return view('warehouse.index', compact('warehouses', 'order'));
    }
    public function create()
    {
        $states = State::all();
        return view('warehouse.create', compact('states'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Warehouse::create($data);
        return redirect()->route('warehouse.index')->with('success','Warehouse created successfully!');
    }

    public function show($id)
    {
        $warehouse = Warehouse::find($id);
        return view('warehouse.show', compact('warehouse'));
    }

    public function edit($id)
    {
        $states = State::all();
        $warehouse = Warehouse::find($id);
        return view('warehouse.edit', compact('warehouse', 'states'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        Warehouse::find($id)->update($data);
        return redirect()->route('warehouse.index')->with('success','Warehouse updated successfully!');
    }

    public function destroy($id)
    {
        $warehouse = Warehouse::find($id);
        $warehouse->delete();
        return redirect()->route('warehous.index')->with('success','Warehouse deleted successfully!');
    }

    public function search(Request $request)
    {
        $query = Warehouse::query();
        $order = 'desc';
    
        foreach ($request->search as $key => $value) {

           
            if($key == 'state' && !empty($value)) {
                $query->whereHas('state',function ($query) use ($value) {
                    $query->where('name', 'like', '%' . $value . '%');
                });
            }
            elseif($value !== null) {
                $query->where($key, 'like', '%' . $value . '%');
            }
        }
    
        $warehouses = $query->orderBy('id', $order)->paginate(2);
        $warehouses->appends($request->all());
    
        return view('warehouse.index', compact('warehouses', 'order'));
    }

    public function sort(Request $request)
    {
        $order = $request->input("order","asc");
        $warehouses = Warehouse::orderBy('id', $order)->paginate(2);
        $warehouses->appends(['order' => $order]);
        return view('warehouse.index', compact('warehouses', 'order'));
    }

    public function get_supplier_data()
    {
        return Excel::download(new WarehouseExport, 'warehouse.xlsx');
    }
}

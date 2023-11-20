<?php

namespace App\Http\Controllers;

use App\Exports\VehicletypeExport;
use App\Models\VehicleType;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Validator;

class VehicleTypeController extends Controller
{
    public function index()
    {
        $order= 'desc';
        $VehicleTypes = VehicleType::orderBy('id', $order)->paginate(2); 
        return view('vehicleType.index', compact('VehicleTypes', 'order'));
    }
    public function create()
    {
        return view('vehicleType.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $data = $request->all();
        VehicleType::create($data);
        return redirect()->route('vehicletype.index')->with('success','Vehicle type added successfully!');
    }

    public function destroy($id)
    {
        $vehicleType = VehicleType::find( $id );
        $vehicleType->delete();
        return redirect()->route('vehicletype.index')->with('success','Vehicle type deleted successfully!');
    }


    public function search(Request $request)
    {
        $query = VehicleType::query();
        $order = 'desc';
    
        foreach ($request->search as $key => $value) {

            if($value !== null) {
                $query->where($key, 'like', '%' . $value . '%');
            }
        }
    
        $VehicleTypes = $query->orderBy('id', $order)->paginate(2);
        $VehicleTypes->appends($request->all());
    
        return view('vehicleType.index', compact('VehicleTypes', 'order'));
    }

    public function sort(Request $request)
    {
        $order = $request->input("order","asc");
        $VehicleTypes = VehicleType::orderBy('id', $order)->paginate(2);
        $VehicleTypes->appends(['order' => $order]);
        return view('vehicleType.index', compact('VehicleTypes', 'order'));
    }

    public function get_supplier_data()
    {
        return Excel::download(new VehicletypeExport, 'vehicletype.xlsx');
    }
}

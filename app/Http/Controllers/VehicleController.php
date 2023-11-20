<?php

namespace App\Http\Controllers;

use App\Exports\VehicleExport;
use App\Models\Vehicle;
use App\Models\VehicleType;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Storage;
use Validator;

class VehicleController extends Controller
{
    public function index()
    {
        $order= 'desc';
        $vehicles = Vehicle::orderBy('id', $order)->paginate(2); 
        return view('vehicle.index', compact('vehicles', 'order'));
    }
    public function create()
    {   
        $vehicleTypes = VehicleType::all();
        return view('vehicle.create', compact('vehicleTypes'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'insurence_file' => 'required|mimetypes:application/pdf',
            'registration_certificate' => 'required|mimetypes:application/pdf',
            'fc_certificate' => 'required|mimetypes:application/pdf',
        ]);

        $customMessages = [
            'mimetypes' => 'Choosen file should be of type PDF.',
        ];
        $validator->setCustomMessages($customMessages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $files = [
            'insurence_file' => 'insurence_file',
            'registration_certificate' => 'registration_certificate',
            'fc_certificate' => 'fc_certificate',
        ];
        
        $storagePath = 'public/vehicle';
    
        $originalNames = [];
        
        foreach ($files as $inputName => $fileName) {
            $file = $request->file($inputName);
            $originalNames[$fileName] = $file->getClientOriginalName();
            $path = $file->storeAs($storagePath, $originalNames[$fileName]);
        }
    
        $data = array_merge($request->all(), $originalNames);
        Vehicle::create($data);
        return redirect()->route('vehicle.index')->with('success','Vehicle added successfully!');
    }

    public function show($id)
    {
        $vehicle = Vehicle::find($id);
        return view('vehicle.show', compact('vehicle'));
    }

    public function edit($id)
    {
        $vehicle = Vehicle::find($id);
        $vehicleTypes = VehicleType::all();
        return view('vehicle.edit', compact('vehicle','vehicleTypes'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'insurence_file' => 'required|mimetypes:application/pdf',
            'registration_certificate' => 'required|mimetypes:application/pdf',
            'fc_certificate' => 'required|mimetypes:application/pdf',
        ]);

        $customMessages = [
            'mimetypes' => 'Choosen file should be of type PDF.',
        ];
        $validator->setCustomMessages($customMessages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $files = [
            'insurence_file' => 'insurence_file',
            'registration_certificate' => 'registration_certificate',
            'fc_certificate' => 'fc_certificate',
        ];
        
        $storagePath = 'public/vehicle';
    
        $originalNames = [];
        
        foreach ($files as $inputName => $fileName) {
            $file = $request->file($inputName);
            $originalNames[$fileName] = $file->getClientOriginalName();
            $path = $file->storeAs($storagePath, $originalNames[$fileName]);
        }
    
        $data = array_merge($request->all(), $originalNames);
        Vehicle::find($id)->update($data);
        return redirect()->route('vehicle.index')->with('success','Vehicle updated successfully!');
    }

    public function destroy($id)
    {
        Vehicle::find($id)->delete();
        return redirect()->route('vehicle.index')->with('success','Vehicle deleted successfully!');
    }

    public function search(Request $request)
    {
        $query = Vehicle::query();
        $order = 'desc';
    
        foreach ($request->search as $key => $value) {

            if($key == 'vehicle' && !empty($value)) {
                $query->whereHas('vehicleType',function ($query) use ($value) {
                    $query->where('name', 'like', '%' . $value . '%');
                });
            }
            elseif($value !== null) {
                $query->where($key, 'like', '%' . $value . '%');
            }
        }
    
        $vehicles = $query->orderBy('id', $order)->paginate(2);
        $vehicles->appends($request->all());
    
        return view('vehicle.index', compact('vehicles', 'order'));
    }

    public function sort(Request $request)
    {
        $order = $request->input("order","asc");
        $vehicles = Vehicle::orderBy('id', $order)->paginate(2);
        $vehicles->appends(['order' => $order]);
        return view('vehicle.index', compact('vehicles', 'order'));
    }

    public function get_supplier_data()
    {
        return Excel::download(new VehicleExport, 'vehicle.xlsx');
    }
}
<?php

namespace App\Http\Controllers;
use App\Exports\DriverExport;
use App\Models\State;
use App\Models\Driver;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Storage;
use Validator;

class DriverController extends Controller
{
    public function index()
    {
        $order= 'desc';
        $drivers = Driver::orderBy('id', $order)->paginate(2);
        return view('driver.index', compact('drivers', 'order'));
    }
    public function create()
    {
        $states = State::all();
        return view('driver.create', compact('states'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'license_file' => 'required|mimetypes:application/pdf',
        ]);

        $customMessages = [
            'license_file.mimetypes' => 'Choosen file should be of type PDF.',
        ];
        $validator->setCustomMessages($customMessages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $licenseFileName = $request->file('license_file')->getClientOriginalName();
        $path = $request->file('license_file')->storeAs('public/license', $licenseFileName);
        $url = Storage::url($path);

        $data = $request->all();
        $data['license_file'] = $licenseFileName;
        Driver::create($data);
        return redirect()->route('driver.index')->with('success','Driver added successfully!');
    }

    public function edit($id)
    {
        $driver = Driver::find( $id );
        $states = State::all();
        return view('driver.edit', compact('driver','states'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'license_file' => 'required|mimetypes:application/pdf',
        ]);

        $customMessages = [
            'license_file.mimetypes' => 'Choosen file should be of type PDF.',
        ];
        $validator->setCustomMessages($customMessages);

        $licenseFileName = $request->file('license_file')->getClientOriginalName();
        $path = $request->file('license_file')->storeAs('public/license', $licenseFileName);
        $url = Storage::url($path);

        $data = $request->all();
        $data['license_file'] = $licenseFileName;
        Driver::find($id)->update($data);
        return redirect()->route('driver.index')->with('success','Driver updated successfully!');
    }

    public function show($id)
    {
        $driver = Driver::find( $id );
        return view('driver.show', compact('driver'));
    }

    public function destroy($id)
    {
        $driver = Driver::find( $id );
        $driver->delete();
        return redirect()->route('driver.index')->with('success','Driver deleted successfully!');
    }

    public function search(Request $request)
    {
        $query = Driver::query();
        $order = 'desc';
    
        foreach ($request->search as $key => $value) {
            if ($value !== null) {
                $query->where($key, 'like', '%' . $value . '%');
            }
        }
    
        $drivers = $query->orderBy('id', $order)->paginate(2);
        $drivers->appends($request->all());
    
        return view('driver.index', compact('drivers', 'order'));
    }

    public function sort(Request $request)
    {
        $order = $request->input("order","asc");
        $drivers = Driver::orderBy('id', $order)->paginate(2);
        $drivers->appends(['order' => $order]);
        return view('driver.index', compact('drivers', 'order'));
    }

    public function get_supplier_data()
    {
        return Excel::download(new DriverExport, 'driver.xlsx');
    }
}
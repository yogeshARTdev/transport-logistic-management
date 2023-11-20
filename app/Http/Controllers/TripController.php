<?php

namespace App\Http\Controllers;

use App\Exports\TripExport;
use App\Models\Driver;
use App\Models\Goods;
use App\Models\Trip;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TripController extends Controller
{
    public function index()
    {
        $order= 'desc';
        $trips = Trip::orderBy('id', $order)->paginate(2); 
        return view('trip.index', compact('trips', 'order'));
    }
    public function create()
    {
        $vehicles = Vehicle::all();
        $drivers = Driver::all();
        $goods = Goods::all();
        return view('trip.create', compact('vehicles','drivers','goods'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Trip::create($data);
        return redirect()->route('trip.index')->with('success','Trip created successfully!');
    }

    public function show($id)
    {
        $trip = Trip::find($id);
        return view('trip.show', compact('trip'));
    }

    public function edit($id)
    {
        $vehicles = Vehicle::all();
        $drivers = Driver::all();
        $goods = Goods::all();
        $trip = Trip::find($id);
        return view('trip.edit', compact('trip','vehicles','drivers','goods'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $trip = Trip::find($id)->update($data);
        return redirect()->route('trip.index')->with('success','Trip updated successfully!');
    }

    public function destroy($id)
    {
        Trip::find($id)->delete();
        return redirect()->route('trip.index')->with('success','Trip deleted successfully!');
    }

    public function search(Request $request)
    {
        $query = Trip::query();
        $order = 'desc';
    
        foreach ($request->search as $key => $value) {

            if($key == 'vehicle' && !empty($value)) {
                $query->whereHas('vehicle',function ($query) use ($value) {
                    $query->where('registration_number', 'like', '%' . $value . '%');
                });
            }
            elseif($key == 'driver' && !empty($value)) {
                $query->whereHas('driver',function ($query) use ($value) {
                    $query->where('name', 'like', '%' . $value . '%');
                });
            }
            elseif($key == 'goods' && !empty($value)) {
                $query->whereHas('goods',function ($query) use ($value) {
                    $query->where('name', 'like', '%' . $value . '%');
                });
            }
            elseif($value !== null) {
                $query->where($key, 'like', '%' . $value . '%');
            }
        }
    
        $trips = $query->orderBy('id', $order)->paginate(2);
        $trips->appends($request->all());
    
        return view('trip.index', compact('trips', 'order'));
    }

    public function sort(Request $request)
    {
        $order = $request->input("order","asc");
        $trips = Trip::orderBy('id', $order)->paginate(2);
        $trips->appends(['order' => $order]);
        return view('trip.index', compact('trips', 'order'));
    }

    public function get_supplier_data()
    {
        return Excel::download(new TripExport, 'trip.xlsx');
    }
}

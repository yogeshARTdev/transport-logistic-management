<?php

namespace App\Http\Controllers;

use App\Exports\ClientExport;
use App\Models\Client;
use App\Models\State;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Validator;

class ClientController extends Controller
{
    public function index()
    {   
        $order= 'desc';
        $clients = Client::orderBy('id', $order)->paginate(2);
        return view('client.index', compact('clients', 'order'));
    }
    public function create()
    {
        $states = State::all();   
        return view('client.create', compact('states'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:supplier',
            'gstin' => 'required|min:15|max:15',
            'mobile' => 'required|min:10|max:10',
        ]);

        $customMessages = [
            'email.unique' => 'The email has already been taken by another supplier.',
            'gstin.min' => 'The GSTIN must be exactly 15 characters long.',
            'gstin.max' => 'The GSTIN must be exactly 15 characters long.',
            'mobile.min' => 'The mobile number must be exactly 10 digits long.',
            'mobile.max' => 'The mobile number must be exactly 10 digits long.',
        ];
        $validator->setCustomMessages($customMessages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = $request->all();
        Client::create($data);
        return redirect()->route('client.index')->with('success','Client created successfully!');
    }

    public function edit($id)
    {
        $client = Client::find( $id );
        $states = State::all();
        return view('client.edit', compact('client','states'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'gstin' => 'required|min:15|max:15',
            'mobile' => 'required|min:10|max:10',
        ]);

        $customMessages = [
            'gstin.min' => 'The GSTIN must be exactly 15 characters long.',
            'gstin.max' => 'The GSTIN must be exactly 15 characters long.',
            'mobile.min' => 'The mobile number must be exactly 10 digits long.',
            'mobile.max' => 'The mobile number must be exactly 10 digits long.',
        ];
        $validator->setCustomMessages($customMessages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = $request->all();
        Client::find($id)->update($data);
        return redirect()->route('client.index')->with('success','Client updated successfully!');
    }

    public function show($id)
    {
        $client = Client::find( $id );
        return view('client.show', compact('client'));
    }

    public function destroy($id)
    {
        $client = Client::find( $id );
        $client->delete();
        return redirect()->route('client.index')->with('success','Client deleted successfully!');
    }

    public function search(Request $request)
    {
        $query = Client::query();
        $order = 'desc';
    
        foreach ($request->search as $key => $value) {
            if ($value !== null) {
                $query->where($key, 'like', '%' . $value . '%');
            }
        }
    
        $clients = $query->orderBy('id', $order)->paginate(2);
        $clients->appends($request->all());
    
        return view('client.index', compact('clients', 'order'));
    }

    public function sort(Request $request)
    {
        $order = $request->input("order","asc");
        $clients = Client::orderBy('id', $order)->paginate(2);
        $clients->appends(['order' => $order]);
        return view('client.index', compact('clients', 'order'));
    }

    public function get_supplier_data()
    {
        return Excel::download(new ClientExport, 'client.xlsx');
    }
}

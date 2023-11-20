<?php

namespace App\Http\Controllers;
use App\Exports\SupplierExport;
use App\Models\State;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Validator;

class SupplierController extends Controller
{
    public function index()
    {
        $order= 'desc';
        $suppliers = Supplier::orderBy('id', $order)->paginate(2);
        return view('supplier.index', compact('suppliers', 'order'));
    }
    public function create()
    {
        $states = State::all();   
        return view('supplier.create', compact('states'));
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
        Supplier::create($data);
        return redirect()->route('supplier.index')->with('success','Supplier created successfully!');
    }

    public function edit($id)
    {
        $supplier = Supplier::find( $id );
        $states = State::all();
        return view('supplier.edit', compact('supplier','states'));
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
        Supplier::find($id)->update($data);
        return redirect()->route('supplier.index')->with('success','Supplier updated successfully!');
    }

    public function show($id)
    {
        $supplier = Supplier::find( $id );
        return view('supplier.show', compact('supplier'));
    }

    public function destroy($id)
    {
        $supplier = Supplier::find( $id );
        $supplier->delete();
        return redirect()->route('supplier.index')->with('success','Supplier deleted successfully!');
    }

    public function search(Request $request)
    {
        $query = Supplier::query();
        $order = 'desc';
    
        foreach ($request->search as $key => $value) {
            if ($value !== null) {
                $query->where($key, 'like', '%' . $value . '%');
            }
        }
    
        $suppliers = $query->orderBy('id', $order)->paginate(2);
        $suppliers->appends($request->all());
    
        return view('supplier.index', compact('suppliers', 'order'));
    }

    public function sort(Request $request)
    {
        $order = $request->input("order","asc");
        $suppliers = Supplier::orderBy('id', $order)->paginate(2);
        $suppliers->appends(['order' => $order]);
        return view('supplier.index', compact('suppliers', 'order'));
    }

    public function get_supplier_data()
    {
        return Excel::download(new SupplierExport, 'supplier.xlsx');
    }
}

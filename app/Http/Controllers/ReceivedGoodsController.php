<?php

namespace App\Http\Controllers;

use App\Exports\ReceivedgoodsExport;
use App\Models\Client;
use App\Models\Goods;
use App\Models\ReceivedGoods;
use App\Models\Supplier;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class ReceivedGoodsController extends Controller
{
    public function index()
    {
        $order= 'desc';
        $receivedGoods = ReceivedGoods::orderBy('id', $order)->paginate(5);
        return view('receivedgoods.index', compact('receivedGoods', 'order'));
    }
    public function create()
    {
        $goods = Goods::all();
        $suppliers = Supplier::all();
        $clients = Client::all();
        return view('receivedgoods.create', compact('goods', 'clients','suppliers'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        ReceivedGoods::create($data);
        return redirect()->route('receivedgoods.index')->with('success','Received Goods added successfully!');
    }

    public function edit($id)
    {
        $receivedGood = ReceivedGoods::find($id);
        $goods = Goods::all();
        $suppliers = Supplier::all();
        $clients = Client::all();
        return view('receivedgoods.edit', compact('receivedGood', 'goods', 'suppliers', 'clients'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        ReceivedGoods::find($id)->update($data);
        return redirect()->route('receivedgoods.index')->with('success','Received Good updated successfully!');
    }

    public function show($id)
    {
        $receivedGood = ReceivedGoods::find( $id );
        return view('receivedgoods.show', compact('receivedGood'));
    }

    public function destroy($id)
    {
        $receivedGood = ReceivedGoods::find( $id );
        $receivedGood->delete();
        return redirect()->route('receivedgoods.index')->with('success','Received Good deleted successfully!');
    }

    public function search(Request $request)
    {
        $query = ReceivedGoods::query();
        $order = 'desc';
    
        foreach ($request->search as $key => $value) {

            if($key == 'goods' && !empty($value)) {
                $query->whereHas('good',function ($query) use ($value) {
                    $query->where('name', 'like', '%' . $value . '%');
                });
            }
            elseif($key == 'supplier' && !empty($value)) {
                $query->whereHas('supplier',function ($query) use ($value) {
                    $query->where('name', 'like', '%' . $value . '%');
                });
            }
            elseif($key == 'client' && !empty($value)) {
                $query->whereHas('client',function ($query) use ($value) {
                    $query->where('name', 'like', '%' . $value . '%');
                });
            }
            elseif($value !== null) {
                $query->where($key, 'like', '%' . $value . '%');
            }
        }
    
        $receivedGoods = $query->orderBy('id', $order)->paginate(2);
        $receivedGoods->appends($request->all());
    
        return view('receivedgoods.index', compact('receivedGoods', 'order'));
    }

    public function sort(Request $request)
    {
        $order = $request->input("order","asc");
        $receivedGoods = ReceivedGoods::orderBy('id', $order)->paginate(2);
        $receivedGoods->appends(['order' => $order]);
        return view('receivedgoods.index', compact('receivedGoods', 'order'));
    }
    public function get_supplier_data()
    {
        return Excel::download(new ReceivedgoodsExport, 'receivedgoods.xlsx');
    }
}

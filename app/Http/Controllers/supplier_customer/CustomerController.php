<?php

namespace App\Http\Controllers\supplier_customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        // print
        // if (request('print')) {
        //     $data = Customer::latest()->whereDate('created_at', '>=', request('start_date'))
        //         ->whereDate('created_at', '<=', request('end_date'))->get();

        //     if ($data->count() == 0) {
        //         return redirect('/supplier-customer/customer')->withErrors('Data tanggal ' . request('start_date') . ' sampai ' . request('end_date') . ' tidak ada');
        //     }
        //     // tes
        //     return view('pages.supplier_customer.customer.print_customer', [
        //         'datas' => $data
        //     ]);

        //     // real
        //     $pdf = Pdf::loadView('pages.supplier_customer.customer.print_customer', [
        //         'datas' => $data
        //     ]);
        //     return $pdf->download('custommer.pdf');
        // }

        // // search
        // if (request('start_date')) {
        //     $customer = Customer::latest()->whereDate('created_at', '>=', request('start_date'))
        //         ->whereDate('created_at', '<=', request('end_date'))->get();
        // } else {
        // }
        $customer = Customer::latest()->get();

        return view('pages.supplier_customer.customer.index', [
            'data_customer' => $customer
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer = Customer::all();
        return view('pages.supplier_customer.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'address' => 'required',
        ]);

        Customer::create($data);
        return redirect('/supplier-customer/customer');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Customer::where(['id' => $id])->first();

        return view('pages.supplier_customer.customer.edit', [
            'data' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'address' => 'required',
        ]);

        Customer::where('id', $id)->update($data);
        return redirect('/supplier-customer/customer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customer::where('id', $id)->delete();
        return redirect('/supplier-customer/customer');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;

class InvoiceController extends Controller
{

    function __construct(){
        $this->middleware('permission:ver-invoice|crear-invoice|editar-invoice|borrar-invoice', ['only'=>['index']]);
        $this->middleware('permission:crear-invoice', ['only'=>['create','store']]);
        $this->middleware('permission:editar-invoice', ['only'=>['edit','update']]);
        $this->middleware('permission:borrar-invoice', ['only'=>['destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::paginate(5);
        return view('Invoices.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Invoices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'number'=>'required',
            'imagen'=>'required',
            'date'=>'required',
            'amount'=>'required',
        ]);

        Invoice::create($request->all());
        return view('Invoices.index');
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
    public function edit(Invoice $invoice)
    {
        return view('Invoices.edit', compact('invoice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        request()->validate([
            'number'=>'required',
            'imagen'=>'required',
            'date'=>'required',
            'amount'=>'required',
        ]);

        $invoice->update($request->all());
        return redirect()->route('Invoice.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return redirect()->route('Invoice.index');
    }
}

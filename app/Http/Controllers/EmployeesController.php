<?php

namespace App\Http\Controllers;

use App\Models\Branches;
use App\Models\Customers;
use App\Models\Employees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=new Employees();
        $data->FIO=$request->FIO;
        $data->phone=$request->phone;
        $data->address=$request->address;
        $data->passport=$request->passport;
        $data->branch_id=$request->branch_id;
        $data->save();
        return redirect()->route('ishchilar');
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
        $data = Employees::find($id);
        $branch = Branches::all();
        return view('Employees.edit',['data'=>$data,'branch'=>$branch]);
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
        $data = Employees::find($request->id);
        if(isset($request->update))
        {
            $data->FIO=$request->FIO;
            $data->phone=$request->phone;
            $data->address=$request->address;
            $data->passport=$request->passport;
            $data->branch_id=$request->branch_id;
            $data->save();
        }
        return redirect()->route('ishchilar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employees::destroy($id);
        return redirect()->route('ishchilar');
    }
}

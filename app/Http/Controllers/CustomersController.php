<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\Employees;
use App\Models\Post;
use App\Models\Prices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomersController extends Controller
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
        $cus=DB::select("select * from customers where car_number='$request->car_number'");
        if ($cus!=null and false)
        {
            $data=Customers::all();
            $pr=Prices::all();
            $emp=Employees::all();
            return view('Customers.index',['data'=>$data,'pr'=>$pr,'emp'=>$emp,'mes'=>true]);
        }
        $paysum=0;
        foreach ($request->price as $val)
        {
            $pay=DB::select("select * from prices where id='$val'");
            $paysum+=$pay[0]->price;
        }
        $data=new Customers();
        $data->car_number=$request->car_number;
        $data->employee_id=$request->employee;
        $data->price_id=json_encode($request->price);
        $data->status=0;
        $data->paysum=$paysum;
        $sale=count($request->price);
        if($sale==1)
        {
            $data->sale=0;
        }
        elseif($sale==2)
        {
            $data->sale=5;
        }
        elseif($sale==3)
        {
            $data->sale=10;
        }
        elseif($sale==4)
        {
            $data->sale=15;
        }
        else
        {
            $data->sale = 20;
        }
        $data->payedsum=0;
        $data->save();
        return redirect()->route('index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Customers::find($id);
        return view('Customers.pay',['data'=>$data,'mes'=>""]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Customers::find($id);
        $pr = Prices::all();
        $emp = Employees::all();
        return view('Customers.edit',['data'=>$data,'pr'=>$pr,'emp'=>$emp]);
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
        $data = Customers::find($request->id);
        if(isset($request->paysum))
        {
            $ss=($data->paysum)*(100-$data->sale)/100;
            $t=$ss-$data->payedsum;
            if($t-$request->pay==0)
            {
                $data->status=1;
            }
            $data->payedsum += $request->pay;
            $data->save();
            return redirect()->route('index');
        }
        if(isset($request->update))
        {
            $cus=DB::select("select * from customers where car_number='$request->car_number' and id<>'$id'");
            if ($cus!=null and false)
            {
                $data=Customers::all();
                $pr=Prices::all();
                $emp=Employees::all();
                return view('Customers.index',['data'=>$data,'pr'=>$pr,'emp'=>$emp,'mes'=>true]);
            }
            $paysum=0;
            foreach ($request->price as $val)
            {
                $pay=DB::select("select * from prices where id='$val'");
                $paysum+=$pay[0]->price;
            }
            $data->car_number=$request->car_number;
            $data->employee_id=$request->employee;
            $data->price_id=json_encode($request->price);
            $data->status=0;
            $data->paysum=$paysum;
            $data->save();
            return redirect()->route('index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customers::destroy($id);
        return redirect()->route('index');
    }
}

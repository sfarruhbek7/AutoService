<?php

namespace App\Http\Controllers;

use App\Models\Branches;
use App\Models\Customers;
use App\Models\Employees;
use App\Models\Prices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $data=Customers::all();
        foreach ($data as $val)
        {
            $price_name=null;
            $val->price_id=json_decode($val->price_id);
            foreach($val->price_id as $v)
            {
                $d=DB::select("Select Name from prices where id='$v'");
                if(empty($d))
                {
                    continue;
                }
                else
                {
                    $price_name[]=$d[0];
                }
            }
            $val->price_name=$price_name;
        }
        $pr=Prices::all();
        $emp=Employees::all();
        $edata=(object)$data;
        return view('Customers.index',['data'=>$data,'pr'=>$pr,'emp'=>$emp,'edata'=>$edata]);
    }
    public function ishchilar()
    {
        $data=Employees::all();
        $br=Branches::all();
        return view('Employees.index',['data'=>$data,'branches'=>$br]);
    }
    public function newemployee()
    {
        $data=Branches::all();
        return view('Employees.add',['data'=>$data]);
    }
    public function service()
    {
        $data=Prices::all();
        return view('Prices.index',['data'=>$data]);
    }
}

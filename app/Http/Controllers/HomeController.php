<?php

namespace App\Http\Controllers;

// utk mengimpor kelas, utk digunakan
use App\Models\City;
use App\Models\Province;
use App\Models\Courier;
use Illuminate\Http\Request;

// utk mengekstend kelas dasar laravel yaitu controller
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    
    public function index()
    {
        $province = $this->getProvince();
        $cities = $this->getCities(); // tambahan
        $couriers = $this->getCourier(); 
        return view('home', compact('province', 'cities', 'couriers'));
    }


    public function store(Request $request)  //tambahan
    {
        dd($request->all());
    }   

   
    public function getCities()
    {
        return City::pluck('title', 'code');
    }

    
    public function getCourier()  //tambahan
    {
        return Courier::all();
    } 

    
    public function getProvince()
    {
        return Province::pluck('title', 'code');
    }
}
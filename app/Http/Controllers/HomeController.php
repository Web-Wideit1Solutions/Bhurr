<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\CarDetail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $vendors = Vendor::all();
        return view('home', compact('vendors'));
    }

    public function getVendorDetails(Request $request)
    {
        $vendor_id = $_GET['id'];

        $vendor = Vendor::find($vendor_id);

        $car_details = CarDetail::where('vendor_id', $vendor_id)->get();

        return view('vendor-details', compact('vendor','car_details'));
    }
}

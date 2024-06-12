<?php
namespace App\Http\Controllers;

use App\Models\Vendor;
use App\Models\CarDetail;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function store(Request $request)
{
    $vendor = new Vendor;
    $vendor->contact_no = $request->contact_no;
    $vendor->name = $request->name;
    $vendor->email = $request->email;
    $vendor->company_name = $request->company_name;
    $vendor->no_of_cars = $request->no_of_cars;
    $vendor->owner_drives = $request->owner_drives;
    $vendor->is_interested = $request->is_interested;
    $vendor->save();

    if ($request->has('car_type')) {
        foreach ($request->car_type as $key => $carType) {
            $carDetail = new CarDetail;
            $carDetail->vendor_id = $vendor->id;
            $carDetail->car_type = $request->car_type[$key];
            $carDetail->car_class = $request->car_class[$key];
            $carDetail->car_registration = $request->car_registration[$key];
            $carDetail->save();
        }
    }
    $request->session()->flash('success', 'Vendor and car details saved successfully');

    return redirect()->back();
}

}


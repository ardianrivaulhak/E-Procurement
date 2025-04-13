<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function create()
    {
        return view('vendors.register');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:vendors,email',
            'company' => 'required',
        ]);

        Vendor::create($data);
        return redirect('/')->with('success', 'Vendor registered, awaiting approval.');
    }

    public function index()
    {
        $vendors = Vendor::where('status', 'pending')->get();
        return view('admin.vendors.index', compact('vendors'));
    }

    public function approve(Vendor $vendor)
    {
        $vendor->update(['status' => 'approved']);
        return redirect('/admin/vendors')->with('success', 'Vendor approved.');
    }
}

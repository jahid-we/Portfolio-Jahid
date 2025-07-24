<?php

namespace App\Http\Controllers\Admin;

use App\Helper\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    // Address Create or update Start ************************************
    public function createAddress(Request $request)
    {
        $request->validate([
            'address' => 'required|string|max:255',
            'mobile' => 'required|string|max:20',
            'email' => 'required|string|email|max:255',
        ]);

        if (Auth::check()) {
            $address = Address::first();
            if ($address) {
                $address->update([
                    'address' => $request->address,
                    'mobile' => $request->mobile,
                    'email' => $request->email,
                ]);
            } else {
                Address::create([
                    'address' => $request->address,
                    'mobile' => $request->mobile,
                    'email' => $request->email,
                ]);
            }

            return ResponseHelper::Out(true, 'Address Saved Successfully', 200);
        } else {
            return ResponseHelper::Out(false, 'Unauthorized', 401);
        }
    }
    // Address Create or update End **************************************

    // Address Get Start ***************************************
    public function getAddress(Request $request)
    {
        if (Auth::check()) {
            $address = Address::first();

            if (! $address) {
                return ResponseHelper::Out(false, 'Address Not Found', 404);
            }

            return ResponseHelper::Out(true, $address, 200);
        } else {
            return ResponseHelper::Out(false, 'Unauthorized', 401);

        }
    }
    // Address Get End *******************************************

    // Delete Address Start ***********************************
    public function deleteAddress(Request $request)
    {
        if (Auth::check()) {
            $address = Address::first();

            if (! $address) {
                return ResponseHelper::Out(false, 'Address Not Found', 404);
            }
            $address::truncate();

            return ResponseHelper::Out(true, 'Address Deleted Successfully', 200);

        } else {
            return ResponseHelper::Out(false, 'Unauthorized', 401);

        }
    }
    // Delete Address End *************************************

}

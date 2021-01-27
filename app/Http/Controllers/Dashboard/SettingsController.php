<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function editShippingMethods($type ) {
        $shippedMethod = '';
        switch ($type) {
            case 'free' :
                $shippedMethod = Setting::where('key' , 'free_shipping_label')->first();
            break;
            case 'local' :
                $shippedMethod = Setting::where('key' , 'local_label')->first();
            break;
            case 'outer' :
                $shippedMethod = Setting::where('key' , 'outer_label ')->first();
            break;
        }
        return $shippedMethod;
        return view('dashboard.settings.shippings.edit' , compact('shippedMethod '));

    }
}

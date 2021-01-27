<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\ShippingsRequest;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{
    public function editShippingMethods($type ) {
        $shippingMethod  = '';
        switch ($type) {
            case 'free' :
                $shippingMethod = Setting::where('key' , 'free_shipping_label')->first();
            break;
            case 'local' :
                $shippingMethod = Setting::where('key' , 'local_label')->first();
            break;
            case 'outer' :
                $shippingMethod = Setting::where('key' , 'outer_label ')->first();
            break;
        }
        return view('dashboard.settings.shippings.edit' , compact('shippingMethod'));
    }

    public function updateShippingMethods(ShippingsRequest $request  , $id) {
        $shipping_method = Setting::findOrFail($id);
        try {
            DB::beginTransaction();
            $shipping_method -> update(['plain_value' => $request->input('plain_value')]);
            $shipping_method -> value = $request->input('value');
            $shipping_method->save();
            DB::commit();
            return redirect()->back()->with(['success' => __( 'dashboard/general.successfully_saved')]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' , $e]);
            DB::rollback();
        }
    }
}

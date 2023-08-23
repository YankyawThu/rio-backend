<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Device;

class DeviceController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
        $device = Device::where('device_token', $data['deviceToken'])->first();
        if(!$device) {
            Device::create([
                'device_token' => $data['deviceToken']
            ]);
        }
        return resSuccess();
    }
}

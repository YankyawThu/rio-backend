<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Setting::first();
        return view('admin.setting.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $setting = Setting::findOrFail($id);
        Setting::where('id', $id)->update([
            'android_version_name' => $data['android_version_name'] ?? $setting->android_version_name,
            'ios_version_name' => $data['ios_version_name'] ?? $setting->ios_version_name,
            'android_under_review' => $data['android_under_review'] ?? $setting->android_under_review,
            'ios_under_review' => $data['ios_under_review'] ?? $setting->ios_under_review,
            'android_force_update' => $data['android_force_update'] ?? $setting->android_force_update,
            'ios_force_update' => $data['ios_force_update'] ?? $setting->ios_force_update
        ]);

        return redirect()->route('setting.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

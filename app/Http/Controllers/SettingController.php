<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function edit()
    {
        $settings = Setting::first(); // On récupère la première (et unique) ligne de paramètres
        return view('admin.settings', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'platform_name' => 'nullable|string',
            'primary_color' => 'nullable|string',
            'welcome_message' => 'nullable|string',
            'logo' => 'nullable|image|max:2048',
        ]);

        Setting::updateOrCreate(['key' => 'platform_name'], ['value' => $request->platform_name]);
        Setting::updateOrCreate(['key' => 'primary_color'], ['value' => $request->primary_color]);
        Setting::updateOrCreate(['key' => 'welcome_message'], ['value' => $request->welcome_message]);

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('logos', 'public');
            Setting::updateOrCreate(['key' => 'logo'], ['value' => $path]);
        }

        return back()->with('success', 'Paramètres mis à jour avec succès.');
    }
}
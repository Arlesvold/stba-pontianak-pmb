<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function editMarquee()
    {
        $marquee = Setting::firstOrCreate(
            ['key' => 'marquee_text'],
            ['value' => 'PENGUMUMAN 📢: Pendaftaran PMB STBA Pontianak Tahun Akademik 2025/2026 telah dibuka.']
        );

        return view('admin.marquee.edit', compact('marquee'));
    }

    public function updateMarquee(Request $request)
    {
        $request->validate([
            'value' => 'required|string',
        ]);

        Setting::updateOrCreate(
            ['key' => 'marquee_text'],
            ['value' => $request->value]
        );

        return redirect()->route('admin.marquee.edit')
            ->with('success', 'Teks marquee berhasil diperbarui.');
    }
}

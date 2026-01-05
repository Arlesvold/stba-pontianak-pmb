<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index()
    {
        $agendas = Agenda::orderBy('tanggal_mulai', 'asc')->paginate(10);

        return view('admin.agenda.index', compact('agendas'));
    }




    public function create()
    {
        return view('admin.agenda.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul'          => 'required|string|max:255',
            'tanggal_mulai'  => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'deskripsi'      => 'nullable|string',
        ]);

        Agenda::create($data);

        return redirect()->route('admin.agenda.index')
            ->with('success', 'Agenda berhasil ditambahkan.');
    }

    public function edit(Agenda $agenda)
    {
        return view('admin.agenda.edit', compact('agenda'));
    }

    public function update(Request $request, Agenda $agenda)
    {
        $data = $request->validate([
            'judul'           => 'required|string|max:255',
            'tanggal_mulai'   => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'deskripsi'       => 'nullable|string',
        ]);

        $agenda->update($data);

        return redirect()->route('admin.agenda.index')
            ->with('success', 'Agenda berhasil diperbarui.');
    }

    public function destroy(Agenda $agenda)
    {
        $agenda->delete();

        return redirect()->route('admin.agenda.index')
            ->with('success', 'Agenda berhasil dihapus.');
    }
}

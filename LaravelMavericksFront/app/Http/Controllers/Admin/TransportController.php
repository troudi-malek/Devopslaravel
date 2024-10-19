<?php

// app/Http/Controllers/Admin/TransportController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transport;
use Illuminate\Http\Request;

class TransportController extends Controller
{
    public function index()
    {
        $transports = Transport::all();
        return view('admin.transports.index', compact('transports'));
    }

    public function create()
    {
        return view('admin.transports.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'nom' => 'required',
        ]);

        Transport::create($request->all());

        return redirect()->route('admin.transports.index')->with('success', 'Transport ajouté avec succès.');
    }

    public function edit(Transport $transport)
    {
        return view('admin.transports.edit', compact('transport'));
    }

    public function update(Request $request, Transport $transport)
    {
        $request->validate([
            'type' => 'required',
            'nom' => 'required',
        ]);

        $transport->update($request->all());

        return redirect()->route('admin.transports.index')->with('success', 'Transport mis à jour avec succès.');
    }

    public function destroy(Transport $transport)
    {
        $transport->delete();
        return redirect()->route('admin.transports.index')->with('success', 'Transport supprimé avec succès.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Service::class, 'service');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $services = Service::paginate(10);
        return view('dashboard.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('dashboard.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceRequest $request)
    {
        //
        try {
            $validated = $request->validated();
            $service = Service::create($validated);
            return redirect()->route('dashboard.services.index')->with('success', 'Service Berhasil Dibuat.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal Saat Membuat Service: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
        return view('dashboard.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        //
        try {
            $validated = $request->validated();
            $service->update($validated);
            return redirect()->route('dashboard.services.index')->with('success', 'Service Berhasil Diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal Saat Mengupdate Service: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        //
        try {
            $service->delete();
            return redirect()->route('dashboard.services.index')->with('success', 'Service Berhasil Dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal Saat Menghapus Service: ' . $e->getMessage());
        }
    }
}

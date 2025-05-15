<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreReportRequest;
use App\Http\Requests\UpdateReportRequest;
use App\Models\Transaction;

class ReportController extends Controller
{
    private function calculateReportData(string $reportDate): array
    {
        $totalIncome = Transaction::whereDate('transaction_date', $reportDate)
            ->sum('total_price');
        $totalTransactions = Transaction::whereDate('transaction_date', $reportDate)
            ->count();

        return [
            'total_income' => $totalIncome,
            'total_transactions' => $totalTransactions,
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $reports = Report::where('user_id', Auth::id())->paginate(10);
        return view('dashboard.reports.index', compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('dashboard.reports.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReportRequest $request)
    {
        // Validasi input
        $validated = $request->validated();

        // Hitung total income dan total transactions
        $reportDate = $validated['report_date'];
        $reportData = $this->calculateReportData($reportDate);

        // Buat laporan
        Report::create([
            'report_date' => $reportDate,
            'total_income' => $reportData['total_income'],
            'total_transactions' => $reportData['total_transactions'],
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('dashboard.reports.index')
            ->with('success', 'Laporan berhasil dibuat.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $report)
    {
        //
        return view('dashboard.reports.edit', compact('report'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReportRequest $request, Report $report)
    {
        // Validasi input
        $validated = $request->validated();

        // Hitung ulang total income dan total transactions
        $reportDate = $validated['report_date'];
        $reportData = $this->calculateReportData($reportDate);

        // Perbarui laporan
        $report->update([
            'report_date' => $reportDate,
            'total_income' => $reportData['total_income'],
            'total_transactions' => $reportData['total_transactions'],
        ]);

        return redirect()->route('dashboard.reports.index')
            ->with('success', 'Laporan berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        //
        $report->delete();
        return redirect()->route('dashboard.reports.index')
            ->with('success', 'Report deleted successfully.');
    }
}

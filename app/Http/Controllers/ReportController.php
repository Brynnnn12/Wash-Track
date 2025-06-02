<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Support\Str;
use Spatie\LaravelPdf\Facades\Pdf;

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
        $query = Report::where('user_id', Auth::id());

        // Get filter parameters
        $month = request('month');
        $thisWeek = request('this_week');

        // Apply month filter
        if ($month) {
            $query->whereMonth('report_date', $month);
            $query->whereYear('report_date', now()->year);
        }

        // Apply this week filter
        if ($thisWeek) {
            $startOfWeek = now()->startOfWeek();
            $endOfWeek = now()->endOfWeek();
            $query->whereBetween('report_date', [$startOfWeek, $endOfWeek]);
        }

        $reports = $query->paginate(10);

        // Pass filters to view for maintaining state
        return view('dashboard.reports.index', compact('reports', 'month', 'thisWeek'));
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
    /**
     * Export the report to PDF.
     */
    public function exportPdf()
    {
        // Format tanggal untuk nama file
        $date = now()->format('Y-m-d');
        // Buat nama file yang aman (tanpa spasi dan karakter khusus)
        $fileName = 'Report-' . Str::slug('Laporan Harian', '-') . '-' . $date . '.pdf';
        // Ambil data laporan dari database

        $reports = Report::where('user_id', Auth::id())->get();

        return Pdf::view('dashboard.reports.pdf', compact('reports'))
            ->download($fileName);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use App\Models\KeteranganVisit;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\KeteranganVisitImport; // Pastikan menggunakan import ini
use Illuminate\Support\Facades\DB;
use App\Exports\VisitsExport;

class VisitController extends Controller
{
    // Menampilkan daftar kunjungan
    public function index()
    {
        $visits = Visit::all(); // Ambil semua data kunjungan
        return view('index_visit', compact('visits'));
    }

    // Menampilkan form untuk membuat kunjungan baru
    public function create()
    {
        $keteranganVisits = KeteranganVisit::all(); // Ambil semua data keterangan
        return view('crud.create_visit', compact('keteranganVisits'));
    }

    // Menyimpan data kunjungan baru
    public function store(Request $request)
    {
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'tanggal_visit' => 'required|date_format:Y-m-d',
            'keterangan_visit' => 'required|string',
            'pic_visit' => 'required|string',
            'petugas_visit' => 'nullable|string',
            'nomor_telepon' => 'nullable|string',
            'alamat' => 'nullable|string',
            'visit_status' => 'required|string',
        ]);

        // Jika petugas_visit tidak diisi, set default ke 'Unknown'
        $validatedData['petugas_visit'] = empty($validatedData['petugas_visit']) ? 'Unknown' : $validatedData['petugas_visit'];

        // Simpan data kunjungan ke database
        Visit::create($validatedData);

        // Redirect ke halaman daftar kunjungan dengan pesan sukses
        return redirect()->route('visit.index')->with('success', 'Visit created successfully.');
    }

    // Memperbarui data kunjungan yang ada
    public function update(Request $request, $id)
    {
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'tanggal_visit' => 'required|date_format:Y-m-d',
            'keterangan_visit' => 'required|string',
            'pic_visit' => 'required|string',
            'petugas_visit' => 'nullable|string',
            'nomor_telepon' => 'nullable|string',
            'alamat' => 'nullable|string',
            'visit_status' => 'required|string',
        ]);

        // Temukan kunjungan berdasarkan ID
        $visit = Visit::findOrFail($id);
        $validatedData['petugas_visit'] = empty($validatedData['petugas_visit']) ? 'Unknown' : $validatedData['petugas_visit'];

        // Update data kunjungan
        $visit->update($validatedData);

        // Redirect ke halaman daftar kunjungan dengan pesan sukses
        return redirect()->route('visit.index')->with('success', 'Visit updated successfully.');
    }

    // Menampilkan form untuk mengedit data kunjungan
    public function edit($id)
    {
        // Temukan kunjungan berdasarkan ID
        $visit = Visit::findOrFail($id);
        $keteranganVisits = KeteranganVisit::all(); // Ambil semua data keterangan visits

        return view('crud.edit_visit', compact('visit', 'keteranganVisits'));
    }

    // Menghapus data kunjungan
    public function destroy($id)
    {
        // Temukan kunjungan berdasarkan ID
        $visit = Visit::findOrFail($id);
        $visit->delete(); // Hapus data kunjungan

        // Redirect ke halaman daftar kunjungan dengan pesan sukses
        return redirect()->route('visit.index')->with('success', 'Visit deleted successfully.');
    }

    // Metode untuk mengimport keterangan
    public function importKeterangan(Request $request)
    {
        // Validasi file
        $request->validate([
            'file_excel' => 'required|mimes:xlsx,xls',
        ]);

        // Import data
        Excel::import(new KeteranganVisitImport, $request->file('file_excel'));

        return redirect()->back()->with('success', 'Data berhasil diimpor.');
    }

    // Mereset data kunjungan
    public function reset()
    {
        // Menghapus semua data dari tabel visits
        Visit::truncate();

        // Kembali dengan pesan sukses
        return redirect()->route('visit.index')->with('success', 'All visits have been reset successfully.');
    }

    // Mengekspor data visits ke dalam file Excel
    public function export()
    {
        return Excel::download(new VisitsExport, 'visits.xlsx');
    }

    // Mereset dropdown dengan menghapus semua data dari tabel keterangan_visits
    public function resetDropdown()
    {
        DB::table('keterangan_visits')->truncate(); // Kosongkan tabel keterangan_visits

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Dropdown telah direset.');
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\Posko;
use Illuminate\Http\Request;
use App\Models\PoskoKebutuhan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;



class DashboardController extends Controller
{
    public function showDashboard()
    {
        return view('admin.dashboard');
    }

    public function showDataPosko(Request $request)
{
    $search = $request->search;

    $poskos = Posko::with(['kebutuhans', 'picUser'])
        ->when($search, function ($query) use ($search) {
            $query->where('nama_posko', 'like', "%{$search}%")
                  ->orWhere('kelurahan', 'like', "%{$search}%")
                  ->orWhere('kondisi_bencana', 'like', "%{$search}%")
                  ->orWhere('alamat', 'like', "%{$search}%");
        })
        ->get();

    return view('admin.posko', compact('poskos'));
}

    public function store(Request $request)
    {
        // Upload gambar jika ada
        $imagePath = null;
        if ($request->hasFile('image_url')) {
            $imageName = time().'_'.$request->image_url->getClientOriginalName();
            $request->image_url->move(public_path('uploads/posko'), $imageName);
            $imagePath = 'uploads/posko/'.$imageName;
        }

        // Buat posko
        $posko = Posko::create([
            'nama_posko' => $request->nama_posko,
            'kelurahan' => $request->kelurahan,
            'alamat' => $request->alamat,
            'kondisi_bencana' => $request->kondisi_bencana,
            'status' => $request->status,
            'jam_operasional' => $request->jam_operasional,
            'pic' => $request->pic,
            'pic_lokasi' => $request->pic_lokasi,
            'phone' => $request->phone,
            'image_url' => $imagePath,
        ]);

        // Simpan kebutuhan jika ada
        if ($request->has('kebutuhan')) {
            foreach ($request->kebutuhan as $k) {
                $posko->kebutuhans()->create($k);
            }
        }

        return redirect()->back()->with('success', 'Posko berhasil ditambahkan!');
    }


    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $posko = Posko::findOrFail($id);

            // Update data posko
            $posko->update([
                'nama_posko'      => $request->nama_posko,
                'kelurahan'       => $request->kelurahan,
                'alamat'          => $request->alamat,
                'kondisi_bencana' => $request->kondisi_bencana,
                'status'          => $request->status,
                'jam_operasional' => $request->jam_operasional,
                'pic'             => $request->pic,
                'phone'           => $request->phone,
            ]);

            // Upload gambar baru jika ada
            if ($request->hasFile('image_url')) {
                if ($posko->image_url && Storage::exists($posko->image_url)) {
                    Storage::delete($posko->image_url);
                }
                $path = $request->file('image_url')->store('uploads/posko');
                $posko->image_url = $path;
                $posko->save();
            }

            // Update kebutuhan
            if ($request->has('kebutuhan')) {
                // Hapus kebutuhan lama
                $posko->kebutuhans()->delete();

                foreach ($request->kebutuhan as $k) {
                    if (empty($k['nama_kebutuhan'])) continue;

                    $posko->kebutuhans()->create([
                        'nama_kebutuhan' => $k['nama_kebutuhan'],
                        'jumlah'         => $k['jumlah'] ?? 0,
                        'satuan'         => $k['satuan'] ?? '-',
                        'prioritas'      => $k['prioritas'] ?? '-',
                        'keterangan'     => $k['keterangan'] ?? '-',
                    ]);
                }
            }

            DB::commit();
            return redirect()->back()->with('success', 'Posko berhasil diupdate!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}

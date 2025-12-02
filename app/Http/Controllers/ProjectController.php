<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
class ProjectController extends Controller
{
    // Daftar proyek user
    public function index()
    {
        $user = auth()->user();

        // LIST PROJEK SAYA (berdasarkan pivot)     
        $projects = $user->projects()
            ->with('leader','tasks')
            ->paginate(5);

        return view('projects.index', compact('projects'));
    }


    // Form tambah proyek
    public function create()
    {
        return view('projects.create');
    }

    // Simpan proyek baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'deadline' => 'nullable|date'
        ]);

        $project = Project::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'deadline' => $request->deadline,
            'leader_id' => auth()->id()
        ]);

        // Leader otomatis ditambahkan ke pivot
        $project->users()->attach(auth()->id(), ['role' => 'leader']);

        return redirect()->route('projects.index')->with('success', 'Proyek berhasil dibuat!');
    }

    // Tampilkan detail proyek
    // Form edit proyek (leader only)
    public function edit(Project $project)
    {
        $user = auth()->user();

        // Admin boleh edit apa saja
        if ($user->role !== 'admin' && $user->pivotRole($project->id) !== 'leader') {
            abort(403, 'Access denied');
        }

        // Tentukan role user pada proyek
        $role = $user->role === 'admin'
            ? 'admin'
            : ($user->pivotRole($project->id) ?? 'member');

        return view('projects.edit', compact('project', 'role'));
    }



    // Update proyek (leader only)
    public function update(Request $request, Project $project)
    {
        $user = auth()->user();

        if ($user->role !== 'admin' && $user->pivotRole($project->id) !== 'leader') {
            abort(403, 'Access denied');
        }

        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'deadline' => 'nullable|date',
        ]);

        $project->update($request->only('nama', 'deskripsi', 'deadline'));

        return redirect()->back()->with('success', 'Proyek berhasil diperbarui!');
    }



    public function destroy(Project $project)
    {
        $user = auth()->user();

        if ($user->role !== 'admin' && $user->pivotRole($project->id) !== 'leader') {
            abort(403, 'Access denied');
        }

        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Proyek berhasil dihapus!');
    }


    public function exportPdf(Project $project)
    {
        $user = auth()->user();

        if (!$user->isAdmin() && $user->pivotRole($project->id) !== 'leader') {
            abort(403, "Anda tidak punya izin mencetak laporan.");
        }

        $tasks = $project->tasks()->with('assignedUser')->get();
        $members = $project->users;

        // Waktu cetak
        $tanggalCetak = Carbon::now()->format('d M Y H:i:s');

        // Hitung progress berdasarkan approved
        $totalTasks = $project->tasks->count();
        $approvedTasks = $project->tasks->where('status', 'approved')->count();
        $progress = $totalTasks > 0 ? round(($approvedTasks / $totalTasks) * 100) : 0;

        return Pdf::loadView(
            'projects.pdf',
            compact('project', 'tasks', 'members', 'tanggalCetak', 'progress')
        )->setPaper('a4', 'portrait')
        ->download('Laporan_Proyek_'.$project->nama.'.pdf');
    }



    // Tambah anggota (leader only)
    public function addMember(Request $request, Project $project)
    {
        
        if (auth()->user()->pivotRole($project->id) !== 'leader') {
            abort(403, 'Access denied');
        }

        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $project->users()->attach($request->user_id, ['role' => 'member']);
            \App\Helpers\Notify::send(
                $request->user_id,
                "Ditambahkan ke Proyek",
                "Anda ditambahkan ke proyek '{$project->nama}'",
                route('projects.show', $project->id)
            );

        return redirect()->route('projects.edit', $project)
        ->with('success', 'Anggota berhasil ditambahkan!');
        

    }


    public function show(Project $project)
    {
        $user = auth()->user();

        // Admin boleh buka semua proyek tanpa harus jadi anggota
        if ($user->role !== 'admin' && $user->pivotRole($project->id) === null) {
            abort(403, "Anda bukan anggota proyek ini.");
        }

        $project->load('users', 'tasks.assignedUser', 'leader');

        $totalTasks = $project->tasks->count();
        $approvedTasks = $project->tasks->where('status', 'approved')->count();
        $progress = $totalTasks > 0 ? round(($approvedTasks / $totalTasks) * 100) : 0;

        // Tentukan role user di proyek (kecuali admin)
        $role = $user->role === 'admin'
            ? 'admin'
            : ($user->pivotRole($project->id) ?? 'member');

        return view('projects.show', compact('project', 'progress', 'role'));
    }


    

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use PDF;
use App\Models\Task;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // =============================
        // ADMIN MELIHAT SEMUA DATA
        // =============================
        if ($user->role === 'admin') {
            $projects = Project::with('leader','tasks')->paginate(5);

            $projectCount = $projects->count();

            $taskCount = Task::count(); // total semua tugas
            $myTasks = Task::where('assigned_to', $user->id)->count(); // tugas saya tetap dihitung

            $userCount = User::count(); // semua user
        } 
        
        // =============================
        // MEMBER / LEADER MELIHAT PROYEK MILIKNYA
        // =============================
        else {
            $projects = $user->projects()
            ->with('leader','tasks')
            ->paginate(5);

            $projectCount = $projects->count();

            $taskCount = $projects->sum(fn($p) => $p->tasks->count());
            $myTasks = Task::where('assigned_to', $user->id)->count();

            // Total anggota seluruh proyek yg saya ikuti
            $userCount = $projects->flatMap(fn($p) => $p->users)->unique('id')->count();
        }

        // =============================
        // HITUNG PROGRESS SETIAP PROYEK
        // =============================
        foreach ($projects as $project) {
            $total = $project->tasks->count();
            $done  = $project->tasks->where('status', 'approved')->count(); // progress berdasarkan ACC leader

            $project->progress = $total > 0 ? round(($done / $total) * 100) : 0;
        }

        return view('dashboard', compact(
            'projects',
            'projectCount',
            'taskCount',
            'myTasks',
            'userCount'
        ));
    }

    public function exportPDF(Project $project)
    {
        $project->load('tasks', 'users');

        $pdf = PDF::loadView('projects.report', compact('project'));
        return $pdf->download('Laporan_Proyek_'.$project->nama.'.pdf');
    }
    public function search(Request $request)
    {
        $q = $request->input('q');

        // Cari pada tabel proyek
        $projects = \App\Models\Project::where('nama', 'like', "%$q%")->get();

        // Cari pada tabel tugas
        $tasks = \App\Models\Task::where('nama', 'like', "%$q%")->get();

        // Tampilkan hasil
        return view('search.results', compact('q', 'projects', 'tasks'));
}
    

    
}

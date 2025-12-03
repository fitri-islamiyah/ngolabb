<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use App\Helpers\Notify; 


class TaskController extends Controller
{
    // Daftar tugas proyek
    public function index(Project $project)
    {
        $user = auth()->user();

        if ($user->role !== 'admin' && $user->pivotRole($project->id) === null) {
            abort(403, "Anda bukan anggota proyek ini.");
        }

        $tasks = $project->tasks()->with('assignedUser')->paginate(10);

        $role = $user->role === 'admin'
            ? 'admin'
            : ($user->pivotRole($project->id) ?? 'member');

        return view('tasks.index', compact('project', 'tasks', 'role'));
    }


    // Form tambah tugas (leader)
    public function create(Project $project)
    {
        if (auth()->user()->pivotRole($project->id) !== 'leader') {
            abort(403, 'Access denied');
        }

        $members = $project->users;
        return view('tasks.create', compact('project', 'members'));
    }

public function store(Request $request, Project $project)
{
    if (auth()->user()->pivotRole($project->id) !== 'leader') {
        abort(403, 'Access denied');
    }

    $request->validate([
        'nama'        => 'required|string|max:255',
        'deskripsi'   => 'nullable|string',
        'assigned_to' => 'required|exists:users,id',
        'file'        => 'nullable|file|max:20480',
    ]);

    $fileUrl = null;

    // UPLOADCARE
    if ($request->hasFile('file')) {
        $response = Http::asMultipart()->post(
            'https://upload.uploadcare.com/base/',
            [
                [
                    'name'     => 'UPLOADCARE_PUB_KEY',
                    'contents' => env('UPLOADCARE_PUBLIC_KEY'),
                ],
                [
                    'name'     => 'UPLOADCARE_STORE',
                    'contents' => '1',
                ],
                [
                    'name'     => 'file',
                    'contents' => fopen($request->file('file')->getPathname(), 'r'),
                    'filename' => $request->file('file')->getClientOriginalName(),
                ],
            ]
        );

        if ($response->successful()) {
            $uuid = $response->json()['file'];
            $fileUrl = "https://ucarecdn.com/$uuid/";
        } else {
            return back()->with('error', 'Upload file ke Uploadcare gagal.');
        }
    }

    $task = Task::create([
        'project_id'  => $project->id,
        'nama'        => $request->nama,
        'deskripsi'   => $request->deskripsi,
        'assigned_to' => $request->assigned_to,
        'file'        => $fileUrl,
    ]);

    Notify::send(
        $request->assigned_to,
        "Tugas Baru",
        "Anda mendapat tugas baru: '{$task->nama}' pada proyek {$project->nama}",
        url("/tasks/{$task->id}/edit")
    );

    return redirect()->back()->with('success', 'Tugas berhasil dibuat.');
}




    public function edit(Task $task)
    {
        $project = $task->project;
        $user = auth()->user();

        // CASE 1: admin → tidak peduli leader atau bukan → admin only
        if ($user->role === 'admin') {
            $role = 'admin';
        }
        // CASE 2: leader proyek
        else if ($project->leader_id === $user->id) {
            $role = 'leader';
        }
        // CASE 3: selain itu pasti member
        else {
            $role = 'member';
        }

        return view('tasks.edit', compact('task', 'role'));
    }





    // Update status atau file tugas
        public function update(Request $request, Task $task)
        {
            $user = auth()->user();
                // 🔥 ADMIN TIDAK BOLEH UPDATE
            if ($user->role === 'admin') {
                return abort(403, 'Admin tidak boleh mengubah tugas.');
            }

            // Member hanya boleh update tugas milik dia sendiri
            if ($task->assigned_to !== $user->id) {
                return abort(403, 'Anda tidak punya izin untuk memperbarui tugas ini.');
            }

            if ($task->status === 'approved') {
                return abort(403, 'Tugas sudah disetujui. Anda tidak bisa mengubahnya lagi.');
            }

        $request->validate([
            'status' => 'required|in:pending,in_progress,done,approved',
            'file' => 'nullable|file|max:5120'
        ]);

        $data = ['status' => $request->status];

        if ($request->hasFile('file')) {

            if ($task->file) {
                Storage::delete($task->file);
            }

            $data['file'] = $request->file('file')->store('tasks','public');
        }

        $task->update($data);

        if ($task->status === 'done') {
            \App\Helpers\Notify::send(
                $task->project->leader_id,
                "Tugas Selesai",
                "Tugas '{$task->nama}' diselesaikan oleh {$task->assignedUser->name}",
                url("/tasks/{$task->id}/edit")

            );


            
        }
        return back()->with('success', 'Tugas berhasil diperbarui!');
    }


    // Halaman tugas saya
    public function myTasks()
    {
        $tasks = Task::where('assigned_to', auth()->id())
                ->with('project')
                ->orderBy('created_at', 'desc')
                ->paginate(10);

        return view('tasks.my-tasks', compact('tasks'));
    }


    // ACC Tugas
    public function approve(Request $request, Task $task)
    {
        $project = $task->project;
        $user = auth()->user();

        // Leader biasa atau admin yang menjadi leader
        if (!($project->leader_id == $user->id)) {
            abort(403, "Hanya leader project yang boleh ACC.");
        }
        $request->validate([
            'approved_comment' => 'nullable|string|max:1000',
        ]);

        $task->update([
            'status' => 'approved',
            'approved_comment' => $request->approved_comment,
        ]);

        Notify::send(
            $task->assigned_to,
            "Tugas Di-ACC",
            "Tugas '{$task->nama}' telah disetujui oleh Leader.",
            url("/tasks/{$task->id}/edit")
        );

        return back()->with('success', 'Tugas berhasil di-ACC!');
    }


    // Hapus tugas
    public function destroy(Task $task)
    {
        $user = auth()->user();

        if ($user->role === 'admin') {
            $task->delete();
            return back()->with('success', 'Tugas berhasil dihapus oleh admin.');
        }

        if ($task->project->leader_id === $user->id) {
            $task->delete();
            return back()->with('success', 'Tugas berhasil dihapus oleh leader.');
        }

        abort(403, 'Anda tidak memiliki izin untuk menghapus tugas ini.');
    }
}

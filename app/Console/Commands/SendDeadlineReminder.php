<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Task;
use App\Models\User;
use App\Helpers\Notify;
use Carbon\Carbon;

class SendDeadlineReminder extends Command
{
    protected $signature = 'reminder:deadline';
    protected $description = 'Kirim notifikasi H-1 deadline tugas';

    public function handle()
    {
        $tomorrow = Carbon::tomorrow()->format('Y-m-d');

        $tasks = Task::where('deadline', $tomorrow)->get();

        foreach ($tasks as $task) {

            // Notifikasi ke member yang menerima tugas
            Notify::send(
                $task->assigned_to,
                "Deadline Tugas Besok",
                "Tugas '{$task->nama}' akan jatuh tempo besok."
            );

            // Notifikasi ke leader (opsional)
            if ($task->project && $task->project->leader_id) {
                Notify::send(
                    $task->project->leader_id,
                    "Deadline Tugas Anggota Besok",
                    "Tugas '{$task->nama}' milik {$task->assignedUser->name} akan jatuh tempo besok."
                );
            }
        }

        return Command::SUCCESS;
    }
}

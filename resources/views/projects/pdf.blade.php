<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        h2 { text-align: center; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        table, th, td { border: 1px solid #444; padding: 6px; }
        th { background: #eee; }
    </style>
</head>
<body>

<h2>Laporan Proyek: {{ $project->nama }}</h2>

<p><strong>Leader:</strong> {{ $project->leader->name }}</p>
<p><strong>Deskripsi:</strong> {{ $project->deskripsi }}</p>
<p><strong>Progress:</strong> {{ $progress }}%</p>
<p><strong>Tanggal Cetak:</strong> {{ $tanggalCetak }}</p>
<hr>

<h3>Daftar Anggota</h3>
<table>
    <tr>
        <th>Nama</th>
        <th>Role</th>
    </tr>

    @foreach($members as $member)
    <tr>
        <td>{{ $member->name }}</td>
        <td>{{ $member->pivot->role }}</td>
    </tr>
    @endforeach
</table>

<hr>

<h3>Daftar Tugas</h3>
<table>
    <tr>
        <th>Nama Tugas</th>
        <th>Deskripsi</th>
        <th>PIC</th>
        <th>Status</th>
    </tr>

    @foreach($tasks as $task)
    <tr>
        <td>{{ $task->nama }}</td>
        <td>{{ $task->deskripsi }}</td>
        <td>{{ $task->assignedUser->name ?? '-' }}</td>
        <td>{{ $task->status }}</td>
    </tr>
    @endforeach
</table>

</body>
</html>

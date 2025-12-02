<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Proyek - {{ $project->nama }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body { 
            font-family: 'Arial', 'Helvetica', sans-serif;
            color: #0E2148;
            line-height: 1.6;
            padding: 40px;
            background: #ffffff;
        }
        
        /* Header Section */
        .header {
            background: linear-gradient(135deg, #483AA0 0%, #7965C1 100%);
            color: white;
            padding: 30px;
            border-radius: 15px;
            margin-bottom: 30px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        
        .header h1 {
            font-size: 28px;
            margin-bottom: 10px;
            font-weight: bold;
        }
        
        .header-subtitle {
            font-size: 14px;
            opacity: 0.9;
            margin-bottom: 20px;
        }
        
        /* Info Grid */
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .info-card {
            background: #f8f9fa;
            border-left: 4px solid #7965C1;
            padding: 15px;
            border-radius: 8px;
        }
        
        .info-label {
            font-size: 11px;
            text-transform: uppercase;
            color: #7965C1;
            font-weight: bold;
            letter-spacing: 0.5px;
            margin-bottom: 5px;
        }
        
        .info-value {
            font-size: 16px;
            font-weight: bold;
            color: #0E2148;
        }
        
        /* Section Headers */
        .section {
            margin-bottom: 30px;
        }
        
        .section-header {
            background: linear-gradient(135deg, #483AA0 0%, #7965C1 100%);
            color: white;
            padding: 12px 20px;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }
        
        .section-icon {
            width: 20px;
            height: 20px;
            margin-right: 10px;
        }
        
        /* Table Styles */
        table { 
            width: 100%; 
            border-collapse: separate;
            border-spacing: 0;
            margin-top: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        
        thead {
            background: linear-gradient(135deg, #483AA0 0%, #7965C1 100%);
            color: white;
        }
        
        th {
            padding: 12px;
            text-align: left;
            font-weight: bold;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        td { 
            border: 1px solid #e0e0e0;
            padding: 12px;
            font-size: 13px;
            background: white;
        }
        
        tbody tr:nth-child(even) {
            background: #f8f9fa;
        }
        
        tbody tr:hover {
            background: #f0f0f5;
        }
        
        /* Status Badge */
        .status-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: bold;
            text-transform: capitalize;
        }
        
        .status-pending {
            background: #e0e0e0;
            color: #555;
        }
        
        .status-in_progress {
            background: #fff3cd;
            color: #856404;
        }
        
        .status-completed {
            background: #d4edda;
            color: #155724;
        }
        
        /* Members List */
        .members-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-top: 15px;
        }
        
        .member-card {
            background: #f8f9fa;
            border: 1px solid #e0e0e0;
            padding: 12px 15px;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .member-name {
            font-weight: 600;
            color: #0E2148;
            font-size: 13px;
        }
        
        .member-role {
            padding: 3px 10px;
            border-radius: 10px;
            font-size: 10px;
            font-weight: bold;
            text-transform: uppercase;
        }
        
        .role-leader {
            background: linear-gradient(135deg, #E3D095 0%, #7965C1 100%);
            color: #0E2148;
        }
        
        .role-member {
            background: #e0e0e0;
            color: #555;
        }
        
        /* Progress Bar */
        .progress-section {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
            border: 1px solid #e0e0e0;
        }
        
        .progress-label {
            font-size: 14px;
            font-weight: bold;
            color: #0E2148;
            margin-bottom: 10px;
        }
        
        .progress-bar-container {
            background: #e0e0e0;
            height: 25px;
            border-radius: 12px;
            overflow: hidden;
            position: relative;
        }
        
        .progress-bar {
            background: linear-gradient(90deg, #483AA0 0%, #7965C1 50%, #E3D095 100%);
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 12px;
            transition: width 0.3s ease;
        }
        
        /* Footer */
        .footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 2px solid #e0e0e0;
            text-align: center;
            color: #7965C1;
            font-size: 12px;
        }
        
        .footer-date {
            font-weight: bold;
            color: #0E2148;
        }
        
        /* Statistics */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin-bottom: 30px;
        }
        
        .stat-card {
            background: white;
            border: 2px solid #7965C1;
            padding: 15px;
            border-radius: 10px;
            text-align: center;
        }
        
        .stat-value {
            font-size: 28px;
            font-weight: bold;
            color: #7965C1;
            margin-bottom: 5px;
        }
        
        .stat-label {
            font-size: 11px;
            color: #666;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        /* Description */
        .description-box {
            background: #f8f9fa;
            border-left: 4px solid #7965C1;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 30px;
            font-size: 13px;
            color: #555;
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <h1>📊 LAPORAN PROYEK</h1>
        <div class="header-subtitle">{{ $project->nama }}</div>
        <div style="font-size: 12px; opacity: 0.8;">
            Dokumen ini berisi ringkasan lengkap proyek, termasuk tugas, anggota tim, dan progress terkini
        </div>
    </div>

    <!-- Project Info Grid -->
    <div class="info-grid">
        <div class="info-card">
            <div class="info-label">👤 Project Leader</div>
            <div class="info-value">{{ $project->leader->name }}</div>
        </div>
        <div class="info-card">
            <div class="info-label">📅 Deadline</div>
            <div class="info-value">
                @if($project->deadline)
                    {{ \Carbon\Carbon::parse($project->deadline)->format('d F Y') }}
                @else
                    Belum ditentukan
                @endif
            </div>
        </div>
    </div>

    <!-- Description -->
    @if($project->deskripsi)
    <div class="description-box">
        <strong style="color: #7965C1;">Deskripsi Proyek:</strong><br>
        {{ $project->deskripsi }}
    </div>
    @endif

    <!-- Progress Section -->
    <div class="progress-section">
        <div class="progress-label">Progress Keseluruhan Proyek</div>
        <div class="progress-bar-container">
            <div class="progress-bar" style="width: {{ $project->progress ?? 0 }}%;">
                {{ $project->progress ?? 0 }}%
            </div>
        </div>
    </div>

    <!-- Statistics -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-value">{{ $project->tasks->count() }}</div>
            <div class="stat-label">Total Tugas</div>
        </div>
        <div class="stat-card">
            <div class="stat-value">{{ $project->users->count() }}</div>
            <div class="stat-label">Anggota Tim</div>
        </div>
        <div class="stat-card">
            <div class="stat-value">{{ $project->tasks->where('status', 'completed')->count() }}</div>
            <div class="stat-label">Tugas Selesai</div>
        </div>
    </div>

    <!-- Tasks Section -->
    <div class="section">
        <div class="section-header">
            <span class="section-icon">📋</span>
            Daftar Tugas
        </div>
        
        @if($project->tasks->count() > 0)
        <table>
            <thead>
                <tr>
                    <th style="width: 5%;">No</th>
                    <th style="width: 25%;">Nama Tugas</th>
                    <th style="width: 30%;">Deskripsi</th>
                    <th style="width: 15%;">Assigned To</th>
                    <th style="width: 15%;">Status</th>
                    <th style="width: 10%;">File</th>
                </tr>
            </thead>
            <tbody>
                @foreach($project->tasks as $index => $task)
                <tr>
                    <td style="text-align: center; font-weight: bold;">{{ $index + 1 }}</td>
                    <td style="font-weight: 600;">{{ $task->nama }}</td>
                    <td style="color: #555;">{{ $task->deskripsi ?? '-' }}</td>
                    <td>{{ $task->assignedUser->name }}</td>
                    <td>
                        <span class="status-badge status-{{ $task->status }}">
                            {{ ucfirst(str_replace('_', ' ', $task->status)) }}
                        </span>
                    </td>
                    <td style="text-align: center;">
                        @if($task->file)
                            <span style="color: #28a745; font-weight: bold;">✓ Ada</span>
                        @else
                            <span style="color: #999;">-</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div style="text-align: center; padding: 30px; background: #f8f9fa; border-radius: 8px; color: #999;">
            Belum ada tugas yang terdaftar dalam proyek ini
        </div>
        @endif
    </div>

    <!-- Members Section -->
    <div class="section">
        <div class="section-header">
            <span class="section-icon">👥</span>
            Anggota Tim ({{ $project->users->count() }} orang)
        </div>
        
        <div class="members-grid">
            @foreach($project->users as $user)
            <div class="member-card">
                <div class="member-name">{{ $user->name }}</div>
                <div class="member-role role-{{ $user->pivot->role }}">
                    {{ ucfirst($user->pivot->role) }}
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <div style="margin-bottom: 10px;">
            <strong>Laporan ini digenerate secara otomatis oleh Sistem Ngolabb</strong>
        </div>
        <div class="footer-date">
            Dicetak pada: {{ \Carbon\Carbon::now()->format('d F Y, H:i') }} WIB
        </div>
        <div style="margin-top: 10px; font-style: italic; color: #999;">
            © {{ date('Y') }} Ngolabb - Project Management System
        </div>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Posko Bantuan Bencana</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
    /* ==== HEADER ==== */
    .header {
    background: linear-gradient(135deg, #00AEEF, #0080C8);
    color: #fff;
    padding: 20px 16px;
}

.header h1 {
    font-size: clamp(18px, 4vw, 24px);
    font-weight: 700;
    display: flex;
    align-items: center;
    gap: 10px;
    margin: 0;
}

.header-subtitle {
    font-size: clamp(12px, 3vw, 14px);
    margin-top: 4px;
    color: rgba(255,255,255,0.85);
}

.auth-area .login-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    color: #fff;
    font-weight: 600;
    padding: 8px 14px;
    background: rgba(255,255,255,0.15);
    border-radius: 8px;
    text-decoration: none;
    transition: background 0.3s;
}

.auth-area .login-btn:hover {
    background: rgba(255,255,255,0.25);
}

/* RESPONSIVE */
@media (max-width: 576px) {
    .header .container {
        flex-direction: column;
        align-items: flex-start;
        gap: 12px;
    }
    .auth-area {
        width: 100%;
        display: flex;
        justify-content: flex-end;
    }
    .auth-area .login-btn {
        width: 100%;
        justify-content: center;
    }
}
    /* ==== BODY & POSKO ==== */
    body {
        background: linear-gradient(135deg, #f5f7fa, #e8ecf1);
        font-family: 'Segoe UI', Tahoma, Verdana, sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .header-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 24px;
        gap: 12px;
        flex-wrap: wrap;
    }
    .search-form {
        flex: 1;
        max-width: 400px;
        min-width: 250px;
    }
    .search-wrapper {
        position: relative;
        display: flex;
        align-items: center;
    }
    .search-input {
        width: 100%;
        padding: 10px 40px 10px 16px;
        border: 2px solid #e5e7eb;
        border-radius: 12px;
        font-size: 14px;
        transition: all 0.3s;
        background: #fff;
    }
    .search-input:focus {
        outline: none;
        border-color: #00AEEF;
        box-shadow: 0 0 0 3px rgba(0, 174, 239, 0.1);
    }
    .search-icon {
        position: absolute;
        right: 12px;
        color: #9ca3af;
        pointer-events: none;
    }

    /* CARD */
    .posko-card {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        transition: all 0.3s;
        cursor: pointer;
        height: 100%;
        display: flex;
        flex-direction: column;
        border: 2px solid transparent;
    }
    .posko-card:hover {
        box-shadow: 0 8px 24px rgba(0, 174, 239, 0.2);
        border-color: #00AEEF;
    }

    .image-container {
        position: relative;
        width: 100%;
        height: 180px;
        overflow: hidden;
        background: #f3f4f6;
        border-top-left-radius: 16px;
        border-top-right-radius: 16px;
    }
    .posko-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s;
    }
    .posko-card:hover .posko-image {
        transform: scale(1.05);
    }
    .card-badge {
        position: absolute;
        top: 12px;
        right: 12px;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 5px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }
    .status-aktif { color: #10b981; }
    .status-nonaktif { color: #ef4444; }

    .card-content {
        padding: 16px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    .posko-title {
        font-size: 17px;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 8px;
        line-height: 1.3;
    }
    .posko-location {
        font-size: 13px;
        color: #6b7280;
        display: flex;
        align-items: center;
        gap: 6px;
        margin-bottom: 12px;
    }
    .condition-badge {
        display: inline-block;
        padding: 5px 14px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        margin-bottom: 12px;
    }
    .condition-ringan { background: #dbeafe; color: #1e40af; }
    .condition-sedang { background: #fef3c7; color: #92400e; }
    .condition-berat { background: #fee2e2; color: #991b1b; }

    .pic-info {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-top: auto;
        padding-top: 12px;
        border-top: 1px solid #e5e7eb;
    }
    .pic-avatar {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: linear-gradient(135deg, #00AEEF, #0080C8);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 13px;
        font-weight: 600;
        flex-shrink: 0;
    }
    .pic-details {
        flex: 1;
        min-width: 0;
    }
    .pic-name {
        font-size: 13px;
        font-weight: 600;
        color: #1f2937;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .pic-role {
        font-size: 11px;
        color: #9ca3af;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    /* MODAL */
    .modal-content { border-radius: 20px; border: none; overflow: hidden; }
    .modal-header {
        background: linear-gradient(135deg, #00AEEF, #0080C8);
        color: #fff;
        padding: 20px 24px;
        border: none;
    }
    .modal-title { font-weight: 700; font-size: 18px; }
    .modal-body { max-height: 70vh; overflow-y: auto; padding: 24px; }

    .modal-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 24px; }
    .modal-left { display: flex; flex-direction: column; }
    .modal-image-container {
        width: 100%;
        height: 260px;
        border-radius: 14px;
        overflow: hidden;
        background: #f3f4f6;
        margin-bottom: 16px;
    }
    .modal-image-container img { width: 100%; height: 100%; object-fit: cover; }
    .modal-badges { display: flex; gap: 10px; flex-wrap: wrap; }
    .modal-badge {
        padding: 6px 14px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 600;
        white-space: nowrap;
    }
    .badge-aktif { background: #dcfce7; color: #166534; }
    .badge-nonaktif { background: #fee2e2; color: #991b1b; }
    .badge-ringan { background: #dbeafe; color: #1e40af; }
    .badge-sedang { background: #fef3c7; color: #92400e; }
    .badge-berat { background: #fee2e2; color: #991b1b; }

    .modal-info {
        background: #f9fafb;
        padding: 18px;
        border-radius: 14px;
        display: flex;
        flex-direction: column;
        gap: 16px;
    }
    .modal-info-item { display: flex; gap: 12px; align-items: flex-start; }
    .modal-info-icon {
        width: 40px; height: 40px;
        background: #fff; border-radius: 10px;
        display: flex; align-items: center; justify-content: center;
        color: #00AEEF; flex-shrink: 0;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }
    .modal-info-content { flex: 1; min-width: 0; }
    .modal-info-label { font-size: 12px; color: #6b7280; margin-bottom: 4px; }
    .modal-info-value { font-size: 14px; font-weight: 600; color: #1f2937; word-break: break-word; }

    .kebutuhan-section { margin-top: 24px; }
    .kebutuhan-section h6 { font-weight: 700; color: #1f2937; margin-bottom: 16px; font-size: 15px; }
    .kebutuhan-list { display: flex; flex-direction: column; gap: 10px; }
    .kebutuhan-item {
        background: linear-gradient(90deg, #f0f9ff 0%, #fff 100%);
        border-left: 4px solid #00AEEF;
        border-radius: 8px;
        padding: 12px 16px;
        font-size: 14px;
        color: #374151;
        transition: all 0.3s;
    }
    .kebutuhan-item:hover { transform: translateX(4px); }
    .kebutuhan-empty { text-align: center; color: #9ca3af; padding: 20px; font-size: 14px; }

    /* RESPONSIVE */
    @media (max-width: 768px) { .modal-grid { grid-template-columns: 1fr; } .modal-image-container { height: 200px; } .image-container { height: 160px; } }
    @media (max-width: 576px) { .container { padding-left:12px; padding-right:12px; } }
    </style>
</head>
<body>

<!-- HEADER -->
<div class="header">
    <div class="container d-flex justify-content-between align-items-center flex-wrap">
        <div class="header-title">
            <h1><i class="fas fa-hands-helping"></i> Posko Bantuan Kota Padang</h1>
            <div class="header-subtitle">Informasi posko dan kebutuhan bantuan</div>
        </div>
        <div class="auth-area">
            <a href="/login" class="login-btn"><i class="fas fa-user-lock"></i> Login</a>
        </div>
    </div>
</div>

<div class="container py-4">
    <div class="header-actions">
        <form class="search-form" id="searchForm" method="GET" action="{{ route('index') }}">
            <div class="search-wrapper">
                <input type="text" class="search-input" id="searchInput" name="search"
                       value="{{ request('search') }}"
                       placeholder="Cari posko berdasarkan nama atau lokasi..."
                       autocomplete="off">
                <i class="fas fa-search search-icon"></i>
            </div>
        </form>
    </div>

    <div class="row g-4">
        @foreach($poskos as $posko)
        @php
            $isAktif = strtolower($posko->status) === 'aktif';
            $kondisi = strtolower($posko->kondisi_bencana);
            $kondisiClass = str_contains($kondisi,'ringan') ? 'ringan' : (str_contains($kondisi,'sedang') ? 'sedang' : 'berat');
        @endphp
        <div class="col-md-6 col-lg-4">
            <div class="posko-card" data-bs-toggle="modal" data-bs-target="#poskoModal{{ $posko->id }}">
                <div class="image-container">
                    <img src="{{ asset($posko->image_url) }}" alt="{{ $posko->nama_posko }}" class="posko-image">
                    <div class="card-badge {{ $isAktif ? 'status-aktif' : 'status-nonaktif' }}">
                        <i class="fas fa-circle"></i> {{ $isAktif ? 'Aktif' : 'Tidak Aktif' }}
                    </div>
                </div>
                <div class="card-content">
                    <div class="posko-title">Posko - {{ $posko->nama_posko }}</div>
                    <div class="posko-location">
                        <i class="fas fa-map-marker-alt"></i>
                        <div style="display:flex; flex-direction:column;">
                            <span class="fw-bold">{{ $posko->kelurahan }}</span>
                            <span class="text-muted" style="font-size:12px;">{{ $posko->alamat }}</span>
                        </div>
                    </div>
                    <span class="condition-badge condition-{{ $kondisiClass }}">{{ $posko->kondisi_bencana }}</span>
                    <div class="pic-info">
                        <div class="pic-avatar">{{ strtoupper(substr($posko->picUser->name,0,2)) }}</div>
                        <div class="pic-details">
                            <div class="pic-name">{{ $posko->picUser->name }}</div>
                            <div class="pic-role">{{ $posko->picUser->lokasi }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL -->
        <div class="modal fade" id="poskoModal{{ $posko->id }}" tabindex="-1">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $posko->nama_posko }}</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-grid">
                            <div class="modal-left">
                                <div class="modal-image-container">
                                    <img src="{{ asset($posko->image_url) }}" alt="{{ $posko->nama_posko }}">
                                </div>
                                <div class="modal-badges">
                                    <span class="modal-badge {{ $isAktif ? 'badge-aktif' : 'badge-nonaktif' }}">{{ $isAktif ? 'Aktif' : 'Tidak Aktif' }}</span>
                                    <span class="modal-badge badge-{{ $kondisiClass }}">{{ $posko->kondisi_bencana }}</span>
                                </div>
                            </div>
                            <div class="modal-info">
                                <div class="modal-info-item">
                                    <div class="modal-info-icon"><i class="fas fa-map-marker-alt"></i></div>
                                    <div class="modal-info-content">
                                        <div class="modal-info-label">Alamat</div>
                                        <div class="modal-info-value">{{ $posko->alamat ?? '-' }}</div>
                                    </div>
                                </div>
                                <div class="modal-info-item">
                                    <div class="modal-info-icon"><i class="fas fa-clock"></i></div>
                                    <div class="modal-info-content">
                                        <div class="modal-info-label">Jam Operasional</div>
                                        <div class="modal-info-value">{{ $posko->jam_operasional }}</div>
                                    </div>
                                </div>
                                <div class="modal-info-item">
                                    <div class="modal-info-icon"><i class="fas fa-phone"></i></div>
                                    <div class="modal-info-content">
                                        <div class="modal-info-label">Kontak</div>
                                        <div class="modal-info-value">{{ $posko->phone }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="kebutuhan-section">
                            <h6><i class="fas fa-list-ul"></i> Kebutuhan Posko</h6>
                            <div class="kebutuhan-list">
                                @forelse($posko->kebutuhans as $k)
                                    <div class="kebutuhan-item"><strong>{{ $k->nama_kebutuhan }}</strong> - {{ $k->jumlah }} {{ $k->satuan }}</div>
                                @empty
                                    <div class="kebutuhan-empty"><i class="fas fa-info-circle"></i> Belum ada data kebutuhan</div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endforeach
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
const searchInput = document.getElementById('searchInput');
let typingTimer;
searchInput.addEventListener('keyup', function () {
    clearTimeout(typingTimer);
    typingTimer = setTimeout(() => {
        document.getElementById('searchForm').submit();
    }, 1000); 
});
</script>
</body>
</html>

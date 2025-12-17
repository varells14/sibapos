@extends('layouts.app')

@section('content')
<style>
body {
    background: linear-gradient(135deg, #f5f7fa, #e8ecf1);
    font-family: 'Segoe UI', Tahoma, Verdana, sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* HEADER SECTION */
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

.btn-add {
    padding: 10px 20px;
    border-radius: 12px;
    border: none;
    background: #00AEEF;
    color: #fff;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s;
    display: flex;
    align-items: center;
    gap: 8px;
    white-space: nowrap;
    box-shadow: 0 2px 8px rgba(0, 174, 239, 0.3);
}

.btn-add:hover {
    background: #0080C8;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 174, 239, 0.4);
}

/* CARD STYLES */
.posko-card {
    background: #fff;
    border-radius: 16px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    transition: all 0.3s;
    height: 100%;
    border: 2px solid transparent;
    position: relative;
    display: flex;
    flex-direction: column;
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

.status-aktif {
    color: #10b981;
}

.status-nonaktif {
    color: #ef4444;
}

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

.condition-ringan {
    background: #dbeafe;
    color: #1e40af;
}

.condition-sedang {
    background: #fef3c7;
    color: #92400e;
}

.condition-berat {
    background: #fee2e2;
    color: #991b1b;
}

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

/* ACTION DROPDOWN */
.action-dropdown {
    position: relative;
    margin-left: auto;
}

.action-btn {
    padding: 6px 12px;
    border-radius: 8px;
    border: none;
    background: #00AEEF;
    color: #fff;
    font-size: 12px;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 5px;
    cursor: pointer;
    transition: all 0.3s;
    white-space: nowrap;
}

.action-btn:hover {
    background: #0080C8;
    transform: scale(1.05);
}

.action-menu {
    position: absolute;
    top: calc(100% + 5px);
    right: 0;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15);
    min-width: 140px;
    z-index: 1050;
    display: none;
    overflow: hidden;
}

.action-menu.show {
    display: block;
    animation: slideDown 0.2s ease;
}

@keyframes slideDown {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.action-menu-item {
    padding: 10px 16px;
    cursor: pointer;
    transition: background 0.2s;
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 13px;
    border: none;
    background: none;
    width: 100%;
    text-align: left;
    color: #374151;
}

.action-menu-item:hover {
    background: #f3f4f6;
}

.action-menu-item i {
    width: 16px;
    text-align: center;
    color: #00AEEF;
}

/* MODAL STYLES */
.modal-content {
    border-radius: 20px;
    border: none;
    overflow: hidden;
}

.modal-header {
    background: linear-gradient(135deg, #00AEEF, #0080C8);
    color: #fff;
    padding: 20px 24px;
    border: none;
}

.modal-title {
    font-weight: 700;
    font-size: 18px;
}

.modal-body {
    max-height: 70vh;
    overflow-y: auto;
    padding: 24px;
}

.modal-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 24px;
}

.modal-left {
    display: flex;
    flex-direction: column;
}

.modal-image-container {
    width: 100%;
    height: 260px;
    border-radius: 14px;
    overflow: hidden;
    background: #f3f4f6;
    margin-bottom: 16px;
}

.modal-image-container img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.modal-badges {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
}

.modal-badge {
    padding: 6px 14px;
    border-radius: 999px;
    font-size: 12px;
    font-weight: 600;
    white-space: nowrap;
}

.badge-aktif {
    background: #dcfce7;
    color: #166534;
}

.badge-nonaktif {
    background: #fee2e2;
    color: #991b1b;
}

.badge-ringan {
    background: #dbeafe;
    color: #1e40af;
}

.badge-sedang {
    background: #fef3c7;
    color: #92400e;
}

.badge-berat {
    background: #fee2e2;
    color: #991b1b;
}

.modal-info {
    background: #f9fafb;
    padding: 18px;
    border-radius: 14px;
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.modal-info-item {
    display: flex;
    gap: 12px;
    align-items: flex-start;
}

.modal-info-icon {
    width: 40px;
    height: 40px;
    background: #fff;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #00AEEF;
    flex-shrink: 0;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
}

.modal-info-content {
    flex: 1;
    min-width: 0;
}

.modal-info-label {
    font-size: 12px;
    color: #6b7280;
    margin-bottom: 4px;
}

.modal-info-value {
    font-size: 14px;
    font-weight: 600;
    color: #1f2937;
    word-break: break-word;
}

.kebutuhan-section {
    margin-top: 24px;
}

.kebutuhan-section h6 {
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 16px;
    font-size: 15px;
}

.kebutuhan-list {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.kebutuhan-item {
    background: linear-gradient(90deg, #f0f9ff 0%, #fff 100%);
    border-left: 4px solid #00AEEF;
    border-radius: 8px;
    padding: 12px 16px;
    font-size: 14px;
    color: #374151;
    transition: all 0.3s;
}

.kebutuhan-item:hover {
    background: #f0f9ff;
    transform: translateX(4px);
}

.kebutuhan-empty {
    text-align: center;
    color: #9ca3af;
    padding: 20px;
    font-size: 14px;
}

/* FORM TAMBAH POSKO */
.form-label {
    font-weight: 600;
    font-size: 13px;
    color: #374151;
    margin-bottom: 8px;
}

.form-control {
    border: 2px solid #e5e7eb;
    border-radius: 8px;
    padding: 10px 12px;
    font-size: 14px;
    transition: all 0.3s;
}

.form-control:focus {
    border-color: #00AEEF;
    box-shadow: 0 0 0 3px rgba(0, 174, 239, 0.1);
    outline: none;
}

.kebutuhan-form-item {
    background: #f9fafb;
    padding: 16px;
    border-radius: 10px;
    margin-bottom: 12px;
    border: 1px solid #e5e7eb;
}

.btn-secondary {
    background: #6b7280;
    color: #fff;
    border: none;
    padding: 8px 16px;
    border-radius: 8px;
    font-weight: 600;
    font-size: 13px;
    transition: all 0.3s;
}

.btn-secondary:hover {
    background: #4b5563;
}

.modal-footer {
    padding: 16px 24px;
    border-top: 1px solid #e5e7eb;
}

.btn-primary {
    background: #00AEEF;
    color: #fff;
    border: none;
    padding: 10px 24px;
    border-radius: 10px;
    font-weight: 600;
    transition: all 0.3s;
}

.btn-primary:hover {
    background: #0080C8;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 174, 239, 0.3);
}

/* RESPONSIVE */
@media (max-width: 768px) {
    .header-actions {
        flex-direction: column;
        align-items: stretch;
    }
    
    .search-form {
        max-width: 100%;
        order: 1;
    }
    
    .btn-add {
        order: 2;
        justify-content: center;
    }
    
    .modal-grid {
        grid-template-columns: 1fr;
    }
    
    .modal-image-container {
        height: 200px;
    }
    
    .image-container {
        height: 160px;
    }
    
    .posko-title {
        font-size: 16px;
    }
}

@media (max-width: 576px) {
    .container {
        padding-left: 12px;
        padding-right: 12px;
    }
    
    .card-content {
        padding: 14px;
    }
    
    .pic-info {
        flex-wrap: wrap;
    }
    
    .action-dropdown {
        margin-left: 0;
        width: 100%;
    }
    
    .action-btn {
        width: 100%;
        justify-content: center;
    }
}
</style>

<div class="container py-4">
    <!-- HEADER -->
    <div class="header-actions">
        <form class="search-form" id="searchForm" method="GET" action="{{ route('posko') }}">
            <div class="search-wrapper">
                <input type="text" class="search-input" id="searchInput" name="search"
                       value="{{ request('search') }}"
                       placeholder="Cari posko berdasarkan nama atau lokasi..."
                       autocomplete="off">
                <i class="fas fa-search search-icon"></i>
            </div>
        </form>

        <button class="btn btn-add" data-bs-toggle="modal" data-bs-target="#tambahPoskoModal">
            <i class="fas fa-plus"></i> Tambah Posko
        </button>
    </div>

    <!-- POSKO CARDS -->
    <div class="row g-4">
        @foreach($poskos as $posko)
            @php
                $isAktif = strtolower($posko->status) === 'aktif';
                $kondisi = strtolower($posko->kondisi_bencana);
                if (str_contains($kondisi, 'ringan')) $kondisiClass = 'ringan';
                elseif (str_contains($kondisi, 'sedang')) $kondisiClass = 'sedang';
                elseif (str_contains($kondisi, 'berat')) $kondisiClass = 'berat';
                else $kondisiClass = 'ringan';
            @endphp

            <div class="col-md-6 col-lg-4">
                <div class="posko-card">
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
                            <div class="pic-avatar">{{ strtoupper(substr($posko->pic,0,2)) }}</div>
                            <div class="pic-details">
                                <div class="pic-name">{{ $posko->pic }}</div>
                                <div class="pic-role">{{ $posko->kelurahan }}</div>
                            </div>

                            <div class="action-dropdown">
                                <button class="action-btn" onclick="toggleActionMenu(event, {{ $posko->id }})">
                                     Action
                                </button>
                                <div class="action-menu" id="actionMenu{{ $posko->id }}">
                                    <button class="action-menu-item" data-bs-toggle="modal" data-bs-target="#poskoModal{{ $posko->id }}">
                                         View
                                    </button>
                                    <button class="action-menu-item" data-bs-toggle="modal" data-bs-target="#updatePoskoModal{{ $posko->id }}">
                                         Update
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- MODAL DETAIL -->
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

            <!-- MODAL UPDATE POSKO -->
            <div class="modal fade" id="updatePoskoModal{{ $posko->id }}" tabindex="-1">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"><i class="fas fa-edit"></i> Update Posko - {{ $posko->nama_posko }}</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                        </div>

                        <form action="{{ route('posko-update', $posko->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="modal-grid">
                                    <!-- LEFT -->
                                    <div>
                                        <div class="mb-3">
                                            <label class="form-label">Nama Posko *</label>
                                            <input type="text" name="nama_posko" class="form-control" value="{{ $posko->nama_posko }}" required>
                                        </div>
                                        <div class="mb-3">
    <label class="form-label">Kelurahan *</label>
    <select name="kelurahan" class="form-select" required>
        <option value="">-- Pilih Kelurahan --</option>

        {{-- PADANG UTARA --}}
        <optgroup label="Padang Utara">
            <option value="Gunung Pangilun" {{ old('kelurahan', $posko->kelurahan) == 'Gunung Pangilun' ? 'selected' : '' }}>
                Gunung Pangilun
            </option>
            <option value="Ulak Karang Utara" {{ old('kelurahan', $posko->kelurahan) == 'Ulak Karang Utara' ? 'selected' : '' }}>
                Ulak Karang Utara
            </option>
            <option value="Ulak Karang Selatan" {{ old('kelurahan', $posko->kelurahan) == 'Ulak Karang Selatan' ? 'selected' : '' }}>
                Ulak Karang Selatan
            </option>
            <option value="Air Tawar Timur" {{ old('kelurahan', $posko->kelurahan) == 'Air Tawar Timur' ? 'selected' : '' }}>
                Air Tawar Timur
            </option>
            <option value="Air Tawar Barat" {{ old('kelurahan', $posko->kelurahan) == 'Air Tawar Barat' ? 'selected' : '' }}>
                Air Tawar Barat
            </option>
        </optgroup>

        {{-- KOTO TANGAH --}}
        <optgroup label="Koto Tangah">
            <option value="Aie Pacah" {{ old('kelurahan', $posko->kelurahan) == 'Aie Pacah' ? 'selected' : '' }}>
                Aie Pacah
            </option>
            <option value="Batang Kabung Aie Pacah" {{ old('kelurahan', $posko->kelurahan) == 'Batang Kabung Aie Pacah' ? 'selected' : '' }}>
                Batang Kabung Aie Pacah
            </option>
            <option value="Dadok Tunggul Hitam" {{ old('kelurahan', $posko->kelurahan) == 'Dadok Tunggul Hitam' ? 'selected' : '' }}>
                Dadok Tunggul Hitam
            </option>
            <option value="Koto Panjang Ikua Koto" {{ old('kelurahan', $posko->kelurahan) == 'Koto Panjang Ikua Koto' ? 'selected' : '' }}>
                Koto Panjang Ikua Koto
            </option>
            <option value="Pasir Nan Tigo" {{ old('kelurahan', $posko->kelurahan) == 'Pasir Nan Tigo' ? 'selected' : '' }}>
                Pasir Nan Tigo
            </option>
        </optgroup>

        {{-- NANGGALO --}}
        <optgroup label="Nanggalo">
            <option value="Surau Gadang" {{ old('kelurahan', $posko->kelurahan) == 'Surau Gadang' ? 'selected' : '' }}>
                Surau Gadang
            </option>
            <option value="Tabiang Banda Gadang" {{ old('kelurahan', $posko->kelurahan) == 'Tabiang Banda Gadang' ? 'selected' : '' }}>
                Tabiang Banda Gadang
            </option>
        </optgroup>

        {{-- LUBUK BEGALUNG --}}
        <optgroup label="Lubuk Begalung">
            <option value="Lubuk Begalung" {{ old('kelurahan', $posko->kelurahan) == 'Lubuk Begalung' ? 'selected' : '' }}>
                Lubuk Begalung
            </option>
        </optgroup>

    </select>
</div>

                                        <div class="mb-3">
                                            <label class="form-label">Alamat *</label>
                                            <textarea name="alamat" class="form-control" rows="3" required>{{ $posko->alamat }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Kondisi Bencana *</label>
                                            <input type="text" name="kondisi_bencana" class="form-control" value="{{ $posko->kondisi_bencana }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Status *</label>
                                            <select name="status" class="form-control" required>
                                                <option value="Aktif" {{ $posko->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                                <option value="Tidak Aktif" {{ $posko->status == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Jam Operasional *</label>
                                            <input type="text" name="jam_operasional" class="form-control" value="{{ $posko->jam_operasional }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">PIC *</label>
                                            <input type="text" name="pic" class="form-control" value="{{ $posko->pic }}" required>
                                        </div>
                                        

                                        <div class="mb-3">
                                            <label class="form-label">Telepon *</label>
                                            <input type="text" name="phone" class="form-control" value="{{ $posko->phone }}" required>
                                        </div>
                                    </div>

                                    <!-- RIGHT -->
                                    <div>
                                        <div class="mb-3">
                                            <label class="form-label">Foto Posko</label>
                                            <input type="file" name="image_url" class="form-control">
                                            <small class="text-muted">Kosongkan jika tidak diganti</small>
                                        </div>
                                        <hr style="margin:24px 0">
                                        <h6 style="margin-bottom:16px;font-weight:700;"><i class="fas fa-clipboard-list"></i> Kebutuhan Posko</h6>
                                        <div id="kebutuhanContainerUpdate{{ $posko->id }}">
                                            @foreach($posko->kebutuhans as $i => $k)
                                                <div class="kebutuhan-form-item">
                                                    <div class="mb-2">
                                                        <input type="text" name="kebutuhan[{{ $i }}][nama_kebutuhan]" value="{{ $k->nama_kebutuhan }}" class="form-control">
                                                    </div>
                                                    <div class="row g-2">
                                                        <div class="col-6">
                                                            <input type="number" name="kebutuhan[{{ $i }}][jumlah]" value="{{ $k->jumlah }}" class="form-control">
                                                        </div>
                                                        <div class="col-6">
                                                            <input type="text" name="kebutuhan[{{ $i }}][satuan]" value="{{ $k->satuan }}" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="mt-2">
                                                        <input type="text" name="kebutuhan[{{ $i }}][prioritas]" value="{{ $k->prioritas }}" class="form-control">
                                                    </div>
                                                    <div class="mt-2">
                                                        <input type="text" name="kebutuhan[{{ $i }}][keterangan]" value="{{ $k->keterangan }}" class="form-control">
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <button type="button" class="btn btn-secondary w-100 mt-2" onclick="tambahKebutuhanUpdate({{ $posko->id }})"><i class="fas fa-plus"></i> Tambah Kebutuhan Lainnya</button>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update Posko</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- MODAL TAMBAH POSKO -->
<div class="modal fade" id="tambahPoskoModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-plus-circle"></i> Tambah Posko Baru</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('posko.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="modal-grid">
                        <!-- LEFT -->
                        <div>
                            <div class="mb-3"><label class="form-label">Nama Posko *</label><input type="text" name="nama_posko" class="form-control" required></div>
                           <div class="mb-3">
    <label class="form-label">Kelurahan *</label>
    <select name="kelurahan" class="form-select" required>
        <option value="" selected disabled>-- Pilih Kelurahan --</option>

        {{-- PADANG UTARA --}}
        <optgroup label="Padang Utara">
            <option value="Gunung Pangilun">Gunung Pangilun</option>
            <option value="Ulak Karang Utara">Ulak Karang Utara</option>
            <option value="Ulak Karang Selatan">Ulak Karang Selatan</option>
            <option value="Air Tawar Timur">Air Tawar Timur</option>
            <option value="Air Tawar Barat">Air Tawar Barat</option>
        </optgroup>

        {{-- KOTO TANGAH --}}
        <optgroup label="Koto Tangah">
            <option value="Aie Pacah">Aie Pacah</option>
            <option value="Batang Kabung Aie Pacah">Batang Kabung Aie Pacah</option>
            <option value="Dadok Tunggul Hitam">Dadok Tunggul Hitam</option>
            <option value="Koto Panjang Ikua Koto">Koto Panjang Ikua Koto</option>
            <option value="Pasir Nan Tigo">Pasir Nan Tigo</option>
        </optgroup>

        {{-- NANGGALO --}}
        <optgroup label="Nanggalo">
            <option value="Surau Gadang">Surau Gadang</option>
            <option value="Tabiang Banda Gadang">Tabiang Banda Gadang</option>
        </optgroup>

        {{-- LUBUK BEGALUNG --}}
        <optgroup label="Lubuk Begalung">
            <option value="Lubuk Begalung">Lubuk Begalung</option>
        </optgroup>
    </select>
</div>

                            <div class="mb-3"><label class="form-label">Alamat *</label><textarea name="alamat" class="form-control" rows="3" required></textarea></div>
                            <div class="mb-3"><label class="form-label">Kondisi Bencana *</label><input type="text" name="kondisi_bencana" class="form-control" placeholder="Contoh: Banjir Ringan" required></div>
                            <div class="mb-3"><label class="form-label">Status *</label><select name="status" class="form-control" required><option value="">Pilih Status</option><option value="Aktif">Aktif</option><option value="Tidak Aktif">Tidak Aktif</option></select></div>
                            <div class="mb-3"><label class="form-label">Jam Operasional *</label><input type="text" name="jam_operasional" class="form-control" placeholder="Contoh: 24 Jam" required></div>
                            <div class="mb-3"><label class="form-label">PIC *</label><input type="text" name="pic" class="form-control" required></div>
                            
                            <div class="mb-3"><label class="form-label">Telepon *</label><input type="text" name="phone" class="form-control" placeholder="Contoh: 08123456789" required></div>
                        </div>

                        <!-- RIGHT -->
                        <div>
                            <div class="mb-3"><label class="form-label">Foto Posko</label><input type="file" name="image_url" class="form-control"><small class="text-muted">Format: JPG, PNG (Max: 2MB)</small></div>
                            <hr style="margin:24px 0">
                            <h6 style="margin-bottom:16px;font-weight:700"><i class="fas fa-clipboard-list"></i> Kebutuhan Posko (Opsional)</h6>
                            <div id="kebutuhanContainer">
                                <div class="kebutuhan-form-item">
                                    <div class="mb-2"><input type="text" name="kebutuhan[0][nama_kebutuhan]" placeholder="Nama Kebutuhan" class="form-control"></div>
                                    <div class="row g-2">
                                        <div class="col-6"><input type="number" name="kebutuhan[0][jumlah]" placeholder="Jumlah" class="form-control"></div>
                                        <div class="col-6"><input type="text" name="kebutuhan[0][satuan]" placeholder="Satuan" class="form-control"></div>
                                    </div>
                                    <div class="mt-2"><input type="text" name="kebutuhan[0][prioritas]" placeholder="Prioritas (Tinggi/Sedang/Rendah)" class="form-control"></div>
                                    <div class="mt-2"><input type="text" name="kebutuhan[0][keterangan]" placeholder="Keterangan" class="form-control"></div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-secondary w-100 mt-2" id="tambahKebutuhan"><i class="fas fa-plus"></i> Tambah Kebutuhan Lainnya</button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer"><button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan Posko</button></div>
            </form>
        </div>
    </div>
</div>



<script>
// Tambah Kebutuhan
let counter = 1;

document.getElementById('tambahKebutuhan').addEventListener('click', function () {
    const container = document.getElementById('kebutuhanContainer');

    const div = document.createElement('div');
    div.classList.add('kebutuhan-form-item', 'mt-3');

    div.innerHTML = `
        <div class="mb-2">
            <input type="text" name="kebutuhan[${counter}][nama_kebutuhan]"
                   placeholder="Nama Kebutuhan" class="form-control">
        </div>

        <div class="row g-2">
            <div class="col-6">
                <input type="number" name="kebutuhan[${counter}][jumlah]"
                       placeholder="Jumlah" class="form-control">
            </div>
            <div class="col-6">
                <input type="text" name="kebutuhan[${counter}][satuan]"
                       placeholder="Satuan" class="form-control">
            </div>
        </div>

        <div class="mt-2">
            <input type="text" name="kebutuhan[${counter}][prioritas]"
                   placeholder="Prioritas (Tinggi/Sedang/Rendah)" class="form-control">
        </div>

        <div class="mt-2">
            <input type="text" name="kebutuhan[${counter}][keterangan]"
                   placeholder="Keterangan" class="form-control">
        </div>
    `;

    container.appendChild(div);
    counter++;
});

// Toggle Action Dropdown Menu
function toggleActionMenu(event, poskoId) {
    event.stopPropagation();
    const menu = document.getElementById('actionMenu' + poskoId);
    
    // Close all other menus
    document.querySelectorAll('.action-menu').forEach(m => {
        if (m !== menu) m.classList.remove('show');
    });
    
    menu.classList.toggle('show');
}

// Close dropdown when clicking outside
document.addEventListener('click', function(event) {
    if (!event.target.closest('.action-dropdown')) {
        document.querySelectorAll('.action-menu').forEach(menu => {
            menu.classList.remove('show');
        });
    }
});

// Edit Function (placeholder)
function editPosko(id) {
    console.log('Edit posko:', id);
    // Implementasi edit nanti
    alert('Edit posko ID: ' + id);
}

// Delete Function (placeholder)
function deletePosko(id) {
    if (confirm('Yakin ingin menghapus posko ini?')) {
        console.log('Delete posko:', id);
        // Implementasi delete nanti
        alert('Delete posko ID: ' + id);
    }
}
</script>

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
@endsection
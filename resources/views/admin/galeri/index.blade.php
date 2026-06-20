@extends('admin.layouts.admin')

@section('title', 'Kelola Galeri Foto')

@section('content')
<div class="card card-custom p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="fw-bold text-dark mb-0">Daftar Galeri</h5>
        <a href="{{ route('admin.galeri.create') }}" class="btn btn-primary btn-custom shadow-sm">+ Tambah Galeri</a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th style="width: 60px;">No</th>
                    <th style="width: 150px;">Gambar</th>
                    <th>Judul Galeri</th>
                    <th>Deskripsi</th>
                    <th>Status</th>
                    <th>Tanggal Dibuat</th>
                    <th class="text-end" style="width: 180px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($galleries as $key => $gallery)
                    <tr>
                        <td>{{ $galleries->firstItem() + $key }}</td>
                        <td>
                            @if($gallery->image)
                                <img src="{{ asset('images/' . $gallery->image) }}" alt="Gambar" class="img-thumbnail" style="width: 120px; height: 80px; object-fit: cover;">
                            @else
                                <span class="badge bg-secondary">No Image</span>
                            @endif
                        </td>
                        <td>
                            <div class="fw-bold text-dark">{{ $gallery->title }}</div>
                        </td>
                        <td>
                            <small class="text-secondary">{{ Str::limit($gallery->description, 80) }}</small>
                        </td>
                        <td>
                            @if($gallery->status == 'active')
                                <span class="badge bg-success">Aktif</span>
                            @else
                                <span class="badge bg-secondary">Nonaktif</span>
                            @endif
                        </td>
                        <td>
                            <small class="text-secondary">{{ $gallery->created_at ? $gallery->created_at->format('d M Y') : '-' }}</small>
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.galeri.edit', $gallery->id) }}" class="btn btn-sm btn-outline-primary rounded-pill px-3 me-1">Edit</a>
                            <form action="{{ route('admin.galeri.destroy', $gallery->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus galeri ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill px-3">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">Belum ada data galeri.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-3">
        {{ $galleries->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection

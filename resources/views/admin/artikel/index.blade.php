@extends('admin.layouts.admin')

@section('title', 'Kelola Artikel & Berita')

@section('content')
<div class="card card-custom p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="fw-bold text-dark mb-0">Daftar Artikel</h5>
        <a href="{{ route('admin.artikel.create') }}" class="btn btn-primary btn-custom shadow-sm">+ Tambah Artikel</a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th style="width: 60px;">No</th>
                    <th style="width: 100px;">Gambar</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Tanggal Dibuat</th>
                    <th class="text-end" style="width: 220px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($artikels as $key => $artikel)
                    <tr>
                        <td>{{ $artikels->firstItem() + $key }}</td>
                        <td>
                            @if($artikel->image)
                                <img src="{{ asset('images/' . $artikel->image) }}" alt="Gambar" class="img-thumbnail" style="width: 70px; height: 50px; object-fit: cover;">
                            @else
                                <span class="badge bg-secondary">No Image</span>
                            @endif
                        </td>
                        <td>
                            <div class="fw-bold text-dark">{{ $artikel->title }}</div>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border">{{ $artikel->categori }}</span>
                        </td>
                        <td>
                            @if($artikel->status == 'published')
                                <span class="badge bg-success">Published</span>
                            @elseif($artikel->status == 'draft')
                                <span class="badge bg-secondary">Draft</span>
                            @else
                                <span class="badge bg-warning">Archived</span>
                            @endif
                        </td>
                        <td>
                            <small class="text-secondary">{{ $artikel->created_at ? $artikel->created_at->format('d M Y') : '-' }}</small>
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.artikel.show', $artikel->id) }}" class="btn btn-sm btn-outline-info rounded-pill px-3 me-1">Detail</a>
                            <a href="{{ route('admin.artikel.edit', $artikel->id) }}" class="btn btn-sm btn-outline-primary rounded-pill px-3 me-1">Edit</a>
                            <form action="{{ route('admin.artikel.destroy', $artikel->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill px-3">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">Belum ada data artikel.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-3">
        {{ $artikels->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection

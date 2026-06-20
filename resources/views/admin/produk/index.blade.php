@extends('admin.layouts.admin')

@section('title', 'Kelola Produk & Layanan')

@section('content')
<div class="card card-custom p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="fw-bold text-dark mb-0">Daftar Produk</h5>
        <div>
            <a href="{{ route('admin.produk.pdf') }}" class="btn btn-outline-danger btn-custom shadow-sm me-2">📄 Export PDF</a>
            <a href="{{ route('admin.produk.create') }}" class="btn btn-primary btn-custom shadow-sm">+ Tambah Produk</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th style="width: 60px;">No</th>
                    <th style="width: 100px;">Gambar</th>
                    <th>Nama Produk</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th class="text-end" style="width: 180px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $key => $product)
                    <tr>
                        <td>{{ $products->firstItem() + $key }}</td>
                        <td>
                            @if($product->image)
                                <img src="{{ asset('images/' . $product->image) }}" alt="Gambar" class="img-thumbnail" style="width: 70px; height: 50px; object-fit: cover;">
                            @else
                                <span class="badge bg-secondary">No Image</span>
                            @endif
                        </td>
                        <td>
                            <div class="fw-bold text-dark">{{ $product->name }}</div>
                        </td>
                        <td>
                            <small class="text-secondary">{{ Str::limit($product->description, 80) }}</small>
                        </td>
                        <td>
                            <span class="fw-bold text-primary">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                        </td>
                        <td>
                            @if($product->status == 'active')
                                <span class="badge bg-success">Aktif</span>
                            @else
                                <span class="badge bg-secondary">Nonaktif</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.produk.edit', $product->id) }}" class="btn btn-sm btn-outline-primary rounded-pill px-3 me-1">Edit</a>
                            <form action="{{ route('admin.produk.destroy', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill px-3">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">Belum ada data produk.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-3">
        {{ $products->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection

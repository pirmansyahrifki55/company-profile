@extends('admin.layouts.admin')

@section('title', 'Kelola Profil Perusahaan')

@section('content')
<div class="card card-custom p-4">
    <h5 class="fw-bold mb-4 text-dark">Ubah Informasi Profil Perusahaan</h5>

    <form action="{{ route('admin.profil.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="name" class="form-label small fw-semibold text-secondary">Nama Perusahaan</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $profile->name) }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="email" class="form-label small fw-semibold text-secondary">Email Perusahaan</label>
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $profile->email) }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="phone" class="form-label small fw-semibold text-secondary">Telepon Perusahaan</label>
                <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $profile->phone) }}" required>
                @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="address" class="form-label small fw-semibold text-secondary">Alamat Perusahaan</label>
                <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address', $profile->address) }}" required>
                @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-12 mb-3">
                <label for="about_title" class="form-label small fw-semibold text-secondary">Judul Tentang Kami (About Title)</label>
                <input type="text" name="about_title" id="about_title" class="form-control @error('about_title') is-invalid @enderror" value="{{ old('about_title', $profile->about_title) }}" required>
                @error('about_title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-12 mb-3">
                <label for="about_description" class="form-label small fw-semibold text-secondary">Deskripsi Tentang Kami (About Description)</label>
                <textarea name="about_description" id="about_description" rows="5" class="form-control @error('about_description') is-invalid @enderror" required>{{ old('about_description', $profile->about_description) }}</textarea>
                @error('about_description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="vision" class="form-label small fw-semibold text-secondary">Visi</label>
                <textarea name="vision" id="vision" rows="4" class="form-control @error('vision') is-invalid @enderror" required>{{ old('vision', $profile->vision) }}</textarea>
                @error('vision')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="mission" class="form-label small fw-semibold text-secondary">Misi</label>
                <textarea name="mission" id="mission" rows="4" class="form-control @error('mission') is-invalid @enderror" required>{{ old('mission', $profile->mission) }}</textarea>
                @error('mission')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-12 mb-4">
                <label for="logo" class="form-label small fw-semibold text-secondary">Logo Perusahaan</label>
                <input type="file" name="logo" id="logo" class="form-control @error('logo') is-invalid @enderror">
                <small class="text-muted d-block mt-1">Kosongkan jika tidak ingin mengubah logo. Format gambar didukung (jpeg, png, jpg, webp, gif) max 2MB.</small>
                @error('logo')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror

                @if($profile && $profile->logo)
                    <div class="mt-3">
                        <span class="small d-block text-secondary mb-1">Logo Saat Ini:</span>
                        <img src="{{ asset('images/' . $profile->logo) }}" alt="Logo" class="img-thumbnail" style="max-height: 80px;">
                    </div>
                @endif
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary btn-custom shadow-sm">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection

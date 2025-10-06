@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Mata Kuliah</h1>
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="kode_mk" class="form-label">Kode MK</label>
            <input type="text" name="kode_mk" class="form-control" id="kode_mk" value="{{ $matkul->kode_mk }}" required>
        </div>
        <div class="mb-3">
            <label for="nama_mk" class="form-label">Nama MK</label>
            <input type="text" name="nama_mk" class="form-control" id="nama_mk" value="{{ $matkul->nama_mk }}" required>
        </div>
        <div class="mb-3">
            <label for="sks" class="form-label">SKS</label>
            <input type="number" name="sks" class="form-control" id="sks" value="{{ $matkul->sks }}" required>
        </div>
        <div class="mb-3">
            <label for="semester" class="form-label">Semester</label>
            <input type="number" name="semester" class="form-control" id="semester" value="{{ $matkul->semester }}" required>
        </div>
        <div class="mb-3">
            <label for="jenis_mk" class="form-label">Jenis MK</label>
            <select name="jenis_mk" class="form-control" id="jenis_mk" required>
                <option value="wajib" {{ $matkul->jenis_mk == 'wajib' ? 'selected' : '' }}>Wajib</option>
                <option value="pilihan" {{ $matkul->jenis_mk == 'pilihan' ? 'selected' : '' }}>Pilihan</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>
</div>
@endsection

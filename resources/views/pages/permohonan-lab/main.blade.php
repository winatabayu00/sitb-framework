@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>{{ $title }}</h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Pasien</th>
                        <th>ID Suspect</th>
                        <th>No Sediaan</th>
                        <th>Alasan</th>
                        <th>Jenis Pemeriksaan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($permohonanLab as $key => $item)
                        <tr>
                        <td>{{ $key + 1 + ($permohonanLab->currentPage() - 1) * $permohonanLab->perPage() }}</td>
                        <td>{{ $item->tanggal_permohonan ? $item->tanggal_permohonan : '-' }}</td>
                            <td>{{ $item->pasien ? $item->nama_pasien: '-' }}</td>
                            <td>{{ $item->ID_SPECIMEN_SATUSEHAT ? $item->ID_SPECIMEN_SATUSEHAT : '-'}}</td>
                            <td>{{ $item->no_sediaan ? $item->no_sediaan : '-' }}</td>
                            <td>{{ $item->alasan ? $item->alasan : '-' }}</td>
                            <td>{{ $item->jenis_pemeriksaan ? $item->jenis_pemeriksaan : '-' }}</td>
                            <td>
                                <a href="{{ route('terduga-tb.show', $item->id) }}" class="btn btn-info btn-sm">Lihat</a>
                                <a href="{{ route('terduga-tb.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('terduga-tb.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">Data tidak ditemukan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            
            <!-- Pagination links -->
            <!-- <div class="d-flex justify-content-center"> -->
            <!-- </div> -->
        </div>
    </div>
</div>
@endsection

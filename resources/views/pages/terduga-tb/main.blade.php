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
                        <th>Tipe Pasien</th>
                        <th>Kriteria Terduga TB</th>
                        <th>Status DM</th>
                        <th>Status HIV</th>
                        <th>Status Imunisasi BGC</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($suspects as $key => $item)
                        <tr>
                            <td>{{ $key + 1 + ($suspects->currentPage() - 1) * $suspects->perPage() }}</td> <!-- Adjust No to reflect current page -->
                            <td>{{ $item->created_at ? $item->created_at : '-' }}</td>
                            <td>{{ $item->pasien ? $item->pasien->nama_pasien : '-' }}</td>
                            <td>{{ $statusLabels[$item->tipe_pasien_id] ?? 'Tipe Pasien tidak diketahui' }}</td>
                            <td>{{ $statusKriteriaTB[$item->terduga_tb_id] ?? '-' }}</td>
                            <td>{{ $item->status_dm_id == '1' ? 'Ya' : 'Tidak' }}</td>
                            <td>{{ $item->status_hiv_id == '1' ? 'Ya' : 'Tidak' }}</td>
                            <td>{{ $item->imunisasi_bcg_id == '1' ? 'Ya' : 'Tidak' }}</td>
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
                <!-- {{ $suspects->links() }} -->
            <!-- </div> -->
        </div>
    </div>
</div>
@endsection

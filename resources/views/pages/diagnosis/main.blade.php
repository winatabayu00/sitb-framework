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
                        <th>Thorax Hasil</th>
                        <th>Thorax Kesan</th>
                        <th>Hasil Diagnosis</th>
                        <th>Jenis Pemeriksaan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kasusdiagnosis as $key => $item)
                        <tr>
                        <td>{{ $key + 1 + ($kasusdiagnosis->currentPage() - 1) * $kasusdiagnosis->perPage() }}</td>
                        <td>{{ $item->tanggal_hasil ? $item->tanggal_hasil : '-' }}</td>
                            <td>{{ $item->pasien ? $item->nama_pasien: '-' }}</td>
                            <td>{{ $item->thorax_hasil ? $item->thorax_hasil : '-'}}</td>
                            <td>{{ $item->thorax_kesan ? $item->thorax_kesan : '-' }}</td>
                            <td>{{ $item->hasil_diagnosis ? $item->hasil_diagnosis : '-' }}</td>
                            <td>{{ $item->tipe_diagnosis ? $item->tipe_diagnosis : '-' }}</td>
                            <td>
                                <a href="{{ route('permohonan-lab.show', $item->id) }}" class="btn btn-info btn-sm">Lihat</a>
                                <a href="{{ route('permohonan-lab.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('permohonan-lab.destroy', $item->id) }}" method="POST" class="d-inline">
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

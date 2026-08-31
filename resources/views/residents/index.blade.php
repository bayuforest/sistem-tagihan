@extends('layouts.admin', ['header' => 'Data Warga'])

@push('styles')
<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
<style>
    .dataTables_wrapper {
        padding: 20px 0;
    }
    .dataTables_length select {
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    .dataTables_filter input {
        padding: 5px 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin-left: 10px;
    }
    .dt-buttons {
        margin-bottom: 15px;
    }
    /* Style pagination buttons like btn-edit */
    .dataTables_wrapper .dataTables_paginate .paginate_button {
        display: inline-flex !important;
        align-items: center;
        justify-content: center;
        padding: 6px 14px !important;
        border-radius: 8px;
        font-size: 0.85rem;
        font-weight: 600;
        text-decoration: none;
        border: 1px solid rgba(0,0,0,0.05) !important;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        box-shadow: 0 2px 6px rgba(0,0,0,0.08), inset 0 2px 4px rgba(255,255,255,0.25);
        font-family: 'Outfit', sans-serif;
        color: white !important;
        background: linear-gradient(135deg, #5dade2, #3498db) !important;
        margin-left: 5px;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover:not(.disabled) {
        background: linear-gradient(135deg, #85c1e9, #5dade2) !important;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(52, 152, 219, 0.3), inset 0 2px 4px rgba(255,255,255,0.4);
        color: white !important;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button.current, 
    .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
        background: linear-gradient(135deg, #2980b9, #3498db) !important;
        box-shadow: inset 0 3px 5px rgba(0,0,0,0.125);
        transform: none;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button.disabled,
    .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover,
    .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:active {
        background: #e9ecef !important;
        color: var(--text-muted) !important;
        box-shadow: none;
        cursor: not-allowed;
        transform: none;
    }
</style>
@endpush

@section('content')
    <div style="margin-bottom: 24px; display: flex; justify-content: flex-end; align-items: center;">
        <a href="{{ route('residents.create') }}" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width: 18px; height: 18px;">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            Tambah Warga
        </a>
    </div>

    @if (session('success'))
        <div style="background: rgba(46, 204, 113, 0.1); color: #2ecc71; padding: 16px 20px; border-radius: var(--radius-md); margin-bottom: 24px; font-weight: 500; display: flex; align-items: center; gap: 10px;">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 20px; height: 20px;">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            {{ session('success') }}
        </div>
    @endif

    <div class="table-container">
        <div class="table-header">
            <h2>Daftar Seluruh Warga</h2>
        </div>
        <div style="overflow-x: auto; padding: 0 20px 20px 20px;">
            <table id="residentsTable" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th style="width: 60px;">No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($residents as $resident)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td style="font-weight: 500;">{{ $resident->nama }}</td>
                            <td style="color: var(--text-muted);">{{ $resident->alamat }}</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('residents.edit', $resident) }}" class="btn-action btn-edit">Edit</a>
                                    <form action="{{ route('residents.destroy', $resident) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data warga ini?');" style="margin: 0;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action btn-delete">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

<script>
    $(document).ready(function() {
        $('#residentsTable').DataTable({
            ordering: false,
            lengthMenu: [
                [10, 25, 50, 100, -1],
                ['10', '25', '50', '100', 'Semua']
            ],
            language: {
                search: "Cari:",
                lengthMenu: "Tampilkan _MENU_ data",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                infoEmpty: "Menampilkan 0 sampai 0 dari 0 data",
                infoFiltered: "(disaring dari _MAX_ total data)",
                paginate: {
                    first: "First",
                    last: "Last",
                    next: "Next",
                    previous: "Prev"
                },
                emptyTable: "Data warga belum tersedia."
            }
        });
    });
</script>
@endpush

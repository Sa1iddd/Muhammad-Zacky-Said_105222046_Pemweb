<style>
    .btn-container {
        display: inline-flex;  
        gap: 0px;            
        align-items: center;   
    }

    form {
        display: inline;       
    }

    .btn-container .btn {
        padding: 8px 8px;     
        white-space: nowrap;   
    }
    .btn-container .btn-sm {
        font-size: 12px;       
    }

    .btn-container .btn-info {
        background-color: #17a2b8; 
        color: white;
    }

    .btn-container .btn-danger {
        background-color: #dc3545; 
        color: white;
    }

    .btn-container .btn:hover {
        opacity: 0.9; 
    }
</style>

<table class="table table-schedule">
    <thead>
        <tr>
            <th>Nama Event</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Selesai</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($events as $event)
            <tr>
                <td>{{ $event->name }}</td>
                <td>{{ $event->start }}</td>
                <td>{{ $event->end }}</td>
                <td>
                    <div class="btn-container d-inline-flex">
                        <!-- Tombol Edit -->
                        <button type="button" class="btn btn-info btn-sm mr-2 btn-edit" 
                                data-id="{{ $event->id }}" data-name="{{ $event->name }}" 
                                data-start="{{ $event->start }}" data-end="{{ $event->end }}" 
                                data-toggle="modal" data-target="#editEventModal">
                            Edit
                        </button>

                        <form method="POST" action="{{ route('event.delete') }}">
                            @csrf
                            @method('POST')
                            <input type="hidden" name="id" value="{{ $event->id }}">
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus event ini?')">Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
</table>

<div class="modal fade" id="editEventModal" tabindex="-1" role="dialog" aria-labelledby="editEventModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editEventModalLabel">Edit Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editEventForm" action="{{ route('event.update') }}" method="POST">
                @csrf
                @method('PUT') 
                <input type="hidden" name="id" id="editEventId">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="editEventName">Nama Event</label>
                        <input type="text" class="form-control" id="editEventName" name="name" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="editEventStart">Tanggal Mulai</label>
                        <input type="date" class="form-control" id="editEventStart" name="start" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="editEventEnd">Tanggal Selesai</label>
                        <input type="date" class="form-control" id="editEventEnd" name="end" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Gunakan tag form dibawah ini untuk submit data jadwal yang akan diupdate. Gunakan contoh modal yang sudah dibuat pada nomor 1 dan 2 sebagai referensi -->
<!--   -->

<script type="text/javascript">
	
	$('.table-schedule').DataTable({
		language: {
			paginate: {
				next: '<i class="bi bi-arrow-right"></i>',
				previous: '<i class="bi bi-arrow-left"></i>'
			},
			emptyTable: "Data tidak ditemukan",
		},
	});
	
	$(document).on('click', '.btn-edit', function () {
    	const id = $(this).data('id');
    	const name = $(this).data('name');
    	const start = $(this).data('start');
    	const end = $(this).data('end');

    	$('#editEventId').val(id);
    	$('#editEventName').val(name);
    	$('#editEventStart').val(start);
    	$('#editEventEnd').val(end);

    	$('#editEventModal').modal('show');

    	$('#editEventModal').on('shown.bs.modal', function () {
        	$('#editEventName').focus();
    	});
	});
	// Tuliskan trigger saat menekan tombol edit
	// Di dalam trigger tersebut, tambahkan API untuk meload data 1 jadwal
</script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function removeRow(id) {
    if (confirm('Are you sure you want to delete this record?')) {
        document.getElementById('deleteForm' + id).submit();
    }
}
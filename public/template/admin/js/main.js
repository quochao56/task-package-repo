$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function removeRow(id, url) {
    if (confirm("Are you sure want to delete this record?")) {
        $.ajax({
            type: 'DELETE',
            datetype: 'JSON',
            data: { id },
            url: url,
            success: function(result) {
                if (result.error === false) {
                    alert(result.message)
                    location.reload();
                } else {
                    alert('Try again!')
                }
            }
        })
    }
}
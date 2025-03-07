$(document).ready(function() {
    $('#add-to-calendar').on('click', function() {
        let taskId = $(this).data('task-id');

        $.ajax({
            url: '/api/google/create/event',
            method: 'POST',
            data: JSON.stringify({
                id: taskId,
            }),
            success: function(response) {
                alert(response.message);
            },
            error: function(err) {
                console.log(err);
                alert('Wystąpił błąd podczas generowania linku.');
            }
        });
    });
});

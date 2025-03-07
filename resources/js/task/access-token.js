$(document).ready(function() {
    const $generateLinkButton = $('#generate-link');
    const $accessLink = $('#access-link');
    const $accessLinkContainer = $('#access-link-container');

    $generateLinkButton.on('click', function() {
        let taskId = $generateLinkButton.data('task-id');

        $.ajax({
            url: '/api/task/generate/access/link',
            method: 'POST',
            data: JSON.stringify({
                id: taskId,
            }),
            success: function(response) {
                if (response.access_link) {
                    const link = response.access_link;
                    $accessLink.attr('href', link).text(link);
                    $accessLinkContainer.removeClass('hidden');
                } else {
                    alert('Wystąpił problem z generowaniem linku.');
                }
            },
            error: function() {
                alert('Wystąpił błąd podczas generowania linku.');
            }
        });
    });
});

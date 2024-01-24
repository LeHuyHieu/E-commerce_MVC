$(document).ready(function () {
    $('.single-select').select2({
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),
    });

    $('.btn-delete-item').click(function (e) {
        e.preventDefault();
        let link = $(this).attr('href');
        $.confirm({
            theme: 'bootstrap',
            title: 'Confirm delete!',
            content: 'Simple confirm!',
            buttons: {
                delete: {
                    text: 'Delete',
                    btnClass: 'btn-danger',
                    action: function () {
                        window.location.href = link
                    }
                },
                cancel: {
                    text: 'Cancel',
                    btnClass: 'btn-secondary',
                }
            }
        });
    })
})
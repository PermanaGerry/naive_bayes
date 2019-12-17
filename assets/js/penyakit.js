$(document).ready(function () {
    // function global
    function reset_form() {
        var form = $("form[name='form_penyakit']");

        form.validate().resetForm();

        form.trigger("reset");
        form.find('.error').removeClass("error");
        form.find('.error').removeClass("success");
        form.find('label').attr('style', 'color:#333;');
        form.find('.form-control-feedback').remove()
    }

    $('#example2').DataTable({
        'autoWidth': false
    });

    $('#example2_filter').addClass('text-right');

    $('.create').on('click', function () {
        reset_form();

        $('#modal-penyakit').modal('show');
        $('#form-penyakit').attr('action', $(this).data('create'));
        $('#form-penyakit').trigger("reset");
        $('#code').attr('disabled', false);
        $('.modal-title').html("Input penyakit");

        // botton
        var button = $('#submit-form');
        button.val('create-field');
    });

    // It has the name penyakite "registration"
    $("form[name='form_penyakit']").validate({
        // Specify validation rules
        rules: {
            // on the right side
            code: {
                required: true,
                digits: true,
                remote: {
                    url: BASE_URL + "penyakit/getcode",
                    type: "GET",
                    data: {
                        username: function () {
                            return $("#code").val();
                        }
                    }
                }
            },
            penyakit: "required"
        },
        // Specify validation error messages
        messages: {
            code: {
                required: "Please enter input code",
                digits: "Please enter input code for digit",
                remote: "The data you input already exists"
            },
            penyakit: "Please enter input penyakit",
        },
        highlight: function (element) {
            $(element).parent().addClass('text-red')
        },
        unhighlight: function (element) {
            $(element).parent().removeClass('text-red')
        },
        // in the "action" penyakite of the form when valid
        submitHandler: function (form) {
            form.submit();
        }
    });
});
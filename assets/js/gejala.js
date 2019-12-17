$(document).ready(function () {
    // function global
    function reset_form() {
        var form = $("form[name='form_gejala']");

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

        $('#modal-gejala').modal('show');
        $('#form-gejala').attr('action', $(this).data('create'));
        $('#form-gejala').trigger("reset");
        $('#code').attr('disabled', false);
        $('.modal-title').html("Input gejala");

        // botton
        var button = $('#submit-form');
        button.val('create-field');
    });

    /** update field */
    $('.update').on('click', function () {
        event.preventDefault();

        $("form[name='form_gejala']").attr('action', $(this).data('updateurl'));

        $.get($(this).data('updateget'), function (data) {
            reset_form();

            $('#code').attr('disabled', true);
            $('.modal-title').html("Edit gejala");
            $('#modal-gejala').modal('show');

            // button
            var button = $('#submit-form');
            button.val('update-field');

            /** variabel input */
            $('#id').val(data.id);
            $('#code').val(data.code);
            $('#gejala').val(data.nama_gejala);
        });

    });

    // It has the name gejalae "registration"
    $("form[name='form_gejala']").validate({
        // Specify validation rules
        rules: {
            // on the right side
            code: {
                required: true,
                digits: true,
                remote: {
                    url: BASE_URL + "gejala/getcode",
                    type: "GET",
                    data: {
                        username: function () {
                            return $("#code").val();
                        }
                    }
                }
            },
            gejala: "required"
        },
        // Specify validation error messages
        messages: {
            code: {
                required: "Please enter input code",
                digits: "Please enter input code for digit",
                remote: "The data you input already exists"
            },
            gejala: "Please enter input gejala",
        },
        highlight: function (element) {
            $(element).parent().addClass('text-red')
        },
        unhighlight: function (element) {
            $(element).parent().removeClass('text-red')
        },
        // in the "action" gejalae of the form when valid
        submitHandler: function (form) {
            form.submit();
        }
    });
});
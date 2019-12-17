$(document).ready(function () {
  // function global
  function reset_form() {
    var form = $("form[name='form_penyebab']");

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

    $('#modal-penyebab').modal('show');
    $('#form-penyebab').attr('action', $(this).data('create'));
    $('#form-penyebab').trigger("reset");
    $('#code').attr('disabled', false);
    $('.modal-title').html("Input penyebab");

    // botton
    var button = $('#submit-form');
    button.val('create-field');
  });

  /** update field */
  $('.update').on('click', function () {
    event.preventDefault();

    $("form[name='form_penyebab']").attr('action', $(this).data('updateurl'));

    $.get($(this).data('updateget'), function (data) {
      reset_form();

      $('#code').attr('disabled', true);
      $('.modal-title').html("Edit penyebab");
      $('#modal-penyebab').modal('show');

      // button
      var button = $('#submit-form');
      button.val('update-field');

      /** variabel input */
      $('#id').val(data.id);
      $('#code').val(data.code);
      $('#penyebab').val(data.nama_penyebab);
    });

  });

  // It has the name penyebabe "registration"
  $("form[name='form_penyebab']").validate({
    // Specify validation rules
    rules: {
      // on the right side
      code: {
        required: true,
        digits: true,
        remote: {
          url: BASE_URL + "penyebab/getcode",
          type: "GET",
          data: {
            username: function () {
              return $("#code").val();
            }
          }
        }
      },
      penyebab: "required"

    },
    // Specify validation error messages
    messages: {
      code: {
        required: "Please enter input code",
        digits: "Please enter input code for digit",
        remote: "The data you input already exists"
      },
      penyebab: "Please enter input penyebab",
    },
    highlight: function (element) {
      $(element).parent().addClass('text-red')
    },
    unhighlight: function (element) {
      $(element).parent().removeClass('text-red')
    },
    // in the "action" penyebabe of the form when valid
    submitHandler: function (form) {
      form.submit();
    }
  });
});
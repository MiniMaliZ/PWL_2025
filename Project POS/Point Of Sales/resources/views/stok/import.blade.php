<form action="{{ url('/stok/import_ajax') }}" method="POST" id="form-import" enctype="multipart/form-data">
    @csrf
    <div id="modal-master" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Data Stok</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Download Template</label>
                    <a href="{{ asset('template_stok.xlsx') }}" class="btn btn-info btn-sm" download><i
                            class="fa fa-file-excel"></i>Download</a>
                    <small class="form-text text-muted">
                        Format: barang_id | stok_tanggal (YYYY-MM-DD) | stok_jumlah | user_id
                    </small>
                </div>
                <div class="form-group">
                    <label>Pilih File</label>
                    <input type="file" name="file_stok" id="file_stok" class="form-control" required>
                    <small id="error-file_stok" class="error-text form-text text-danger"></small>
                </div>
                <div id="import-errors" class="mt-3" style="display: none;">
                    <div class="alert alert-danger">
                        <h6>Error dalam proses import:</h6>
                        <ul id="error-list"></ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-warning">Batal</button>
                <button type="submit" class="btn btn-primary">Upload</button>
            </div>
        </div>
    </div>
</form>
<script>
    $(document).ready(function() {
        $("#form-import").validate({
            rules: {
                file_stok: {
                    required: true,
                    extension: "xlsx"
                },
            },
            submitHandler: function(form) {
                var formData = new FormData(form);

                $.ajax({
                    url: form.action,
                    type: form.method,
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    success: function(response) {
                        if (response.status) {
                            $('#myModal').modal('hide');
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.message
                            });
                            tableStok.ajax.reload();
                        } else {
                            $('.error-text').text('');

                            if (response.msgField) {
                                $.each(response.msgField, function(prefix, val) {
                                    $('#error-' + prefix).text(val[0]);
                                });
                            }

                            // Handle detailed validation errors for the import data
                            if (response.errors && response.errors.length > 0) {
                                $('#error-list').empty();
                                $.each(response.errors, function(index, error) {
                                    $('#error-list').append('<li>' + error +
                                        '</li>');
                                });
                                $('#import-errors').show();
                            } else {
                                $('#import-errors').hide();
                            }

                            Swal.fire({
                                icon: 'error',
                                title: 'Terjadi Kesalahan',
                                text: response.message
                            });
                        }
                    }
                });
                return false;
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>
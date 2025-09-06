@extends('ADMIN.layouts.app')

@section('title', 'User')

@push('styles')
<!-- DataTables -->
<link href="{{ asset('admin_assets') }}/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css"
    rel="stylesheet" type="text/css" />
<link href="{{ asset('admin_assets') }}/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css"
    rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="{{ asset('admin_assets') }}/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"
    rel="stylesheet" type="text/css" />

<!-- Toast -->
<link rel="stylesheet" type="text/css" href="{{ asset('admin_assets') }}/libs/toastr/build/toastr.min.css">

<!-- Sweet Alert-->
<link href="{{ asset('admin_assets') }}/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="{{ asset('admin_assets') }}/libs/select2/css/select2.min.css">
<style>
    .dt-buttons {
        margin-bottom: 20px !important;
    }
    .add-btn {
        float: right;
    }
    #datatable-buttons_length {
        position: absolute;
    }
    .toast {
        opacity: 1 !important;
    }

    #toast-container > div {
        opacity: 1 !important; 
    }

    .label-success {
        background-color: #19c241;
        padding: 5px 10px 5px 10px;
        border-radius: 10px;
        color: white;
    }

    .label-default {
        background-color: #bfbfbf;
        padding: 5px 10px 5px 10px;
        border-radius: 10px;
        color: white;
    }
    .select2-selection__rendered {
        line-height: 31px !important;
    }
    .select2-container .select2-selection--single {
        height: 35px !important;
    }
    .select2-selection__arrow {
        height: 34px !important;
    }
</style>
@endpush

@section('content')
<div class="main-content">

<div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">User</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Users ></a></li>
                                <li class="breadcrumb-item active">User</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <button type="button" class="btn btn-primary waves-effect waves-light add-btn" onclick="addForm()">
                                <i class="bx bx-plus font-size-16 align-middle me-2"></i> Tambah
                            </button><br><br><br>

                            <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <!-- Static Backdrop Modal -->
    <div class="modal fade modalForm" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="custom-validation" id="form_insert">
                    <div class="modal-body">
                    <div class="mb-3">
                            <label class="form-label">Nama</label> <span class="required"> *</span>
                            <input type="text" name="name" class="form-control" required placeholder="Nama" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Username</label> <span class="required"> *</span>
                            <input type="text" name="username" class="form-control" required placeholder="Username" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Role</label>&nbsp;<span class="required"> *</span><br> 
                            <select class="form-control roles_id" style="width: 100%;" name="roles_id" id="roles_id" required>
                                <option value="">Pilih Role</option>
                                @forelse($user_role as $ur)
                                    <option value="{!! $ur->id !!}">{!! $ur->name !!}</option>
                                @empty
                                    <option value="">Tidak terdapat user role</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label> <span class="required req-pass"> *</span>
                            <input class="form-control" type="password" id="password" name="password" placeholder="Password" minlength="8">
                        </div>
                        
                    </div>
                    <div class="modal-footer justify-content-between">
                        <div> <i>Kolom dengan simbol Asterisk (*) harus diisi</i> </div>
                        <div>
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                            <input type="submit" class="btn btn-primary btn-simpan" value="Simpan">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- start: footer -->
    @include('ADMIN/layouts/footer')
    <!-- end: footer -->

</div>
@endsection

@push('scripts')
<!-- Required datatable js -->
<script src="{{ asset('admin_assets') }}/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('admin_assets') }}/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

<!-- Buttons examples -->
<script src="{{ asset('admin_assets') }}/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('admin_assets') }}/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js">
</script>
<script src="{{ asset('admin_assets') }}/libs/jszip/jszip.min.js"></script>
<script src="{{ asset('admin_assets') }}/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="{{ asset('admin_assets') }}/libs/pdfmake/build/vfs_fonts.js"></script>

<!-- Responsive examples -->
<script src="{{ asset('admin_assets') }}/libs/datatables.net-responsive/js/dataTables.responsive.min.js">
</script>
<script src="{{ asset('admin_assets') }}/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js">
</script>

<script src="{{ asset('admin_assets') }}/libs/parsleyjs/parsley.min.js"></script>
<script src="{{ asset('admin_assets') }}/js/pages/form-validation.init.js"></script>

<!-- toastr plugin -->
<script src="{{ asset('admin_assets') }}/libs/toastr/build/toastr.min.js"></script>

<!-- Sweet Alerts js -->
<script src="{{ asset('admin_assets') }}/libs/sweetalert2/sweetalert2.min.js"></script>

<script src="{{ asset('admin_assets') }}/libs/select2/js/select2.min.js"></script>

<script type="text/javascript">
    var formModal = $('.modalForm');
    var toastTitle = '';
    var table = null;
    var styles = {
        button: function (row, type, data) {
            return '<div class="btn-group" role="group" aria-label="action">' +
                '<a class="btn btn-primary btn-sm" href="#" data-bs-original-title="" role="modal" onclick="getData(' + data.id + ')" title="Ubah"><i class="fas fa-pencil-alt"></i></a>&nbsp;' +
                '<a data-turbolinks="false" class="btn btn-secondary btn-sm" href="#" data-bs-original-title="" onclick="deleteData(' + data.id + ')" title="Hapus" ><i class="fas fa-trash"></i></a>' +
                '</div>'
        },
        status: function (row, type, data) {
            if (data.email_verfiication_status == 1) {
                return '<span class="label label-success">Veerified</span>'
            } else {
                return '<span class="label label-default">Not Verified</span>'
            }
        }
    }

    $(".roles_id").select2({
        dropdownParent: $(".modalForm"),
        placeholder: 'Pilih Role'
    });

    var addForm = function () {
        method = 'POST'
        formAction = '{!! route('admin.user.create') !!}'
        resetForm()
        toastTitle = "Tambah Data User";
        $('.modal-title').text('Tambah Data User')
        formModal.modal('show')
        $('.req-pass').show();
        document.getElementById("password").required = true;
    }

    var resetForm = function () {
        $('[name="name"]').val('');
        $('[name="username"]').val('');
        $('[name="email"]').val('');
        $("#roles_id").select2('val', 'All');
        $('[name="password"]').val('');
        loadingDone();

        // reset parsley html5 validation error
        $('.form-control').removeClass('parsley-error')
        $('.parsley-errors-list').removeClass('filled')
    }

    var loading = function () {
        $('.btn-simpan').attr('disabled', 'disabled')
        $('.btn-simpan').val('Menyimpan data...')
    }

    var loadingDone = function (response) {
        $('.btn-simpan').removeAttr('disabled')
        $('.btn-simpan').val('Simpan')
    }

    var done = function (response) {
        formModal.modal('hide')
        table.draw()
    }

    $(document).ready(function () {

        // Datatables
        $(function () {

            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": 300,
                "hideDuration": 500,
                "timeOut": 3000,
                "extendedTimeOut": 1000,
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }

            var dataTableURL = '/admin/user/datatables'
            table = $("#datatable-buttons").DataTable({
                processing: true,
                serverSide: true,
                stateSave: true,
                responsive: false,
                scrollX: true,
                orderCellsTop: true,
                pagingType: "full_numbers",
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Cari...",
                },
                ajax: {
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    url: dataTableURL,
                    type: 'POST',
                },
                columns: [
                    {
                        data: 'DT_RowIndex',
                        orderable: false
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'username'
                    },
                    {
                        data: 'email'
                    },
                    {
                        data: 'role.name'
                    },
                    {
                        data: 'is_active',
                        orderable: false,
                        sClass: "text-center",
                        render: styles.status
                    },
                    {
                        data: 'id',
                        orderable: false,
                        sClass: "text-center",
                        render: styles.button
                    }
                ]
            });

        })
    });

    $("#form_insert").submit(function (e) {
        e.preventDefault();
        
        if (method == 'POST') {
            var get_pasword = $('[name="password"]').val();
            if (get_pasword.length < 8) {
                return false;
            }
        }
        
        var getEmail = document.getElementById("email");
        var getEmailVal = $('[name="email"]').val();
        var regexEmail = /\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/;

        if (getEmailVal != '') {
            if (!regexEmail.test(getEmail.value)) {
                return false;
            }
        }
        
        var isInvalidEmail = getEmail.classList.contains("parsley-error");
        if (isInvalidEmail == true) {
            return false;
        }

        var sendData = $("#form_insert").serialize();
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
            },
            url: formAction,
            method: method,
            data: sendData,
            dataType: 'json',
            beforeSend: function () {
                loading()
            },
            success: function (response) {
                loadingDone()
                if (response.status == 202) {
                    toastr["success"](toastTitle, "Berhasil!")
                    done(response)
                } else {
                    toastr["error"](response.msg, "Gagal!")
                }
            },
            error: function (response) {
                toastr["error"](toastTitle, "Gagal!")
                loadingDone()
            },
            complete: function (response) {}
        });
    });


    // Get
    var getData = function (id) {
        $.ajax({
            url: '/admin/user/' + id + '/get',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            type: 'GET',
            data: {
                id: id
            },
            dataType: 'json',
            beforeSend: function () {
                loading()
            },
            success: function (resp) {
                formAction = '/admin/user/' + id + '/update'
                method = 'PUT'
                var data = resp.data

                // Reset
                resetForm()
                $('.req-pass').hide();
                document.getElementById("password").required = false;

                // Fill Form
                toastTitle = "Ubah Data User";
                $('[name="name"]').val(data.name)
                $('[name="username"]').val(data.username)
                $('[name="email"]').val(data.email);
                $("#roles_id").val(data.roles_id).trigger('change.select2');

                $('.modal-title').text('Ubah Data User')
                formModal.modal('show')
            },
            error: function (resp) {
                loadingDone(resp)
                formModal.modal('hide')
                error(resp)
            }
        })
    }

    var deleteData = function (id) {
        toastTitle = "Hapus Data User"
        var formAction = "{{ route('admin.user.destroy') }}"
        Swal.fire({
            title: "Apa Anda yakin?",
            text: "Data akan dihapus dan tidak bisa dikembalikan.",
            icon: "warning",
            showCancelButton: true,
            showConfirmButton: true,
            cancelButtonText: "Batal",
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Hapus",
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: formAction,
                    type: "delete",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 202) {
                            toastr["success"](toastTitle, "Berhasil!")
                            table.draw()
                        } else {
                            toastr["error"](toastTitle, "Gagal!")
                        }
                    },
                    error: function (response) {
                        toastr["error"](toastTitle, "Gagal!")
                    }
                })
            } else {
                Swal.fire({
                    title: "Batal",
                    text: "Proses penghapusan data dibatalkan.",
                    icon: "error",
                    timer: 1500
                })
            }
        })
    }
</script>

@endpush

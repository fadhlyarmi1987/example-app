<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - CV NATUSI</title>
    <link rel="stylesheet" href="{{ asset('css/datakaryawan.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


</head>

<body>
    <header class="header-bar">
        <div class="logo">
            <img src="{{ asset('IMG/LOGO NATUSI.png') }}" alt="logoatas" class="logo-atas">
        </div>
        {{-- <h3> CV.NATUSI </h3>  --}}
    </header>
    <div class="main-container">
        <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-light" style="width: 280px; height:100vh">
            <a href="" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <svg class="bi pe-none me-2" width="40" height="32">
                    <use xlink:href="#bootstrap"></use>
                </svg>
                <img style="width: 100%" src="{{ asset('IMG/LOGO.png') }}" alt="">
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="karyawan" class="nav-link active" text-black aria-current="page">
                        <svg class="bi pe-none me-2" width="16" height="16">
                            <use xlink:href="karyawan"></use>
                        </svg>
                        Data Karyawan
                    </a>
                </li>
                <li>
                    <a href="magang" class="nav-link text-black">
                        <svg class="bi pe-none me-2" width="16" height="16">
                            <use xlink:href="magang"></use>
                        </svg>
                        Data Magang
                    </a>
                </li>
                <li>
                    <a href="absen" class="nav-link text-black">
                        <svg class="bi pe-none me-2" width="16" height="16">
                            <use xlink:href="absen"></use>
                        </svg>
                        List Absensi
                    </a>
                    <a href="notif" class="nav-link text-black">
                        <svg class="bi pe-none me-2" width="16" height="16">
                            <use xlink:href="notif"></use>
                        </svg>
                        Notifikasi
                    </a>
                </li>
                <li>
                    <a href="tugas" class="nav-link text-black">
                        <svg class="bi pe-none me-2" width="16" height="16">
                            <use xlink:href="tugas"></use>
                        </svg>
                        Tugas
                    </a>
                </li>

            </ul>
            <hr>

            <a href="login" class="nav-link text-black">
                <img src="{{ asset('IMG/UltramanNeos_07.png') }}" alt="" width="32" height="32" class="rounded-circle me-2">
                <strong>Keluar</strong>
            </a>

        </div>

        <div class="main-content">
            <div class="header">
                <h1>LIST DATA KARYAWAN</h1>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-info" type="submit">Search</button>
                </form>
            </div>

            <div class="content">
                <div class="card">
                    <div class="card-header">
                        <h2>Data Karyawan</h2>
                    </div>
                    <div class="card-body">
    <table class="table table-striped" id="karyawanTable">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jabatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
                </div>
            </div>
        </div>

        <!-- Edit Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Data Karyawan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editForm">
                            <input type="hidden" id="editId">
                            <div class="mb-3">
                                <label for="editNama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="editNama" required>
                            </div>
                            <div class="mb-3">
                                <label for="editEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="editEmail" required>
                            </div>
                            <div class="mb-3">
                                <label for="editJabatan" class="form-label">Jabatan</label>
                                <input type="text" class="form-control" id="editJabatan" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Hapus Modal -->
        <div class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="hapusModalLabel">Hapus Data Karyawan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Anda yakin ingin menghapus data karyawan ini?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger" id="hapusBtn">Hapus</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-..." crossorigin="anonymous"></script>

    <script>
    $(document).ready(function() {
        // Fungsi untuk mengambil data dari API dan mengisi tabel
        function fetchData() {
            $.ajax({
                url: 'http://127.0.0.1:8000/api/users', // Ganti dengan endpoint API Anda
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    var tableBody = $('#karyawanTable tbody');
                    tableBody.empty(); // Hapus baris tabel yang ada

                    $.each(data, function(index, karyawan) {
                        var row = $('<tr></tr>');
                        row.append('<td>' + (index + 1) + '</td>');
                        row.append('<td>' + karyawan.name + '</td>');
                        row.append('<td>' + karyawan.email + '</td>');
                        row.append('<td>' + karyawan.user_type + '</td>');
                        row.append('<td>' +
                            '<button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#editModal" data-id="' + karyawan.id + '"><i class="fas fa-edit"></i> Edit</button> ' +
                            '<button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal" data-id="' + karyawan.id + '"><i class="fas fa-trash-alt"></i> Hapus</button>' +
                            '</td>');

                        tableBody.append(row);
                    });
                },
                error: function() {
                    alert('Gagal mengambil data.');
                }
            });
        }

        // Panggil fetchData saat halaman dimuat
        fetchData();

        $('#editModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var modal = $(this);

        $.ajax({
            url: 'http://127.0.0.1:8000/api/users' + id,
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                modal.find('#editNama').val(data.nama);
                modal.find('#editEmail').val(data.email);
                modal.find('#editJabatan').val(data.jabatan);
                modal.find('#editId').val(data.id);
            },
            error: function() {
                alert('Gagal mengambil data karyawan.');
            }
        });
    });

    $('#editForm').submit(function(event) {
        event.preventDefault();
        var id = $('#editId').val();
        var nama = $('#editNama').val();
        var email = $('#editEmail').val();
        var jabatan = $('#editJabatan').val();

        $.ajax({
            url: 'http://127.0.0.1:8000/api/users' + id,
            method: 'PUT',
            data: {
                nama: nama,
                email: email,
                jabatan: jabatan
            },
            success: function() {
                $('#editModal').modal('hide');
                fetchData(); 
            },
            error: function() {
                alert('Gagal memperbarui data.');
            }
        });
    });

    // Kode untuk menangani modal hapus
    $('#hapusModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        $(this).find('#hapusBtn').data('id', id);
    });

    $('#hapusBtn').click(function() {
        var id = $(this).data('id');

        $.ajax({
            url: 'http://127.0.0.1:8000/api/users' + id,
            method: 'DELETE',
            success: function() {
                $('#hapusModal').modal('hide');
                fetchData(); // Refresh data setelah menghapus
            },
            error: function() {
                alert('Gagal menghapus data.');
            }
        });
    });
});
</script>

</body </html>
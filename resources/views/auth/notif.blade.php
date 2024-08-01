<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - CV NATUSI</title>
    <link rel="stylesheet" href="{{ asset('css/datamagang1.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
        .main-container {
            display: flex;
        }

        .sidebar {
            width: 280px;
        }

        .content-container {
            flex-grow: 1;
            padding: 20px;
        }

        .content {
            width: 100%;
            margin-top: 40px;
            /* margin-left: 25px; */
        }

        .content h2 {
            font-size: 35px;
            font-family: 'Times New Roman', Times, serif;
            font-weight: 1000;
            margin: 0;
            color: #000000
        }

        .header-bar {
            background: linear-gradient(to bottom, #5292C1, #27455B);
            /* Perbaiki warna latar belakang */
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
        }

        .header-bar .logo-atas {
            max-width: 30px;
            /* Atur ukuran maksimum gambar logo */
            height: auto;
            /* Pertahankan rasio aspek gambar */
        }

        .card {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 20px;
        }

        .card-header {
            background-color: #f8f9fa;
            padding: 10px 15px;
            border-bottom: 1px solid #ccc;
        }

        .card-header h2 {
            margin: 0;
        }

        .card-body {
            padding: 15px;
        }

        /* Table Styles */
        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 8px 15px;
            border: 1px solid #ccc;
        }

        .table th {
            background-color: #f8f9fa;
            text-align: left;
        }

        .table tbody tr:nth-child(odd) {
            background-color: #fff;
        }

        /* Button Styles */
        .btn {
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn.btn-sm {
            padding: 3px 5px;
            font-size: 12px;
        }

        .btn-info {
            background-color: #28a745;
            color: #fff;
        }

        .btn-danger {
            background-color: #dc3545;
            color: #fff;
        }

        .main-content {
            flex: 1;
            padding: 20px;
            background: linear-gradient(to right, #5292C1, #27455B);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 40px;
            font-family: 'Times New Roman', Times, serif;
            font-weight: 1000;
            margin: 0;
            color: #fff
        }
    </style>

</head>

<body>
    <header class="header-bar">
        <div class="logo">
            <img src="{{ asset('IMG/LOGO NATUSI.png') }}" alt="logoatas" class="logo-atas">
        </div>
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
                    <a href="karyawan" class="nav-link text-black" text-black aria-current="page">
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
                </li>
                <a href="notif" class="nav-link active">
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
                <img src="{{ asset('IMG/UltramanNeos_07.png') }}" alt="" width="32" height="32"
                    class="rounded-circle me-2">
                <strong>Keluar</strong>
            </a>

        </div>

        <div class="main-content">
            <div class="header">
                <h1>NOTIFICATION</h1>
                {{-- <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-info" type="submit">Search</button>
                </form> --}}
            </div>


            @csrf
            <div class="mb-3">
                {{-- <label for="pengumuman" class="form-label"></label> --}}
                <textarea class="form-control" id="pengumuman" name="pengumuman" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-info">Upload</button>


            <div class="content">
                <div class="card">
                    <div class="card-header">
                        <h2>ANNOUNCEMENT</h2>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pengumuman</th>
                                    <th>Tanggal Unggah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="fileTableBody">
                                <!-- Contoh data, nanti bisa diganti dengan data dinamis dari server -->
                                <tr>
                                    <td>1</td>
                                    <td>Hari Senin Jam 10:00 WIB Kita akan mengadakan rapat bulanan</td>
                                    <td>25 Juli 2024</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-info edit-btn" data-id="1"><i
                                                class="fas fa-edit"></i> Edit</button>
                                        <button type="button" class="btn btn-sm btn-danger delete-btn"
                                            data-id="1"><i class="fas fa-trash-alt"></i> Hapus</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Deadline pengerjaan web untuk dinas lingkungan hidup mojokerto hari jum at
                                        tanggal 2 agustus 2024</td>
                                    <td>29 Juli 2024</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-info edit-btn" data-id="1"><i
                                                class="fas fa-edit"></i> Edit</button>
                                        <button type="button" class="btn btn-sm btn-danger delete-btn"
                                            data-id="1"><i class="fas fa-trash-alt"></i> Hapus</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Edit -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Pengumuman</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <form id="editForm">
                        <div class="modal-body">
                            <input type="hidden" id="editId">
                            <div class="form-group">
                                <label for="editText">Pengumuman</label>
                                <textarea class="form-control" id="editText" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="editDate">Tanggal Unggah</label>
                                <input type="date" class="form-control" id="editDate">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Hapus -->
        <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="hapusModalLabel">Konfirmasi Hapus</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda yakin ingin menghapus pengumuman ini?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger" id="confirmDelete">Hapus</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery and Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <!-- Font Awesome -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>

        <script>
            $(document).ready(function() {
                let currentEditId;

                // Handle Edit button click
                $('.edit-btn').on('click', function() {
                    currentEditId = $(this).data('id');
                    let row = $(this).closest('tr');
                    let announcement = row.find('td').eq(1).text();
                    let date = row.find('td').eq(2).text();

                    $('#editId').val(currentEditId);
                    $('#editText').val(announcement);
                    $('#editDate').val(date);

                    $('#editModal').modal('show');
                });

                // Handle Edit form submission
                $('#editForm').on('submit', function(event) {
                    event.preventDefault();
                    let id = $('#editId').val();
                    let announcement = $('#editText').val();
                    let date = $('#editDate').val();

                    // Update the table (in real application, send data to server)
                    let row = $('tr[data-id="' + id + '"]');
                    row.find('td').eq(1).text(announcement);
                    row.find('td').eq(2).text(date);

                    $('#editModal').modal('hide');
                });

                // Handle Delete button click
                $('.delete-btn').on('click', function() {
                    currentEditId = $(this).data('id');
                    $('#hapusModal').modal('show');
                });

                // Handle Delete confirmation
                $('#confirmDelete').on('click', function() {
                    // Delete the row (in real application, send delete request to server)
                    $('tr[data-id="' + currentEditId + '"]').remove();
                    $('#hapusModal').modal('hide');
                });
            });
        </script>
</body>

</html>
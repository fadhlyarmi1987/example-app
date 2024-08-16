<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - CV NATUSI</title>
    <link rel="stylesheet" href="{{ asset('CSS/datakaryawan1.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <style>
        .main-container {
            display: flex;
        }

        .sidebar {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            width: 280px;
            height: auto;
        }

        .sidebar-content {
            flex-grow: 1;
            min-height: 400px;
        }

        .sidebar-footer {
            margin-top: auto;
            padding-top: 340px;
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
            width: 95%;
            border-collapse: collapse;
            margin-left: 30px;
            margin-top: 30px;
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
            margin-left: 30px;
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
            margin-bottom: 30px;
        }

        /* .header h3 {
            font-size: 40px;
            font-family: 'Times New Roman', Times, serif;
            font-weight: 1000;
            margin: 50%;
            color: #fff
        } */

        .header h1 {
            font-size: 40px;
            font-family: 'Times New Roman', Times, serif;
            font-weight: 1000;
            margin: 0;
            color: #fff
        }

        .content h2 {
            font-size: 30px;
            font-family: 'Times New Roman', Times, serif;
            font-weight: 1000;
            margin: 0;
            color: #000000
        }

        .btn-custom {
            background-color: #28a745;
            font-family: 'Calibri', Times, serif;
            color: #fff;
            border-radius: 10px;
            margin-right: 30px;
            width: 110px;
            height: 45px;
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
        <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-light sidebar">
            <div class="sidebar-content">
                <a href=""
                    class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
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
                    <a href="notifications" class="nav-link text-black">
                        <svg class="bi pe-none me-2" width="16" height="16">
                            <use xlink:href="notifications"></use>
                        </svg>
                        Notifikasi
                    </a>
                    </li>
                    <li>
                        <a href="tugas" class="nav-link active">
                            <svg class="bi pe-none me-2" width="16" height="16">
                                <use xlink:href="tugas"></use>
                            </svg>
                            Tugas
                        </a>
                    </li>
                </ul>
                <hr>
            </div>
            <div class="sidebar-footer">
                <a href="login" class="nav-link text-black mt-auto">
                    <img src="{{ asset('IMG/UltramanNeos_07.png') }}" alt="" width="32" height="32"
                        class="rounded-circle me-2">
                    <strong>Keluar</strong>
                </a>
            </div>
        </div>



        <div class="main-content">
            <div class="header">
                <h1>UPLOADING TUGAS</h1>
                <form class="d-flex" role="search">
                    <button class="btn btn-outline-secondary btn-custom" type="button" data-bs-toggle="modal"
                        data-bs-target="#uploadModal">Upload</button>
                </form>
            </div>
            <div class="content">
                <div class="card">
                    <div class="card-header">
                        <h2>File yang Telah Diunggah</h2>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama File</th>
                                <th>Tanggal Unggah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="fileTableBody">
                            @foreach ($files as $file)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $file->name }}</td>
                                    <td>{{ $file->created_at }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-info"
                                            onclick="unduhFile('{{ $file->id }}')">Unduh</button>
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal"
                                            onclick="hapusFile('{{ $file->id }}')">Hapus</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Upload -->
    <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-top">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadModalLabel">Upload File</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="uploadForm">
                        <div class="mb-3">
                            <input type="file" class="form-control" id="modalFileInput" aria-label="Upload">
                        </div>
                        <button type="button" class="btn btn-primary" id="modalUploadButton">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Hapus -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-top">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Hapus File</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus file ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">Hapus</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        document.getElementById('modalUploadButton').addEventListener('click', function() {
            const fileInput = document.getElementById('modalFileInput');
            const file = fileInput.files[0];

            if (file) {
                const formData = new FormData();
                formData.append('file', file);

                fetch('/upload', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    }).then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            toastr.success('Data berhasil diunggah');
                            setTimeout(function() {
                                location.reload();
                            }, 1000); // Tunggu 2 detik sebelum reload halaman
                        } else {
                            toastr.error('Terjadi kesalahan saat mengunggah file');
                        }
                    });
            } else {
                toastr.error('Pilih file terlebih dulu');
            }

        });

        function unduhFile(fileId) {
            window.location.href = '/unduh/' + fileId;
        }

        let fileIdToDelete;

        function hapusFile(fileId) {
            fileIdToDelete = fileId;
        }

        document.getElementById('confirmDelete').addEventListener('click', function() {
            if (fileIdToDelete) {
                fetch('/hapus/' + fileIdToDelete, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    }).then(response => response.json()) // Pastikan untuk mengkonversi respons ke JSON
                    .then(data => {
                        if (data.success) {
                            toastr.success('Data berhasil dihapus', {
                                timeOut: 3000, // Menampilkan toastr selama 3 detik
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 1000); // Mengatur delay reload agar sesuai dengan waktu toastr
                        } else {
                            toastr.error('Terjadi kesalahan saat menghapus file');
                        }
                    }).catch(error => {
                        toastr.error('Terjadi kesalahan pada server');
                    });
            }
        });
    </script>

</body>

</html>

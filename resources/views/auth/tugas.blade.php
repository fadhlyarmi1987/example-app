<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - CV NATUSI</title>
    <link rel="stylesheet" href="{{ asset('css/datamagang1.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

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
    </style>
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
                    <a href="notif" class="nav-link text-black">
                        <svg class="bi pe-none me-2" width="16" height="16">
                            <use xlink:href="notif"></use>
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

            <a href="login" class="nav-link text-black">
                <img src="{{ asset('IMG/UltramanNeos_07.png') }}" alt="" width="32" height="32"
                    class="rounded-circle me-2">
                <strong>Keluar</strong>
            </a>

        </div>

        <div class="main-content">
            <div class="header">
                <h1>UPLOADING TUGAS</h1>
                <form class="d-flex" role="search">
                    <input type="file" class="form-control" id="inputGroupFile04"
                        aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                    <button class="btn btn-outline-secondary btn-info " type="button"
                        id="inputGroupFileAddon04">Button</button>
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
                            <!-- Contoh data, nanti bisa diganti dengan data dinamis dari server -->
                            <tr>
                                <td>1</td>
                                <td>tugas1.pdf</td>
                                <td>25 Juli 2024</td>
                                <td>
                                    <button class="btn btn-sm btn-info">Unduh</button>
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>tugas2.docx</td>
                                <td>25 Juli 2024</td>
                                <td>
                                    <button class="btn btn-sm btn-info">Unduh</button>
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('uploadButton').addEventListener('click', function() {
            const fileInput = document.getElementById('inputGroupFile04');
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
                            alert('File berhasil diunggah');
                            loadFileList();
                        } else {
                            alert('Terjadi kesalahan saat mengunggah file');
                        }
                    });
            } else {
                alert('Pilih file terlebih dahulu.');
            }
        });

        function unduhFile(fileName) {
            window.location.href = '/unduh/' + fileName;
        }

        function hapusFile(fileName) {
            if (confirm('Apakah Anda yakin ingin menghapus file ini?')) {
                fetch('/hapus/' + fileName, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                }).then(response => {
                    if (response.ok) {
                        alert('File berhasil dihapus');
                        loadFileList();
                    } else {
                        alert('Terjadi kesalahan saat menghapus file');
                    }
                });
            }
        }

        function loadFileList() {
            fetch('/file-list')
                .then(response => response.json())
                .then(data => {
                    const tbody = document.getElementById('fileTableBody');
                    tbody.innerHTML = '';

                    data.files.forEach((file, index) => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${index + 1}</td>
                            <td>${file.name}</td>
                            <td>${file.uploaded_at}</td>
                            <td>
                                <button class="btn btn-info btn-sm" onclick="unduhFile('${file.name}')">Unduh</button>
                                <button class="btn btn-danger btn-sm" onclick="hapusFile('${file.name}')">Hapus</button>
                            </td>
                        `;
                        tbody.appendChild(row);
                    });
                });
             }

            // Load file list on page load
            loadFileList();
        </script>
    </body>

</html>

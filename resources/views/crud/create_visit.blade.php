<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Visit</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 30px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }

        .container:hover {
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        }

        h1 {
            color: #d61a1a;
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
        }

        .form-section {
            margin-bottom: 20px;
            padding: 15px;
            border-radius: 8px;
            background-color: #f3f4f6;
        }

        h2 {
            color: #d61a1a;
            margin-bottom: 15px;
            font-size: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }

        input[type="text"],
        input[type="date"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="date"]:focus,
        select:focus {
            border-color: #d61a1a;
            outline: none;
        }

        button {
            background-color: #d61a1a;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
            width: 100%;
            margin-top: 10px;
        }

        button:hover {
            background-color: #b21818;
        }

        .success-message {
            color: #4caf50;
            margin-bottom: 20px;
            font-weight: 500;
            text-align: center;
        }

        .reset-btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
            width: 100%;
        }

        .reset-btn:hover {
            background-color: #0056b3;
        }

        .radio-group {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .radio-group label {
            display: flex;
            align-items: center;
            cursor: pointer;
            position: relative;
            padding-left: 30px;
            margin-right: 20px;
            font-weight: 500;
            color: #333;
        }

        .radio-group input[type="radio"] {
            display: none;
            /* Sembunyikan input radio asli */
        }

        .custom-radio {
            position: absolute;
            top: 50%;
            left: 0;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            border: 2px solid #d61a1a;
            background-color: #fff;
            transform: translateY(-50%);
            transition: background-color 0.3s, transform 0.3s;
        }

        .radio-group input[type="radio"]:checked+label .custom-radio {
            background-color: #d61a1a;
            transform: scale(1.1);
        }

        .radio-group input[type="radio"]:checked+label {
            color: #d61a1a;
        }

        .import-section {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Buat Visit</h1>

        @if(session('success'))
        <p class="success-message">{{ session('success') }}</p>
        @endif

        <div class="form-section">
            <h2>Tambah Data Visit</h2>
            <form action="{{ route('visit.store') }}" method="POST">
                @csrf
                <div>
                    <label for="tanggal_visit">Tanggal Visit:</label>
                    <input type="date" name="tanggal_visit" id="tanggal_visit" required>
                </div>
                <div>
                    <label for="keterangan_visit">Keterangan Visit:</label>
                    <select name="keterangan_visit" id="keterangan_visit" required onchange="updateData()">
                        @foreach($keteranganVisits as $keterangan)
                        <option value="{{ $keterangan->keterangan }}"
                            data-alamat="{{ $keterangan->alamat }}"
                            data-telepon="{{ $keterangan->nomor_telepon }}">
                            {{ $keterangan->keterangan }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="alamat">Alamat:</label>
                    <input type="text" name="alamat" id="alamat" readonly>
                </div>
                <div>
                    <label for="nomor_telepon">Nomor Telepon:</label>
                    <input type="text" name="nomor_telepon" id="nomor_telepon" readonly>
                </div>
                <div>
                    <label for="pic_visit">PIC Pelanggan:</label>
                    <input type="text" name="pic_visit" id="pic_visit" required>
                </div>
                <div>
                    <label for="petugas_visit">Petugas Visit:</label>
                    <input type="text" name="petugas_visit" id="petugas_visit">
                </div>

                <!-- Tambahkan Pilihan Ganda Sudah di Visit -->
                <div>
                    <label for="visit_status">Sudah di Visit?</label>
                    <div class="radio-group">
                        <div>
                            <input type="radio" id="sudah" name="visit_status" value="sudah" required>
                            <label for="sudah">
                                <span class="custom-radio"></span>
                                Sudah
                            </label>
                        </div>
                        <div>
                            <input type="radio" id="belum" name="visit_status" value="belum">
                            <label for="belum">
                                <span class="custom-radio"></span>
                                Belum
                            </label>
                        </div>
                    </div>
                </div>

                <button type="submit">Kirim</button>
            </form>
        </div>

        <form action="{{ route('visit.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="file_excel">Upload File Excel:</label>
                <input type="file" name="file_excel" id="file_excel" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Import Data</button>
        </form>


        <div class="form-section">
            <form action="{{ route('visit.reset') }}" method="POST">
                @csrf
                <button type="submit" class="reset-btn">Reset Semua Data</button>
            </form>
        </div>
    </div>

    <script>
        function updateData() {
            const dropdown = document.getElementById("keterangan_visit");
            const selectedOption = dropdown.options[dropdown.selectedIndex];

            const alamat = selectedOption.getAttribute("data-alamat");
            const telepon = selectedOption.getAttribute("data-telepon");

            document.getElementById("alamat").value = alamat || '';
            document.getElementById("nomor_telepon").value = telepon || '';
        }
    </script>
</body>

</html>
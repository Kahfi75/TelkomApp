<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visit List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1s ease-in-out;
        }

        .button-container {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 20px;
        }

        .button-container a, button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            font-size: 16px;
            text-decoration: none;
            transition: background-color 0.3s ease, transform 0.2s ease;
            margin-right: 10px;
            cursor: pointer; /* Added cursor pointer for button */
        }

        .button-container a:hover, button:hover {
            background-color: #0056b3; /* General hover effect */
        }

        button {
            background-color: #dc3545; /* Red color for reset button */
        }

        button:hover {
            background-color: #c82333; /* Darker red on hover */
        }

        .btn-export {
            background-color: #28a745;
        }

        .btn-export:hover {
            background-color: #218838;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        thead {
            background-color: #007bff;
            color: #fff;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #e0e0e0;
            transition: background-color 0.3s ease;
        }

        .success-message {
            color: #28a745;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Visit List</h1>

        @if(session('success'))
            <p class="success-message">{{ session('success') }}</p>
        @endif

        <div class="button-container">
            <a href="{{ route('visits.export') }}" class="btn-export">Export to Excel</a>
            <a href="{{ route('visit.create') }}">Create New Visit</a>
            <form action="{{ route('visits.reset') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" onclick="return confirm('Are you sure you want to reset all data?');">Reset Data</button>
            </form>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tanggal Visit</th>
                    <th>Keterangan Visit</th>
                    <th>PIC Pelanggan</th>
                    <th>Petugas Visit</th>
                    <th>Nomor Telepon</th>
                    <th>Alamat</th>
                    <th>Status Visit</th> 
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($visits as $visit)
                    <tr>
                        <td>{{ $visit->id }}</td>
                        <td>{{ $visit->tanggal_visit }}</td>
                        <td>{{ $visit->keterangan_visit }}</td>
                        <td>{{ $visit->pic_visit }}</td>
                        <td>{{ $visit->petugas_visit }}</td>
                        <td>{{ $visit->nomor_telepon }}</td>
                        <td>{{ $visit->alamat }}</td>
                        <td>{{ $visit->visit_status }}</td>
                        <td>
                            <a href="{{ route('visit.edit', $visit->id) }}">Edit</a>
                            <form action="{{ route('visit.destroy', $visit->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>

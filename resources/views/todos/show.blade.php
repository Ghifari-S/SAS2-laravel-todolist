<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Detail Todo</title>
    <style>
        body {
            background-color: #1e1e2f;
            color: white;
            font-family: 'Courier New', Courier, monospace;
            padding: 20px;
            max-width: 600px;
            margin: auto;
        }

        h2 {
            color: #ffffff;
            text-align: center;
            margin-bottom: 25px;
        }

        p {
            font-size: 16px;
            margin-bottom: 15px;
            line-height: 1.5;
            color: #b8b8b8
        }

        strong {
            color: #ffffff
        }

        a {
            display: inline-block;
            margin-top: 30px;
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            transition: color 0.3s ease;
            font-family: 'Courier New', Courier, monospace;
        }

        a:hover {
            color: #4c4c4d;
        }
    </style>
</head>
<body>
    <h2>Detail Todo</h2>

    <p><strong>Judul:</strong> {{ $todo->title }}</p>
    <p><strong>Deskripsi:</strong> {{ $todo->description }}</p>
    <p><strong>Status:</strong> {{ $todo->completed ? 'Selesai' : 'Belum Selesai' }}</p>

    <a href="{{ route('todos.index') }}">← Kembali ke daftar todo</a>
</body>
</html>

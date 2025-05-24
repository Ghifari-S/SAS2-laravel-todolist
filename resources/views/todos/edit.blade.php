<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Edit Todo</title>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
              background-color: #1e1e2f;
            color: #fff;
            padding: 20px;
            max-width: 700px;
            margin: auto;
        }

        h2 {
            text-align: center;
            color: #ffffff;
            margin-bottom: 20px;
        }

        form {
            background-color: #000;
            padding: 20px;
            border-radius: 6px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            background-color: #111;
            border: 1px solid #555;
            border-radius: 4px;
            color: white;
            font-family: 'Courier New', Courier, monospace;
            margin-bottom: 15px;
            resize: vertical;
        }


        button {
            background-color: #444;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-family: 'Courier New', Courier, monospace;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #343435;
        }
    </style>
</head>
<body>
    <h2>Edit Todo</h2>
    <form action="{{ route('todos.update', $todo->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="title" value="{{ old('title', $todo->title) }}" required>
        <textarea name="description" rows="4">{{ old('description', $todo->description) }}</textarea>
        <button type="submit">Update</button>
    </form>
</body>
</html>

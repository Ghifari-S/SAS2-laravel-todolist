<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Todo List</title>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
              background-color: #1e1e2f;
            color: #fff;
            padding: 20px;
            max-width: 700px;
            margin: auto;
        }

        h1, header h2 {
            text-align: center;
            color: #ffffff;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #000;
            border: 2px solid #fff;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #fff;
            padding: 10px;
        }

        th {
            background-color: #333;
        }

        tr:nth-child(odd) {
            background-color: #111;
        }

        tr:hover {
            background-color: #444;
        }

        .alert-success {
            background-color: #2e7d32;
            padding: 10px;
            border-radius: 4px;
            color: #fff;
            margin-bottom: 15px;
            font-family: 'Courier New', Courier, monospace;
        }

        .todo-form {
            margin-bottom: 30px;
        }

        .todo-form input,
        .todo-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            background: #111;
            border: 1px solid #555;
            border-radius: 4px;
            color: white;
            font-family: 'Courier New', Courier, monospace;
        }

        .todo-form button {
            background-color: #444;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-family: 'Courier New', Courier, monospace;
        }

        .todo-form button:hover {
            background-color: #343435;
        }

        .todo-list {
            list-style: none;
            padding: 0;
            font-family: 'Courier New', Courier, monospace;
        }

        .todo-list li {
            padding: 10px;
            margin-bottom: 12px;
            background-color: #111;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            border: 0.1px solid #6f6f6f;
        }

        .todo-list li span {
            flex: 1;
        }

        .todo-list li.done span {
            text-decoration: line-through;
            color: #888;
        }

        .inline-form {
            display: inline;
            margin-left: 10px;
        }

        a.btn-primary,
        a.btn-secondary {
            padding: 6px 10px;
            border-radius: 4px;
            text-decoration: none;
            color: white;
            margin-left: 8px;
            display: inline-block;
        }

        a.btn-primary {
            background-color: #444;
        }

        a.btn-primary:hover {
            background-color: #343435;
        }

        a.btn-secondary {
            background-color: #444;
        }

        a.btn-secondary:hover {
            background-color: #343435;
        }

        select {
            background-color: #444;
            color: white;
            border: 1px solid #666;
            padding: 5px;
            border-radius: 4px;
            font-family: 'Courier New', Courier, monospace;
        }

        button {
            padding: 6px 10px;
            margin-left: 8px;
            border-radius: 4px;
            background-color: #e53935;
            color: white;
            border: none;
            cursor: pointer;
            font-family: 'Courier New', Courier, monospace;
        }

        button:hover {
            background-color: #c62828;
        }

        .text-danger {
            color: #ff6b6b;
            font-size: 13px;
            font-family: 'Courier New', Courier, monospace;
        }
    </style>
</head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<body>

    <header>
        <h2>Todo List</h2>
    </header>

    <main>
        {{-- @if (session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif --}}

        <form action="{{ route('todos.store') }}" method="POST" class="todo-form">
            @csrf
            <input type="text" name="title" placeholder="Judul Todo" value="{{ old('title') }}">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <textarea name="description" placeholder="Deskripsi Todo">{{ old('description') }}</textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <button type="submit">Tambah Todo</button>
        </form>

        <ul class="todo-list">
            @foreach ($todos as $todo)
                <li class="{{ $todo->completed ? 'done' : '' }}">
                    <span>{{ $todo->title }} - <em>{{ $todo->completed ? 'Done' : 'Pending' }}</em></span>

                    <a href="{{ route('todos.show', $todo->id) }}" class="btn-secondary">Detail</a>
                    <a href="{{ route('todos.edit', $todo->id) }}" class="btn-primary">Edit</a>

                    <form action="{{ route('todos.updateStatus', $todo->id) }}" method="POST" class="inline-form">
                        @csrf
                        @method('PATCH')
                        <select name="completed" onchange="this.form.submit()">
                            <option value="0" {{ !$todo->completed ? 'selected' : '' }}>Pending</option>
                            <option value="1" {{ $todo->completed ? 'selected' : '' }}>Done</option>
                        </select>
                    </form>

                    <form action="{{ route('todos.destroy', $todo->id) }}" method="POST"
                        onsubmit="return confirm('Yakin mau hapus?');" class="inline-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </main>

</body>

@if(session('success'))
<script>
  document.addEventListener('DOMContentLoaded', function () {
    Swal.fire({
      icon: 'success',
      title: 'Sukses!',
      text: "{{ session('success') }}",
      timer: 2000,
      showConfirmButton: false
    });
  });
</script>
@endif

</html>

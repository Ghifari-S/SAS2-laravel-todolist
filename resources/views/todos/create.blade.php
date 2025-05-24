<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight"
            style="font-family: 'Courier New', Courier, monospace; color:#fff;;">
            Add Todo
        </h2>
    </x-slot>

    <style>
        /* Font dan warna dasar body (kalau mau diaplikasiin di layout utama juga) */
        body,
        .font-mono {
            font-family: 'Courier New', Courier, monospace !important;
              background-color: #1e1e2f;
            color: #fff;
        }

        /* Container form */
        form.bg-white {
            background-color: #000 !important;
            padding: 20px !important;
            border-radius: 6px !important;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
            color: #fff !important;
            max-width: 700px;
            margin: auto;
        }

        label.block {
            font-family: 'Courier New', Courier, monospace !important;
            color: #fff;
            margin-bottom: 8px;
            display: block;
            font-weight: bold;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            background-color: #111 !important;
            border: 1px solid #555 !important;
            border-radius: 4px;
            color: white;
            font-family: 'Courier New', Courier, monospace !important;
            resize: vertical;
        }

        .mt-6 {
            margin-top: 24px !important;
            display: flex;
            align-items: center;
        }

        button {
            background-color: #444;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-family: 'Courier New', Courier, monospace !important;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #343435;
        }

        a.ml-2 {
            margin-left: 8px;
            color: #666;
            font-family: 'Courier New', Courier, monospace !important;
            text-decoration: none;
            align-self: center;
            transition: color 0.3s ease;
        }

        a.ml-2:hover {
            color: #00ffd0;
            text-decoration: underline;
        }
    </style>



    <div class="py-4">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('todos.store') }}" class="bg-white p-6 rounded shadow">
                @csrf

                <div>
                    <label class="block font-medium">Title</label>
                    <input type="text" name="title" required>
                </div>

                <div class="mt-4">
                    <label class="block font-medium">Description</label>
                    <textarea name="description"></textarea>
                </div>

                <div class="mt-6">
                    <button>Save</button>
                    <a href="{{ route('todos.index') }}" class="ml-2">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

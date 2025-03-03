<! DOCTYPE html>
    <html>

    <head>
        <title>Item List</title>
    </head>

    <body>
        <h1>Items</h1>
        @if (session('success'))
            <p>{{ session('success') }}</p>
        @endif
        <a href="{{ route('items.create') }}">Add Item</a> <!-- Link untuk menambahkan item -->
        <ul>
            @foreach ($items as $item)
                <li>
                    <!-- Menampilkan data yang ada di item -->
                    {{ $item->name }} -
                    <a href="{{ route('items.edit', $item) }}">Edit</a> <!-- Link untuk edit item -->
                    <form action="{{ route('items.destroy', $item) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE') <!-- Metode untuk melakukan delete -->
                        <button type="submit">Delete</button> <!-- Tombol untuk delete -->
                    </form>
                </li>
            @endforeach
        </ul>
    </body>

    </html>

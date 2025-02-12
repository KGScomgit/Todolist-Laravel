<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="text-center">To-Do List</h2>

                <form action="{{route('todolist.store')}}" method="POST">
                    @csrf
                    <input type="text" name="title" class="form-control me-2" placeholder="Tambah tugas baru..." required>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>

                <ul class="list-group">
                    @foreach ($todolists as $todolist)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <form action="{{route('todolist.update', $todolist->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="completed" value="{{ $todolist->completed ? 0 : 1 }}">
                                <button type="submit" class="btn btn-sm {{ $todolist->completed ? 'btn-success' : 'btn-outline-secondary' }}">
                                    {{ $todolist->completed ? '✓' : '⏳' }}
                                </button>
                            </form>
                            <span class="{{ $todolist->completed ? 'text-decoration-line-through' : '' }}">
                                {{ $todolist->title }}
                            </span>
                            <form action="/todolists/{{ $todolist->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Музична Колекція - Пісні</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="text-primary">🎵 Музична Колекція</h1>
                    <a href="{{ route('songs.create') }}" class="btn btn-success">➕ Додати пісню</a>
                </div>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Список пісень</h5>
                    </div>
                    <div class="card-body">
                        @forelse($songs as $song)
                            <div class="row mb-3 p-3 border rounded bg-white">
                                <div class="col-md-8">
                                    <h5 class="mb-1">{{ $song->title }}</h5>
                                    <p class="text-muted mb-1">🎤 {{ $song->artist }}</p>
                                    @if($song->album)
                                        <p class="text-muted mb-1">💿 {{ $song->album }}</p>
                                    @endif
                                    <span class="badge bg-primary">{{ $song->genre }}</span>
                                    <small class="text-muted ms-2">{{ gmdate('i:s', $song->duration) }}</small>
                                </div>
                                <div class="col-md-4 text-end">
                                    <a href="{{ route('songs.show', $song) }}" class="btn btn-info btn-sm">👁 Переглянути</a>
                                    <a href="{{ route('songs.edit', $song) }}" class="btn btn-warning btn-sm">✏ Редагувати</a>
                                    <form action="{{ route('songs.destroy', $song) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Ви впевнені, що хочете видалити цю пісню?')">🗑 Видалити</button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-5">
                                <p class="text-muted">🎵 У вашій колекції поки що немає пісень.</p>
                                <a href="{{ route('songs.create') }}" class="btn btn-primary">Додати першу пісню</a>
                            </div>
                        @endforelse

                        {{ $songs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

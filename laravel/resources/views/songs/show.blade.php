<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $song->title }} - Музична Колекція</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">🎵 Деталі пісні</h4>
                        <div>
                            <a href="{{ route('songs.edit', $song) }}" class="btn btn-warning btn-sm">✏ Редагувати</a>
                            <a href="{{ route('songs.index') }}" class="btn btn-secondary btn-sm">⬅ Назад до списку</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if($song->cover_image)
                            <div class="text-center mb-4">
                                <img src="{{ $song->cover_image }}" alt="Обкладинка {{ $song->title }}" class="img-fluid rounded" style="max-width: 300px;">
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-6">
                                <h3>{{ $song->title }}</h3>
                                <p class="text-muted fs-5 mb-1">🎤 <strong>{{ $song->artist }}</strong></p>
                                @if($song->album)
                                    <p class="text-muted mb-1">💿 <strong>{{ $song->album }}</strong></p>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <span class="badge bg-primary fs-6">{{ $song->genre }}</span>
                                </div>
                                <p class="mb-2">⏱ <strong>Тривалість:</strong> {{ gmdate('i:s', $song->duration) }}</p>
                                @if($song->release_date)
                                    <p class="mb-2">📅 <strong>Дата виходу:</strong> {{ $song->release_date->format('d.m.Y') }}</p>
                                @endif
                            </div>
                        </div>

                        @if($song->lyrics)
                            <hr>
                            <h5>📝 Текст пісні</h5>
                            <div class="lyrics-container bg-light p-3 rounded">
                                <pre class="mb-0" style="white-space: pre-wrap; font-family: inherit;">{{ $song->lyrics }}</pre>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

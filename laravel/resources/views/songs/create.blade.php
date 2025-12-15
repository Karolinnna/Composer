<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Додати пісню - Музична Колекція</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">🎵 Додати нову пісню</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('songs.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="title" class="form-label">Назва пісні *</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                       id="title" name="title" value="{{ old('title') }}" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="artist" class="form-label">Виконавець *</label>
                                <input type="text" class="form-control @error('artist') is-invalid @enderror"
                                       id="artist" name="artist" value="{{ old('artist') }}" required>
                                @error('artist')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="album" class="form-label">Альбом</label>
                                <input type="text" class="form-control @error('album') is-invalid @enderror"
                                       id="album" name="album" value="{{ old('album') }}">
                                @error('album')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="genre" class="form-label">Жанр *</label>
                                <select class="form-control @error('genre') is-invalid @enderror"
                                        id="genre" name="genre" required>
                                    <option value="">Оберіть жанр</option>
                                    <option value="Rock" {{ old('genre') == 'Rock' ? 'selected' : '' }}>Rock</option>
                                    <option value="Pop" {{ old('genre') == 'Pop' ? 'selected' : '' }}>Pop</option>
                                    <option value="Jazz" {{ old('genre') == 'Jazz' ? 'selected' : '' }}>Jazz</option>
                                    <option value="Hip-Hop" {{ old('genre') == 'Hip-Hop' ? 'selected' : '' }}>Hip-Hop</option>
                                    <option value="Classical" {{ old('genre') == 'Classical' ? 'selected' : '' }}>Classical</option>
                                    <option value="Electronic" {{ old('genre') == 'Electronic' ? 'selected' : '' }}>Electronic</option>
                                    <option value="Country" {{ old('genre') == 'Country' ? 'selected' : '' }}>Country</option>
                                    <option value="Blues" {{ old('genre') == 'Blues' ? 'selected' : '' }}>Blues</option>
                                </select>
                                @error('genre')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="duration" class="form-label">Тривалість (секунди) *</label>
                                <input type="number" class="form-control @error('duration') is-invalid @enderror"
                                       id="duration" name="duration" value="{{ old('duration') }}" min="1" required>
                                @error('duration')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="release_date" class="form-label">Дата виходу</label>
                                <input type="date" class="form-control @error('release_date') is-invalid @enderror"
                                       id="release_date" name="release_date" value="{{ old('release_date') }}">
                                @error('release_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="lyrics" class="form-label">Текст пісні</label>
                                <textarea class="form-control @error('lyrics') is-invalid @enderror"
                                          id="lyrics" name="lyrics" rows="4">{{ old('lyrics') }}</textarea>
                                @error('lyrics')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="cover_image" class="form-label">URL обкладинки</label>
                                <input type="url" class="form-control @error('cover_image') is-invalid @enderror"
                                       id="cover_image" name="cover_image" value="{{ old('cover_image') }}">
                                @error('cover_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">💾 Зберегти пісню</button>
                                <a href="{{ route('songs.index') }}" class="btn btn-secondary">⬅ Назад</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

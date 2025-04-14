@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Nieuw bericht maken</div>

                    <div class="card-body">
                        <form method="POST" action="/posts">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="title">Titel</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                       id="title" name="title" value="{{ old('title') }}" required>
                                @error('title')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="content">Inhoud</label>
                                <textarea class="form-control @error('content') is-invalid @enderror"
                                          id="content" name="content" rows="5" required>{{ old('content') }}</textarea>
                                @error('content')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Bericht aanmaken</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

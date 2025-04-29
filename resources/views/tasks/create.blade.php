@extends('template')

@section('content')
<div class="card">
    <header class="card-header">
        <p class="card-header-title">Création d'une tâche</p>
    </header>

    <div class="card-content">
        <!-- Affichage des messages de succès -->
        @if (session('success'))
            <div class="notification is-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="content">
            <form action="{{ route('tasks.store') }}" method="POST">
                @csrf
                <div class="field">
                    <label class="label">Titre</label>
                    <div class="control">
                        <input class="input @error('title') is-danger @enderror" type="text" name="title" value="{{ old('title') }}" placeholder="Titre de la tâche">
                    </div>
                    @error('title')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="field">
                    <label class="label">Description</label>
                    <div class="control">
                        <textarea class="textarea @error('description') is-danger @enderror" name="description" placeholder="Description de la tâche">{{ old('description') }}</textarea>
                    </div>
                    @error('description')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="field">
                    <div class="control">
                        <button class="button is-link">Envoyer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

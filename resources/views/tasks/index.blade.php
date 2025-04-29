@extends('template')

@section('content')
    @if(session()->has('info'))
        <div class="notification is-success">
            {{ session('info') }}
        </div>
    @endif

    <div class="card">
        <header class="card-header">
            <p class="card-header-title">Tâches</p>
            <a class="button is-info" href="{{ route('tasks.create') }}">Créer une tâche</a> 
        </header>

        <div class="card-content">
            <div class="content">
                <table class="table is-hoverable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Titre</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>edit</th>
                            <th>delete</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tasks as $task)
                            <tr>
                                <td>{{ $task->id }}</td>
                                <td><strong>{{ $task->title }}</strong></td>
                                <td>{{ $task->description }}</td>
                                <td>
                                    @if($task->is_completed)
                                        <span> Complétée</span>
                                    @else
                                        <span>En attente</span>
                                    @endif
                                </td>
                                <td>


                                    <a class="button is-warning" href="{{ route('tasks.edit', $task->id) }}">Modifier</a>
                                </td>
                                <td>
                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="button is-danger" type="submit">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
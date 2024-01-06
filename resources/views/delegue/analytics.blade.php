@extends('base')
@section('title', 'Analytics')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/analyticsDel.css') }}">
@endsection



@section('content')
    <div class="content">
        <h2>Analytics</h2>

        <table>
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Date</th>
                    <th>Titre séance</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($fiches as $fiche)
                    <tr>
                        <td>{{ $fiche->id }}</td>
                        <td>{{ $fiche->date }}</td>
                        <td>{{ $fiche->titreSeance }}</td>
                        <td class="action-buttons">
                            <button class="action-button" onclick="window.location.href=' '">
                                <i class="fas fa-eye"></i> Voir
                            </button>
                            <button class="action-button" onclick="window.location.href=' '">
                                <i class="fas fa-pencil-alt"></i> Modifier
                            </button>
                            <form action="{{ route('fiche.destroy', $fiche->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-button">
                                    <i class="fas fa-trash-alt"></i> Supprimer
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Aucune fiche disponible</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
@endsection


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
                    <th>Nom</th>
                    <th>Date</th>
                    <th>Voir</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <a href="" class="action-icons eye-icon"><i class="fas fa-eye"></i></a>
                    </td>
                    <td>
                        <a href="" class="action-icons pencil-icon"><i class="fas fa-pencil-alt"></i></a>
                    </td>
                    <td>
                        <form action="" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="action-icons trash-icon"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td colspan="6">Aucune fiche disponible</td>
                </tr>

            </tbody>
        </table>
    </div>
@endsection

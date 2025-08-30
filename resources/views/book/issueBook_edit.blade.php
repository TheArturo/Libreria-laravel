@extends('layouts.app')
@section('content')

    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h2 class="admin-heading">Devolver Libro</h2>
                </div>
            </div>
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <div class="yourform">
                        <table cellpadding="10px" width="90%" style="margin: 0 0 20px;">
                            <tr>
                                <td>Nombre del Estudiante: </td>
                                <td><b>{{ $book->student->name }}</b></td>
                            </tr>
                            <tr>
                                <td>Nombre del Libro : </td>
                                <td><b>{{ $book->book->name }}</b></td>
                            </tr>
                            <tr>
                                <td>Teléfono : </td>
                                <td><b>{{ $book->student->phone }}</b></td>
                            </tr>
                            <tr>
                                <td>Correo electrónico : </td>
                                <td><b>{{ $book->student->email }}</b></td>
                            </tr>
                            <tr>
                                <td>Fecha de Préstamo : </td>
                                <td><b>{{ $book->issue_date->format('d M, Y') }}</b></td>
                            </tr>
                            <tr>
                                <td>Fecha de Devolución : </td>
                                <td><b>{{ $book->return_date->format('d M, Y') }}</b></td>
                            </tr>
                            @if ($book->issue_status == 'Y')
                                <tr>
                                    <td>Estado</td>
                                    <td><b>Devuelto</b></td>
                                </tr>
                                <tr>
                                    <td>Devuelto el</td>
                                    <td><b>{{ $book->return_day->format('d M, Y') }}</b></td>
                                </tr>
                            @else
                                @if (date('Y-m-d') > $book->return_date->format('d-m-Y'))
                                    <tr>
                                        <td>Multa</td>
                                        <td>Rs. {{ $fine }}</td>
                                    </tr>
                                @endif
                            @endif
                        </table>
                        @if ($book->issue_status == 'N')
                            <form action="{{ route('book_issue.update', $book->id) }}" method="post" autocomplete="off">
                                @csrf
                                <input type='submit' class='btn btn-danger' name='save' value='Devolver Libro'>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

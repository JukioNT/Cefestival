@extends('sistema.layout')
@section('body')
    <div class="container">
        <h3>Dança</h3>
        <table>
            <tr>
                <th>Apresentação</th>
                <th>Nota</th>
            </tr>
            @foreach ($table as $item)
                @if ($item->categoria_id == 1)
                    <tr>
                        <td> {{$item->numero}} </td>
                        <td> {{$item->soma_notas}} </td>
                    </tr>
                @endif
            @endforeach
        </table>
        <h3>Canto</h3>
        <table>
            <tr>
                <th>Apresentação</th>
                <th>Nota</th>
            </tr>
            @foreach ($table as $item)
                @if ($item->categoria_id == 2)
                    <tr>
                        <td> {{$item->numero}} </td>
                        <td> {{$item->soma_notas}} </td>
                    </tr>
                @endif
            @endforeach
        </table>
        <h3>Performance Livre</h3>
        <table>
            <tr>
                <th>Apresentação</th>
                <th>Nota</th>
            </tr>
            @foreach ($table as $item)
                @if ($item->categoria_id == 3)
                    <tr>
                        <td> {{$item->numero}} </td>
                        <td> {{$item->soma_notas}} </td>
                    </tr>
                @endif
            @endforeach
        </table>
    </div>
@endsection

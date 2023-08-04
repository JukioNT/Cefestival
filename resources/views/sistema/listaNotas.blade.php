@extends('sistema.layout')
@section('body')
    <div class="container py-5">
        <h3 style="background-color: #fccb96; text-align: center">Dança</h3>
        <table class="table table-striped">
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
        <h3 style="background-color: #96a7fc; text-align: center">Canto</h3>
        <table class="table table-striped">
            <tr>
                <th>Apresentação</th>
                <th>Nota</th>
            </tr>
            <div class="container">
            @foreach ($table as $item)
                @if ($item->categoria_id == 2)
                    <tr>
                        <td> {{$item->numero}} </td>
                        <td> {{$item->soma_notas}} </td>
                    </tr>
                </div>
                @endif
            @endforeach
            </div>
        </table>
        <h3 style="background-color: #99fc96; text-align: center">Performance Livre</h3>
        <table class="table table-striped">
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

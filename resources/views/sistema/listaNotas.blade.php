@extends('sistema.layout')
@section('body')
    <pre>{{print_r($table)}}</pre>
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
                        <?php $sum = 0; ?>
                        
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
            @foreach ($apresentacoes as $item)
                @if ($item['categoria_id'] == 2)
                    <tr>
                        <td> {{$item['numero']}} </td>
                        <?php $sum = 0; ?>
                        @foreach($notas as $nota)
                            @if ($item['id'] == $nota['apresentacao_id'])
                            <?php $sum += $nota['nota']; ?>
                            @endif
                        @endforeach
                        <td>{{$sum}}</td>
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
            @foreach ($apresentacoes as $item)
                @if ($item['categoria_id'] == 3)
                    <tr>
                        <td> {{$item['numero']}} </td>
                        <?php $sum = 0; ?>
                        @foreach($notas as $nota)
                            @if ($item['id'] == $nota['apresentacao_id'])
                            <?php $sum += $nota['nota']; ?>
                            @endif
                        @endforeach
                        <td>{{$sum}}</td>
                    </tr>
                @endif
            @endforeach
        </table>
    </div>
@endsection

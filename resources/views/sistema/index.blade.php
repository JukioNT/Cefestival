@extends('sistema.layout')
@section('body')
    @foreach ($categorias as $item => $value)
        <div class="vstack gap-5 p-4" id="accordion">
            <div class="card">
                <div class="card-header d-flex justify-content-center" id="headingOne">
                    <h5 class="mb-0 d-flex justify-content-center">
                        <button class="btn btn-toggle" data-toggle-bs="collapse" data-element="#collapseOne"
                            aria-expanded="true" aria-controls="collapseOne" onclick="Mudarestado('{{ $value['id'] }}')">
                            <h4>{{ $value['tipo'] }}</h4>
                        </button>
                    </h5>
                </div>

                <div id="{{ $value['id'] }}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <form action="submit-vote.php" method="post">
                            <table>
                                <tr>
                                    <th>Apresentação</th>
                                    <th>{{ $value['categoria1'] }}</th>
                                    <th>{{ $value['categoria2'] }}</th>
                                    <th>{{ $value['categoria3'] }}</th>
                                    <th>{{ $value['categoria4'] }}</th>
                                    <th>{{ $value['categoria5'] }}</th>
                                    <th>Total</th>
                                </tr>
                                @foreach ($apresentacoes as $item => $apresentacao)
                                    <tr>
                                        @if ($value['id'] == $apresentacao['categoria_id'])
                                    <tr>
                                        <td>Apresentação {{ $apresentacao['numero'] }}</td>
                                        <td><input type="number" OnInput="SumNotes(this.id)" required
                                                name="{{ $value['tipo'] . 'categoria1' . $apresentacao['categoria_id'] }}"
                                                size="3" class="{{$apresentacao['numero']}}" id="{{$apresentacao['numero']}}">
                                        </td> 
                                        <td><input type="number" OnInput="SumNotes(this.id)" required
                                                name="{{ $value['tipo'] . 'categoria2' . $apresentacao['categoria_id'] }}"
                                                size="3" class="{{$apresentacao['numero']}}" id="{{$apresentacao['numero']}}">
                                        </td>
                                        <td><input type="number" OnInput="SumNotes(this.id)" required
                                                name="{{ $value['tipo'] . 'categoria3' . $apresentacao['categoria_id'] }}"
                                                size="3" class="{{$apresentacao['numero']}}" id="{{$apresentacao['numero']}}">
                                        </td>
                                        <td><input type="number " OnInput="SumNotes(this.id)" required
                                                name="{{ $value['tipo'] . 'categoria4' . $apresentacao['categoria_id'] }}"
                                                size="3" class="{{$apresentacao['numero']}}" id="{{$apresentacao['numero']}}">
                                        </td>
                                        <td><input type="number" OnInput="SumNotes(this.id)" required
                                                name="{{ $value['tipo'] . 'categoria5' . $apresentacao['categoria_id'] }}"
                                                size="3" class="{{$apresentacao['numero']}}" id="{{$apresentacao['numero']}}">
                                        </td>
                                        <td>
                                            <p><span id="{{$apresentacao['numero']}}sum">0</span></p>
                                        </td>
                                    </tr>
                                @endif
                                </tr>
                                @endforeach
                            </table>
                            <br><br>
                            <input type="submit" value="Enviar Voto">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
@section('script')
    <script>
        function Mudarestado(collapseOne) {
            var display = document.getElementById(collapseOne).style.display;
            if (display == "block")
                document.getElementById(collapseOne).style.display = 'none';
            else
                document.getElementById(collapseOne).style.display = 'block';
        }
        function SumNotes(id) {
            const number = id
            const elements = document.getElementsByClassName(id)
            var sum = 0
            for (var i = 0; i < elements.length; i++){
                if(elements[i].value == null){
                    elements[i].value = 0
                }
                sum += Number(elements[i].value)
            }
            console.log("#"+id+"sum")
            $("#"+id+"sum").text(sum)
        }
    </script>
@endsection

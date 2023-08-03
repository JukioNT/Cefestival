@extends('sistema.layout')
@section('body')
    @foreach ($categorias as $item => $value)
        <div class="vstack gap-5 p-4" id="accordion">
            <div class="card">
                @if ($value['tipo'] == "Dança")
                    <div class="card-header d-flex justify-content-center" id="headingOne" style="background-color: #fccb96;">
                        <h5 class="mb-0 d-flex justify-content-center">
                            <button class="btn btn-toggle" data-toggle-bs="collapse" data-element="#collapseOne"
                                aria-expanded="true" aria-controls="collapseOne" onclick="Mudarestado('{{ $value['tipo'] }}')">
                                <h4>{{ $value['tipo'] }}</h4>
                            </button>
                        </h5>
                    </div>                    
                @endif
                @if ($value['tipo'] == "Canto")
                    <div class="card-header d-flex justify-content-center" id="headingOne" style="background-color: #96a7fc;>
                        <h5 class="mb-0 d-flex justify-content-center">
                            <button class="btn btn-toggle" data-toggle-bs="collapse" data-element="#collapseOne"
                                aria-expanded="true" aria-controls="collapseOne" onclick="Mudarestado('{{ $value['tipo'] }}')">
                                <h4>{{ $value['tipo'] }}</h4>
                            </button>
                        </h5>
                    </div>                    
                @endif
                @if ($value['tipo'] == "Performance Livre")
                    <div class="card-header d-flex justify-content-center" id="headingOne" style="background-color: #99fc96;>
                        <h5 class="mb-0 d-flex justify-content-center">
                            <button class="btn btn-toggle" data-toggle-bs="collapse" data-element="#collapseOne"
                                aria-expanded="true" aria-controls="collapseOne" onclick="Mudarestado('{{ $value['tipo'] }}')">
                                <h4>{{ $value['tipo'] }}</h4>
                            </button>
                        </h5>
                    </div>                    
                @endif

                <div id="{{ $value['tipo'] }}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <form action="{{route('enviaNota')}}" method="post" id="{{ $value['tipo'] }}">
                            <table>
                                <tr>
                                    <th class="bd h4 pb-4">Apresentações</th>
                                </tr>
                                @foreach ($apresentacoes as $item => $apresentacao)
                                <tr>
                                    @if ($value['id'] == $apresentacao['categoria_id'])
                                    <tr>
                                        <th>Apresentação {{ $apresentacao['numero'] }}</th>
                                    </tr>                                
                                    <tr>
                                        <td class="">
                                            <div class="row g-3 p-2"> 
                                                <!--criterio1-->
                                                <div class="col align-items-center">
                                                    <div class="col-auto">
                                                        <label for="exampleInputEmail1" class="form-label h7">{{ $value['categoria1'] }}</label>
                                                    </div>
                                                    <div class="col-4">
                                                        <input type="number" OnInput="SumNotes(this.id)" class="form-control " required
                                                        name="categoria1"
                                                        size="3" class="{{$apresentacao['id']}}" id="{{$apresentacao['id']}}">
                                                    </div>                                                
                                                </div>
                                                <!--criterio2-->
                                                <div class="col align-items-center">
                                                    <div class="col-auto">
                                                        <label for="exampleInputEmail1" class="form-label h7">{{ $value['categoria2'] }}</label>
                                                    </div>
                                                    <div class="col-4">
                                                        <input type="number" OnInput="SumNotes(this.id)" class="form-control " required
                                                        name="categoria1"
                                                        size="3" class="{{$apresentacao['id']}}" id="{{$apresentacao['id']}}">
                                                    </div>                                                
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="row g-2 p-2"> 
                                                <!--criterio3-->
                                                <div class="col align-items-center">
                                                    <div class="col-auto">
                                                        <label for="exampleInputEmail1" class="form-label h7">{{ $value['categoria3'] }}</label>
                                                    </div>
                                                    <div class="col-4">
                                                        <input type="number" OnInput="SumNotes(this.id)" class="form-control " required
                                                        name="categoria1"
                                                        size="3" class="{{$apresentacao['id']}}" id="{{$apresentacao['id']}}">
                                                    </div>                                                
                                                </div>
                                                <!--criterio4-->
                                                <div class="col align-items-center">
                                                    <div class="col-auto">
                                                        <label for="exampleInputEmail1" class="form-label h7">{{ $value['categoria4'] }}</label>
                                                    </div>
                                                    <div class="col-4">
                                                        <input type="number" OnInput="SumNotes(this.id)" class="form-control " required
                                                        name="categoria1"
                                                        size="3" class="{{$apresentacao['id']}}" id="{{$apresentacao['id']}}">
                                                    </div>                                                
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                                </tr>
                                @endforeach
                            </table>
                            <br><br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <input type="submit" value="Enviar Voto" onclick="enviarForms()">
    <form id="hiddenform" action="{{route('enviaNota')}}" method="post">
        @csrf
        <input type="hidden" id="hidden" name="notas">
        <input type="submit" value="Enviar Voto">
    </form>
    
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
            $("#"+id+"sum").text(sum)
        }

        function enviarForms(){
            const elements = document.querySelectorAll("input[type='number']")
            console.log(elements)
            var sum = 0
            var sums = []
            var qtd = 1
            fisrt = true;
            for(var i = 0; i < elements.length; i++){
                if(elements[i].value == ""){
                    elements[i].value = 0
                }

                if(qtd <= 5){
                    sum+=Number(elements[i].value)
                }else{
                    if(fisrt == true){
                        sums.push(sum.toString().concat(",").concat(elements[i-1].id).concat("."));
                        console.log(elements[i].id)
                        qtd = 1
                        sum = 0
                        sum+=Number(elements[i].value)
                    }
                }

                console.log(elements[i].value)

                qtd += 1
            }
            sums.push(sum.toString().concat(",").concat(elements[elements.length-1].id));
            var form = document.getElementById("hidden")
            form.value = sums
            console.log(form)
            var form = document.getElementById("hiddenform")
            console.log(form)
        }
    </script>
@endsection

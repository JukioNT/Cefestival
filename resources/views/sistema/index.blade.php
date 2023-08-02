@extends('sistema.layout')
@section('body')

@foreach ($categorias as $item => $value)
<div id="accordion">
    <div class="card">
        <div class="card-header" id="headingOne">
            <h5 class="mb-0">
                <button class="btn btn-link btn-toggle" data-toggle-bs="collapse" data-element="#collapseOne" aria-expanded="true"
                    aria-controls="collapseOne" onclick="Mudarestado('{{$value['id']}}')">
                    {{$value['tipo']}}
                </button>
            </h5>
        </div>

        <div id="{{$value['id']}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
                wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
                sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
                farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                labore sustainable VHS.
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
        if(display == "block")
            document.getElementById(collapseOne).style.display = 'none';
        else
            document.getElementById(collapseOne).style.display = 'block';
    }
</script>
@endsection
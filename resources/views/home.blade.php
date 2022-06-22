@extends('layouts.app')

@section('title', 'Home | Home')

@section('head')

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@endsection

@section('content')

<canvas id="canvas-grafico-circular" width="400" height="400"></canvas>

@endsection

@section('js')

<script>
    const canvasGraficoCircular = document.getElementById('canvas-grafico-circular');

    var sedes = [];
    var valores = [];
    
    @foreach($inventario as $item)
        sedes.push('{{ $item->sede }}');
        valores.push('{{ $item->equipos }}');
    @endforeach

    const colors = [
        '#4dc9f6',
        '#f67019',
        '#f53794',
        '#537bc4',
        '#acc236',
        '#166a8f',
        '#00a950',
        '#58595b',
        '#8549ba'
        ];
    
    
    const data = {
        labels: sedes,
        datasets: [
            {
                label: 'Dataset 1',
                data: valores,
                backgroundColor: colors,
            }
        ]
    };

    const config = {
        type: 'doughnut',
        data: data,
        options: {
            responsive: true,
            plugins: {
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Cantidad de equipos por sede.'
            }
            }
        },
    };
    
    const graficoCircular = new Chart(canvasGraficoCircular, config);
    </script>    

@endsection
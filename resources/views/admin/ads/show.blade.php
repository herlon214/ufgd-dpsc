@extends('layout')

@section('content')
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="#">Admin</a></li>
  <li class="breadcrumb-item"><a href="{{ url(action('Admin\AdsController@index')) }}">Publicidades</a></li>
  <li class="breadcrumb-item active">Visualizando publicidade #{{ $item->slot }}</li>
</ol>
<h2>Publicidade #{{ $item->slot }}</h2>

<a href="{{ url('/out/'.$item->id) }}" target="_blank">
  <img class="d-block w-100" src="{{ asset($item->image_url) }}" alt="First slide">
</a>

<br><br>

<h2>Gráfico de cliques</h2>
<canvas id="myChart" width="400" height="100"></canvas>
<script type="application/javascript" src="{{ asset('bower_components/chart.js/dist/Chart.bundle.min.js') }}"></script>
<script>
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['{!! $labels !!}'],
        datasets: [{
            label: 'Número de cliques',
            data: [{{ $data }}],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>
@stop
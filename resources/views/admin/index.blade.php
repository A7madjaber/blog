@extends('admin.app',['title'=>'Admin'])
@section('content')

    <link rel="stylesheet" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css">

    <div class="row">
        <div class="col-md-12">
            <div class="tile mb-4">
    <h1>Hello <b>{{Auth::user()->name}}</b></h1>




<canvas id="myChart"></canvas>
            </div>
            </div>
            </div>

@stop
@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js" integrity="sha256-CfcERD4Ov4+lKbWbYqXD6aFM9M51gN4GUEtDhkWABMo=" crossorigin="anonymous"></script>

          <script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Posts','Categories','Users'],
            datasets: [{
                label: 'Data of my Blog',
                data: [{{$postsCount}},{{$categoriesCount}},{{$UsersCount}} ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
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
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
@stop

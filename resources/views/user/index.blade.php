extends('admin.app',['title'=>'Dashboard'])
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="tile mb-4">
<h2>Welcome : <strong>{{Auth::user()->name}}</strong></h2>


<canvas id="myChart" style="height: 10px"></canvas>
            </div>
            </div>
            </div>
@stop
@section('scripts')

  <script src=" https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>

          <script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Posts'],
            datasets: [{
                label: 'Number Of Your Posts',
                data: [{{$postsCount}} ],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',

                ],
                borderColor: [


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

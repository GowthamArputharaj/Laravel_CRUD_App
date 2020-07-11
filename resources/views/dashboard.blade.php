@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center text-monospace"><b> <i>{{ Auth::user()->name }}'s </i> Dashboard</b></h2>
    <div id="calendar_basic" class="mb-0 mt-4"></div>
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                
                <div class="panel-heading text-center"></div>

                <div class="panel-body">
                    <a href="/posts/create" class="btn btn-warning float-right">Create Post</a>
                    <h3>All Posts</h3>
                    @if(count($data['posts']) > 0)
                        <table class="table table-striped mt-5">
                            <tr>
                                <th>Posts</th>
                                <th><img src="https://img.icons8.com/android/24/000000/support.png"/></th>
                                <th><img src="https://img.icons8.com/android/24/000000/delete.png"/></th>
                            </tr>
                            @foreach($data['posts'] as $post)
                                <tr>
                                    <td>{{$post->title}}</td>
                                    <td><a href="/posts/{{$post->id}}/edit" class="btn btn-outline-primary">Edit</a></td>
                                    <td>
                                        {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                        {!!Form::close()!!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p>No posts created ...</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

        <script  type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>
        <script  type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha512-s+xg36jbIujB2S2VKfpGmlC3T5V2TF3lY48DX7u2r9XzGzgPsa6wTpOQA7J9iffvdeBN0q9tKzRxVxw1JviZPg==" crossorigin="anonymous"></script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {packages:["calendar"]});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            
            var date = <?php echo json_encode($data['date']); ?>;
            
            const chartDate = [];
            var i = 1;
            var temp = [];
            date.forEach(element => {
                            var temp = [];
                            temp.push(new Date(element));
                            temp.push(parseInt(i));
                            chartDate.push(temp);
                            
                            chartDate.push(temp);

                            i++;
                        });

            var dataTable = new google.visualization.DataTable();
            dataTable.addColumn({ type: 'date', id: 'Date' });
            dataTable.addColumn({ type: 'number', id: 'post' });
            dataTable.addRows(
                    chartDate
                );

            var chart = new google.visualization.Calendar(document.getElementById('calendar_basic'));

            var options = {
                title: "Posts posted date",
                height: 350,
                noDataPattern: {
                    backgroundcolor: 'blue',
                    color: '#DD7357'
                },
                calendar: {
                    monthLabel: {
                        fontName: 'Courier',
                        color: '#DD7357',
                        bold: true,
                    },
                    yearLabel: {
                        fontName: 'monospace',
                        fontSize: 32,
                        color: '#1A8763',
                        bold: true,
                    }
                }
            };

            chart.draw(dataTable, options);

            var marksCanvas = document.getElementById("marksChart");
            
            var dataSet = [];

            var colors = ['rgba(0,255,0,0.5)', 'rgba(255,255,0,0.5)', 'rgba(0,0,255,0.5)', 'rgba(0,0,0,0.5)', 'rgba(0,255,255,0.5)', 'rgba(255,0,255,0.5)'];

            var data = <?php echo json_encode($data['posts']); ?>;
            for (let i = 0; i < data.length; i++) {
                var temp = {};
                
                var color = colors[parseInt(data[i].title.length) % colors.length];
                
                temp = {
                    label: data[i].title,
                    fillOpacity: .3,
                    backgroundColor: color,
                    data: [data[i].body.length, data[i].title.length, data[i].title.length + data[i].body.length]
                }
                
                dataSet.push(temp)

            }

            var marksData = {
                labels: ["Words in Body", "Words in Title", "Total Words"],
                datasets: dataSet
            };

            var radarChart = new Chart(marksCanvas, {
                type: 'radar',
                data: marksData,
                options: {
                    legend: {
                        labels: {
                            fontColor: 'black'
                        }
                    }
                }
            });
        }
        </script>


        

        

        <canvas id="marksChart" width="600" height="400"></canvas>
</div>
@endsection

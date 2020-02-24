@extends('layouts.app')
@section('title','Pendidikan')


@section('content')
<div class="container">
<div class="row">
    <div class="col-md-2">
        
    </div>
    <div class="col-md-10">
    <figure class="highcharts-figure">
    <h1>Data Pendidikan</h1>
    <div id="education_chart"></div>
    <p class="highcharts-description">
        A basic column chart compares rainfall values between four cities.
        Tokyo has the overall highest amount of rainfall, followed by New York.
        The chart is making use of the axis crosshair feature, to highlight
        months as they are hovered over.
    </p>
</figure>

    </div>
</div>
</div>






@endsection
@section('footer')
<script src="js/hightcart/highcharts.js"></script>
<script src="js/hightcart/module/exporting.js"></script>
<script src="js/hightcart/module/export-data.js"></script>
<script src="js/hightcart/module/accessibility.js"></script>
<script src="js/hightcart/module/drilldown.js"></script>

<script type="text/javascript">
        // window.alert('hello');
    // drilldown
// Create the chart
Highcharts.chart('education_chart', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Data Siswa Putus Sekolah'
    },
    xAxis: { 
        type: 'category'
    },

    legend: {
        enabled: true
    },

    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true
            }
        }
    },

    series: [{
        name: 'jumlah',
        colorByPoint: true,
        data: [@foreach($dataAll as $kecamatan => $value ){
            name:  {!! json_encode($kecamatan)!!},
            y: {{ $value}},
            drilldown: {!! json_encode($kecamatan)!!}
        },@endforeach ]
        
    }],
    drilldown: {
        series: [{
            id: 'Banyumanik',
            data: [
                ['Cats', 4],
                ['Dogs', 2],
                ['Cows', 1],
                ['Sheep', 2],
                ['Pigs', 1]
            ]
        }, {
            id: 'fruits',
            data: [
                ['Apples', 4],
                ['Oranges', 2]
            ]
        }, {
            id: 'cars',
            data: [
                ['Toyota', 4],
                ['Opel', 2],
                ['Volkswagen', 2]
            ]
        }]
    }
});



        </script>
@endsection
	
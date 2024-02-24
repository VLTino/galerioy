@extends('layouts.main')
<style>
    body {
    margin: 0;
    padding: 0;
}
</style>
@include('layouts.sidebar')

@section('content')
    <div class="content container mt-5">
      
            <canvas id="line-chart"></canvas>
            <div class="row">
              <div class="col-lg-3 p-4">
                <div class="card text-white bg-primary">
                  <div class="card-body">
                    <h5 class="card-title">User</h5>
                    <h3 style="text-align: center"><i class="fa fa-user" aria-hidden="true"></i> 50</h3>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 p-4">
                <div class="card text-white bg-warning">
                  <div class="card-body">
                    <h5 class="card-title">Admin</h5>
                    <h3 style="text-align: center"><i class="fa-solid fa-user-tie"></i> 5</h3>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 p-4">
                <div class="card text-white bg-dark">
                  <div class="card-body">
                    <h5 class="card-title">Image</h5>
                    <h3 style="text-align: center"><i class="fa-solid fa-images"></i> 150</h3>
                  </div>
                </div>
              </div>
            </div>  
    </div>

    <script>
        new Chart(document.getElementById("line-chart"), {
  type: "line",
  data: {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    datasets: [{
      label: "Sales ($)",
      fill: true,
      backgroundColor: "transparent",
      borderColor:  "#007bff",
      data: [2115, 1562, 1584, 1892, 1487, 2223, 2966, 2448, 2905, 3838, 2917, 3327]
    }, {
      label: "Orders",
      fill: true,
      backgroundColor: "transparent",
      borderColor: "#adb5bd",
      borderDash: [4, 4],
      data: [958, 724, 629, 883, 915, 1214, 1476, 1212, 1554, 2128, 1466, 1827]
    }]
  },
  options: {
    scales: {
      xAxes: [{
        reverse: true,
        gridLines: {
          color: "rgba(0,0,0,0.05)"
        }
      }],
      yAxes: [{
        borderDash: [5, 5],
        gridLines: {
          color: "rgba(0,0,0,0)",
          fontColor: "#fff"
        }
      }]
    }
  }
});
    </script>
@endsection
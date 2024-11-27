@extends('admin.master.index')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
   <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard / Reports /</span> Customers</h4>
   <div class="card">
      <h5 class="card-header">
      Customers (Top 10)
      </h5>
     <div class="row">
      <div class="col-md-8">
         <div class="table-responsive text-nowrap" style="min-height: 300px">
            <table class="table table-striped">
               <thead>
                  <tr>
                     <th>Customer</th>
                     <th>Total Orders</th>
                  </tr>
               </thead>
               <tbody class="table-border-bottom-0">
                  @forelse($topCustomers as $topCustomer)
                  <tr>
                     <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$topCustomer->name}}</strong></td>
                     <td>
                        {{ $topCustomer->total_orders }}
                     </td>
                  </tr>
                  @empty
                  <tr>
                     <th colspan="4" class="text-center">No Data Found.</th>
                  </tr>
                  @endforelse
               </tbody>
            </table>
         </div>
      </div>
      <div class="col-md-4">
      <div id="orderStatisticsChart"></div>
      </div>
     </div>
   </div>
</div>
@endsection

@section('js')
<script src="{{url('admin/assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
<script>
   const chartOrderStatistics = document.querySelector('#orderStatisticsChart'),
    orderChartConfig = {
      chart: {
        height: 165,
        width: 130,
        type: 'donut'
      },
      labels: @json($lbls),
      series: @json($nums),
      colors: @json($cols),
      stroke: {
        width: 5,
      },
      dataLabels: {
        enabled: false,
        formatter: function (val, opt) {
          return parseInt(val) + '%';
        }
      },
      legend: {
        show: false
      },
      grid: {
        padding: {
          top: 0,
          bottom: 0,
          right: 15
        }
      }
    };
  if (typeof chartOrderStatistics !== undefined && chartOrderStatistics !== null) {
    const statisticsChart = new ApexCharts(chartOrderStatistics, orderChartConfig);
    statisticsChart.render();
  }
</script>
@endsection
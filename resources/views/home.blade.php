@extends('layouts.app', [
    'namePage' => 'Dashboard',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'home',
    'backgroundImage' => asset('now') . "/img/bg14.jpg",
])

@section('content')
  <div class="panel-header panel-header-lg">
    <!-- <canvas id="bigDashboardChart"></canvas> -->
  </div>
  <div class="content">
    <div class="row">
      <div class="col-lg-4 col-md-6">
     <p>welcome in money transfer application</p>
     </div>
    </div>
   
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>
@endpush
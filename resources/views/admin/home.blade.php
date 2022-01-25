@extends('admin.layout.master')
@section('content')

<canvas id="studentEnroll"></canvas>

@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const labels = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
    'July',
    'August',
    'Setpt',
    'Oct',
    'Nov',
    'Dec',
  ];

  const data = {
    labels: labels,
    datasets: [{
      label: 'Student Enroll ',
      backgroundColor: 'rgba(255, 0, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data: {{json_encode($data)}},
    }]
  };

  const config = {
    type: 'bar',
    data: data,
    options: {}
  };
    const myChart = new Chart(
    document.getElementById('studentEnroll'),
    config
  );
</script>
@endsection

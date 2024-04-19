@extends('layout.master')
@section('title',"لوحة التحكم")

@php

    // Appointment Extract to arrays

    $appointment_status = array_map(function ($row)  {
        return $row["status"];
    }, $Data["appointmentsCount"]->toArray());

    $appointment_count = array_map(function ($row)  {
        return $row["count"];
    }, $Data["appointmentsCount"]->toArray());


// **********************************************************************

    // Payment Data Extract to arrays

    $payments_dates = array_map(function ($row)  {
        return $row["Date"];
    }, $Data["payments"]->toArray());

    $payments_total = array_map(function ($row)  {
        return $row["Total"];
    }, $Data["payments"]->toArray());

// **********************************************************************

    // Terms Conditions Data Extract to arrays

    $terms_conditions_type = array_map(function ($row)  {
        return $row["contract_type"];
    }, $Data["terms_conditions"]->toArray());

    $terms_conditions_count = array_map(function ($row)  {
        return $row["count"];
    }, $Data["terms_conditions"]->toArray());


// ***********************************************************************

    // Penals Data Extract to arrays

    $penals_type = array_map(function ($row)  {
        return $row["contract_type"];
    }, $Data["penals"]->toArray());

    $penals_count = array_map(function ($row)  {
        return $row["count"];
    }, $Data["penals"]->toArray());


// ***********************************************************************

    // dd($appointment_status,$appointment_count);

@endphp

@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">أهلاً بك فى لوحة التحكم</h4>
        </div>

        </div>

        <div class="row">
            {{-- العملاء --}}
            <div class="col-xl-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title" style="font-weight: bold">العملاء</h6>
                        <div id="clientsChart"></div>
                    </div>
                </div>
            </div>
            {{-- مواعيد العملاء --}}
            <div class="col-xl-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title" style="font-weight: bold">مواعيد العملاء</h6>
                        <div id="appointmentChart"></div>
                    </div>
                </div>
            </div>
            {{-- المعاملات --}}
            <div class="col-xl-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title" style="font-weight: bold">المعاملات</h6>
                        <div id="operationsChart"></div>
                    </div>
                </div>
            </div>
            {{-- الرصيد الحالى --}}
            <div class="col-md-3 grid-margin stretch-card d-none">
                <div class="card">
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <div class="d-flex justify-content-center align-items-baseline">
                            <h6 class="card-title mb-0" style="font-weight: bold; font-size: 25px; color: #0d6efd">الرصيد الحالى</h6>

                    </div>
                    <div class="row">
                        <div class="col-12 col-md-12 col-xl-12">
                            <h3 class="mt-2" style="color: #0d6efd">5000 ر.س</h3>

                        </div>

                    </div>
                </div>
                </div>
            </div>
            {{-- دفعات العملاء أخر 7 أيام --}}
            <div class="col-xl-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title" style="font-weight: bold">دفعات مالية أخر 7 أيام</h6>
                        <div id="paymentChart"></div>
                    </div>
                </div>
            </div>
             {{-- الشروط والأحكام --}}
             <div class="col-xl-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title" style="font-weight: bold">الشروط والأحكام</h6>
                        <div id="termsChart"></div>
                    </div>
                </div>
            </div>
            {{-- الأحكام الجزائية --}}
            <div class="col-xl-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title" style="font-weight: bold">الأحكام الجزائية</h6>
                        <div id="penalsChart"></div>
                    </div>
                </div>
            </div>
            {{-- سياسة الضمان --}}
            <div class="col-xl-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title" style="font-weight: bold">سياسة الضمان</h6>
                        <div id="warantyChart"></div>
                    </div>
                </div>
            </div>



        </div> <!-- row -->


@endsection


@section('script')

<script>
    var colors = {
        primary        : "#6571ff",
        secondary      : "#7987a1",
        success        : "#05a34a",
        info           : "#66d1d1",
        warning        : "#fbbc06",
        danger         : "#ff3366",
        light          : "#e9ecef",
        dark           : "#060c17",
        muted          : "#7987a1",
        gridBorder     : "rgba(77, 138, 240, .15)",
        bodyColor      : "#000",
        cardBg         : "#fff"
    }


  var revenueChartData = [
    49.33,
    48.79,
    50.61,
    53.31,
    54.78,
    53.84,
    54.68,
    56.74,
    56.99,
    56.14,
    56.56,
    60.35,
    58.74,
    61.44,
    61.11,
    58.57,
    54.72,
    52.07,
    51.09,
    47.48,
    48.57,
    48.99,
    53.58,
    50.28,
    46.24,
    48.61,
    51.75,
    51.34,
    50.21,
    54.65,
    52.44,
    53.06,
    57.07,
    52.97,
    48.72,
    52.69,
    53.59,
    58.52,
    55.10,
    58.05,
    61.35,
    57.74,
    60.27,
    61.00,
    57.78,
    56.80,
    58.90,
    62.45,
    58.75,
    58.40,
    56.74,
    52.76,
    52.30,
    50.56,
    55.40,
    50.49,
    52.49,
    48.79,
    47.46,
    43.31,
    38.96,
    34.73,
    31.03,
    32.63,
    36.89,
    35.89,
    32.74,
    33.20,
    30.82,
    28.64,
    28.44,
    27.73,
    27.75,
    25.96,
    24.38,
    21.95,
    22.08,
    23.54,
    27.30,
    30.27,
    27.25,
    29.92,
    25.14,
    23.09,
    23.79,
    23.46,
    27.99,
    23.21,
    23.91,
    19.21,
    15.13,
    15.08,
    11.00,
    9.20,
    7.47,
    11.64,
    15.76,
    13.99,
    12.59,
    13.53,
    15.01,
    13.95,
    13.23,
    18.10,
    20.63,
    21.06,
    25.37,
    25.32,
    20.94,
    18.75,
    15.38,
    14.56,
    17.94,
    15.96,
    16.35,
    14.16,
    12.10,
    14.84,
    17.24,
    17.79,
    14.03,
    18.65,
    18.46,
    22.68,
    25.08,
    28.18,
    28.03,
    24.11,
    24.28,
    28.23,
    26.24,
    29.33,
    26.07,
    23.92,
    28.82,
    25.14,
    21.79,
    23.05,
    20.71,
    29.72,
    30.21,
    32.56,
    31.46,
    33.69,
    30.05,
    34.20,
    36.93,
    35.50,
    34.78,
    36.97
  ];

  var revenueChartCategories = [
    "Jan 01 2022", "Jan 02 2022", "jan 03 2022", "Jan 04 2022", "Jan 05 2022", "Jan 06 2022", "Jan 07 2022", "Jan 08 2022", "Jan 09 2022", "Jan 10 2022", "Jan 11 2022", "Jan 12 2022", "Jan 13 2022", "Jan 14 2022", "Jan 15 2022", "Jan 16 2022", "Jan 17 2022", "Jan 18 2022", "Jan 19 2022", "Jan 20 2022","Jan 21 2022", "Jan 22 2022", "Jan 23 2022", "Jan 24 2022", "Jan 25 2022", "Jan 26 2022", "Jan 27 2022", "Jan 28 2022", "Jan 29 2022", "Jan 30 2022", "Jan 31 2022",
    "Feb 01 2022", "Feb 02 2022", "Feb 03 2022", "Feb 04 2022", "Feb 05 2022", "Feb 06 2022", "Feb 07 2022", "Feb 08 2022", "Feb 09 2022", "Feb 10 2022", "Feb 11 2022", "Feb 12 2022", "Feb 13 2022", "Feb 14 2022", "Feb 15 2022", "Feb 16 2022", "Feb 17 2022", "Feb 18 2022", "Feb 19 2022", "Feb 20 2022","Feb 21 2022", "Feb 22 2022", "Feb 23 2022", "Feb 24 2022", "Feb 25 2022", "Feb 26 2022", "Feb 27 2022", "Feb 28 2022",
    "Mar 01 2022", "Mar 02 2022", "Mar 03 2022", "Mar 04 2022", "Mar 05 2022", "Mar 06 2022", "Mar 07 2022", "Mar 08 2022", "Mar 09 2022", "Mar 10 2022", "Mar 11 2022", "Mar 12 2022", "Mar 13 2022", "Mar 14 2022", "Mar 15 2022", "Mar 16 2022", "Mar 17 2022", "Mar 18 2022", "Mar 19 2022", "Mar 20 2022","Mar 21 2022", "Mar 22 2022", "Mar 23 2022", "Mar 24 2022", "Mar 25 2022", "Mar 26 2022", "Mar 27 2022", "Mar 28 2022", "Mar 29 2022", "Mar 30 2022", "Mar 31 2022",
    "Apr 01 2022", "Apr 02 2022", "Apr 03 2022", "Apr 04 2022", "Apr 05 2022", "Apr 06 2022", "Apr 07 2022", "Apr 08 2022", "Apr 09 2022", "Apr 10 2022", "Apr 11 2022", "Apr 12 2022", "Apr 13 2022", "Apr 14 2022", "Apr 15 2022", "Apr 16 2022", "Apr 17 2022", "Apr 18 2022", "Apr 19 2022", "Apr 20 2022","Apr 21 2022", "Apr 22 2022", "Apr 23 2022", "Apr 24 2022", "Apr 25 2022", "Apr 26 2022", "Apr 27 2022", "Apr 28 2022", "Apr 29 2022", "Apr 30 2022",
    "May 01 2022", "May 02 2022", "May 03 2022", "May 04 2022", "May 05 2022", "May 06 2022", "May 07 2022", "May 08 2022", "May 09 2022", "May 10 2022", "May 11 2022", "May 12 2022", "May 13 2022", "May 14 2022", "May 15 2022", "May 16 2022", "May 17 2022", "May 18 2022", "May 19 2022", "May 20 2022","May 21 2022", "May 22 2022", "May 23 2022", "May 24 2022", "May 25 2022", "May 26 2022", "May 27 2022", "May 28 2022", "May 29 2022", "May 30 2022",
  ];



  // Clients chart start
  if ($('#clientsChart').length) {
    var options = {
      chart: {
        height: 300,
        type: "donut",
        foreColor: colors.bodyColor,
        background: colors.cardBg,
        toolbar: {
          show: false
        },
      },
      theme: {
        mode: 'light'
      },
      tooltip: {
        theme: 'light'
      },
      stroke: {
        colors: ['rgba(0,0,0,0)']
      },
      colors: [colors.primary,colors.warning,colors.danger, colors.info],
      legend: {
        show: true,
        position: "top",
        horizontalAlign: 'center',
        fontFamily: "Tajawal",
        itemMargin: {
          horizontal: 8,
          vertical: 0
        },
      },
      dataLabels: {
        enabled: false
      },
      series: [{{$Data["individualCount"]}},{{$Data["commercialCount"]}}],
      labels: ['عميل فردى', 'عميل تجارى']
    };

    var chart = new ApexCharts(document.querySelector("#clientsChart"), options);
    chart.render();
  }
  // Clients chart start


  // Appointment chart start
  if ($('#appointmentChart').length) {
    var options = {
      chart: {
        height: 300,
        type: "donut",
        foreColor: colors.bodyColor,
        background: colors.cardBg,
        toolbar: {
          show: false
        },
      },
      theme: {
        mode: 'light'
      },
      tooltip: {
        theme: 'light'
      },
      stroke: {
        colors: ['rgba(0,0,0,0)']
      },
      colors: [colors.primary,colors.warning,colors.danger, colors.info],
      legend: {
        show: true,
        position: "top",
        horizontalAlign: 'center',
        fontFamily: "Tajawal",
        itemMargin: {
          horizontal: 8,
          vertical: 0
        },
      },
      dataLabels: {
        enabled: false
      },
      series: @json($appointment_count),
      labels: @json($appointment_status)
    };

    var chart = new ApexCharts(document.querySelector("#appointmentChart"), options);
    chart.render();
  }
  // Appointment chart start

  // Operations chart start
  if ($('#operationsChart').length) {
    var options = {
      chart: {
        height: 300,
        type: "donut",
        foreColor: colors.bodyColor,
        background: colors.cardBg,
        toolbar: {
          show: false
        },
      },
      theme: {
        mode: 'light'
      },
      tooltip: {
        theme: 'light'
      },
      stroke: {
        colors: ['rgba(0,0,0,0)']
      },
      colors: [colors.primary,colors.warning,colors.danger, colors.info],
      legend: {
        show: true,
        position: "top",
        horizontalAlign: 'center',
        fontFamily: "Tajawal",
        itemMargin: {
          horizontal: 8,
          vertical: 0
        },
      },
      dataLabels: {
        enabled: false
      },
      series: [{{$Data["lettersCount"]}},{{$Data["financialCount"]}}],
      labels: ["الخطابات المرسلة","المطالبات المالية"]
    };

    var chart = new ApexCharts(document.querySelector("#operationsChart"), options);
    chart.render();
  }
  // Operations chart start


  // Payment Chart - RTL
  if ($('#paymentChart').length) {
    var lineChartOptions = {
      chart: {
        type: "line",
        height: '400',
        parentHeightOffset: 0,
        foreColor: colors.bodyColor,
        background: colors.cardBg,
        toolbar: {
          show: false
        },
      },
      theme: {
        mode: 'light'
      },
      tooltip: {
        theme: 'light'
      },
      colors: [colors.primary, colors.danger, colors.warning],
      grid: {
        padding: {
          bottom: -4,
        },
        borderColor: colors.gridBorder,
        xaxis: {
          lines: {
            show: true
          }
        }
      },
      series: [
        {
          name: "إجمالى قيد مدين",
          data: @json($payments_total)
        },
      ],
      xaxis: {
        type: "datetime",
        categories: @json($payments_dates),
        lines: {
          show: true
        },
        axisBorder: {
          color: colors.gridBorder,
        },
        axisTicks: {
          color: colors.gridBorder,
        },
        crosshairs: {
          stroke: {
            color: colors.secondary,
          },
        },
      },
      yaxis: {
        opposite: true,
        title: {
          text: 'Revenue ( $1000 x )',
          offsetX: -130,
          style:{
            size: 9,
            color: colors.muted
          }
        },
        labels: {
          align: 'left',
          offsetX: -20,
        },
        tickAmount: 4,
        tooltip: {
          enabled: true
        },
        crosshairs: {
          stroke: {
            color: colors.secondary,
          },
        },
      },
      markers: {
        size: 0,
      },
      stroke: {
        width: 2,
        curve: "straight",
      },
    };
    var apexLineChart = new ApexCharts(document.querySelector("#paymentChart"), lineChartOptions);
    apexLineChart.render();
  }
  // Payment Chart - RTL - END

  // Clients chart start
    if ($('#termsChart').length) {
    var options = {
        chart: {
        height: 300,
        type: "donut",
        foreColor: colors.bodyColor,
        background: colors.cardBg,
        toolbar: {
            show: false
        },
        },
        theme: {
        mode: 'light'
        },
        tooltip: {
        theme: 'light'
        },
        stroke: {
        colors: ['rgba(0,0,0,0)']
        },
        colors: [colors.primary,colors.warning,colors.danger, colors.info],
        legend: {
        show: true,
        position: "top",
        horizontalAlign: 'center',
        fontFamily: "Tajawal",
        itemMargin: {
            horizontal: 8,
            vertical: 0
        },
        },
        dataLabels: {
        enabled: false
        },
        series: @json($terms_conditions_count),
        labels: @json($terms_conditions_type)
    };

    var chart = new ApexCharts(document.querySelector("#termsChart"), options);
    chart.render();
    }
  // Clients chart start

  // Penals chart start
    if ($('#penalsChart').length) {
    var options = {
        chart: {
        height: 300,
        type: "donut",
        foreColor: colors.bodyColor,
        background: colors.cardBg,
        toolbar: {
            show: false
        },
        },
        theme: {
        mode: 'light'
        },
        tooltip: {
        theme: 'light'
        },
        stroke: {
        colors: ['rgba(0,0,0,0)']
        },
        colors: [colors.primary,colors.warning,colors.danger, colors.info],
        legend: {
        show: true,
        position: "top",
        horizontalAlign: 'center',
        fontFamily: "Tajawal",
        itemMargin: {
            horizontal: 8,
            vertical: 0
        },
        },
        dataLabels: {
        enabled: false
        },
        series: @json($penals_count),
        labels: @json($penals_type)
    };

    var chart = new ApexCharts(document.querySelector("#penalsChart"), options);
    chart.render();
    }
  // Penals chart start

  // Waranty Policiy chart start
    if ($('#warantyChart').length) {
    var options = {
        chart: {
        height: 300,
        type: "donut",
        foreColor: colors.bodyColor,
        background: colors.cardBg,
        toolbar: {
            show: false
        },
        },
        theme: {
        mode: 'light'
        },
        tooltip: {
        theme: 'light'
        },
        stroke: {
        colors: ['rgba(0,0,0,0)']
        },
        colors: [colors.primary,colors.warning,colors.danger, colors.info],
        legend: {
        show: true,
        position: "top",
        horizontalAlign: 'center',
        fontFamily: "Tajawal",
        itemMargin: {
            horizontal: 8,
            vertical: 0
        },
        },
        dataLabels: {
        enabled: false
        },
        series: [{{$Data["waranty_policiy"]}}],
        labels: ["سياسة الضمان"]
    };

    var chart = new ApexCharts(document.querySelector("#warantyChart"), options);
    chart.render();
    }
  // Waranty Policiy chart start


console.log(@json($appointment_status) );
</script>

@endsection

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
<canvas id="myChart" style="max-width: 500px;"></canvas>

<script src='//cdnjs.cloudflare.com/ajax/libs/angular-loading-bar/0.9.0/loading-bar.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha512-s+xg36jbIujB2S2VKfpGmlC3T5V2TF3lY48DX7u2r9XzGzgPsa6wTpOQA7J9iffvdeBN0q9tKzRxVxw1JviZPg==" crossorigin="anonymous"></script>
<script>
{{--    $(document).ready(function () {--}}
{{--        var barChartCanvas = $('#barChart').get(0).getContext('2d');--}}
{{--        $.ajax({--}}
{{--            {{ route('admin.search.advancedSearchData') }}--}}
{{--            url: '',--}}
{{--            method: 'GET',--}}
{{--            dataType: 'json',--}}
{{--            success: function (d) {--}}
{{--                chartData = {--}}
{{--                    labels: d.data.label,--}}
{{--                    datasets: [--}}
{{--                        {--}}
{{--                            fillColor: "rgba(220,220,220,0.5)",--}}
{{--                            strokeColor: "rgba(220,220,220,1)",--}}
{{--                            pointColor: "rgba(220,220,220,1)",--}}
{{--                            pointStrokeColor: "#fff",--}}
{{--                            data: d.data.data--}}
{{--                        }--}}
{{--                    ]--}}
{{--                };--}}
{{--                var barChartOptions = {--}}
{{--                    responsive              : true,--}}
{{--                    maintainAspectRatio     : false,--}}
{{--                    datasetFill             : false--}}
{{--                }--}}

{{--                var barChart = new Chart(barChartCanvas, {--}}
{{--                    type: 'bar',--}}
{{--                    data: chartData,--}}
{{--                    options: barChartOptions--}}
{{--                })--}}
{{--            }--}}
{{--        });--}}






{{--        $('#timeStart, #timeStartEdit').datetimepicker({--}}
{{--            format:'HH:mm',--}}
{{--            stepping: 30,--}}
{{--            icons: {--}}
{{--                time: "fa fa-clock-o",--}}
{{--                up: "fa fa-arrow-up",--}}
{{--                down: "fa fa-arrow-down"--}}
{{--            }--}}
{{--        });--}}

{{--        $('.editSalaryByShift').on('click', function () {--}}
{{--            var shiftId = $(this).attr('data-shift-id');--}}
{{--            $.ajax({--}}
{{--                {{route('admin.shift-setting.index')}}--}}
{{--                url: '' + '/' + shiftId,--}}
{{--                type: 'get',--}}
{{--                success: function (r) {--}}
{{--                    var shift = r.data;--}}
{{--                    console.log(shift);--}}
{{--                    $('#shiftName').val(shift.shift_name);--}}
{{--                    $('#shiftId').val(shift.id);--}}
{{--                    if (shift.salary_shift) {--}}
{{--                        $('#money_per_hour').val(shift.salary_shift.money_per_hour);--}}
{{--                        $('#bonus_per_hour1').val(shift.salary_shift.bonus_per_hour1);--}}
{{--                        $('#bonus_reason_1').val(shift.salary_shift.bonus_reason_1);--}}

{{--                    }--}}
{{--                    $('#modalEditSalary').modal('show');--}}
{{--                },--}}
{{--                error: function (r) {--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}


{{--        $('#money_per_hour, #bonus_per_hour1').keypress(function(event) {--}}
{{--            if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {--}}
{{--                event.preventDefault();--}}
{{--                alert('Chỉ có thể nhập số');--}}
{{--            }--}}
{{--        });--}}
{{--    })--}}
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
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
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
</body>
</html>

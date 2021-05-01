@props(['stats'])
<div class="rounded-3xl p-8 w-full my-12">
    <div class="flex">
        <div class="p-2 text-center">
            <div class="rounded-2xl shadow-2xl w-64 h-full px-2 py-8">
                <div class="text-2xl capitalize leading-loose tracking-wide font-bold text-green-800">
                    Statistiques des visiteurs
                </div>
                <div class="text-4xl capitalize leading-loose tracking-wide text-indigo-600">
                    255
                </div>
            </div>
        </div>
        <div class="flex-1 p-2">
            <div class="rounded-2xl shadow-2xl">
                <canvas id="canvas_users" height="250" width="600"></canvas>
            </div>
        </div>
    </div>
    <div class="flex mt-12">
        <div class="flex-1 p-2">
            <div class="rounded-2xl shadow-2xl">
                <canvas id="canvas_offers" height="250" width="600"></canvas>
            </div>
        </div>
        <div class="p-2 text-center">
            <div class="rounded-2xl shadow-2xl h-full w-64 px-2 py-8">
                <div class="text-2xl capitalize leading-loose tracking-wide font-bold text-green-800">
                    Vos Articles
                   
                </div>
                <div class="text-4xl capitalize leading-loose tracking-wide text-indigo-600">
                    {{auth()->user()->threads_count}}
                </div>
            </div>
        </div>
    </div>
</div>




<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script>
    
    var month = [ "{{ $stats['dayOne']['date'] }}", "{{ $stats['dayTwo']['date'] }}", "{{ $stats['dayThree']['date'] }}", "{{ $stats['dayfour']['date'] }}", "{{ $stats['dayfive']['date'] }}", "{{ $stats['daySix']['date'] }}", "{{ $stats['daySeven']['date'] }}" ];

    var visitors = [ "{{ $stats['dayOne']['threads_count'] }}", "{{ $stats['dayTwo']['threads_count'] }}", "{{ $stats['dayThree']['threads_count'] }}", "{{ $stats['dayfour']['threads_count'] }}", "{{ $stats['dayfive']['threads_count'] }}", "{{ $stats['daySix']['threads_count'] }}", "{{ $stats['daySeven']['threads_count'] }}" ];
    var lineChartData = {
        labels: month,
        datasets: [{
            label: 'Visite(s)',
            backgroundColor: "pink",
            data: visitors
        }]
    };

    var articles = [ "{{ $stats['dayOne']['threads_count'] }}", "{{ $stats['dayTwo']['threads_count'] }}", "{{ $stats['dayThree']['threads_count'] }}", "{{ $stats['dayfour']['threads_count'] }}", "{{ $stats['dayfive']['threads_count'] }}", "{{ $stats['daySix']['threads_count'] }}", "{{ $stats['daySeven']['threads_count'] }}" ];;
    var barChartData = {
        labels: month,
        datasets: [{
            label: 'article (s)',
            backgroundColor: "#2563eb",
            data: articles
        }]
    };

    window.onload = function() {

        // Chart Users

        var ctx_users = document.getElementById("canvas_users").getContext("2d");
        window.myLine = new Chart(ctx_users, {
            type: 'line',
            data: lineChartData,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: '#c1c1c1',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: true,
                    text: "Nombre de visite par ref"
                }
            }
        });

        // Chart Offers
        var ctx_offers = document.getElementById("canvas_offers").getContext("2d");
        window.myBar = new Chart(ctx_offers, {
            type: 'bar',
            data: barChartData,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: '#c1c1c1',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: true,
                    text: "Nombre d'article par ref"
                }
            }
        });
    };
</script>

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
    var month = "monthmonthht";

    var visitors = ['14', '12', '0', '12', '45', '47','14', '12', '0', '12', '45', '47'];
    var lineChartData = {
        labels: month,
        datasets: [{
            label: 'Visite(s)',
            backgroundColor: "pink",
            data: visitors
        }]
    };

    var articles = ['14', '12', '0', '12', '45', '47','14', '12', '0', '12', '45', '47'];
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
                    text: "Membre mensuelle de l'utilisateur"
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
                    text: "Nombre mensuelle de l'offres"
                }
            }
        });
    };
</script>
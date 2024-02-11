<div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const BarData = {
                labels: [],
                datasets: [{
                    maxBarThickness: 50,
                    label: 'Suara',
                    data: [],
                    backgroundColor: [
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 99, 132)',
                    ],
                    borderWidth: 5,
                    borderRadius: 8,
                }]
            };

        const Grafik = new Chart(document.getElementById('GrafikPresiden'), {
            type: 'bar',
            data: BarData,
            options: {
                plugins: {
                legend: false,
                }
            }
        });
        const Pie = new Chart(document.getElementById('PiePresiden'), {
            type: 'pie',
            data: BarData,
            options: {
                radius:100,
                plugins: {
                legend: false,
                }
            }
        });

        setInterval(() => Livewire.dispatch('load'), 1000);

        document.addEventListener('livewire:init', () => {
            Livewire.on('update', (event) => {
                var grafikPresiden = JSON.parse(event);

                Grafik.data.labels = grafikPresiden.labels;
                Grafik.data.datasets.forEach((dataset) => {
                    dataset.data = grafikPresiden.data;
                });

                Pie.data.labels = grafikPresiden.labels;
                Pie.data.datasets.forEach((dataset) => {
                    dataset.data = grafikPresiden.data;
                });

                Pie.update();
                Grafik.update();

                grafikPresiden.suara.forEach((presiden) => {
                    var idPresiden = 'Presiden' + presiden.calon.no;
                    var idSuaraPresiden = 'SuaraPresiden' + presiden.calon.no;
                    var divPresiden = document.getElementById(idPresiden);
                    var divSuaraPresiden = document.getElementById(idSuaraPresiden);

                    divPresiden.innerHTML = '('+presiden.calon.no+') '+presiden.calon.nama;
                    divSuaraPresiden.innerHTML = '('+presiden.persentase_suara+'%) '+presiden.total_suara+' Suara';
                });
            });
        });
    </script>
</div>

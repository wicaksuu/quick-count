<div>
    <script>
        document.addEventListener('livewire:init', () => {
            setInterval(() => Livewire.dispatch('updateDataFilter'), 1000);
            Livewire.on('update', (event) => {
                var Calons = JSON.parse(event);
                if (Calons.data.data) {
                    parseDataToTable(Calons.data.data,Calons.type,Calons.key);

                }
            });
        });

        function parseDataToTable(data,type,key) {
            var tableBody = document.getElementById("ViewColonSuara");
            tableBody.innerHTML = "";

            data.forEach(function(item) {
                var row = document.createElement("tr");
                row.className = "text-gray-600border-b border-gray-50 dark:border-zinc-600";

                if (type == 'DPRD') {
                var dapilNamaCell = document.createElement("td");
                    dapilNamaCell.textContent = item.calon.dapil.nama;
                    dapilNamaCell.className = "p-4 dark:text-zinc-50";
                    row.appendChild(dapilNamaCell);
                }
                if (key == 'Pileg') {
                    var namaPartia = document.createElement("td");
                    namaPartia.textContent = '('+item.calon.partai.no+') '+item.calon.partai.nama;
                    namaPartia.className = "p-4 dark:text-zinc-50";
                    row.appendChild(namaPartia);
                }

                var namaCell = document.createElement("td");
                namaCell.textContent = '('+item.calon.no+') '+item.calon.nama;
                namaCell.className = "p-4 dark:text-zinc-50";
                row.appendChild(namaCell);

                var jumlahSuaraCell = document.createElement("td");
                jumlahSuaraCell.textContent = item.total_suara+"/"+item.jumlah_suara+' ('+item.persentase_suara+'%)';
                jumlahSuaraCell.className = "p-4 dark:text-zinc-50";
                row.appendChild(jumlahSuaraCell);

                tableBody.appendChild(row);
            });

        }
    </script>
</div>

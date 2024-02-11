<div>
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('update', (event) => {
                var Calons = JSON.parse(event);
                parseDataToTable(Calons.data.data,Calons.key);

            });
        });

        function parseDataToTable(data,key) {
            console.log(data);
            var tableBody = document.getElementById("ViewColonSuara");
            tableBody.innerHTML = "";

            data.forEach(function(item) {
                console.log(item);
                var row = document.createElement("tr");
                row.className = "text-gray-600border-b border-gray-50 dark:border-zinc-600";

                if (key == 'Pileg') {
                var dapilNamaCell = document.createElement("td");
                    dapilNamaCell.textContent = item.calon.dapil.nama;
                    dapilNamaCell.className = "p-4 dark:text-zinc-50";
                    row.appendChild(dapilNamaCell);
                }
                var namaKecamatan = document.createElement("td");
                namaKecamatan.textContent = item.calon.kecamatans[0].nama;
                namaKecamatan.className = "p-4 dark:text-zinc-50";
                row.appendChild(namaKecamatan);

                var namaDesa = document.createElement("td");
                namaDesa.textContent = item.calon.tps.desa.nama;
                namaDesa.className = "p-4 dark:text-zinc-50";
                row.appendChild(namaDesa);

                var namaPartia = document.createElement("td");
                namaPartia.textContent = '('+item.calon.partai.no+') '+item.calon.partai.nama;
                namaPartia.className = "p-4 dark:text-zinc-50";
                row.appendChild(namaPartia);

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

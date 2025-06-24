document.addEventListener('DOMContentLoaded', function () {
    const kecamatanSelect = document.getElementById('kecamatan');
    const kelurahanSelect = document.getElementById('kelurahan');

    // Ambil isi JSON dari script tag
    const kecamatanData = JSON.parse(document.getElementById('kecamatan-data').textContent);

    kecamatanSelect.addEventListener('change', function () {
        const selectedKecamatan = this.value;
        kelurahanSelect.innerHTML = '<option value="">Pilih Kelurahan</option>';

        const selected = kecamatanData.find(kec => kec.nama === selectedKecamatan);

        if (selected && selected.kelurahan) {
            selected.kelurahan.forEach(function (kel) {
                const option = document.createElement('option');
                option.value = kel;
                option.textContent = kel;
                kelurahanSelect.appendChild(option);
            });
        }
    });
});

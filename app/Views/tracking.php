<div class="card shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body d-flex align-items-center justify-content-between p-4">
        <h4 class="fw-semibold mb-0">Tracking Rute</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a class="text-muted text-decoration-none" href="<?= base_url('/') ?>">Tracking</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Rute</li>
            </ol>
        </nav>
    </div>
</div>



<div class="card w-100 position-relative overflow-hidden">
    <div class="px-4 py-3 border-bottom">
    </div>

    <div style="display: flex; gap: 20px; width: fit-content; padding-left: 20px; margin-bottom: 20px;">
        <form method="post" action="<?= base_url('rute/trackingRute'); ?>">
            <div style="display: flex; gap: 20px; width: fit-content; padding-left: 20px;">
                <label for="halte1">Halte Awal</label>
                <select id="halte1" name="halte_id" style="width: 200px;" class="form-control">
                    <option value="">-- Pilih Halte --</option>
                    <?php foreach ($halte as $h): ?>
                        <option value="<?= $h->id; ?>"><?= $h->nama_halte; ?></option>
                    <?php endforeach; ?>
                </select>

                <label for="halte2">Halte Tujuan</label>
                <select id="halte2" name="halte_id2" style="width: 200px;" class="form-control">
                    <option value="">-- Pilih Halte --</option>
                    <?php foreach ($halte as $h): ?>
                        <option value="<?= $h->id; ?>"><?= $h->nama_halte; ?></option>
                    <?php endforeach; ?>
                </select>

                <button class="btn btn-primary">Tracking Rute</button>
            </div>
        </form>





    </div>
    <?php if (!empty($hasil_rute)): ?>
        <div style="margin-top: 20px; padding-left: 20px;">
            <h4>Rute yang Ditempuh:</h4>
            <ol id="rute-list">
                <?php foreach ($hasil_rute as $halte): ?>
                    <li data-lat="<?= $halte->latitude ?>" data-lng="<?= $halte->longtitude ?>">
                        <?= esc($halte->nama_halte) ?>
                        <br><small class="jarak-ke-selanjutnya"></small>
                    </li>
                <?php endforeach; ?>
            </ol>
        </div>

        <div id="map" style="height: 400px; margin: 20px;"></div>

        <script>
            var map = L.map('map').setView([<?= $hasil_rute[0]->latitude ?>, <?= $hasil_rute[0]->longtitude ?>], 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            var halteData = [
                <?php foreach ($hasil_rute as $halte): ?> {
                        lat: <?= $halte->latitude ?>,
                        lng: <?= $halte->longtitude ?>,
                        nama: "<?= esc($halte->nama_halte) ?>"
                    },
                <?php endforeach; ?>
            ];


            halteData.forEach(function(halte, index) {
                L.marker([halte.lat, halte.lng]).addTo(map)
                    .bindPopup((index + 1) + '. ' + halte.nama);
            });

            var coords = halteData.map(h => [h.lat, h.lng]);

            var polyline = L.polyline(coords, {
                color: 'blue',
                weight: 4,
                opacity: 0.7
            }).addTo(map);

            map.fitBounds(polyline.getBounds());


            function haversineDistance(lat1, lon1, lat2, lon2) {
                const toRad = deg => deg * Math.PI / 180;
                const R = 6371;
                const dLat = toRad(lat2 - lat1);
                const dLon = toRad(lon2 - lon1);
                const a = Math.sin(dLat / 2) ** 2 +
                    Math.cos(toRad(lat1)) * Math.cos(toRad(lat2)) *
                    Math.sin(dLon / 2) ** 2;
                const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
                return R * c;
            }


            let totalDistance = 0;
            for (let i = 0; i < halteData.length - 1; i++) {
                let d = haversineDistance(
                    halteData[i].lat, halteData[i].lng,
                    halteData[i + 1].lat, halteData[i + 1].lng
                );
                totalDistance += d;


                let liElem = document.querySelectorAll('#rute-list li')[i];
                if (liElem) {
                    liElem.querySelector('.jarak-ke-selanjutnya').innerText =
                        `(Jarak ke halte selanjutnya: ${d.toFixed(2)} km)`;
                }
            }


            const speed = 50; // km/jam
            const estimatedTimeMinutes = (totalDistance / speed) * 60;

            const infoDiv = document.createElement('div');
            infoDiv.style.marginTop = "20px";
            infoDiv.style.paddingLeft = "20px";
            infoDiv.innerHTML = `
            <p><strong>Total Jarak:</strong> ${totalDistance.toFixed(2)} km</p>
            <p><strong>Estimasi Waktu Tempuh:</strong> ${Math.ceil(estimatedTimeMinutes)} menit</p>
        `;
            document.getElementById('map').after(infoDiv);
        </script>

    <?php elseif (isset($hasil_rute)): ?>
        <p style="margin-top: 20px; padding-left: 20px;"><strong>Rute tidak ditemukan antara halte yang dipilih.</strong></p>
    <?php endif; ?>


</div>
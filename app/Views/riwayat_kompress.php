<div class="card shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body d-flex align-items-center justify-content-between p-4">
        <h4 class="fw-semibold mb-0">Riwayat Kompress</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a class="text-muted text-decoration-none" href="<?= base_url('/') ?>">Riwayat</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Kompress</li>
            </ol>
        </nav>
    </div>
</div>

<div class="card w-100 position-relative overflow-hidden">

    <div class="px-4 py-3 border-bottom">

        <div class="table-responsive mb-4 px-4">

            <table class="table border text-nowrap mb-0 align-middle" id="zero_config">
                <thead class="text-dark fs-4">
                    <tr>
                        <th>
                            <h6 class="fs-4 fw-semibold mb-0">Nama Gambar</h6>
                        </th>
                        <th>
                            <h6 class="fs-4 fw-semibold mb-0">Kode Gambar</h6>
                        </th>
                        <th>
                            <h6 class="fs-4 fw-semibold mb-0">Ukuran </h6>
                        </th>
                        <th>
                            <h6 class="fs-4 fw-semibold mb-0">Status</h6>
                        </th>
                        <th>
                            <h6 class="fs-4 fw-semibold mb-0">File</h6>
                        </th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($kompress as $row) : ?>
                        <tr>
                            <td><?= esc($row->nama_gambar) ?></td>
                            <td><?= esc($row->kodegambar) ?></td>
                            <td><?= esc($row->ukuran) ?></td>
                            <td><?= esc($row->status) ?></td>
                            <td><a href="<?php echo base_url('public/foto_kompress/') . $row->nama_gambar ?>" target="_blank">Lihat</a></td>

                        </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>

    </div>





</div>


</div>
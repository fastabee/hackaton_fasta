<div class="card shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body d-flex align-items-center justify-content-between p-4">
        <h4 class="fw-semibold mb-0">Datamaster Halte</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a class="text-muted text-decoration-none" href="<?= base_url('/') ?>">Datamaster</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Halte</li>
            </ol>
        </nav>
    </div>
</div>

<div class="card w-100 position-relative overflow-hidden">
    <div class="px-4 py-3 border-bottom">
    </div>



    <div class="card-body px-4 pt-4 pb-2 d-flex justify-content-between align-items-start mb-1">
        <div>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#samedata-modal"
                style="display: inline-flex; align-items: center;">
                <iconify-icon icon="solar:import-broken" width="24" height="24" style="margin-right: 8px;">
                </iconify-icon>
                Import
            </button>

            <a href="<?php echo base_url('public/format_excell/format_halte.xlsx') ?>"><button type="button"
                    class="btn btn-success" style="display: inline-flex; align-items: center;">
                    <iconify-icon icon="solar:download-broken" width="24" height="24" style="margin-right: 8px;">
                    </iconify-icon>
                    Download Format Excell
                </button></a>
        </div>


        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#input-halte-modal"
            style="display: inline-flex; align-items: center;">
            <iconify-icon icon="solar:password-minimalistic-input-broken" width="24" height="24"
                style="margin-right: 8px;"></iconify-icon>Input
        </button>
    </div>

    <div class="table-responsive mb-4 px-4">
        <table class="table border text-nowrap mb-0 align-middle" id="zero_config">
            <thead class="text-dark fs-4">
                <tr>
                    <th>
                        <h6 class="fs-4 fw-semibold mb-0">Nama Halte</h6>
                    </th>
                    <th>
                        <h6 class="fs-4 fw-semibold mb-0">Latitude</h6>
                    </th>
                    <th>
                        <h6 class="fs-4 fw-semibold mb-0">Longtitude</h6>
                    </th>
                    <th>
                        <h6 class="fs-4 fw-semibold mb-0">Action</h6>
                    </th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($halte as $row) : ?>
                    <tr>
                        <td><?= esc($row->nama_halte) ?></td>
                        <td><?= esc($row->latitude) ?></td>
                        <td><?= esc($row->longtitude) ?></td>
                        <td>
                            <button type="button" class="btn btn-warning edit-button" data-bs-toggle="modal"
                                data-bs-target="#edit-halte-modal" data-id="<?= esc($row->id) ?>"
                                data-id_halte="<?= esc($row->id) ?>"
                                data-nama_halte="<?= esc($row->nama_halte) ?>"
                                data-latitude="<?= esc($row->latitude) ?>"
                                data-longtitude="<?= esc($row->longtitude) ?>">
                                <iconify-icon icon="solar:clapperboard-edit-broken" width="24" height="24"></iconify-icon>
                            </button>

                            <button type="button" class="btn btn-danger delete-button" data-bs-toggle="modal"
                                data-bs-target="#delete-halte-modal" data-id="<?= esc($row->id) ?>">
                                <iconify-icon icon="solar:trash-bin-minimalistic-broken" width="24" height="24">
                                </iconify-icon>
                            </button>
                        </td>
                    </tr>

                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Edit halte -->
<div class="modal fade" id="edit-halte-modal" tabindex="-1" aria-labelledby="edithalteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title" id="edithalteModalLabel">Edit Data halte</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('update_halte') ?>" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <input hidden type="text" class="form-control" id="edit_id" name="idnya" required>
                        <label for="edit_nama_halte" class="form-label">Nama halte</label>
                        <input type="text" class="form-control" id="edit_nama_halte" name="nama_halte" required>
                    </div>

                    <div class="mb-3">

                        <label for="edit_latitude" class="form-label">Latitude</label>
                        <input type="text" class="form-control" id="edit_latitude" name="latitude" required>
                    </div>

                    <div class="mb-3">
                        <label for="edit_longtitude" class="form-label">Longtitude</label>
                        <input type="text" class="form-control" id="edit_longtitude" name="longtitude" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-danger-subtle text-danger"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="samedata-modal" tabindex="-1" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title" id="exampleModalLabel1">
                    Import File Excell
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>



            <div class="modal-body">
                <form action="<?php echo base_url('import/halte') ?>" enctype="multipart/form-data" method="post">
                    <div class="mb-3">
                        <label for="recipient-name" class="control-label">file:</label>
                        <input type="File" class="form-control" name="file" id="recipient-name1" />
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-danger-subtle text-danger " data-bs-dismiss="modal">
                    Close
                </button>
                <button type="submit" class="btn btn-success">
                    Submit
                </button>
            </div>
            </form>
        </div>
    </div>
</div>






<!-- Input halte -->
<div class="modal fade" id="input-halte-modal" tabindex="-1" aria-labelledby="inputhalteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title" id="inputhalteModalLabel">Input Data halte</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('insert_halte') ?>" method="post">
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="nama_halte" class="form-label">Nama halte</label>
                        <input type="text" class="form-control" id="nama_halte" name="nama_halte" required>
                    </div>
                    <div class="mb-3">
                        <label for="latitude" class="form-label">Latitude </label>
                        <input type="text" class="form-control" id="latitude" name="latitude" required>
                    </div>
                    <div class="mb-3">
                        <label for="longtitude" class="form-label">Longtitude</label>
                        <input type="text" class="form-control" id="longtitude" name="longtitude" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-danger-subtle text-danger"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--  Delete halte -->
<div class="modal fade" id="delete-halte-modal" tabindex="-1" aria-labelledby="deletehalteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title" id="deletehalteModalLabel">Delete Data halte</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('delete_halte') ?>" method="post">
                <div class="modal-body">
                    <input hidden id="delete_id" name=" idnya">
                    <p style="font-style: italic;">Apa anda yakin ingin menghapus data ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-danger-subtle text-danger"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('#zero_config').addEventListener('click', function(e) {
            if (e.target.closest('.edit-button')) {
                const button = e.target.closest('.edit-button');
                const id_halte = button.getAttribute('data-id_halte');
                const nama_halte = button.getAttribute('data-nama_halte');
                const latitude_halte = button.getAttribute('data-latitude');
                const longtitude_halte = button.getAttribute('data-longtitude');


                document.getElementById('edit_id').value = id_halte;
                document.getElementById('edit_nama_halte').value = nama_halte;
                document.getElementById('edit_latitude').value = latitude_halte;
                document.getElementById('edit_longtitude').value = longtitude_halte;
            }

            if (e.target.closest('.delete-button')) {
                const button = e.target.closest('.delete-button');
                const id = button.getAttribute('data-id');
                document.getElementById('delete_id').value = id;
            }
        });
    });
</script>
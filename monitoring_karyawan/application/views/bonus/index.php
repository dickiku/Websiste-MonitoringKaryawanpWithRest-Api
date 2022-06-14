<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>

<div class="container-fluid">

    
    <h1 class="h3 mb-2 text-gray-800">Data Bonus Karyawan</h1>
    <div class="tollbar">
        <a href="<?php base_url(); ?>bonus/add"> <button type=" button" class="btn btn-primary"><i class="fas fa-plus"> </i> Tambah Data</button></a>
    </div>


    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Divisi</th>
                        <th>Telepon</th>
                        <th>Bulan</th>
                        <th>Bonus</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($bonus as $bns) : ?>
                        <tr>
                            <td><?= $bns['nama'] ?></td>
                            <td><?= $bns['jk'] ?></td>
                            <td><?= $bns['divisi'] ?></td>
                            <td><?= $bns['tlp'] ?></td>
                            <td><?= $bns['bulan'] ?></td>
                            <td>Rp. <?= $bns['bonus'] ?></td>
                            <td style="text-align: center;">
                                <a href="<?= base_url(); ?>bonus/update/<?= $bns['id_bonus']; ?>"><button type="button" class="btn btn-warning" title="Edit"><i class="fas fa-edit"></i></button></a>
                                <a href="<?= base_url(); ?>bonus/delete/<?= $bns['id_bonus']; ?>"><button type="button" class="btn btn-danger" onclick="return confirm('Apakah yakin anda ingin menghapus data ini?')" title="Delete"><i class="fas fa-trash"></i></button></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

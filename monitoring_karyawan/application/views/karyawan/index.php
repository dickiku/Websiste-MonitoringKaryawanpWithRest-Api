<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>

<div class="container-fluid">

    
    <h1 class="h3 mb-2 text-gray-800">Data Karyawan</h1>
    <div class="tollbar">
        <a href="<?php base_url(); ?>karyawan/add"> <button type=" button" class="btn btn-primary"><i class="fas fa-plus"> </i> Tambah Data</button></a>
    </div>


    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Divisi</th>
                        <th>Telepon</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($karyawan as $kry) : ?>
                        <tr>
                            <td><?= $kry['nama'] ?></td>
                            <td><?= $kry['nik'] ?></td>
                            <td><?= $kry['jk'] ?></td>
                            <td><?= $kry['alamat'] ?></td>
                            <td><?= $kry['divisi'] ?></td>
                            <td><?= $kry['tlp'] ?></td>
                            <td style="text-align: center;">
                                <a href="<?= base_url(); ?>karyawan/update/<?= $kry['id']; ?>"><button type="button" class="btn btn-warning" title="Edit"><i class="fas fa-edit"></i></button></a>
                                <a href="<?= base_url(); ?>karyawan/delete/<?= $kry['id']; ?>"><button type="button" class="btn btn-danger" onclick="return confirm('Apakah yakin anda ingin menghapus data ini?')" title="Delete"><i class="fas fa-trash"></i></button></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

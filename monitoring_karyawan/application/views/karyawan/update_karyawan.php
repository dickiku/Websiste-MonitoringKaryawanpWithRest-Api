<h1 class="h3 mb-2 text-gray-800">Form Data Karyawan</h1>
<form action="<?= base_url() ?>karyawan/update/<?= $karyawan['id']; ?>" method="post">
    <input type="hidden" name="id" value="<?= $karyawan['id']; ?>">
    <div class="row">
        <div class="col-md-4">
            <label for="nama" class="form-label">Nama *</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= $karyawan['nama']; ?>">
            <small class="form-text text-danger"><?= form_error('nama'); ?></small>
        </div>
        <div class="col-md-4">
            <label for="nik" class="form-label">NIK *</label>
            <input type="text" class="form-control" id="nik" name="nik" value="<?= $karyawan['nik']; ?>">
            <small class="form-text text-danger"><?= form_error('nik'); ?></small>
        </div>
        <div class="col-md-4">
            <label for="jk" class="form-label">Jenis Kelamin *</label>
            <select class="form-control" id="jk" name="jk">
                <?php foreach ($kelamin as $k) : ?>
                    <?php if ($k == $karyawan['jk']) : ?>
                        <option value="<?= $k; ?>" selected><?= $k; ?></option>
                    <?php else : ?>
                        <option value="<?= $k; ?>"><?= $k; ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4">
            <label for="alamat" class="form-label">Alamat *</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $karyawan['alamat']; ?>">
            <small class="form-text text-danger"><?= form_error('alamat'); ?></small>
        </div>
        <div class="col-md-4">
            <label for="divisi" class="form-label">Divisi</label>
            <select class="form-control" id="divisi" name="divisi">
                <?php foreach ($divisi as $d) : ?>
                    <?php if ($d == $karyawan['divisi']) : ?>
                        <option value="<?= $d; ?>" selected><?= $d; ?></option>
                    <?php else : ?>
                        <option value="<?= $d; ?>"><?= $d; ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-4">
            <label for="tlp" class="form-label">No Telepon *</label>
            <input type="text" class="form-control" id="tlp" name="tlp" value="<?= $karyawan['tlp']; ?>">
            <small class="form-text text-danger"><?= form_error('tlp'); ?></small>
        </div>
    </div>
    <br>
    <button type="submit" name="update" class="btn btn-primary">Submit</button>
</form>
<h1 class="h3 mb-2 text-gray-800">Form Data Karyawan</h1>
<form action="" method="post">
    <div class="row">
        <div class="col-md-4">
            <label for="nama" class="form-label">Nama *</label>
            <input type="text" class="form-control" id="nama" name="nama">
            <small class="form-text text-danger"><?= form_error('nama'); ?></small>
        </div>
        <div class="col-md-4">
            <label for="nik" class="form-label">NIK *</label>
            <input type="text" class="form-control" id="nik" name="nik">
            <small class="form-text text-danger"><?= form_error('nik'); ?></small>
        </div>
        <div class="col-md-4">
            <label for="jk" class="form-label">Jenis Kelamin *</label>
            <select class="form-control" id="jk" name="jk">
                <?php foreach ($kelamin as $k) : ?>
                    <option value="<?= $k; ?>"><?= $k; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4">
            <label for="alamat" class="form-label">Alamat *</label>
            <input type="text" class="form-control" id="alamat" name="alamat">
            <small class="form-text text-danger"><?= form_error('alamat'); ?></small>
        </div>
        <div class="col-md-4">
            <label for="divisi" class="form-label">Divisi</label>
            <select class="form-control" id="divisi" name="divisi">
                <?php foreach ($divisi as $d) : ?>
                    <option value="<?= $d; ?>"><?= $d; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-4">
            <label for="tlp" class="form-label">No Telepon *</label>
            <input type="text" class="form-control" id="tlp" name="tlp">
            <small class="form-text text-danger"><?= form_error('tlp'); ?></small>
        </div>
    </div>
    <br>
    <button type="submit" name="add" class="btn btn-primary">Submit</button>
</form>
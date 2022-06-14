<h1 class="h3 mb-2 text-gray-800">Form Data Karyawan</h1>
<form action="" method="post">
    <div class="row">
        <div class="col-md-4">
            <label for="id_data_karyawan" class="form-label">Nama Karyawan *</label>
            <select class="form-control" id="id_data_karyawan" name="id_data_karyawan">
                <?php foreach ($karyawan as $k) : ?>
                    <option value="<?= $k['id']; ?>"><?= $k['nama']; ?></option>
                <?php endforeach; ?>
            </select>
            <small class="form-text text-danger"><?= form_error('id_data_karyawan'); ?></small>
        </div>
        <div class="col-md-4">
            <label for="bulan" class="form-label">Bulan *</label>
            <select class="form-control" id="bulan" name="bulan">
                <?php foreach ($bulan as $b) : ?>
                    <option value="<?= $b; ?>"><?= $b; ?></option>
                <?php endforeach; ?>
            </select>
            <small class="form-text text-danger"><?= form_error('bulan'); ?></small>
        </div>
        <div class="col-md-4">
            <label for="bonus" class="form-label">Bonus *</label>
            <input type="text" class="form-control" id="bonus" name="bonus">
            <small class="form-text text-danger"><?= form_error('bonus'); ?></small>
        </div>
    </div>
    <br>
    <button type="submit" name="add" class="btn btn-primary">Submit</button>
</form>
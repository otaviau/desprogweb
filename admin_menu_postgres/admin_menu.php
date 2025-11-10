<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Menu - Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-expand-lg" style="background-color: #d32f2f;" data-bs-theme="dark">
    <div class="container-fluid">
      <img src="images/mie_ayam1.png" alt="" style="width: 50px;">
      <a class="navbar-brand" href="#">Mie Ayam Lezat</a>
    </div>
  </nav>

  <div class="container mt-5">
    <div class="row mb-3">
      <div class="col">
        <h2 class="float-start">Menu</h2>
      </div>
      <div class="col text-end">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah</button>
      </div>
    </div>

    <div class="card">
      <div class="card-body">
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama Menu</th>
              <th>Gambar</th>
              <th>Harga</th>
              <th>Deskripsi</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include 'koneksi.php';
            $query = "SELECT * FROM menu ORDER BY id ASC";
            $result = pg_query($conn, $query);
            $no = 1;
            while ($row = pg_fetch_assoc($result)) {
              echo "<tr>
                <td>{$no}</td>
                <td>{$row['nama_menu']}</td>
                <td><img src='images/{$row['gambar']}' style='width:50px;' class='rounded-2'></td>
                <td>Rp" . number_format($row['harga'], 0, ',', '.') . "</td>
                <td>{$row['deskripsi']}</td>
                <td>
                  <button class='btn btn-warning btn-sm btnEdit'
                    data-id='{$row['id']}'
                    data-nama='{$row['nama_menu']}'
                    data-harga='{$row['harga']}'
                    data-deskripsi='{$row['deskripsi']}'
                    data-gambar='{$row['gambar']}'>Ubah</button>

                  <button class='btn btn-danger btn-sm btnHapus'
                    data-id='{$row['id']}'
                    data-nama='{$row['nama_menu']}'>Hapus</button>
                </td>
              </tr>";
              $no++;
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Modal Tambah -->
  <form action="tambah_menu.php" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="modalTambah" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5">Tambah Menu</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label class="form-label">Nama Menu</label>
              <input type="text" class="form-control" name="nama_menu" required>
            </div>
            <div class="row">
              <div class="col-6">
                <label class="form-label">Unggah Gambar</label>
                <input class="form-control" type="file" name="gambar" required>
              </div>
              <div class="col-6">
                <label class="form-label">Harga</label>
                <input type="number" class="form-control" name="harga" required>
              </div>
            </div>
            <div class="mt-3">
              <label class="form-label">Deskripsi</label>
              <textarea class="form-control" name="deskripsi" rows="3" required></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn btn-warning">Ulangi</button>
            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </form>

  <!-- Modal Ubah -->
  <form action="ubah_menu.php" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="modalUbah" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5">Ubah Menu</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <input type="hidden" name="id" id="edit_id">
            <div class="mb-3">
              <label class="form-label">Nama Menu</label>
              <input type="text" class="form-control" name="nama_menu" id="edit_nama" required>
            </div>
            <div class="row">
              <div class="col-6">
                <label class="form-label">Gambar Baru (opsional)</label>
                <input class="form-control" type="file" name="gambar">
                <div class="mt-2">
                  <small>Gambar lama:</small><br>
                  <img id="edit_preview" src="" style="width:70px;">
                </div>
              </div>
              <div class="col-6">
                <label class="form-label">Harga</label>
                <input type="number" class="form-control" name="harga" id="edit_harga" required>
              </div>
            </div>
            <div class="mt-3">
              <label class="form-label">Deskripsi</label>
              <textarea class="form-control" name="deskripsi" id="edit_deskripsi" rows="3" required></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn btn-warning">Ulangi</button>
            <button type="submit" name="ubah" class="btn btn-primary">Simpan Perubahan</button>
          </div>
        </div>
      </div>
    </div>
  </form>

  <!-- Modal Hapus -->
  <form action="hapus_menu.php" method="post">
    <div class="modal fade" id="modalHapus" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-body text-center mb-5 mt-5">
            <input type="hidden" name="id" id="hapus_id">
            <p>Apakah Anda yakin ingin menghapus menu <strong id="hapus_nama"></strong>?</p>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" name="hapus" class="btn btn-danger">Hapus</button>
          </div>
        </div>
      </div>
    </div>
  </form>
  
          <div class="modal fade" id="hapusModal<?= $row['id'] ?>" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <form action="hapus_menu.php" method="POST">
                  <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <p>Yakin ingin menghapus <b><?= htmlspecialchars($row['nama_menu']) ?></b>?</p>
                    <button type="submit" class="btn btn-danger">Yakin!</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // --- Modal Ubah ---
    const editButtons = document.querySelectorAll('.btnEdit');
    const modalUbah = new bootstrap.Modal(document.getElementById('modalUbah'));

    editButtons.forEach(btn => {
      btn.addEventListener('click', function() {
        document.getElementById('edit_id').value = this.dataset.id;
        document.getElementById('edit_nama').value = this.dataset.nama;
        document.getElementById('edit_harga').value = this.dataset.harga;
        document.getElementById('edit_deskripsi').value = this.dataset.deskripsi;
        document.getElementById('edit_preview').src = 'images/' + this.dataset.gambar;
        modalUbah.show();
      });
    });

    // --- Modal Hapus ---
    const hapusButtons = document.querySelectorAll('.btnHapus');
    const modalHapus = new bootstrap.Modal(document.getElementById('modalHapus'));

    hapusButtons.forEach(btn => {
      btn.addEventListener('click', function() {
        document.getElementById('hapus_id').value = this.dataset.id;
        document.getElementById('hapus_nama').textContent = this.dataset.nama;
        modalHapus.show();
      });
    });
  </script>
</body>
</html>

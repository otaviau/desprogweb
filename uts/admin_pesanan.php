<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pesanan - Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>

  <nav class="navbar navbar-expand-lg" style="background-color: #d32f2f;" data-bs-theme="dark">
    <div class="container-fluid">
      <img src="images/mie_ayam1.png" alt="" style="width: 50px;">
      <a class="navbar-brand" href="#">Mie Ayam Lezat</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="admin_beranda.php">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="admin_pesanan.php">Pesanan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin_menu.php">Menu</a>
          </li>
        </ul>
        <div class="d-flex">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <b class="text-light" style="margin-right: 10px;">Admin</b>
              <img src="images/user.jpeg" class="rounded-circle mr-5" style="width: 40px;">
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="row">
      <div class="col mt-5 ms-3">
        <h2 class="float-start">Pesanan</h2>
      </div>
      <div class="col mt-5 me-3">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Tambah
        </button>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nama Menu</th>
              <th scope="col">Gambar</th>
              <th scope="col">Harga</th>
              <th scope="col">Deskripsi</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Mie Ayam Original</td>
              <td>
                <img src="images/mie-ayam-original.jpeg" class="rounded-2" style="width: 50px;" alt="...">
              </td>
              <td>Rp25.000</td>
              <td>Mie kenyal dengan ayam kecap gurih.</td>
              <td>
                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                  data-bs-target="#deleteModal">
                  Hapus
                </button>
                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                  data-bs-target="#updateModal">
                  Ubah
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>


  <!-- Modal tambah-->
  <form action="" method="post">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Menu</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Nama Menu</label>
              <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Menu">
              <div class="row mt-2">
                <div class="col-6">
                  <label for="exampleFormControlInput1" class="form-label">Unggah Gambar</label>
                  <input class="form-control" type="file" id="formFile">
                </div>
                <div class="col-6">
                  <label for="exampleFormControlInput1" class="form-label">Harga</label>
                  <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Harga">
                </div>
              </div>
              <div class="mt-2">
                <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                  placeholder="Deskripsi"></textarea>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn btn-warning">Ulangi</button>
            <a type="submit" class="btn btn-primary">Simpan</a>
          </div>
        </div>
      </div>
    </div>
  </form>

  <!-- Modal tambah-->
  <form action="" method="post">
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Menu</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Nama Menu</label>
              <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Menu">
              <div class="row mt-2">
                <div class="col-6">
                  <label for="exampleFormControlInput1" class="form-label">Unggah Gambar</label>
                  <input class="form-control" type="file" id="formFile">
                </div>
                <div class="col-6">
                  <label for="exampleFormControlInput1" class="form-label">Harga</label>
                  <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Harga">
                </div>
              </div>
              <div class="mt-2">
                <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                  placeholder="Deskripsi"></textarea>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn btn-warning">Ulangi</button>
            <a type="submit" class="btn btn-primary">Simpan</a>
          </div>
        </div>
      </div>
    </div>
  </form>

  <!-- Modal hapus-->
  <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body mb-5 mt-5">
          <div class="position-relative">
            <div class="position-absolute top-100 start-50 translate-middle">
                <p class="text-center">Yakin menghapus data?</p>
              <button type="reset" class="btn btn-danger ms-3">Yakin!</button>
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Batal!</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
  </script>
</body>

</html>
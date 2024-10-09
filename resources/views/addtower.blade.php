<x-layout>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
            <div class="d-flex justify-content-between">
                <div class="left">
                    <h3><i class="fas fa-rss"></i> Data Tower</h3>
                </div>
                <div class="right">
                    <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="/datatower">Home</a></li>
                      <li class="breadcrumb-item"><a href="/datatower">Data Tower</a></li>
                      <li class="breadcrumb-item active">Tambah Data tower</li>
                    </ol>
                </div>
            </div>
      </div><!-- container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title"style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Tambah Data Tower</h3>
        <div class="card-tools">
          <a href="/datatower" class="btn btn-sm btn-warning float-right"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
        </div>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form class="form-horizontal" action="{{route('addtower.post')}}" method="POST">
        @csrf
        <div class="card-body">
          <div class="form-group row">
            <label for="foto" class="col-sm-12 col-form-label"><span class="text-bold"><i class="fas fa-rss"></i> <u>TAMBAH DATA TOWER</u></span></label>
          </div>
          <div class="form-group row">
            <label for="paket" class="col-sm-3 col-form-label">Paket</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="paket" id="paket" value="">
            </div>
          </div>
          <div class="form-group row">
            <label for="site" class="col-sm-3 col-form-label">Site ID</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="siteID" id="site" value="">
            </div>
          </div>
          <div class="form-group row">
            <label for="province" class="col-sm-3 col-form-label">Provinsi</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="provinsi" id="province" value="">
            </div>
          </div>
          <div class="form-group row">
            <label for="kab" class="col-sm-3 col-form-label">Kabupaten</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="kabupaten" id="kab" value="">
            </div>
          </div>
          <div class="form-group row">
            <label for="kec" class="col-sm-3 col-form-label">Kecamatan</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="kecamatan" id="kec" value="">
            </div>
          </div>
          <div class="form-group row">
            <label for="desa" class="col-sm-3 col-form-label">Desa</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="desa" id="desa" value="">
            </div>
          </div>
          <div class="form-group row">
            <label for="lm" class="col-sm-3 col-form-label">LM / non-LM</label>
            <div class="col-sm-7">
              <select class="custom-select" name="LM_nonLM" id="lm">
                <option selected disabled>- Pilih -</option>
                <option value="LM">LM</option>
                <option value="non-LM">non-LM</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="koordinat" class="col-sm-3 col-form-label">Koordinat Usulan</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="koordinat_usulan" id="koordinat">
            </div>
          </div>
          <div class="form-group row">
            <label for="koordinat" class="col-sm-3 col-form-label">Koordinat Latt Usulan</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="koordinatlattUsulan" id="koordinat">
            </div>
          </div>
          <div class="form-group row">
            <label for="siteName" class="col-sm-3 col-form-label">Site Name</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="siteName" id="siteName" value="">
            </div>
          </div>
          <div class="form-group row">
            <label for="status" class="col-sm-3 col-form-label">Status</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="status" id="status" value="">
            </div>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-info float-right"><i class="fas fa-save"></i> Tambah</button>
          </div>  
        </div>
        <!-- /.card-footer -->
      </form>
    </div>
    <!-- /.card -->
    </section>
</x-layout>
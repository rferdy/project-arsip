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
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Data Tower</li>
                    </ol>
                </div>
            </div>
        </div><!-- container-fluid -->
    </section>
    
    <!-- Main Content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                <div class="d-flex flex-row flex-wrap justify-content-between">
                    <div class="left mt-2">
                        <a href="/addtower" class="btn btn-success my-2"><i class="fa fa-plus"></i> Tambah Data Tower</a>
                        <button class="btn btn-primary my-2" data-bs-target="#modalImport" data-bs-toggle="modal"><i class="fa fa-plus"></i> Import data</button>
                        {{-- <button class="btn btn-warning text-white"><i class="fa fa-plus"></i> Export data</button> --}}
                        {{-- Import POST modal --}}
                        <div class="modal fade" id="modalImport" tabindex="-1" aria-labelledby="importCC" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="text-bold" id="importCC">Import File Excel</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="{{route('importtower')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="input-group prepend mb-3">
                                                <input class="form-control" type="file" name="file" id="file">
                                            </div>
                                            <button class="btn btn-success" type="submit">Import</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- .row -->
            </div>
            <div class="card-body">
                <div class="table-responsive">
                  <table id="tableData" class="table table-bordered table-striped table-light table-hover">
                      <thead>
                          <tr class="text-center">
                              <th scope="col">No.</th>
                              <th scope="col">Paket</th>
                              <th scope="col">SiteID</th>
                              <th scope="col">Provinsi</th>
                              <th scope="col">Kabupaten</th>
                              <th scope="col">Kecamatan</th>
                              <th scope="col">Desa</th>
                              <th scope="col">LM / Non LM</th>
                              <th scope="col">Koordinat Usulan</th>
                              <th scope="col">Koordinat Latt Usulan</th>
                              <th scope="col">Site Name</th>
                              <th scope="col">Status</th>
                              <th scope="col">Dokumen</th>
                              <th scope="col">Aksi</th>
                          </tr>
                      </thead>
                      <tbody class="text-center">
                        {{-- Table --}}
                        @foreach ($datas as $no=>$data)
                        <tr>
                            <th>{{ $no+1 }}</th>
                            <td>{{ $data->paket }}</td>
                            <td>{{ $data->siteID }}</td>
                            <td>{{ $data->provinsi }}</td>
                            <td>{{ $data->kabupaten }}</td>
                            <td>{{ $data->kecamatan }}</td>
                            <td>{{ $data->desa }}</td>
                            <td>{{ $data->LM_nonLM }}</td>
                            <td>{{ $data->koordinat_usulan }}</td>
                            <td>{{ $data->koordinatlattUsulan }}</td>
                            <td>{{ $data->siteName }}</td>
                            <td>{{ $data->status }}</td>
                            <td>
                                @if ($data->documents->isNotEmpty())
                                    @foreach ($data->documents as $dokumen)
                                        <a href="{{Storage::url($dokumen->file_path)}}" target="_blank">{{$dokumen->file_name}}</a>
                                    @endforeach
                                    @else
                                    tidak ada dokumen
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $data->id }}"><i class="fa fa-edit"></i></button>
                                <button class="btn btn-warning mb-2" data-bs-toggle="modal" data-bs-target="#modalDoc{{ $data->id }}"><i class="fa fa-file"></i></button>
                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{$data->id}}"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                        {{-- Modal Delete --}}
                        <div class="modal fade" id="modalDelete{{ $data->id }}" tabindex="-1" aria-labelledby="deleteCC" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="deleteCC">Yakin ingin menghapus {{$data->siteID}} {{$data->siteName}}</h1>
                                    </div>
                                    <div class="modal-body">
                                        Data yang telah dihapus tidak dapat dikembalikan ulang! Harap berhati-hati!
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('datatower.delete', $data->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">Ya, Hapus data</button>
                                        </form>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Modal Edit --}}
                        <div class="modal fade" id="modalEdit{{ $data->id }}" tabindex="-1" aria-labelledby="deleteCC" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="text-bold">Edit Data {{ $data->siteID }}</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" action="{{route('edittower.update', $data->id)}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="card-body">
                                              <div class="form-group row">
                                                <label for="paket" class="col-sm-3 col-form-label">Paket</label>
                                                <div class="col-sm-7">
                                                  <input type="text" class="form-control" name="paket" id="paket" value="{{$data->paket}}">
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label for="site" class="col-sm-3 col-form-label">Site ID</label>
                                                <div class="col-sm-7">
                                                  <input type="text" class="form-control" name="siteID" id="site" value="{{$data->siteID}}">
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label for="province" class="col-sm-3 col-form-label">Provinsi</label>
                                                <div class="col-sm-7">
                                                  <input type="text" class="form-control" name="provinsi" id="province" value="{{$data->provinsi}}">
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label for="kab" class="col-sm-3 col-form-label">Kabupaten</label>
                                                <div class="col-sm-7">
                                                  <input type="text" class="form-control" name="kabupaten" id="kab" value="{{$data->kabupaten}}">
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label for="kec" class="col-sm-3 col-form-label">Kecamatan</label>
                                                <div class="col-sm-7">
                                                  <input type="text" class="form-control" name="kecamatan" id="kec" value="{{$data->kecamatan}}">
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label for="desa" class="col-sm-3 col-form-label">Desa</label>
                                                <div class="col-sm-7">
                                                  <input type="text" class="form-control" name="desa" id="desa" value="{{$data->desa}}">
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label for="lm" class="col-sm-3 col-form-label">LM / non-LM</label>
                                                <div class="col-sm-7">
                                                  <select class="custom-select" name="LM_nonLM" id="lm">
                                                    <option selected value="{{$data->LM_nonLM}}">{{$data->LM_nonLM}}</option>
                                                    <option value="LM">LM</option>
                                                    <option value="non-LM">non-LM</option>
                                                  </select>
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label for="koordinat" class="col-sm-3 col-form-label">Koordinat Usulan</label>
                                                <div class="col-sm-7">
                                                  <input type="text" class="form-control" name="koordinat_usulan" id="koordinat" value="{{$data->koordinat_usulan}}">
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label for="koordinat" class="col-sm-3 col-form-label">Koordinat Latt Usulan</label>
                                                <div class="col-sm-7">
                                                  <input type="text" class="form-control" name="koordinatlattUsulan" id="koordinat" value="{{$data->koordinatlattUsulan}}">
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label for="siteName" class="col-sm-3 col-form-label">Site Name</label>
                                                <div class="col-sm-7">
                                                  <input type="text" class="form-control" name="siteName" id="siteName" value="{{$data->siteName}}">
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label for="status" class="col-sm-3 col-form-label">Status</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" name="status" id="status" value="{{$data->status}}">
                                                </div>
                                              </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                            <button type="submit" class="btn btn-success">Update Data</button>
                                        </form>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Modal Doc --}}
                        <div class="modal fade" id="modalDoc{{ $data->id }}" tabindex="-1" aria-labelledby="DoxCC" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="text-bold" id="DoxCC">Import Dokumen</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="{{route('doxupload', $data->id)}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="input-group prepend mb-3">
                                                <input class="form-control" type="file" name="document" id="file">
                                            </div>
                                            <button class="btn btn-success" type="submit">Import</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                      </tbody>
                  </table> 
                </div>
            </div>
        </div>
    </section>
    
    {{-- Datatables --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
       new DataTable('#tableData')
    </script>
</x-layout>
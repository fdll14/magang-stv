@extends('dashboard.layouts.main')
@section('container')
<div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3 class="font-weight-bold">Welcome {{ Auth::user()->name }}</h3>
            <h6 class="font-weight-normal mb-0">Semoga Hari Mu Selalu Menyenangkan!</h6>
          </div>
        </div>
      </div>
    </div>
    @can('isAdmin')
    <div class="row">
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            
              <h4 class="card-title">Table Penilaian</h4>
              <div class="table-responsive">
                  <table class="table table-hover">
                      <thead>
                        
                          <tr>
                              <th>
                                  #
                              </th>
                              <th>
                                  Nama
                              </th>
                              <th>
                                Asal Sekolah/Kampus
                              </th>
                              <th>
                                Nilai Pembimbing
                              </th>
                              <th>
                                  Action
                              </th>
                          </tr>
                      </thead>
                      <tbody>
                        @forelse ($data as $row)
                          <tr>
                            <td>{{ $data->currentPage() * 5 - 5 + $loop->iteration }}</td>
                              <td>{{ $row->name }}</td>
                              <td>{{ $row->asal }}</td>
                              <td>{{ ($row->kehadiran+$row->kedisiplinan+$row->tanggungjawab+$row->ketekunan+$row->sopansantun+$row->kreatifitas+$row->inovatif+$row->dayajuang+$row->percayadiri+$row->kerjasama+$row->hubungansosial+$row->adaptasi+$row->persiapankerja+$row->pelaksanaankerja+$row->hasilkerja)/15 }}</td>
                              <td>
                                <a href="{{ route('nilai.edit', Crypt::encryptString($row->id)) }}" class="btn btn-sm btn-success">Detail Nilai</a>
                              </td>
                              @endforeach
                      </tbody>
                  </table>
              </div>
              <div class="mt-4 ml-3">{{ $data->render() }}</div>
              
          </div>
      </div>
      </div>
    </div>
    @endcan
</div>
@endsection
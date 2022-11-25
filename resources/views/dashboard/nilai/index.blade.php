@extends('dashboard.layouts.main')

@section('container')

    <div class="content-wrapper">

        <div class="row">

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Nilai Akhir</h4>
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
                                            Jurusan
                                        </th>
                                        <th>
                                            Asal
                                        </th>
                                        <th>
                                            Nilai
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
                                        <td>{{ $row->jurusan }}</td>
                                        <td>{{ $row->asal }}</td>
                                        <td>{{ ($row->kehadiran+$row->kedisiplinan+$row->tanggungjawab+$row->ketekunan+$row->sopansantun+$row->kreatifitas+$row->inovatif+$row->dayajuang+$row->percayadiri+$row->kerjasama+$row->hubungansosial+$row->adaptasi+$row->persiapankerja+$row->pelaksanaankerja+$row->hasilkerja)/15 }}</td>
                                        <td>
                                            @can('isAdmin')
                                            <a href="{{ route('nilai.edit', Crypt::encryptString($row->id)) }}" class="btn btn-sm btn-success">Detail Nilai</a>
                                            @endcan
                                            @can('isMagang')
                                            <a href="{{ route('nilai.show', Crypt::encryptString($row->id)) }}" class="btn btn-sm btn-success">Detail Nilai</a>
                                            @endcan
                                        </td>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4 ml-3">{{ $data->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

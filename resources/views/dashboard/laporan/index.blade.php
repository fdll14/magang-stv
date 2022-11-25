@extends('dashboard.layouts.main')

@section('container')
    <div class="content-wrapper">

        <div class="row">
            @can('isMagang')
                <a href="{{ route('laporan.create') }}" class="btn btn-md btn-success mb-4 ml-3 float-right">Tambah</a>
            @endcan
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Daftar Laporan</h4>
                        <div class="table-responsive">
                            <form action="">
                                <div class="input-group mb-3">
                                    <input type="text" name="q" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="keyword..."
                                        aria-label="keyword..." aria-describedby="button-addon-search"
                                        value="{{ app('request')->input('q') }}">
                                    <button class="btn btn-outline-primary btn-fw mb-2" type="submit"
                                        id="button-addon-search">Search</button>
                                </div>
                            </form>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            No
                                        </th>
                                        <th>
                                            Nama
                                        </th>

                                        <th>
                                            Laporan
                                        </th>
                                        <th>
                                            Date
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        @can('isAdmin')
                                        <th>
                                            Action
                                        </th>
                                        @endcan

                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($data as $row)
                                        <tr>

                                            <td>{{ $data->currentPage() * 10 - 10 + $loop->iteration }}</td>


                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->laporan }}</td>
                                            <td>{{ $row->tgl_laporan }}</td>
                                            @if ($row->status == 0)
                                                <td>
                                                    <label class="badge badge-warning">Pending</label>
                                                @else
                                                <td>
                                                    <label class="badge badge-success">Disetujui</label>
                                                </td>
                                            @endif
                                            @can('isAdmin')
                                                <td>
                                                    <div class="row">
                                                        <input type="button" class="btn btn-info btn-sm mr-2"
                                                            onclick="location.href='{{ route('laporan.edit', Crypt::encryptString($row->id)) }}';"
                                                            value="Update" />
                                                        <form
                                                            action="{{ route('laporan.destroy', Crypt::encryptString($row->id)) }}"
                                                            class="pull-left" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger btn-sm delete-action"
                                                                onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            @endcan
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4 ml-3">{{ $data->render() }}</div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

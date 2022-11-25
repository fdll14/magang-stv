@extends('dashboard.layouts.main')

@section('container')

    <div class="content-wrapper">

        <div class="row">
            <a href="{{ route('users.create') }}" class="btn btn-md btn-success mb-4 ml-3 float-right">Tambah</a>

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">List Magang</h4>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            NIM
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
                                            Username
                                        </th>
                                        <th>
                                            Email
                                        </th>
                                        <th>
                                            Nohp
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($data as $row)
                                    <tr>
                                        <td>{{ $row->NIM }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->jurusan }}</td>
                                        <td>{{ $row->asal }}</td>
                                        <td>{{ $row->username }}</td>
                                        <td>{{ $row->email }}</td>
                                        <td>{{ $row->nohp }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-info btn-sm dropdown-toggle" type="button" id="dropdownMenuSizeButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                  Action
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton3">
                                                  <a class="dropdown-item" href="{{ route('users.edit', Crypt::encryptString($row->id)) }}">Edit</a>
                                                  <form action="{{ route('users.destroy', Crypt::encryptString($row->id)) }}"
                                                    class="pull-left" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="dropdown-item"
                                                        onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                                        Delete
                                                    </button>
                                                </form>
                                                </div>
                                              </div>
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

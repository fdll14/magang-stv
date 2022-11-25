@extends('dashboard.layouts.main')

@section('container')
<div class="content-wrapper">
    <div class="row">
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Masukan Nilai</h4>
            <form class="forms-sample" action="{{ route('users.update', Crypt::encryptString($row->id)) }}" method="POST">
                @csrf
                @method('PUT')
              <div class="form-group">
                <label for="kehadiran">Kehadiran</label>
                <input type="text" class="form-control  @error('kehadiran') is-invalid @enderror" name="kehadiran" id="kehadiran" placeholder="kehadiran" value="{{ old('kehadiran', $row->kehadiran)}} " readonly >

                @error('kehadiran')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="kedisiplinan">Kedisiplinan</label>
                <input type="text" class="form-control  @error('kedisiplinan') is-invalid @enderror" name="kedisiplinan" id="kedisiplinan" placeholder="kedisiplinan" value="{{ old('kedisiplinan', $row->kedisiplinan)  }}" readonly>

                @error('kedisiplinan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="tanggungjawab">Tanggung Jawab</label>
                <input type="text" class="form-control @error('tanggungjawab') is-invalid @enderror" name="tanggungjawab" id="tanggungjawab" placeholder="tanggungjawab" value="{{ old('tanggungjawab', $row->tanggungjawab)   }}" readonly>

                @error('tanggungjawab')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="ketekunan">Ketekunan</label>
                <input type="text" class="form-control  @error('ketekunan') is-invalid @enderror" name="ketekunan" id="ketekunan" placeholder="Nama Lengkap" value="{{ old('ketekunan', $row->ketekunan)   }}" readonly>

                @error('ketekunan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="sopansantun">Sopan Santun</label>
                <input type="text" class="form-control  @error('sopansantun') is-invalid @enderror" name="sopansantun" id="sopansantun" placeholder="sopansantun" value="{{ old('sopansantun', $row->sopansantun)   }}" readonly>

                @error('sopansantun')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="kreatifitas">Kreatifitas</label>
                <input type="text" class="form-control  @error('kreatifitas') is-invalid @enderror" name="kreatifitas" id="kreatifitas" placeholder="kreatifitas" value="{{ old('kreatifitas', $row->kreatifitas)   }}" readonly>

                @error('kreatifitas')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="inovatif">Inovatif</label>
                <input type="text" class="form-control  @error('inovatif') is-invalid @enderror" name="inovatif" id="inovatif" placeholder="inovatif" value="{{ old('inovatif', $row->inovatif  )  }}" readonly>

                @error('inovatif')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="dayajuang">Daya Juang</label>
                <input type="text" class="form-control  @error('dayajuang') is-invalid @enderror" name="dayajuang" id="dayajuang" placeholder="dayajuang" value="{{ old('dayajuang', $row->dayajuang  )  }}" readonly>

                @error('dayajuang')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="percayadiri">Percaya Diri</label>
                <input type="text" class="form-control  @error('percayadiri') is-invalid @enderror" name="percayadiri" id="percayadiri" placeholder="percayadiri" value="{{ old('percayadiri', $row->percayadiri  )  }}" readonly>

                @error('percayadiri')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="kerjasama">Kerjasama</label>
                <input type="text" class="form-control  @error('kerjasama') is-invalid @enderror" name="kerjasama" id="kerjasama" placeholder="kerjasama" value="{{ old('kerjasama', $row->kerjasama  )  }}" readonly>

                @error('kerjasama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="hubungansosial">Hubungan Sosial</label>
                <input type="text" class="form-control  @error('hubungansosial') is-invalid @enderror" name="hubungansosial" id="hubungansosial" placeholder="hubungansosial" value="{{ old('hubungansosial', $row->hubungansosial  )  }}" readonly>

                @error('hubungansosial')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="adaptasi">Adaptasi</label>
                <input type="text" class="form-control  @error('adaptasi') is-invalid @enderror" name="adaptasi" id="adaptasi" placeholder="adaptasi" value="{{ old('adaptasi', $row->adaptasi  )  }}" readonly>

                @error('adaptasi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="persiapankerja">Persiapan Kerja</label>
                <input type="text" class="form-control  @error('persiapankerja') is-invalid @enderror" name="persiapankerja" id="persiapankerja" placeholder="persiapankerja" value="{{ old('persiapankerja', $row->persiapankerja  )  }}" readonly>

                @error('persiapankerja')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="pelaksanaankerja">Pelaksanaan Kerja</label>
                <input type="text" class="form-control  @error('pelaksanaankerja') is-invalid @enderror" name="pelaksanaankerja" id="pelaksanaankerja" placeholder="pelaksanaankerja" value="{{ old('pelaksanaankerja', $row->pelaksanaankerja  )  }}" readonly>

                @error('pelaksanaankerja')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="hasilkerja">Hasil Kerja</label>
                <input type="text" class="form-control  @error('hasilkerja') is-invalid @enderror" name="hasilkerja" id="hasilkerja" placeholder="hasilkerja" value="{{ old('hasilkerja', $row->hasilkerja  )  }}" readonly>

                @error('hasilkerja')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <a href="{{ route('nilai.index') }}" class="btn btn-light">Kembali</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

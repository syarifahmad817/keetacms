@extends('layouts.master')
@section('tittle', __('Ubah Halaman - KeetaCMS Admin'))
@section('konten')

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        @if(session('sukses'))
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              {{session('sukses')}}
          </div>
          @endif
      </div>
      <form method="POST" action="{{route('halaman.update', $halaman->id)}}">
        @csrf
        @method('PUT')
      <div class="col-md-9">
        <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">{{ __('Ubah Halaman')}}</h3>
            </div>
            <div class="box-body">
              <input type="text" name="judul" class="form-control input-lg" value="{{$halaman->judul}}">
              <br>
              <textarea id="editor1" name="isi">{{$halaman->isi}}</textarea>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">{{ __('Pengaturan SEO')}}</h3>
            </div>
            <div class="box-body">
              <table class="table">
                <tr>
                  <th width="200">{{ __('Judul SEO')}}</th>
                  <td>
                    <input type="text" name="judul_seo" class="form-control" onKeyUp='HitungText2()' value="{{$halaman->judul_seo}}">
                    <!-- <span align='center' id='judul'>0 karakter. </span>Sebagian besar mesin pencari memakai maksimum 60 karakter untuk judul. -->
                  </td>
                </tr>
                <tr>
                  <th width="200">{{ __('Deskripsi')}}</th>
                  <td>
                    <textarea class="form-control" name="deskripsi" rows="3" onKeyUp='HitungText2()'>{{$halaman->deskripsi}}</textarea>
                    <!-- <span align='center' id='deskripsi'>0 karakter. </span>Sebagian besar mesin pencari memakai maksimum 160 karakter untuk deskripsi. -->
                  </td>
                </tr>
                <tr>
                  <th width="200">{{ __('Kata Kunci/Keywords')}}</th>
                  <td>
                    <textarea name="keyword" class="form-control" rows="3">{{$halaman->keyword}}</textarea>
                    <!-- Pisahkan dengan tanda koma. Contoh : keyword 1, keyword 2 -->
                  </td>
                </tr>
              </table>
            </div>
          </div>
          
      </div>
      <div class="col-md-3">
        <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">{{ __('Pengaturan')}}</h3>
            </div>
            <div class="box-body">
              <div class="form-group">
                <label for="status">{{ __('Status')}}</label>
                <select id="status" name="status" class="form-control form-control-sm">
                  <option selected value="Aktif">{{ __('Aktif')}}</option>
                  <option value="Draft">{{ __('Draft')}}</option>
                </select>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <a href="{{route('halaman.index')}}" class="btn btn-danger btn-sm">{{ __('Batal')}}</a>
              <button type="submit" class="btn btn-primary btn-sm pull-right">{{ __('Publikasi')}}</button>
            </div>
          </div>
          <!-- /.box -->

      </div>
      <div class="col-md-3">
        <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">{{ __('Gambar Tajuk')}}</h3>
            </div>
            <div class="box-body">
              <div class="input-group">
                <span class="input-group-btn">
                  <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                    <i class="fa fa-archive ml-1"></i>
                  </a>
                </span>
                <input id="thumbnail" class="form-control" type="text" name="gambar" value="{{$halaman->gambar}}">
              </div>
              @if($halaman->gambar != null)
                <img id="holder" src="{{asset($halaman->gambar)}}" style="margin-top:15px;max-height:100px; width: 100%">
              @endif
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      </div>
      </form>
    </div>
  </section>

@endsection
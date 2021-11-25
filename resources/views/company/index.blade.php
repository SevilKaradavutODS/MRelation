@extends('layouts.master')

@section('content')

<div class="content-wrapper">


  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">FİRMALAR</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
      

        <table id="example" class="display" style="width:100%">
          <thead>
            <tr>
              <th>id</th>
              <th>Adı</th>
              <th>Şehir</th>
              <th>Ülke</th>
              <th>Keyword</th>
              <th>Açıklama</th>
              <th>Durum</th>
              <th>İşlemler</th>

            </tr>
          </thead>
          @foreach($company as $c)
          <tbody>
            <tr>
              <td>{{$c->id}}</td>
              <td>{{$c->name}}</td>
              <td>{{$c->city}}</td>
              <td>{{$c->country}}</td>
              <td>{{$c->keyword}}</td>
              <td>{{$c->description}}</td>
              <td>{{$c->status}}</td>
              <td><a href="{{ route('company_edit', ['id' => $c->id]) }}"><button type="button" style="background-color:lightgreen;">Düzenle</button></a>
                <a href="{{ route('company_destroy', ['id' => $c->id]) }}" onclick="return confirm('Silmek istediğinize emin misiniz?')"><button type="button" style="background-color:#ff0000;">Sil</button></a>
              </td>
           

            </tr>

          </tbody>

          @endforeach
        
        </table>
        
        <br> <br>
        <button><a href="{{URL('/company_create')}}">Firma Ekle</a></button>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">

      </div>
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
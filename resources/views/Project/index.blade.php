@extends('layouts.master')

@section('content')

<div class="content-wrapper">


  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">PROJELER</h3>

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
              <th>company_id</th>
              <th>work_id</th>
              <th>Sözleşme Fiyatı</th>
              <th>Sözleşme Tarihi</th>
              <th>Durum</th>
              <th>Başlangıç Tarihi</th>
              <th>Bitiş Tarihi</th>
              <th>Aktiflik</th>
              <th>İşlemler</th>

            </tr>
          </thead>
          @foreach($projects as $p)
          <tbody>
            <tr>
              <td>{{$p->id}}</td>
              <td>{{$p->company_id}}</td>
              <td>{{$p->work_id}}</td>
              <td>{{$p->contract_amount}}</td>
              <td>{{$p->contract_date}}</td>
              <td>{{$p->state}}</td>
              <td>{{$p->start_date}}</td>
              <td>{{$p->end_date}}</td>
              <td>{{$p->status}}</td>
              <td><a href="{{ route('project_edit', ['id' => $p->id]) }}"><button type="button" style="background-color:lightgreen;">Düzenle</button></a>
                <a href="{{ route('project_destroy', ['id' => $p->id]) }}" onclick="return confirm('Silmek istediğinize emin misiniz?')"><button type="button" style="background-color:#ff0000;">Sil</button></a>
              </td>
           

            </tr>

          </tbody>

          @endforeach
        
        </table>
        
        <br> <br>
        <button><a href="{{URL('/project_create')}}">Proje Ekle</a></button>
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
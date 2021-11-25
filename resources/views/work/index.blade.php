@extends('layouts.master')

@section('content')

<div class="content-wrapper">


  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">İŞLER</h3>

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
              <th>Tür</th>
              <th>İsim</th>
              <th>Durum</th>
              <th>Parent</th>
              <th>Parent ID</th>
              <th>İşlemler</th>

            </tr>
          </thead>
          @foreach($works as $w)
          <tbody>
            <tr>
              <td>{{$w->id}}</td>
              <td>{{$w->type}}</td>
              <td>{{$w->name}}</td>
              <td>{{$w->status}}</td>
              <td>{{$w->parent_id}}</td>
              <td>{{ \App\Http\Controllers\WorkController::getParentsTree($w, $w->name) }}</td>
              <td><a href="{{ route('work_edit', ['id' => $w->id]) }}"><button type="button" style="background-color:lightgreen;">Düzenle</button></a>
                <a href="{{ route('work_destroy', ['id' => $w->id]) }}" onclick="return confirm('Silmek istediğinize emin misiniz?')"><button type="button" style="background-color:#ff0000;">Sil</button></a>
              </td>
           

            </tr>

          </tbody>

          @endforeach
        
        </table>
        
        <br> <br>
        <button><a href="{{URL('/work_create')}}">İş Ekle</a></button>
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
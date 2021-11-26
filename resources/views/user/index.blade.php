@extends('layouts.master')

@section('content')

<div class="content-wrapper">


  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">KULLANICILAR</h3>

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
              <th>Resim</th>
              <th>Adı</th>
              <th>Bölüm</th>
              <th>Bölge</th>
              <th>Ünvan</th>
              <th>Saatlik Ücret</th>
              <th>Rol</th>
              <th>Telefon</th>
              <th>E-Posta</th>
              <th>Adres</th>
              <th>İşlemler</th>

            </tr>
          </thead>
          @foreach($users as $u)
          <tbody>
            <tr>
              <td>{{$u->id}}</td>
              <td>{{$u->profile_photo_path}}</td>
              <td>{{$u->name}}</td>
              <td>{{$u->departmant->name}}</td>
              <td>{{$u->title}}</td>
              <td>{{$u->region}}</td>
              <td>{{$u->hourly_price}}</td>
              <td>{{$u->role->name}}</td>
              <td>{{$u->phone}}</td>
              <td>{{$u->email}}</td>
              <td>{{$u->address}}</td>
              <td><a href="{{ route('user_edit', ['id' => $u->id]) }}"><button type="button" style="background-color:lightgreen;">Düzenle</button></a>
                <a href="{{ route('user_destroy', ['id' => $u->id]) }}" onclick="return confirm('Silmek istediğinize emin misiniz?')"><button type="button" style="background-color:#ff0000;">Sil</button></a>
              </td>
           

            </tr>

          </tbody>

          @endforeach
        
        </table>
        
        <br> <br>
        <button><a href="{{URL('/user_create')}}">Kullanıcı Ekle</a></button>
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
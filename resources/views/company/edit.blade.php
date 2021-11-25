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
      <h3 class="card-title"></h3>
              </div>
              <form action="{{route('company_update', ['id' => $companyedit->id])}}" method="post">
                  @csrf
              <div class="card-body">
                <input class="form-control form-control-lg" type="text" placeholder="Adı" name="name"; value="{{ $companyedit->name }}">
                <br>
                <input class="form-control form-control-lg" type="text" placeholder="Şehir" name="city"; value="{{ $companyedit->city }}">
                <br>
                <input class="form-control form-control-lg" type="text" placeholder="Ülke" name="country"; value="{{ $companyedit->country }}">
                <br>
                <input class="form-control form-control-lg" type="text" placeholder="Anahtar Kelime" name="keyword"; value="{{ $companyedit->keyword }}">
                <br>
                <input class="form-control form-control-lg" type="text" placeholder="Açıklama" name="description"; value="{{ $companyedit->description }}">
                <br>
                <input class="form-control form-control-lg" type="text" placeholder="Durum" name="status"; value="{{ $companyedit->status }}">
                <br>
                <a href="{{URL('company')}}"> <input type="submit" value="Gönder" /> </a> <br>
              </div>
              <br>
            <button type="button"><a href="{{URL('company')}}">Firmalar</a></button>

</form>
        
        <br> <br>
        
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
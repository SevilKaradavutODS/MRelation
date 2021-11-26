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
        <h3 class="card-title"></h3>
      </div>
      <form action="{{route('project_update', ['id' => $projectedit->id])}}" method="post">
        @csrf
        <div class="card-body">


          <select name="company_id">
            @foreach($datalist as $company)
            <option value="{{$company->id}}">{{$company->name}}</option>
            @endforeach
          </select>





          <select name="work_id">
            @foreach($works as $work)
            <option value="{{$work->id}}">{{$work->name}}</option>
            @endforeach
          </select>



          <input class="form-control form-control-lg" type="text" placeholder="" name="contract_amount" ; value="{{ $projectedit->contract_amount }}">
          <br>
          <input class="form-control form-control-lg" type="text" placeholder="" name="contract_date" ; value="{{ $projectedit->contract_date }}">
          <br>
          <input class="form-control form-control-lg" type="text" placeholder="" name="state" ; value="{{ $projectedit->state }}">
          <br>
          <input class="form-control form-control-lg" type="text" placeholder="" name="start_date" ; value="{{ $projectedit->start_Date }}">
          <br>
          <input class="form-control form-control-lg" type="text" placeholder="" name="end_Date" ; value="{{ $projectedit->end_date }}">
          <br>
          <input class="form-control form-control-lg" type="text" placeholder="" name="status" ; value="{{ $projectedit->status }}">
          <br>
          <a href="{{URL('project')}}"> <input type="submit" value="Gönder" /> </a> <br>
        </div>
        <br>
        <button type="button"><a href="{{URL('project')}}">Projeler</a></button>

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
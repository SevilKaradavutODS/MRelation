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
                <h3 class="card-title"></h3>
            </div>
         

            <form action="{{ route('work_store') }}" method="post">
                @csrf
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title"></h3>
                    </div>
                    <!-- /.card-header -->

                    <div class="row">
                        <div class="col-sm-6">
                            <!-- select -->
                            <div class="form-group">
                                <label>İş Türü</label>
                                <select class="form-control" name="type">
                                    <option name="type">A</option>
                                    <option name="type">B</option>
                                    <option name="type">C</option>
                                    <option name="type">D</option>
                                </select>
                            </div>
                        </div>

                        <!-- input states -->
                        <div class="form-group">
                            <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i>İş Adı</label>
                            <input type="text" class="form-control is-valid" id="inputSuccess" placeholder="" name="name" ;>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="inputWarning"><i class="far fa-bell"></i>Durum</label>
                            <input type="text" class="form-control is-warning" id="inputWarning" placeholder="Evet/Hayır" name="status">
                        </div>
                        <br>
                        <div class="form-group">
                        <label class="col-form-label" for="inputWarning"><i class="far fa-bell"></i>Parent Kategori</label>

                        <select class="form-control select2" name="parent_id" id="">
                        <option value="0" selected="selected">Main Kategori</option>
                        @foreach($works as $w)
                            <option value="{{ $w->id }} {{ \App\Http\Controllers\WorkController::getParentsTree($w, $w->title) }}"></option>
                        @endforeach

                        </select>
                        </div>
                        <br>
                    <a href="{{URL('work')}}"> <input type="submit" value="Gönder" /> </a> <br>
                    </div>
                    <br>
                    <button type="button"><a href="{{URL('work')}}">İşler</a></button>
            </form>
        </div>
        <!-- /.card-body -->
</div>



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
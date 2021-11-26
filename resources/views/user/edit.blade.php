@extends('layouts.master')

@section('content')

<div class="content-wrapper">


    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">KULLANICI EKLE</h3>

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
            <form action="{{route('user_update', ['id' => $datalist->id])}}" method="post">
                @csrf
                <div class="card-body">

                    <input class="form-control form-control-lg" type="text" placeholder="Resim Yolu" name="profile_photo_path"; value="{{ $datalist->profile_photo_path }}">
                    <br>
                    <input class="form-control form-control-lg" type="text" placeholder="Adınız Soyadınız" name="name"; value="{{ $datalist->name }}">
                    <br>
                    <input class="form-control form-control-lg" type="password" placeholder="Parolanız" name="password"; value="{{ $datalist->password }}">
                    <br>
                    <select name="departmant_id">
                        @foreach($departmants as $departmant)
                        <option value="{{$departmant->id}}">{{$departmant->name}}</option>
                        @endforeach
                    </select>
                    <br>
                    <input class="form-control form-control-lg" type="text" placeholder="Bölge" name="region"; value="{{ $datalist->region }}">
                    <br>
                    <input class="form-control form-control-lg" type="text" placeholder="Unvan" name="title"; value="{{ $datalist->title }}"> 
                    <br>
                    <input class="form-control form-control-lg" type="text" placeholder="Saatlik Ücreti" name="hourly_price"; value="{{ $datalist->hourly_price }}">
                    <br>

                    <select name="role_id">
                        @foreach($roles as $role)
                        <option value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                    </select>

                    <br>
                    <input class="form-control form-control-lg" type="phone" placeholder="Telefon" name="phone"; value="{{ $datalist->phone }}">
                    <br>
                    <input class="form-control form-control-lg" type="email" placeholder="example@example.com" name="email"; value="{{ $datalist->email }}">
                    <br>
                    <input class="form-control form-control-lg" type="text" placeholder="Adres" name="address"; value="{{ $datalist->address }}">
                    <br>
                    <a href="{{route('user')}}"> <input type="submit" value="Gönder" /> </a> <br>
                </div>
                <br>
                <button type="button"><a href="{{route('user')}}">Kullanıcılar</a></button>

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
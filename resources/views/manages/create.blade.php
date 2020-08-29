@extends('manages.layout')
  
@section('content')
<div class="row" style="margin-top: 50px">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Tambah Wisata</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('manages.index') }}"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('manages.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
  
     <div class="row">
         <div class="col-md-6">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Wisata:</strong>
                    <input type="text" name="nama" class="form-control" placeholder="Nama Wisata">
                </div>
                <div class="form-group">
                    <strong>Harga:</strong>
                    <input type="text" name="harga" class="form-control" placeholder="Harga">
                </div>
                <div class="form-group">
                    <strong>Deskripsi:</strong>
                    <textarea class="form-control" style="height:150px" name="alamat" placeholder="Deskripsi"></textarea>
                </div>
            </div>
         </div>
        <div class="col-md-6">

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Provinsi:</strong>
                    <select name="provinsi" id="" class="form-control">
                        @foreach ($provinsi as $item)
                        <option value="{{$item->id}}">{{$item->nama}}</option>                        
                        @endforeach
                    </select>
                </div>        
                <div class="form-group">
                    <strong>Kota:</strong>
                    <select name="kota" id="" class="form-control">
                        @foreach ($kota as $k)
                        <option value="{{$k->id}}">{{$k->nama}}</option>                        
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <strong>Upload Gambar:</strong>
                    <input type="file" name="gambar" class="form-control" placeholder="Harga">
                </div>            
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12 text-right">
            <button type="submit" class="btn btn-primary">Tambah Wisata</button>
            </div>
        </div>
    </div>
   
</form>
@endsection
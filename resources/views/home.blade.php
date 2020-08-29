@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">                
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('manages.create') }}"> Tambah Wisata</a>
            </div>
            <br> <br>
            
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama Wisata</th>
            <th>Harga</th>
            <th>Lokasi</th>            
            <th width="280px">Action</th>
        </tr>
        @foreach ($manage as $m)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $m->nama }}</td>
            <td>{{ $m->harga }}</td>
            <td>{{ $m->kota->nama }} - {{ $m->provinsi->nama }}</td>
            <td>
                <form action="{{ route('manages.destroy',$m->id) }}" method="POST">                    
    
                    <a class="btn btn-primary" href="{{ route('manages.edit',$m->id) }}">Edit</a>
    
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>

{!! $manage->links() !!}
@endsection

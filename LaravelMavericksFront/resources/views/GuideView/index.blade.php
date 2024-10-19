@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">nom</th>
                <th scope="col">specialite</th>
                <th scope="col">langue</th>
                <th scope="col">contact</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
           @foreach($Guides as $guide)
               <tr>
                   <th scope="row">{{$guide->nom}}</th>
                   <td>{{$guide->specialite}}</td>
                   <td>{{$guide->langue}}</td>
                   <td>{{$guide->contact}}</td>
                   <td>
                       <div class="d-flex">
                           <a href="{{route('guide.edit', ['guide' => $guide])}}">
                               <button type="button" class="btn btn-secondary me-2">Update</button>
                           </a>
                           <form method="post" action="{{route('guide.destroy', ['guide' => $guide])}}">
                               @csrf
                               @method('delete')
                               <button type="submit" class="btn btn-primary">Delete</button>
                           </form>
                       </div>
                   </td>
               </tr>
           @endforeach
            </tbody>
        </table>
</div>
@endsection
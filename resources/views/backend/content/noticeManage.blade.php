@extends('backend.partial.adminMaster')


@section('contents')

@if(session()->has('success'))

<div class="alert alert-success mt-4">
      {{session()->get('success')}}
</div>
@endif

<form class="container w-50 " style="margin-top:150px" method= "post" action={{route('noticeCreate')}}>

    @csrf

 <div class="modal-body">


    <div class="form-group">
        <label for="exampleInputEmail1">Date</label>
        <input name="date" type="date" value="{{date('Y-m-d')}}" min="{{date('Y-m-d')}}"  class="form-control" id="exampleInputEmail1" >

    </div>

        <div class="form-group">
            <label for="exampleInputName">Notice</label>
            <textarea type="text" name="notice" class="form-control" id="exampleInputDepartment" ></textarea>
        </div>




</div>
<div class="modal-footer">
    {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
    <button type="submit" class="btn btn-info m-auto text-light" style="margin-right: 385px;">Upload</button>
  </div>

</form>

@endsection

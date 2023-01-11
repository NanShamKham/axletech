@extends('admin.layout.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left text-center">
                <h2 class="text-secondary m-3 p-3">CONTACT LIST PAGE</h2>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
         <div class="text-end">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <span>{{ $message }}</span>
    </div>
    @endif
    
    @php
        $i = 0;
    @endphp

    <table class="table table-bordered">
        <tr>
            <th>NO</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Subject</th>
            <th>Message</th>
            <th width="15px">Delete</th>
        </tr>
        @foreach ($contact as $contact)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->phone }}</td>
            <td>{{ $contact->subject }}</td>
            <td>{{ $contact->message }}</td>
            <form action="{{ route('contact.destroy',$contact->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <td><button type="submit" onclick="return confirm('Do you really want to delete contact!')" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button>
            </form>
        </tr>
        @endforeach
    </table>
@endsection
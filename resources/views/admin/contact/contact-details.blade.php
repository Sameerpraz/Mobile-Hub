@extends('admin.app')

@section('title')
    Contact Messages
@endsection

@section('content')

    <div class="back">
        <a href="{{ route('contacts.index') }}" class="btn btn-primary pull-right"><span>Back</span></a>
    </div>

    <div class="content-table">
        <div class="row">
            <div class="col-md-6">
                <div>
                    <label>Name:</label>
                    <p>{{ $contact->name }}</p>
                </div>

                <div>
                    <label>Email:</label>
                    <p>{{ $contact->email }}</p>
                </div>

                <div>
                    <label>Phone No:</label>
                    <p>{{ $contact->phone }}</p>
                </div>
                <br>
                <br>
                <div>
                    <label>Message:</label>
                    <p>{{ $contact->message }}</p>
                </div>




        </div>
    </div>
    </div>
@endsection
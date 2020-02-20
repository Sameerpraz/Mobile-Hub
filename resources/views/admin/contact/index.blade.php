@extends('admin.app')

@section('title')
    Contact Messages
@endsection

@section('content')
    <h3 class="page-title">Contact Messages</h3>
    <div class="content-table">
        <table class="table table-hover">
            <thead>
            <th>Name</th>
            <th>Email</th>
            <th>Contact No</th>

            <th></th>
            </thead>
            <tbody>
            @if(count($contacts) > 0)
                @foreach ($contacts as $contact)
                    <tr>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->phone }}</td>


                        <td class="text-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('contacts.show', $contact->id) }}"><i class="lnr lnr-eye"></i></a>
                            <div class="pull-right" style="margin-left: 10px;">
                                <form onsubmit="return confirm('Are you sure?')" action="{{ route('contacts.destroy', $contact->id) }}" method="post">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="lnr lnr-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td>No Data Available</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
@endsection
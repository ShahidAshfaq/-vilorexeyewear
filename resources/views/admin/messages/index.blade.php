@extends('admin.partials.layout')

@section('content')
<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Messages</h2>

        <span class="badge bg-primary">
            {{ $messages->count() }} Messages
        </span>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($messages as $message)

                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    {{ $message->name }}
                                </td>

                                <td>
                                    {{ $message->email }}
                                </td>

                                <td>
                                    {{ $message->phone ?? 'N/A' }}
                                </td>

                                <td style="max-width: 300px;">
                                    {{ $message->message }}
                                </td>

                                <td>
                                    {{ $message->created_at->format('d M Y, h:i A') }}
                                </td>

                                <td>
                                    <a href="mailto:{{ $message->email }}"
                                       class="btn btn-sm btn-primary">
                                        Reply
                                    </a>
                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="7" class="text-center py-4">
                                    No messages received yet.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>
    </div>

</div>

@endsection
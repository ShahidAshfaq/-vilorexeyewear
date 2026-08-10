@extends('admin.partials.layout')

@section('content')


<div class="admin-order-panel container ">
    <h1>Order Management</h1>

    <!-- Search and Filter -->
    {{-- <div class="order-filters">
        <form method="GET" action="{{ route('carts.index') }}">
            <input type="text" class="form-control" name="search" placeholder="Search by Order No or Customer Name" value="{{ request('search') }}">
            <div class="form-group">
               
                <select id="status" name="status" class="form-control">
                    <option value="" >All</option>
                    <option value="3" {{ request('status') == '3' ? 'selected' : '' }}>Completed</option>
                    <option value="2" {{ request('status') == '2' ? 'selected' : '' }}>Shipped</option>
                    <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Pending</option>
                </select>
            </div>
            <div class="form-check">
                <input type="checkbox" name="show_today" id="show_today" class="form-check-input" {{ request('show_today') ? 'checked' : '' }}>
                <label class="form-check-label" for="show_today">Show Today’s Data</label>
            </div>
            <button class="btn btn-success" type="submit">Search</button>
        </form>
    </div> --}}
 
    <form class="row gy-2 gx-3 align-items-center" method="GET" action="{{ route('carts.index') }}">
        <div class="col-auto">
          <label class="visually-hidden" for="searchInput">Search</label>
          <input type="text" class="form-control" id="searchInput" name="search" placeholder="Search by Order No or Name" value="{{ request('search') }}">
        </div>
        
        <div class="col-auto">
          <label class="visually-hidden" for="statusSelect">Status</label>
          <select class="form-select" id="statusSelect" name="status">
            <option value="">All Statuses</option>
            <option value="3" {{ request('status') == '3' ? 'selected' : '' }}>Completed</option>
            <option value="2" {{ request('status') == '2' ? 'selected' : '' }}>Shipped</option>
            <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Pending</option>
          </select>
        </div>
        
        <div class="col-auto">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="showToday" name="show_today" {{ request('show_today') ? 'checked' : '' }}>
            <label class="form-check-label" for="showToday">
              Show Today’s Data
            </label>
          </div>
        </div>
        
        <div class="col-auto">
          <button type="submit" class="btn btn-primary">Search</button>
        </div>
      </form>
      
    <!-- Order List -->
    <table class="table">
        <thead>
            <tr>
                <th>Order No</th>
                <th>Name</th>
                <th>Phone</th>
                <th>City</th>
                <th>Quantity</th>
                <th>Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach( $carts->sortByDesc('created_at') as $order)
                <tr>
                    <td>{{ $order->order_no }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->city }}</td>
                    <td>{{ $order->qantity }}</td>
                    <td> @php
                                
                        \Carbon\Carbon::setLocale('en'); 
                        $pakistanTimeZone = 'Asia/Karachi';

                        $orderDate = $order->created_at->timezone($pakistanTimeZone)->format('Y-m-d');
                        $orderTime = $order->created_at->timezone($pakistanTimeZone)->format('h:i A'); 
                        $today = \Carbon\Carbon::now($pakistanTimeZone)->format('Y-m-d');
                        $tomorrow = \Carbon\Carbon::now($pakistanTimeZone)->addDay()->format('Y-m-d');
                        
                        if ($orderDate === $today) {
                            $orderStatus = "Today's Order ". $orderTime ;
                        } elseif ($orderDate === $tomorrow) {
                            $orderStatus = "Tomorrow's Order ". $orderTime;
                        } else {
                            $orderStatus = \Carbon\Carbon::parse($orderDate, $pakistanTimeZone)->format('l, F j, Y');
                        }
                            @endphp
                             <p>{{ $orderStatus }}</p>
                    </td>
                    <td>
                        @if ($order->status == 1)  <!-- Assuming 1 is 'Pending' -->
                        <span class="badge bg-danger">Pending</span>
                        @elseif ($order->status == 2)
                            <span class="badge bg-info">Shipped</span>
                        @elseif ($order->status == 3)
                            <span class="badge bg-success">Completed</span>
                        @else
                            <span class="badge bg-warning">Unknown</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('carts.show', $order->id) }}">View</a>
                       
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-fle justify-content-center">
            {{ $carts->links('pagination::bootstrap-5') }}
        </div>
        
</div>



@endsection

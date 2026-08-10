@extends('user.partials.layout')
@section('content')

    <title>Order Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .receipt-container {
            max-width: 800px;
            margin: auto;
            border: 1px solid #ddd;
            padding: 20px;
            margin-top: 150px;
            border-radius: 5px;
        }
        .header, .footer {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
        }
        .order-details, .customer-info {
            margin-bottom: 20px;
        }
        .order-details table, .customer-info table {
            width: 100%;
            border-collapse: collapse;
        }
        .order-details th, .customer-info th {
            text-align: left;
            padding: 8px;
            background-color: #f4f4f4;
        }
        .order-details td, .customer-info td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }
        .total {
            font-weight: bold;
        }
    </style>

    <div class="receipt-container">
        <div class="header">
            <h1>Order Receipt</h1>
            <p>Thank you for your purchase!</p>
        </div>

        <div class="order-details">
            <h2>Order Details</h2>
            <table>
                <tr>
                    <th>Order Number</th>
                    <td>{{ $order->id }}</td>
                </tr>
                <tr>
                    <th>Tracking Number</th>
                    <td>{{ $order->order_no}}</td>
                </tr>
                <tr>
                    <th>Date</th>
                    <td>{{ $order->created_at->format('d M Y H:i') }}</td>
                </tr>
                <tr>
                    <th>Total Amount</th>
                    <td>RS. {{ number_format($product->price, 2) }}</td>
                </tr>
            </table>
        </div>

        <div class="customer-info">
            <h2>Customer Information</h2>
            <table>
                <tr>
                    <th>Name</th>
                    <td>{{ $order->name }}</td>
                </tr>
                <tr>
                    <th>city</th>
                    <td>{{ $order->city }}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{ $order->address }}</td>
                </tr>
            </table>
        </div>

        <div class="order-items">
            <h2>Order Items</h2>
            <table class="table" border="2">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    
                        <tr>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->qantity }}</td>
                            <td>RS. {{ number_format($product->price) }}</td>
                            <td>RS. {{ number_format($order->qantity * $product->price) }}</td>
                        </tr>
                  
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="total">Grand Total</td>
                        <td class="total"> RS. {{ number_format($order->qantity * $product->price) }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="footer">
            <p>&copy; {{ date('Y') }} Your Company. All rights reserved.</p>
        </div>
    </div>

@endsection
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <title>Receipt</title>
    <style>
        body {
            padding: 20px;
        }
        .receipt {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 10px;
            max-width: 600px;
            margin: auto;
        }
        .receipt-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .receipt-footer {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="receipt">
    <div class="receipt-header">
        <h2>Receipt</h2>
        <p>Order No: <strong>#123456</strong></p>
        <p>Date: <strong>{{ date('Y-m-d H:i:s') }}</strong></p>
    </div>

    <div class="customer-info">
        <h5>Customer Information</h5>
        <p>Name: <strong>John Doe</strong></p>
        <p>Email: <strong>johndoe@example.com</strong></p>
        <p>Phone: <strong>(123) 456-7890</strong></p>
    </div>

    <div class="products">
        <h5>Products</h5>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Product 1</td>
                    <td>2</td>
                    <td>$10.00</td>
                    <td>$20.00</td>
                </tr>
                <tr>
                    <td>Product 2</td>
                    <td>1</td>
                    <td>$15.00</td>
                    <td>$15.00</td>
                </tr>
                <tr>
                    <td>Product 3</td>
                    <td>3</td>
                    <td>$5.00</td>
                    <td>$15.00</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="text-end"><strong>Subtotal</strong></td>
                    <td>$50.00</td>
                </tr>
                <tr>
                    <td colspan="3" class="text-end"><strong>Tax (5%)</strong></td>
                    <td>$2.50</td>
                </tr>
                <tr>
                    <td colspan="3" class="text-end"><strong>Total</strong></td>
                    <td>$52.50</td>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="receipt-footer">
        <p>Thank you for your purchase!</p>
    </div>
</div>
<button class="btn btn-primary" onclick="window.print()">Print Receipt</button>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>

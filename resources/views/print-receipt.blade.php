<!DOCTYPE html>
<html lang="en">
<head>
    <link href="\css\classic.css" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
    <!-- Add any necessary styles for the receipt -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
        }

        .receipt-container {
            max-width: 800px;
            margin: 0 auto;
            border: 1px solid #ccc;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        h1, h2, p {
            margin: 0;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .details {
            text-align: center;
            margin-bottom: 20px;
        }

        .details p {
            margin-bottom: 5px;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            color: #555;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="receipt-container ">
        <div class="header">
            <img src="{{ asset('img/photos/umpsa.png') }}" alt="Your Image Alt Text">
            <h1>Receipt</h1>
            <p>Thank you for your payment!</p>
        </div>

        <div class="details">
            <h2>Payment Details</h2>
            <div class="modal-body m-3 text-center ">
                <div class="form-group p-2">
                    <label for="name">Kiosk Number :</label>
                    <label class="fw-bold" for="name">{{ $payment->application->appKioskNum}}</label>
                    <label for="name">Name :</label>
                    <label class="fw-bold" for="name">{{ $payment->user->name}}</label>
                    <label for="name">Business Type :</label>
                    <label  class="fw-bold" for="name">{{ $payment->application->appBusinessType}}</label>
                </div>
                <div class="form-group p-2">
                    <label for="name">Business Period :</label>
                    <label class="fw-bold" for="name">{{ $payment->application->appBusinessPeriod}}</label>
                    <label for="name">Status :</label>
                    <label class="fw-bold" for="name"> {{ $payment->application->appStatus}}</label>
                </div>
                <div class="form-group p-2">
                    <p><strong>Payment For:</strong> {{ $payment->payFor }}</p>
                </div>
                <div class="form-group p-2">
                    <p><strong>Total Amount:</strong> MYR {{ $payment->payFeeTotal }}</p>
                </div>
                <div class="form-group p-2">
                    <p><strong>Kiosk Number:</strong> {{ $payment->payKioskNum }}</p>
                </div>
                <div class="form-group p-2">
                    <p><strong>email:</strong> {{ $payment->payemail }}</p>
                </div>
                <div class="form-group p-2">
                    <p><strong>Remarks:</strong> {{ $payment->payRemarks }}</p>
                </div>
            </div>
        </div>

        <div class="footer">
            <p>Payment Date: {{ $payment->payDate }}</p>
            <p>Thank you for using our services!</p>
        </div>
    </div>
</body>
</html>
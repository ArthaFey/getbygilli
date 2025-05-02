<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../assets/gili-logo.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <title>Travel Website - Boat GiliWanders</title>
</head>
<body class="bg-gray-50 w-full h-screen flex items-center justify-center">
    <script src="https://app.sandbox.midtrans.com/snap/snap.js"  data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
    <script type="text/javascript">
        window.onload = function () {
            // Automatically call snap.pay as soon as the page loads
            snap.pay('{{ $payment->snap_token }}', {
                onSuccess: function(result){
                    window.location.href = '{{ route('payment.success', $payment->order_id) }}';
                },
                onPending: function (result) {
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                },
                onError: function (result) {
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                }
            });
        };
    </script>

</body>
</html>

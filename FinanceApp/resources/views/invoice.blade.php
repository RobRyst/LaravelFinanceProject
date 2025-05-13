<!DOCTYPE html>
<style>
</style>
<html>
<head>
    <title>Invoice #{{ $invoice->id }}</title>
</head>
<body>
    <h1>Invoice #{{ $invoice->id }}</h1>
    <div>
        <p><strong>Name:</strong> {{ $invoice->user->firstname }} {{ $invoice->user->lastname }}</p>
        <p><strong>Email:</strong> {{ $invoice->user->email }}</p>
        <p><strong>Total:</strong> $ {{ $invoice->total }}</p>
        <p><strong>Created:</strong> {{ $invoice->invoice_created }}</p>
        <p><strong>Due:</strong> {{ $invoice->invoice_due_date }}</p>
    </div>
<h1>Description of {{ $invoice->id }}</h1>
<p>
    This invoice reflects the total outstanding amount for financial services rendered,
    including account management, reporting, and transaction processing.
    Please review the due date and ensure timely payment to avoid any late fees.
</p>


</body>
</html>
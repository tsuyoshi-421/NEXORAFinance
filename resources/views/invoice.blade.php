<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Invoice</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, Helvetica, sans-serif;
}

body{
    background:#f5f5f5;
    padding:30px;
}

.invoice{
    width:900px;
    margin:auto;
    background:#fff;
    padding:40px;
}

.header{
    display:flex;
    justify-content:space-between;
    align-items:flex-start;
}

.company h1{
    font-size:48px;
    font-weight:bold;
}

.company h2{
    font-size:22px;
    margin-top:5px;
}

.company p{
    color:#555;
    margin-top:4px;
}

.logo img{
    width:90px;
}

.info{
    margin-top:40px;
    display:flex;
    justify-content:space-between;
}

.info .box{
    width:30%;
}

.info h4{
    margin-bottom:8px;
}

.invoice-info table{
    width:100%;
}

.invoice-info td{
    padding:5px 0;
}

.items{
    width:100%;
    border-collapse:collapse;
    margin-top:40px;
}

.items thead{
    background:#4c9df0;
    color:white;
}

.items th{
    padding:12px;
    text-align:center;
}

.items td{
    padding:10px;
    text-align:center;
    border-bottom:1px solid #ddd;
}

.summary{
    width:250px;
    margin-top:40px;
    margin-left:auto;
}

.summary table{
    width:100%;
    border-collapse:collapse;
}

.summary td{
    border:1px solid #999;
    padding:10px;
}

.footer{
    margin-top:80px;
}

.footer h4{
    margin-bottom:10px;
}

.line{
    margin-top:60px;
    border-top:2px solid #999;
}
</style>

</head>

<body>

<?php

$invoiceNo = "00000001";
$invoiceDate = "June 24, 2026";
$dueDate = "June 28, 2026";

$customer = [
    "name"=>"Tsuyoshi C. Rocero",
    "address"=>"4107 General Trias",
    "city"=>"Cavite, Philippines"
];

$items = [
    [
        "item"=>"Hard Drive",
        "qty"=>1,
        "price"=>2500
    ],
    [
        "item"=>"RAM Modules",
        "qty"=>3,
        "price"=>1800
    ],
    [
        "item"=>"MotherBoard",
        "qty"=>2,
        "price"=>45000
    ],
    [
        "item"=>"CPU - Processor",
        "qty"=>2,
        "price"=>8000
    ],
    [
        "item"=>"Power Supply",
        "qty"=>4,
        "price"=>3000
    ]
];

$subtotal = 0;

foreach($items as $i){
    $subtotal += $i['qty'] * $i['price'];
}

$tax = $subtotal * 0.12;
$total = $subtotal + $tax;

?>

<div class="invoice">

    <div class="header">

        <div class="company">

            <h1>INVOICE</h1>

            <h2>Nexora Company</h2>

            <p>
                Cavite State University<br>
                Don Severino delas Alas Campus
            </p>

        </div>

        <div class="logo">
            <img src="{{asset('images/Nexora_Logo_Transparent.png')}}" alt="logo">
        </div>

    </div>


    <div class="info">

        <div class="box">

            <h4>BILL TO</h4>

            <p>

                <?= $customer['name']; ?><br>
                <?= $customer['address']; ?><br>
                <?= $customer['city']; ?>

            </p>

        </div>

        <div class="box">

            <h4>SHIP TO</h4>

            <p>

                <?= $customer['name']; ?><br>
                <?= $customer['address']; ?><br>
                <?= $customer['city']; ?>

            </p>

        </div>

        <div class="box invoice-info">

            <table>

                <tr>
                    <td><strong>Invoice No</strong></td>
                    <td><?= $invoiceNo; ?></td>
                </tr>

                <tr>
                    <td><strong>Invoice Date</strong></td>
                    <td><?= $invoiceDate; ?></td>
                </tr>

                <tr>
                    <td><strong>Due Date</strong></td>
                    <td><?= $dueDate; ?></td>
                </tr>

            </table>

        </div>

    </div>


    <table class="items">

        <thead>

        <tr>

            <th>#</th>
            <th>Description</th>
            <th>Quantity</th>
            <th>Rate</th>
            <th>Amount</th>

        </tr>

        </thead>

        <tbody>

        <?php foreach($items as $index=>$item): ?>

        <tr>

            <td><?= $index+1; ?></td>

            <td><?= $item['item']; ?></td>

            <td><?= $item['qty']; ?></td>

            <td>₱<?= number_format($item['price'],2); ?></td>

            <td>₱<?= number_format($item['qty']*$item['price'],2); ?></td>

        </tr>

        <?php endforeach; ?>

        </tbody>

    </table>


    <div class="summary">

        <table>

            <tr>

                <td>Subtotal</td>

                <td>₱<?= number_format($subtotal,2); ?></td>

            </tr>

            <tr>

                <td>Tax (12%)</td>

                <td>₱<?= number_format($tax,2); ?></td>

            </tr>

            <tr>

                <td><strong>Total</strong></td>

                <td><strong>₱<?= number_format($total,2); ?></strong></td>

            </tr>

        </table>

    </div>

    <div class="footer">

        <h4>PAYMENT METHOD AND TERMS</h4>

        <p>Payment Method: Cash on Delivery (COD).</p>

    </div>

    <div class="line"></div>

</div>

</body>
</html>
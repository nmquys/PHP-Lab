<?php
if (!isset($productName)) $productName = '';
if (!isset($unitPrice)) $unitPrice = 0;
if (!isset($quantity)) $quantity = 0;
if (!isset($subtotal)) $subtotal = 0;
if (!isset($discount)) $discount = 0;
if (!isset($packagingFee)) $packagingFee = 0;
if (!isset($serviceFee)) $serviceFee = 0;
if (!isset($total)) $total = 0;
if (!isset($canOrder)) $canOrder = false;
if (!isset($orderStatus)) $orderStatus = 'BLOCKED';
if (!isset($rawQuantity)) $rawQuantity = '';
if (!isset($rawQuantityType)) $rawQuantityType = 'unknown';
if (!isset($quantityType)) $quantityType = 'unknown';
if (!isset($specialNote)) $specialNote = null;
if (!isset($productAvailable)) $productAvailable = false;
if (!defined('CURRENCY')) define('CURRENCY', 'VND');
?>
<!doctype html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartCafe Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4efe8;
            color: #2c241b;
            margin: 0;
            padding: 32px;
        }
        .card {
            max-width: 560px;
            margin: 0 auto;
            background: #fff;
            border-radius: 12px;
            padding: 28px;
            box-shadow: 0 8px 24px rgba(80, 50, 20, 0.12);
        }
        h1 { margin-top: 0; }
        table { width: 100%; border-collapse: collapse; }
        th, td {
            text-align: left;
            padding: 8px 0;
            border-bottom: 1px solid #eee;
        }
        .total td { font-weight: bold; font-size: 1.05rem; }
        .ready { color: #1b7a3d; font-weight: bold; }
        .blocked { color: #b42318; font-weight: bold; }
    </style>
</head>
<body>
    <div class="card">
        <h1>SmartCafe Receipt</h1>
        <p>MSSV: 22110179 — NguyenMinhQuy</p>
        <table>
            <tr><th>Product</th><td><?= htmlspecialchars((string) $productName) ?></td></tr>
            <tr><th>Unit Price</th><td><?= $unitPrice ?> <?= CURRENCY ?></td></tr>
            <tr><th>Quantity</th><td><?= $quantity ?></td></tr>
            <tr><th>Subtotal</th><td><?= $subtotal ?> <?= CURRENCY ?></td></tr>
            <tr><th>Discount</th><td><?= $discount ?> <?= CURRENCY ?></td></tr>
            <tr><th>Packaging Fee</th><td><?= $packagingFee ?> <?= CURRENCY ?></td></tr>
            <tr><th>Service Fee</th><td><?= $serviceFee ?> <?= CURRENCY ?></td></tr>
            <tr class="total"><th>Total</th><td><?= $total ?> <?= CURRENCY ?></td></tr>
            <tr>
                <th>Status</th>
                <td class="<?= $canOrder ? 'ready' : 'blocked' ?>"><?= $orderStatus ?></td>
            </tr>
        </table>
    </div>
</body>
</html>

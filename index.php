<?php
// SmartCafe Billing — Basic one-file version (Lab01)
// Purpose: show syntax, constants, types, casting, operators, then HTML output.

const CURRENCY = "VND";
const MEMBER_DISCOUNT_RATE = 0.10;
const MEMBER_MIN = 90000;
const PACKAGING_FEE_PER_ITEM = 2000;
const SERVICE_RATE = 0.05;

$productName = "Salt Coffee";
$unitPrice = 45000;
$rawQuantity = "3";
$customerStatus = "MEMBER";
$productAvailable = true;
$specialNote = null;

echo "=== RAW DATA ===" . PHP_EOL;
var_dump($productName);
var_dump($unitPrice);
var_dump($rawQuantity);
var_dump($customerStatus);
var_dump($productAvailable);
var_dump($specialNote);

$quantity = (int) $rawQuantity;

echo "Raw quantity type: " . gettype($rawQuantity) . PHP_EOL;
echo "Clean quantity type: " . gettype($quantity) . PHP_EOL;

$subtotal = $unitPrice * $quantity;

$isMember = $customerStatus === "MEMBER";
$isGuest = $customerStatus === "GUEST";
$isValidCustomer = $isMember || $isGuest;
$isDiscountEligible = $isMember && $subtotal >= MEMBER_MIN;
$discount = $isDiscountEligible ? $subtotal * MEMBER_DISCOUNT_RATE : 0;

$afterDiscount = $subtotal - $discount;
$packagingFee = $quantity * PACKAGING_FEE_PER_ITEM;
$serviceFee = $afterDiscount * SERVICE_RATE;
$total = $subtotal - $discount + $packagingFee + $serviceFee;

$hasValidQuantity = $quantity > 0;
$canOrder = $productAvailable && $hasValidQuantity && $isValidCustomer;

$receipt = "=== SMARTCAFE RECEIPT ===" . PHP_EOL;
$receipt .= "Product: " . $productName . PHP_EOL;
$receipt .= "Unit Price: " . $unitPrice . " " . CURRENCY . PHP_EOL;
$receipt .= "Quantity: " . $quantity . PHP_EOL;
$receipt .= "Subtotal: " . $subtotal . " " . CURRENCY . PHP_EOL;
$receipt .= "Discount: " . $discount . " " . CURRENCY . PHP_EOL;
$receipt .= "Packaging Fee: " . $packagingFee . " " . CURRENCY . PHP_EOL;
$receipt .= "Service Fee: " . $serviceFee . " " . CURRENCY . PHP_EOL;
$receipt .= "TOTAL: " . $total . " " . CURRENCY . PHP_EOL;
$receipt .= "Status: " . ($canOrder ? "READY TO ORDER" : "BLOCKED") . PHP_EOL;
echo $receipt;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SmartCafe Basic</title>
</head>
<body>
    <h1>SmartCafe Billing (Basic)</h1>
    <p>Product: <?= $productName ?></p>
    <p>Quantity: <?= $quantity ?></p>
    <p>Total: <?= $total ?> <?= CURRENCY ?></p>
    <p>Status: <?= $canOrder ? "READY TO ORDER" : "BLOCKED" ?></p>
</body>
</html>

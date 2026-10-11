<?php
$rawQuantityType = gettype($rawQuantity);
$quantity = (int) $rawQuantity;
$quantityType = gettype($quantity);

$subtotal = $unitPrice * $quantity;

$isMember = $customerStatus === "MEMBER";
$isGuest = $customerStatus === "GUEST";
$isValidCustomer = $isMember || $isGuest;
$isDiscountEligible = $isMember && $subtotal >= MEMBER_MIN;
$discount = $isDiscountEligible ? $subtotal * MEMBER_DISCOUNT_RATE : 0;

$afterDiscount = $subtotal - $discount;
$packagingFee = $quantity * PACKAGING_FEE_PER_ITEM;
$serviceFee = $afterDiscount * SERVICE_RATE;
$total = ($subtotal - $discount) + $packagingFee + $serviceFee;

$hasValidQuantity = $quantity > 0;
$canOrder = $productAvailable && $hasValidQuantity && $isValidCustomer;
$orderStatus = $canOrder ? "READY TO ORDER" : "BLOCKED";

$textReceipt = "=== SMARTCAFE RECEIPT ===" . PHP_EOL;
$textReceipt .= "Product: " . $productName . PHP_EOL;
$textReceipt .= "Unit Price: " . $unitPrice . " " . CURRENCY . PHP_EOL;
$textReceipt .= "Quantity: " . $quantity . PHP_EOL;
$textReceipt .= "Subtotal: " . $subtotal . " " . CURRENCY . PHP_EOL;
$textReceipt .= "Discount: " . $discount . " " . CURRENCY . PHP_EOL;
$textReceipt .= "Packaging Fee: " . $packagingFee . " " . CURRENCY . PHP_EOL;
$textReceipt .= "Service Fee: " . $serviceFee . " " . CURRENCY . PHP_EOL;
$textReceipt .= "TOTAL: " . $total . " " . CURRENCY . PHP_EOL;
$textReceipt .= "Status: " . $orderStatus . PHP_EOL;

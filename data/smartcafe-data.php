<?php
// Sample / raw input (simulated web request). Do not cast here.
$productName = "Salt Coffee";
$unitPrice = 45000;
$rawQuantity = "3";
$customerStatus = "MEMBER";
$productAvailable = true;
$specialNote = null;

// Manual test data (swap values, keep $rawQuantity as string):
// T1 Happy path : $rawQuantity="3"; $customerStatus="MEMBER"; $productAvailable=true;
// T2 No benefit : $rawQuantity="3"; $customerStatus="GUEST";  $productAvailable=true;
// T3 Boundary   : $rawQuantity="2"; $customerStatus="MEMBER"; $productAvailable=true;
// T4 Blocked    : $rawQuantity="0"; $customerStatus="MEMBER"; $productAvailable=true;

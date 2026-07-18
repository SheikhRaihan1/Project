<?php
require_once '../config/db.php';   

if (!isset($_GET['booking_id']) || !is_numeric($_GET['booking_id'])) {
    die("Invalid or missing booking_id.");
}

$booking_id = (int) $_GET['booking_id'];

$sql = "SELECT 
            b.id AS booking_id,
            b.travel_date,
            b.booking_date,
            b.flight_price,
            b.hotel_price,
            b.transport_price,
            b.package_price,
            b.discount,
            b.vat,
            b.advance,
            b.grand_total,
            b.payment_method,
            b.additional_note,
            c.name AS customer_name,
            c.phone AS customer_phone,
            c.email AS customer_email,
            c.passport_no,
            c.address AS customer_address,
            p.name AS package_name,
            e.name AS employee_name
        FROM bookings b
        LEFT JOIN customers c ON b.customer_id = c.id
        LEFT JOIN packages p ON b.package_id = p.id
        LEFT JOIN employees e ON b.employee_id = e.id
        WHERE b.id = ?";

$stmt = $db->prepare($sql);
$stmt->bind_param("i", $booking_id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if (!$data) {
    die("Booking not found.");
}

// Invoice number - simple format, adjust as needed
$invoice_no = "INV-" . str_pad($data['booking_id'], 5, "0", STR_PAD_LEFT);

function money($num) {
    return number_format((float) $num, 2);
}
?>
<!DOCTYPE html>
<html lang="bn">
<head>
<meta charset="UTF-8">
<title>Invoice <?= htmlspecialchars($invoice_no) ?></title>
<style>
    * { box-sizing: border-box; }
    body {
        font-family: Arial, sans-serif;
        color: #222;
        max-width: 800px;
        margin: 30px auto;
        padding: 0 20px;
    }
    .invoice-box {
        border: 1px solid #ddd;
        padding: 30px;
    }
    .header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        border-bottom: 3px solid #1e40af;
        padding-bottom: 15px;
        margin-bottom: 20px;
    }
    .company-name {
        font-size: 24px;
        font-weight: bold;
        color: #1e40af;
    }
    .invoice-title {
        text-align: right;
    }
    .invoice-title h2 {
        margin: 0;
        color: #1e40af;
    }
    .details {
        display: flex;
        justify-content: space-between;
        margin-bottom: 25px;
    }
    .details div {
        width: 48%;
    }
    .details h4 {
        margin-bottom: 6px;
        color: #1e40af;
        border-bottom: 1px solid #eee;
        padding-bottom: 4px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }
    table th, table td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: left;
    }
    table th {
        background: #1e40af;
        color: #fff;
    }
    .text-right { text-align: right; }
    .totals {
        width: 300px;
        margin-left: auto;
    }
    .totals table td {
        border: none;
        padding: 6px 10px;
    }
    .totals .grand-total {
        font-size: 18px;
        font-weight: bold;
        color: #1e40af;
        border-top: 2px solid #1e40af;
    }
    .notes {
        margin-top: 20px;
        padding: 12px;
        background: #f9f9f9;
        border-left: 4px solid #1e40af;
    }
    .actions {
        text-align: center;
        margin: 20px 0;
    }
    .actions button, .actions a {
        display: inline-block;
        padding: 10px 22px;
        margin: 0 5px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;
        font-size: 14px;
        color: #fff;
    }
    .btn-print { background: #2563eb; }
    .btn-pdf { background: #16a34a; }

    /* Print-specific: hide buttons when printing */
    @media print {
        .actions { display: none; }
        body { margin: 0; }
        .invoice-box { border: none; }
    }
</style>
</head>
<body>

<div class="actions">
    <button class="btn-print" onclick="window.print()">🖨️ Print Invoice</button>
    <a class="btn-pdf" href="invoice_pdf.php?booking_id=<?= $booking_id ?>">⬇️ Download PDF</a>
</div>

<div class="invoice-box">
    <div class="header">
        <div>
            <div class="company-name">Your Travel Agency</div>
            <div>Address line, City, Bangladesh</div>
            <div>Phone: 01XXXXXXXXX | Email: info@yourcompany.com</div>
        </div>
        <div class="invoice-title">
            <h2>INVOICE</h2>
            <div>Invoice No: <?= htmlspecialchars($invoice_no) ?></div>
            <div>Date: <?= date("d M, Y", strtotime($data['booking_date'] ?? 'now')) ?></div>
        </div>
    </div>

    <div class="details">
        <div>
            <h4>Bill To</h4>
            <div><strong><?= htmlspecialchars($data['customer_name']) ?></strong></div>
            <div>Phone: <?= htmlspecialchars($data['customer_phone']) ?></div>
            <div>Email: <?= htmlspecialchars($data['customer_email']) ?></div>
            <div>Passport No: <?= htmlspecialchars($data['passport_no']) ?></div>
            <div>Address: <?= htmlspecialchars($data['customer_address']) ?></div>
        </div>
        <div>
            <h4>Booking Info</h4>
            <div>Package: <?= htmlspecialchars($data['package_name'] ?? '-') ?></div>
            <div>Travel Date: <?= $data['travel_date'] ? date("d M, Y", strtotime($data['travel_date'])) : '-' ?></div>
            <div>Handled By: <?= htmlspecialchars($data['employee_name'] ?? '-') ?></div>
            <div>Payment Method: <?= htmlspecialchars($data['payment_method']) ?></div>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Description</th>
                <th class="text-right">Amount (BDT)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Flight Price</td>
                <td class="text-right"><?= money($data['flight_price']) ?></td>
            </tr>
            <tr>
                <td>Hotel Price</td>
                <td class="text-right"><?= money($data['hotel_price']) ?></td>
            </tr>
            <tr>
                <td>Transport Price</td>
                <td class="text-right"><?= money($data['transport_price']) ?></td>
            </tr>
            <tr>
                <td>Package Price</td>
                <td class="text-right"><?= money($data['package_price']) ?></td>
            </tr>
        </tbody>
    </table>

    <div class="totals">
        <table>
            <tr>
                <td>Subtotal</td>
                <td class="text-right">
                    <?= money($data['flight_price'] + $data['hotel_price'] + $data['transport_price'] + $data['package_price']) ?>
                </td>
            </tr>
            <tr>
                <td>Discount</td>
                <td class="text-right">- <?= money($data['discount']) ?></td>
            </tr>
            <tr>
                <td>VAT</td>
                <td class="text-right"><?= money($data['vat']) ?></td>
            </tr>
            <tr>
                <td>Advance Paid</td>
                <td class="text-right">- <?= money($data['advance']) ?></td>
            </tr>
            <tr class="grand-total">
                <td>Grand Total</td>
                <td class="text-right"><?= money($data['grand_total']) ?> BDT</td>
            </tr>
        </table>
    </div>

    <?php if (!empty($data['additional_note'])): ?>
    <div class="notes">
        <strong>Note:</strong> <?= nl2br(htmlspecialchars($data['additional_note'])) ?>
    </div>
    <?php endif; ?>

    <p style="margin-top:30px; text-align:center; color:#777; font-size:13px;">
        Thank you for booking with us!
    </p>
</div>

</body>
</html>
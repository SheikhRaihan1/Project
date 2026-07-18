<?php
/**
 * PDF Download - এটা কাজ করার জন্য প্রথমে dompdf install করে নিন:
 *   composer require dompdf/dompdf
 *
 * তারপর নিচের require_once লাইনটা আপনার vendor/autoload.php এর path
 * অনুযায়ী ঠিক করে দিন।
 */

require_once '../vendor/autoload.php';   // ধরে নিচ্ছি composer install Project root এ হবে
require_once '../config/db.php';         // এইটা আপনার Project/config/db.php ($db = new mysqli(...))

use Dompdf\Dompdf;
use Dompdf\Options;

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

$invoice_no = "INV-" . str_pad($data['booking_id'], 5, "0", STR_PAD_LEFT);

function money($num) {
    return number_format((float) $num, 2);
}

// Simple HTML template for the PDF (dompdf has limited CSS support, so kept simple)
ob_start();
?>
<html>
<head>
<style>
    body { font-family: DejaVu Sans, sans-serif; font-size: 13px; color: #222; }
    .header { border-bottom: 2px solid #1e40af; padding-bottom: 10px; margin-bottom: 15px; }
    .company-name { font-size: 20px; font-weight: bold; color: #1e40af; }
    table { width: 100%; border-collapse: collapse; margin-bottom: 15px; }
    table th, table td { border: 1px solid #ccc; padding: 6px 8px; }
    table th { background: #1e40af; color: #fff; text-align: left; }
    .text-right { text-align: right; }
    .totals { width: 250px; margin-left: auto; }
    .totals td { border: none; padding: 4px 8px; }
    .grand-total { font-weight: bold; font-size: 15px; border-top: 2px solid #1e40af !important; }
</style>
</head>
<body>
    <div class="header">
        <div class="company-name">Your Travel Agency</div>
        <div>Address line, City, Bangladesh</div>
        <div>Invoice No: <?= htmlspecialchars($invoice_no) ?> | Date: <?= date("d M, Y", strtotime($data['booking_date'] ?? 'now')) ?></div>
    </div>

    <p>
        <strong>Bill To:</strong> <?= htmlspecialchars($data['customer_name']) ?><br>
        Phone: <?= htmlspecialchars($data['customer_phone']) ?> | Email: <?= htmlspecialchars($data['customer_email']) ?><br>
        Passport No: <?= htmlspecialchars($data['passport_no']) ?><br>
        Address: <?= htmlspecialchars($data['customer_address']) ?>
    </p>

    <p>
        <strong>Package:</strong> <?= htmlspecialchars($data['package_name'] ?? '-') ?> |
        <strong>Travel Date:</strong> <?= $data['travel_date'] ? date("d M, Y", strtotime($data['travel_date'])) : '-' ?> |
        <strong>Payment:</strong> <?= htmlspecialchars($data['payment_method']) ?>
    </p>

    <table>
        <thead><tr><th>Description</th><th class="text-right">Amount (BDT)</th></tr></thead>
        <tbody>
            <tr><td>Flight Price</td><td class="text-right"><?= money($data['flight_price']) ?></td></tr>
            <tr><td>Hotel Price</td><td class="text-right"><?= money($data['hotel_price']) ?></td></tr>
            <tr><td>Transport Price</td><td class="text-right"><?= money($data['transport_price']) ?></td></tr>
            <tr><td>Package Price</td><td class="text-right"><?= money($data['package_price']) ?></td></tr>
        </tbody>
    </table>

    <table class="totals">
        <tr><td>Subtotal</td><td class="text-right"><?= money($data['flight_price'] + $data['hotel_price'] + $data['transport_price'] + $data['package_price']) ?></td></tr>
        <tr><td>Discount</td><td class="text-right">- <?= money($data['discount']) ?></td></tr>
        <tr><td>VAT</td><td class="text-right"><?= money($data['vat']) ?></td></tr>
        <tr><td>Advance Paid</td><td class="text-right">- <?= money($data['advance']) ?></td></tr>
        <tr class="grand-total"><td>Grand Total</td><td class="text-right"><?= money($data['grand_total']) ?> BDT</td></tr>
    </table>

    <?php if (!empty($data['additional_note'])): ?>
        <p><strong>Note:</strong> <?= nl2br(htmlspecialchars($data['additional_note'])) ?></p>
    <?php endif; ?>

    <p style="text-align:center; color:#777;">Thank you for booking with us!</p>
</body>
</html>
<?php
$html = ob_get_clean();

$options = new Options();
$options->set('isRemoteEnabled', true);
$dompdf = new Dompdf($options);
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

$dompdf->stream($invoice_no . ".pdf", ["Attachment" => true]);


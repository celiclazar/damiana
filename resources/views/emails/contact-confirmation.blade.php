<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; background-color: #000000; color: #ffffff; margin: 0; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background: #111111; border: 1px solid #333333; padding: 40px; }
        h1 { color: #ffffff; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 20px; }
        p { color: #cccccc; line-height: 1.6; font-size: 15px; }
        .highlight { color: #ffffff; font-weight: bold; }
        .summary-box { background: #1a1a1a; padding: 20px; border: 1px dashed #444444; margin: 25px 0; }
        .summary-title { color: #888888; font-size: 12px; text-transform: uppercase; margin-bottom: 10px; }
        .footer { margin-top: 40px; padding-top: 20px; border-top: 1px solid #333333; font-size: 14px; color: #888888; }
        .signature { color: #ffffff; font-weight: bold; margin-top: 5px; text-transform: uppercase; }
    </style>
</head>
<body>
<div class="container">
    <h1>Hi {{ $data['name'] }},</h1>

    <p>Thanks for reaching out! We've received your tattoo inquiry and we are stoked to check it out.</p>

    <p><span class="highlight">What happens next?</span><br>
        Our artists will review your idea and budget. You can expect to hear back from us via email or phone within <span class="highlight">2-3 business days</span> to discuss the next steps or book a consultation.</p>

    <div class="summary-box">
        <div class="summary-title">Summary of your request:</div>
        <p style="margin: 5px 0;"><strong>Idea:</strong> {{ Str::limit($data['tattooIdea'], 50) }}</p>
        <p style="margin: 5px 0;"><strong>Target Date:</strong> {{ \Carbon\Carbon::parse($data['preferredDate'])->format('M j, Y') }}</p>
    </div>

    <p>If you have reference images, feel free to <strong>reply to this email</strong> and attach them!</p>

    <div class="footer">
        Stay sharp,<br>
        <div class="signature">Damiana</div>
    </div>
</div>
</body>
</html>

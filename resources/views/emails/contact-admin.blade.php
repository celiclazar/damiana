<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; background-color: #000000; color: #ffffff; margin: 0; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background: #111111; border: 1px solid #333333; padding: 40px; }
        h1 { color: #ffffff; text-transform: uppercase; letter-spacing: 2px; border-bottom: 1px solid #333333; padding-bottom: 10px; }
        .label { color: #888888; font-size: 12px; text-transform: uppercase; margin-top: 20px; }
        .value { color: #ffffff; font-size: 16px; margin-bottom: 10px; }
        .idea-box { background: #1a1a1a; padding: 20px; border-left: 3px solid #ffffff; margin-top: 20px; font-style: italic; }
        .button { display: inline-block; padding: 12px 25px; background: #ffffff; color: #000000; text-decoration: none; font-weight: bold; margin-top: 30px; text-transform: uppercase; }
    </style>
</head>
<body>
<div class="container">
    <h1>New Inquiry</h1>

    <div class="label">Client Name</div>
    <div class="value">{{ $data['name'] }}</div>

    <div class="label">Contact Info</div>
    <div class="value">{{ $data['email'] }} <br> {{ $data['phone'] }}</div>

    <div class="label">Preferred Date & Budget</div>
    <div class="value">
        {{ \Carbon\Carbon::parse($data['preferredDate'])->format('d.m.Y @ H:i') }} <br>
        Budget: {{ $data['budget'] ?? 'Not specified' }}
    </div>

    <div class="label">Tattoo Idea</div>
    <div class="idea-box">
        "{{ $data['tattooIdea'] }}"
    </div>

    @php
        $start = \Carbon\Carbon::parse($data['preferredDate']);
        $end = $start->copy()->addHour(); // Default to 1 hour duration

        $googleDate = $start->format('Ymd\THis') . '/' . $end->format('Ymd\THis');

        $googleUrl = "https://calendar.google.com/calendar/render?" . http_build_query([
            'action' => 'TEMPLATE',
            'text'   => 'Tattoo: ' . $data['name'],
            'dates'  => $googleDate,
            'details' => "Budget: " . ($data['budget'] ?? 'TBD') . "\n\nIdea: " . $data['tattooIdea'],
            'location' => 'Your Studio Name',
        ]);
    @endphp

    <a href="{{ $googleUrl }}"
       style="display: inline-block; padding: 12px 25px; background: #34a853; color: #ffffff; text-decoration: none; font-weight: bold; margin-top: 10px; text-transform: uppercase;">
        Add to Calendar
    </a>

    <a href="mailto:{{ $data['email'] }}" class="button">Reply to Client</a>
</div>
</body>
</html>

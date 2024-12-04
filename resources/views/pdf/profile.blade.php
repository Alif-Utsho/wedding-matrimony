<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biodata - {{ $user->name }}</title>
</head>

<body style="margin: 0; font-family: Arial, sans-serif;">

    <!-- Main Container -->
    <div style="display: table; margin: 20px auto; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); border: 1px solid #ddd;">
        <!-- Left Section -->
        <div style="display: table-cell; width: 35%; background-color: #f5f5f5; padding: 20px; color: #333;">
            <div style="text-align: center; margin-bottom: 20px;">
                <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path($profile->image))) }}"
                    alt="Profile Picture"
                    style="width: 120px; height: 120px; border-radius: 50%; border: 3px solid #ccc;">
            </div>
            <h1 style="margin: 0; font-size: 1.5em; text-align: center;">{{ $user->name }}</h1>
            <hr style="border: none; border-top: 1px solid #ddd; margin: 15px 0;">
            <h2 style="font-size: 1.2em; margin-top: 20px; color: #ec1a61;">Contact</h2>
            <p style="margin: 5px 0;">Address: {{ $profile->address }}</p>
            <p style="margin: 5px 0;">City: {{ $profile->city->name }}</p>
            <p style="margin: 5px 0;">Phone: {{ $user->phone }}</p>
            <p style="margin: 5px 0;">Email: <a href="mailto:{{ $user->email }}"
                    style="color: #ec1a61; text-decoration: none;">{{ $profile->email }}</a></p>
            <p style="margin: 5px 0;">LinkedIn: <a href="{{ $socialmedia->linkedin }}"
                    style="color: #ec1a61; text-decoration: none;">{{ $profile->linkedin }}</a></p>
            <hr style="border: none; border-top: 1px solid #ddd; margin: 15px 0;">
            <h2 style="font-size: 1.2em; margin-top: 20px; color: #ec1a61;">Marital Status</h2>
            <p style="margin: 5px 0;">{{ $profile->marital_status }}</p>
            <h2 style="font-size: 1.2em; margin-top: 20px; color: #ec1a61;">Languages</h2>
            <p style="margin: 5px 0;">{{ $profile->language }}</p>
            <hr style="border: none; border-top: 1px solid #ddd; margin: 15px 0;">
            <h2 style="font-size: 1.2em; margin-top: 20px; color: #ec1a61;">Hobbies</h2>
            @foreach ($hobbies as $hobby)
                <p style="margin: 5px 0;">{{ $hobby->hobby->name }}</p>
            @endforeach
            <h2 style="font-size: 1.2em; margin-top: 20px; color: #ec1a61;">Social Medias</h2>
            <p style="margin: 5px 0;">FB: {{ $socialmedia->facebook }}</p>
            <p style="margin: 5px 0;">IG: {{ $socialmedia->instagram }}</p>
            <p style="margin: 5px 0;">WP: {{ $socialmedia->whatsapp }}</p>
            <p style="margin: 5px 0;">YT: {{ $socialmedia->youtube }}</p>

        </div>

        <!-- Right Section -->
        <div style="display: table-cell; width: 65%; padding: 20px; background-color: #fff; color: #333;">
            <h2 style="margin-top: 0; color: #ec1a61;">Summary</h2>
            <p style="line-height: 1.6; text-align:justify;">{{ $profile->bio }}</p>
            <h2 style="margin-top: 20px; color: #ec1a61;">Biograph</h2>
            <table style="width: 100%; border-collapse: collapse; margin: 0; padding: 0; line-height: 1.8;">
                <tr>
                    <td style="padding: 5px 0; vertical-align: top;">Father's Name:</td>
                    <td style="padding: 5px 0;">{{ $profile->fathers_name }}</td>
                </tr>
                <tr>
                    <td style="padding: 5px 0; vertical-align: top;">Mother's Name:</td>
                    <td style="padding: 5px 0;">{{ $profile->mothers_name }}</td>
                </tr>
                <tr>
                    <td style="padding: 5px 0; vertical-align: top;">Religion:</td>
                    <td style="padding: 5px 0;">{{ $profile->religion }}</td>
                </tr>
                <tr>
                    <td style="padding: 5px 0; vertical-align: top;">Gender:</td>
                    <td style="padding: 5px 0;">{{ $profile->gender }}</td>
                </tr>
                <tr>
                    <td style="padding: 5px 0; vertical-align: top;">Date of Birth:</td>
                    <td style="padding: 5px 0;">{{ \Carbon\Carbon::parse($profile->birth_date)->format('d M, Y') }}
                    </td>
                </tr>
                <tr>
                    <td style="padding: 5px 0; vertical-align: top;">Age:</td>
                    <td style="padding: 5px 0;">{{ $profile->age }}</td>
                </tr>
                <tr>
                    <td style="padding: 5px 0; vertical-align: top;">Height:</td>
                    <td style="padding: 5px 0;">
                        @php
                            $heightInCm = $profile->height;
                            $heightInFeet = $heightInCm * 0.0328084;
                            $feet = floor($heightInFeet);
                            $inches = round(($heightInFeet - $feet) * 12);
                        @endphp
                        {{ $feet }}' {{ $inches }}"
                    </td>
                </tr>
                <tr>
                    <td style="padding: 5px 0; vertical-align: top;">Weight:</td>
                    <td style="padding: 5px 0;">{{ $profile->weight }}kg</td>
                </tr>
            </table>

            <h2 style="margin-top: 20px; color: #ec1a61;">Profession</h2>
            <div>
                <h3 style="margin: 5px 0;">{{ $career->type }}</h3>
                @if ($career->company_name)
                    <p style="margin: 5px 0;">Company: {{ $career->company_name }}</p>
                @endif
                @if ($career->salary)
                    <p style="margin: 5px 0;">Salary: {{ $career->salary }}</p>
                @endif
            </div>
            <h2 style="margin-top: 20px; color: #ec1a61;">Education</h2>
            <p style="margin: 5px 0;"><strong>{{ $career->degree }}</strong> </p>
            @if ($career->school)
                <p style="margin: 0; color: #777;">Univerysity/College: {{ $career->school }}</p>
            @endif
        </div>
    </div>

</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate of Excellence</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Georgia', serif;
            background-color: #F3FFF7;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .certificate-container {
            border: 15px solid gold;
            padding: 40px;
            width: 900px;
            background-color: white;
            text-align: center;
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.3);
            position: relative;
        }

        .certificate-header h1 {
            font-size: 3.5rem;
            font-weight: bold;
            margin-bottom: 10px;
            color: #333;
            font-family: 'Garamond', serif;
            text-transform: uppercase;
        }

        .certificate-body p {
            font-size: 1.4rem;
            margin: 15px 0;
            color: #555;
        }

        .certificate-body h2 {
            font-size: 2.5rem;
            font-weight: bold;
            margin: 20px 0;
            color: #222;
            font-family: 'Garamond', serif;
            text-decoration: underline;
        }

        .certificate-footer {
            display: flex;
            justify-content: space-between;
            align-items: flex-end; /* Align items to the bottom */
            margin-top: 60px;
            padding: 0 50px;
        }

        .signature-box {
            text-align: center;
            width: 40%;
        }

        .signature-line {
            width: 100%;
            height: 2px;
            background-color: black;
            margin: 10px auto;
        }

        .signature-text {
            font-size: 1.2rem;
            font-weight: bold;
            color: #333;
        }

        .gold-seal {
            position: absolute;
            top: 40%;
            right: 20px;
            width: 120px;
            height: 120px;
            background: radial-gradient(circle, gold 40%, #d4af37 80%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            font-weight: bold;
            color: white;
            text-shadow: 2px 2px 3px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>
<body>
    <div class="certificate-container">
        <div class="certificate-header">
            <h1>Certificate Shitjeje</h1>
        </div>
        <div class="certificate-body">
            <p>Kjo eshte per te certifikuar se</p>
            <h2>FermaOnline</h2>
            <p>njihet per kualitetin dhe sherbimin ne ofrimin e produkteve te fermes.</p>
            <p>Ne vlerësojmë angazhimin dhe kontributin tuaj në praktikat e qëndrueshme bujqësore.</p>
        </div>
        <div class="certificate-footer">
            <!-- Date on the left -->
            <div class="signature-box" style="text-align: left;">
                <p class="signature-text">Data: 2022/10/10</p>
                <div class="signature-line"></div>
            </div>
            <!-- Signature on the right -->
            <div class="signature-box" style="text-align: right;">
                <p class="signature-text">Firma</p>
                <div class="signature-line"></div>
            </div>
        </div>
        <div class="gold-seal">Official</div>
    </div>
</body>
</html>
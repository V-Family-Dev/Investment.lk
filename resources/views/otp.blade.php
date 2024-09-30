<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>OTP Verification</title>
    <style>
        @layer utilities {
            .bg-primary {
                background-color: #FFCC00;
            }

            .bg-secondary {
                background-color: #ECBD00;
            }

            .text-accent {
                color: #CC9900;
            }

            .bg-accent {
                background-color: #CC9900;
            }

            .hover-bg-darkaccent:hover {
                background-color: #B8860B;
            }

            .focus-border-darkaccent:focus {
                border-color: #B8860B;
            }
        }

        .otp-input {
            width: 3rem;
            height: 3rem;
            text-align: center;
            font-size: 1.5rem;
            border: 2px solid #CC9900;
            border-radius: 8px;
            background-color: #FFFBF2;
            margin-right: 0.5rem;
            color: #000;
        }
    </style>
</head>

<body class="min-h-screen flex flex-col items-center justify-center bg-gray-100">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg text-center">
        <h1 class="text-2xl font-bold text-black mb-4">OTP Verification</h1>
        <p class="text-black mb-6">We have sent you a One Time Password to your email. Please enter the OTP below to verify your account.</p>

        <!-- OTP Input Fields -->
        <div class="flex justify-center mb-4">
            <input type="text" maxlength="1" class="otp-input" />
            <input type="text" maxlength="1" class="otp-input" />
            <input type="text" maxlength="1" class="otp-input" />
            <input type="text" maxlength="1" class="otp-input" />
            <input type="text" maxlength="1" class="otp-input" />
        </div>

        <!-- Countdown Timer -->
        <p class="text-sm text-gray-600">Resend OTP in <span id="countdown">2:00</span></p>

        <!-- Buttons -->
        <div class="flex justify-center space-x-4 mt-4">
            <button id="resend-otp"
                class="px-4 py-2 bg-secondary text-black font-semibold rounded-lg hover-bg-darkaccent transition duration-300">Resend
                OTP</button>
            <button id="verify-otp"
                class="px-4 py-2 bg-accent text-white font-semibold rounded-lg hover-bg-darkaccent transition duration-300">Verify
                OTP</button>
        </div>
    </div>

    <script>
        // Countdown Timer for 2 minutes
        let time = 120;
        const countdownEl = document.getElementById('countdown');
        const resendButton = document.getElementById('resend-otp');
        const verifyButton = document.getElementById('verify-otp');
        resendButton.disabled = true;

        const countdown = setInterval(() => {
            const minutes = Math.floor(time / 60);
            const seconds = time % 60;
            countdownEl.textContent = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
            time--;

            if (time < 0) {
                clearInterval(countdown);
                resendButton.disabled = false; // Enable the Resend OTP button after 2 minutes
                countdownEl.textContent = "0:00";
            }
        }, 1000);

        // Resend OTP functionality (dummy for now)
        resendButton.addEventListener('click', () => {
            alert('OTP has been resent!');
            resendButton.disabled = true;
            time = 120;
            countdown(); // Restart countdown
        });

        // Navigate to documents.blade.php page on Verify OTP click
        verifyButton.addEventListener('click', () => {
            window.location.href = '{{ url("documents") }}'; // Adjust the URL as needed
        });
    </script>
</body>

</html>

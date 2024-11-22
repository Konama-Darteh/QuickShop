<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/register.css">
    <title>Document</title>
</head>
<body>
    <form action="actions/otp_action.php" method="post">
    
        <label for="otp">Enter the OTP sent to your email</label>
        <input type="number" name="otp" id="otp">

        <input type="submit" id="login" value="Submit">
    </form>
    <button name="resend" id="resend">Resend OTP</button>
     <p id="countdown"></p>

    <script>
        let countdownTime = 60;

        // Function to update the button state and countdown
        function startCountdown() {
            const resendButton = document.getElementById("resend");
            const countdownDisplay = document.getElementById("countdown");

            // Disable the resend button initially
            resendButton.disabled = true;

            // Update the countdown every second
            const countdownInterval = setInterval(() => {
                countdownDisplay.textContent = `You can resend OTP in ${countdownTime} seconds.`;

                // Decrease the time
                countdownTime--;

                // When the countdown reaches 0, enable the button and stop the interval
                if (countdownTime <= 0) {
                    clearInterval(countdownInterval);
                    resendButton.disabled = false;
                    countdownDisplay.textContent = "You can now resend the OTP.";
                }
            }, 1000);
        }

        // Start the countdown when the page loads
        window.onload = startCountdown;
    </script>
</body>
</html>
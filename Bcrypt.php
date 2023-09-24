<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            background-color: #f2f2f2;
        }

        .defaultcontainer {
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);
            border-radius: 15px;
            text-align: center;
            width: 600px;
        }

        #password, input[type="text"], input[type="password"] {
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 300px;
            text-align: center;
            font-size: 20px;
        }

        input[type="password"]::placeholder, input[type="text"]::placeholder {
            font-size: 16px;
            font-weight: normal;
            color: #aaa;
        }

        input[type="password"]:focus, input[type="text"]:focus {
            outline: none;
            border-color: #000000; /* Change focus border color if needed */
        }

        .buttonblack {
            background-color: #000000;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .buttonblack:hover {
            background-color: #333333;
        }

        .success-message {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="defaultcontainer">
        <h2>Random Password Generator</h2>
        <input type="text" id="password" readonly>
        <br>
        <button class="buttonblack" onclick="generatePassword()">Generate Password</button>
        <button class="buttonblack" onclick="copyToClipboard('password')" id="copyButton" disabled>Copy to Clipboard</button>
        <p class="success-message" id="successMessage"></p>
    </div>

    <div class="defaultcontainer">
        <h2>Password Encryption Tool</h2>
        <form method="post">
            <input type="password" name="password" placeholder="Enter Password" required>
            <br>
            <button class="buttonblack" type="submit">Encrypt Password</button>
        </form>
        <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['password'])) {
            $password = $_POST['password'];
            $encryptedPassword = password_hash($password, PASSWORD_BCRYPT); ?>
            <input type="text" id="encryptedPassword" value="<?php echo $encryptedPassword; ?>" readonly>
            <br>
            <button class="buttonblack" onclick="copyToClipboard('encryptedPassword')">Copy to Clipboard</button>
            <p class="success-message" id="encryptedMessage"></p>
        <?php } ?>
    </div>

    <script>
        function generatePassword() {
            var length = 12; // Adjust the password length as per your requirement
            var charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-+=<>?";
            var password = "";
            for (var i = 0; i < length; i++) {
                var randomIndex = Math.floor(Math.random() * charset.length);
                password += charset.charAt(randomIndex);
            }
            document.getElementById("password").value = password;
            document.getElementById("copyButton").disabled = false;
            document.getElementById("successMessage").textContent = "";
        }

        function copyToClipboard(elementId) {
            var textField = document.getElementById(elementId);
            textField.select();
            textField.setSelectionRange(0, 99999); /* For mobile devices */
            document.execCommand("copy");
            var successMessageId = (elementId === "password") ? "successMessage" : "encryptedMessage";
            document.getElementById(successMessageId).textContent = "Text copied to clipboard!";
        }
    </script>
</body>
</html>

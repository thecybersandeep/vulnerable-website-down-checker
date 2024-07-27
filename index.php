<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Down Checker</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1e3a5f;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            text-align: center;
        }
        h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
        }
        p {
            font-size: 1.2em;
            margin-bottom: 20px;
        }
        .input-group {
            display: flex;  
            justify-content: center;
        }
        input[type="text"] {
            padding: 10px;
            font-size: 1em;
            border: none;
            border-radius: 5px 0 0 5px;
            width: 300px;
        }
        button {
            padding: 10px 20px;
            font-size: 1em;
            background-color: #1a73e8;
            color: white;
            border: none;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Website Down Checker</h1>
        <p>Check if a website is down for everyone or just you</p>
        <form action="" method="post">
            <div class="input-group">
                <input type="text" name="domain" placeholder="Enter your domain" required>
                <button type="submit">Check if site down</button>
            </div>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $domain = $_POST["domain"];

            // Perform DNS lookup to check if the site is up or down
            exec("nslookup " . $domain, $output, $return_var);

            // Determine if site is up or down
            if ($return_var === 0) {
                $status = "Site is up.";
            } else {
                $status = "Site is down.";
            }

            echo "<p>" . htmlspecialchars($status) . "</p>";
        }
        ?>
    </div>
</body>
</html>

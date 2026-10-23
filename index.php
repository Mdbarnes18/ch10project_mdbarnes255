
<?php
// Name: Michael Barnes
// Date: October 23, 2026
// Purpose: Display the form for the Dynamic Form with PHP project.
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Building a Dynamic Form with PHP</title>
    <link rel="stylesheet" href="styles/main.css">
</head>
<body>
    <header>
        <h1>Building a Dynamic Form with PHP</h1>
        <p>Michael Barnes</p>
        <p>Current Date: <?php echo date("F j, Y"); ?></p>
    </header>

    <main>
        <section>
            <h2>Contact Form</h2>
            <p>Please complete the form below.</p>

            <form action="confirm.php" method="POST">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea
                        id="message"
                        name="message"
                        rows="5"
                        required
                    ></textarea>
                </div>

                <input type="submit" value="Submit Form">
            </form>
        </section>
    </main>
</body>
</html>

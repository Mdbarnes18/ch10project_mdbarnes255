
<?php
// Name: Michael Barnes
// Date: October 23, 2026
// Purpose: Validate submitted form data and display a confirmation.

// Initialize the variables used to display the result.
$messageClass = "";
$confirmationMessage = "";
$name = "";
$email = "";
$userMessage = "";

// Check whether the form was submitted using the POST method.
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Retrieve the submitted values and remove surrounding whitespace.
    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $userMessage = trim($_POST["message"] ?? "");

    // Sanitize the submitted email address.
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    // Validate the fields to make sure none are empty.
    if ($name === "" || $email === "" || $userMessage === "") {
        $confirmationMessage = "Error: Please complete all required fields.";
        $messageClass = "error";

    // Validate the email address after sanitization.
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $confirmationMessage = "Error: Please enter a valid email address.";
        $messageClass = "error";

    // Create a success message when all fields are valid.
    } else {
        $confirmationMessage = "Thank you! Your form was submitted successfully.";
        $messageClass = "success";
    }

} else {
    // Display an error if the page was opened without submitting the form.
    $confirmationMessage = "Please submit the form using the contact form.";
    $messageClass = "error";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Confirmation - Building a Dynamic Form with PHP</title>
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
            <h2>Form Confirmation</h2>

            <div class="<?php echo htmlspecialchars($messageClass, ENT_QUOTES, 'UTF-8'); ?>">
                <?php echo htmlspecialchars($confirmationMessage, ENT_QUOTES, 'UTF-8'); ?>
            </div>

            <?php if ($_SERVER["REQUEST_METHOD"] === "POST" && $messageClass === "success") : ?>
                <section class="submitted-data">
                    <h2>Submitted Information</h2>

                    <p>
                        <strong>Name:</strong>
                        <?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>
                    </p>

                    <p>
                        <strong>Email:</strong>
                        <?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?>
                    </p>

                    <p>
                        <strong>Message:</strong><br>
                        <?php echo nl2br(htmlspecialchars($userMessage, ENT_QUOTES, 'UTF-8')); ?>
                    </p>
                </section>
            <?php endif; ?>

            <p>
                <a href="index.php">Return to the contact form</a>
            </p>
        </section>
    </main>
</body>
</html>

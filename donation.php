<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Artifact Donation</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="gallery.php">Gallery</a>
            <a href="donation.php">Donate</a>
        </nav>
        <header>
            <h1>Do you have an artifact you would like to donate?</h1>
            <h2>We will give it the best home that we can!</h2>
        </header>
        <form id='submission' action='submission.php' method='post'>
            <label for='fname'>First Name:</label><br>
            <input type='text' id='fname' name='fname' value=''><br>
            <label for='lname'>Last Name:</label><br>
            <input type='text' id='lname' name='lname' value=''><br>
            <label for='phone'>Phone Number:</label><br>
            <input type='text' id='phone' name='phone' value=''><br>
            <label for='email'>Email Address:</label><br>
            <input type='text' id='email' name='email' value=''><br>
            <label for='artifact_name'>Artifact name:</label><br>
            <input type='text' id='artifact_name' name='arfitact_name' value=''><br>
            <label for='artifact_description'>Artifact description:</label><br>
            <textarea id='artifact_description' name='artifact_description' rows='3' cols='30'></textarea><br>

            <input type='submit' value='Submit'>
        </form>
    </body>
</html>
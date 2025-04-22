<?php
session_start();
require 'db.php';

if (!isset($_SESSION["logged_in"])) {
    header("Location: index.php");
    exit();
}

$images = [
    "01_chaewon_final.png",
    "02_sakura_final.png",
    "03_yunjin_final.png",
    "04_kazuha_final.png",
    "05_eunchae_final.png"
];

$stmt = $pdo->query("SELECT image_id FROM selection WHERE id = 1");
$selected = $stmt->fetchColumn();
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Who is your bias? | Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Special+Gothic+Expanded+One&display=swap" 
    rel="stylesheet">
</head>
<body>
    <img src="img/bias_logo.png" height="150px"/>
    <form action="save.php" method="POST">
        <div class="image-container">
            <?php foreach ($images as $filename): ?>
                <label class="image-wrapper <?php echo ($selected === $filename) ? 'selected' : ''; ?>">
                    <input 
                        type="radio" 
                        name="selected_image" 
                        value="<?php echo $filename; ?>" 
                        style="display:none"
                        <?php echo ($selected === $filename) ? 'checked' : ''; ?>>
                    <img 
                        src="img/<?php echo $filename; ?>" 
                        alt="image" 
                        width="300">
                </label>
            <?php endforeach; ?>
        </div>
        <br>
        <button type="submit">Save</button>
    </form>
    <div id="logout">
        <form action="logout.php" method="POST" style="margin-top: 10px;">
            <button type="submit">Logout</button>
        </form>
    </div>

    <script>
        const wrappers = document.querySelectorAll(".image-wrapper");

        wrappers.forEach(wrapper => {
            const input = wrapper.querySelector("input");

            wrapper.addEventListener("click", () => {
                wrappers.forEach(w => w.classList.remove("selected"));
                wrapper.classList.add("selected");
                input.checked = true;
            });
        });
    </script>
</body>
</html>
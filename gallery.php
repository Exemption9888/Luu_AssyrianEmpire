<?php
include 'artifacts.php';

$cat = htmlspecialchars($_GET['cat'] ?? 'all');
$q   = htmlspecialchars(trim($_GET['q'] ?? ''));

$results = array_filter(
    $artifacts,
    fn($a) =>
        ($cat === 'all' || $a['cat'] === $cat) &&
        ($q === '' || stripos($a['name'], $q) !== false)
);

$categories = array_values(array_unique(array_column($artifacts, 'cat')));
sort($categories);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Artifact Gallery</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="gallery.php">Gallery</a>
            <a href="donation.php">Donate</a>
        </nav>
        <header>
            <h1>Assyrian Artifact Gallery</h1>
            <p>Filter by category or search by artifact name.</p>
        </header>

        <form class="filters" method="get" action="">
            <label>
                Category
                <select name="cat">
                    <option value="all" <?= $cat === 'all' ? 'selected' : '' ?>>
                        All categories
                    </option>

                    <?php foreach ($categories as $category): ?>
                        <option
                            value="<?= htmlspecialchars($category) ?>"
                            <?= $cat === $category ? 'selected' : '' ?>
                        >
                            <?= htmlspecialchars(ucfirst($category)) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </label>

            <label>
                Search
                <input
                    type="search"
                    name="q"
                    value="<?= htmlspecialchars($q) ?>"
                    placeholder="Search artifact names"
                >
            </label>

            <button type="submit">Filter</button>
        </form>

        <main class="gallery">
            <?php if (empty($results)): ?>
                <div class="empty">
                    No artifacts matched your filters.
                </div>
            <?php else: ?>
                <?php foreach ($results as $artifact): ?>
                    <article class="card">
                        <img
                           src="<?= htmlspecialchars($artifact['img']) ?>"
                            alt="<?= htmlspecialchars($artifact['name']) ?>"
                        >

                       <div class="card-content">
                            <h2><?= htmlspecialchars($artifact['name']) ?></h2>

                            <p class="period">
                                <?= htmlspecialchars($artifact['period']) ?>
                            </p>

                            <p class="category">
                                Category:
                                <?= htmlspecialchars(ucfirst($artifact['cat'])) ?>
                            </p>

                            <p class="artifactID">
                                ID: 
                                <?= htmlspecialchars(ucfirst($artifact['id'])) ?>
                            </p>

                            <p class="description">
                                <?= htmlspecialchars($artifact['description']) ?>
                            </p>
                        </div>
                    </article>
                <?php endforeach; ?>
            <?php endif; ?>
        </main>
    </body>
</html>
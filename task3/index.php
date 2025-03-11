<?php
    session_start();

    $default_language = "en";

    $languages =
    [
        'uk' => 'Українська',
        'en' => 'English',
        'de' => 'Deutsch',
        'fr' => 'Français'
    ];

    if (isset($_GET["lang"]))
    {
        $lang = $_GET["lang"];
        setcookie("language", $lang, time() + (180 * 24 * 60 * 60), "/");
    }

    else
    {
        $lang = isset($_COOKIE["language"]) ? $_COOKIE["language"] : $default_language;
    }

    $selected_language = $languages[$lang] ?? $languages[$default_language];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <style>
        body
        {
            background-color: white;
        }

        img
        {
            width: 170px;
            height: 100px;
        }
    </style>
</head>
<body>
    <form action="result.php" enctype="multipart/form-data" method="post">
        <table>
            <tr>
                <td><label for="login">Login: </label></td>
                <td><input required id="login" name="login" type="text" value="<?=($_SESSION["data"]["login"] ?? "")?>"></td>
            </tr>

            <tr>
                <td><label for="password">Password: </label></td>
                <td><input required id="password" name="password" type="password"
                    value="<?=($_SESSION["data"]["password"] ?? "")?>"></td>
            </tr>

            <tr>
                <td><label for="confirm-password">Confirm Password: </label></td>
                <td><input required id="confirm-password" name="confirm-password" type="password"
                    value="<?=($_SESSION["data"]["confirm-password"] ?? "")?>"></td>
            </tr>

            <tr>
                <td><label for="gender">Gender: </label></td>
                <td>
                    <input required id="male" name="gender" type="radio" value="Male"
                        <?= ($_SESSION["data"]["gender"] ?? '') === "Male" ? "checked" : "" ?>>
                    <label for="male">Male</label>

                    <input required id="female" name="gender" type="radio" value="Female"
                        <?= ($_SESSION["data"]["gender"] ?? '') === "Female" ? "checked" : "" ?>>
                    <label for="female">Female</label>
                </td>
            </tr>

            <tr>
                <td><label for="city">City: </label></td>
                <td>
                    <select required id="city" name="city">
                        <option value="Zhytomyr" <?= ($_SESSION["data"]["city"] ?? '') === "Zhytomyr" ? "selected" : "" ?>>
                            Zhytomyr</option>
                        <option value="Kyiv" <?= ($_SESSION["data"]["city"] ?? '') === "Kyiv" ? "selected" : "" ?>>
                            Kyiv</option>
                        <option value="Korosten" <?= ($_SESSION["data"]["city"] ?? '') === "Korosten" ? "selected" : "" ?>>
                            Korosten</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label>Favorite games</label></td> <td style="display: block">
                    <div>
                        <input id="football" type="checkbox" name="favorite-games[]" value="Football"
                            <?= (isset($_SESSION["data"]["favorite-games"]) && in_array("Football",
                            $_SESSION["data"]["favorite-games"])) ? "checked" : "" ?>>
                        <label for="football">Football</label>
                    </div>

                    <div>
                        <input id="basketball" type="checkbox" name="favorite-games[]" value="Basketball"
                            <?= (isset($_SESSION["data"]["favorite-games"]) && in_array("Basketball",
                            $_SESSION["data"]["favorite-games"])) ? "checked" : "" ?>>
                        <label for="basketball">Basketball</label>
                    </div>

                    <div>
                        <input id="volleyball" type="checkbox" name="favorite-games[]" value="Volleyball"
                            <?= (isset($_SESSION["data"]["favorite-games"]) && in_array("Volleyball",
                            $_SESSION["data"]["favorite-games"])) ? "checked" : "" ?>>
                        <label for="volleyball">Volleyball</label>
                    </div>
                    <div>
                        <input id="chess" type="checkbox" name="favorite-games[]" value="Chess"
                            <?= (isset($_SESSION["data"]["favorite-games"]) && in_array("Chess",
                            $_SESSION["data"]["favorite-games"])) ? "checked" : "" ?>>
                        <label for="chess">Chess</label>
                    </div>
                    <div>
                        <input id="world-of-tanks" type="checkbox" name="favorite-games[]" value="World Of Tanks"
                            <?= (isset($_SESSION["data"]["favorite-games"]) && in_array("World Of Tanks",
                            $_SESSION["data"]["favorite-games"])) ? "checked" : "" ?>>
                        <label for="world-of-tanks">World Of Tanks</label>
                    </div>
                </td>
            </tr>

            <tr>
                <td><label for="about-me">About me: </label></td>
                <td><textarea id="about-me" name="about-me" cols="30" rows="10"
                    ><?=($_SESSION["data"]["about-me"] ?? "")?></textarea></td>
            </tr>

            <tr>
                <td><label for="image">Image: </label></td>
                <td><input id="image" name="image" type="file"></td>
            </tr>

            <tr>
                <td></td>
                <td><input type="submit" value="Done"></td>
            </tr>
        </table>
    </form>
    <div>
        <a href="index.php?lang=uk"><img src="flags/ukraine.png" alt="Українська"></a>
        <a href="index.php?lang=en"><img src="flags/usa.png" alt="English"></a>
        <a href="index.php?lang=de"><img src="flags/germany.png" alt="Deutsch"></a>
        <a href="index.php?lang=fr"><img src="flags/france.png" alt="Français"></a>
    </div>

    <h1>Selected language: <?php echo $selected_language; ?></h1>
</body>
</html>

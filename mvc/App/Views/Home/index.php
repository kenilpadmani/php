<!DOCTYPE HTML>
<html>
    <head>
        <title>Home</title>
    </head>
    <body>
        <h1>Welcome</h1>
        <p>Hello <?php echo htmlspecialchars($name)?></p>
        <ul>
            <?php foreach($color as $colors):?>
                <li><?php echo htmlspecialchars($colors); ?></li>
            <?php endforeach?>
        </ul>
    </body>
</html>
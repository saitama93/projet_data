<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    

    <h3> Veuillez choissir un fichier * .csv: </h3>

    <form action="import.php" method="post">

            <input type="file" name="userfile" valeu="table" enctype="multipart/form-data">
            <input type="submit" name="submit" value="Importer">
    </form>
</body>
</html>
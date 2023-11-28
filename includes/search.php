<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style-search.css">
    <title>Document</title>
</head>
<body>
    <div class="search-container">
        <form action="#" method="get">
                <input type="search" placeholder="Search products" class="search" name="buscar_prod" id="buscar_prod" onkeyup="buscar_prod($('#buscar_prod').val());">
                <div id="datos_buscador"></div>
        </form>
    </div>
</body>
</html>
<?php

use App\Models\User;
use App\Repositories\UserRepository;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Info:</h1>

    <h2>Id:</h2>
    <div><?= $user->GetId()?></div>
    <h2>Username:</h2>
    <div></div>
    <h2>Role:</h2>
    <div></div>
    <h2>Created at:</h2>
    <div></div>
</body>
</html>
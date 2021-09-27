<?php

require_once "vendor/autoload.php";

use App\Chat;
use Carbon\Carbon;

$chat = new Chat();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Super Chat</title>
</head>
<body style="margin: 30px; background-color: rgb(247,247,249); display: flex; flex-direction: column-reverse">
<div  style="background-color: rgba(12,8,6,0.56); width: fit-content; padding: 10px; border-radius: 10px; position: fixed; margin-bottom: 200px">
    <form method="post">

        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Your name:</span>

            <input name="nickname" type="text" class="form-control" placeholder="Username" aria-label="Username"
                   aria-describedby="basic-addon1" required>
        </div>

        <br><br>

        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Enter message:</span>
            </div>
            <textarea name="message" class="form-control" aria-label="With textarea" placeholder="Message" required></textarea>

        </div>
        <br><br>
        <button type="submit" class="btn btn-primary">Send message</button>
    </form>
</div>
<br>

<?php
if (isset($_POST["nickname"], $_POST["message"])) {

    $chat->writer()->insertOne([$_POST["nickname"], $_POST["message"], Carbon::now()]);


    header("location: http://localhost:8000");
}

foreach ($chat->reader()->getRecords() as $record) {
    echo "<div style='background-color: #e9ecef; border-radius: 10px; width: fit-content; padding: 5px'>< $record[2] > < $record[0] > $record[1] </div> <br>";
}

?>


<br>


</body>
</html>

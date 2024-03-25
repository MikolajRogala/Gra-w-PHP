<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        *{font-family:sans-serif; text-align: center}
        table{display: inline-block;border: 1px solid #999; border-collapse: collapse;}
        td, th{border: 1px solid #999; padding: 5px;}
        a{text-decoration: none; color: #5482f8;}
    </style>
    <h3>Gra - Zgadnij liczbę!</h3>
    <table>
        <tr>
            <td>
                <p>Zgadnij liczbę od 1 do 10</p>
                <Form action="index.php" method="post">
                    <p>Liczba: <input type="number" name="num" id=""></p>
                    <input type="submit" value="Sprawdż">
                </Form>
            </td>
        </tr>
    </table>
    <br><br>
    <table>
        <tr>
            <td>
            <?php
                if(isset($_POST['num']) and is_numeric($_POST['num']))
                {
                    $num = $_POST['num'];
                    
                    if(isset($_SESSION['i']))
                    {
                        $_SESSION['i']++;
                    }
                    else{
                        $_SESSION['i'] = 1;
                    }

                    if(!isset($_SESSION['los']))
                    {
                        $_SESSION['los'] = random_int(1,10);
                    }

                    if($num > $_SESSION['los'])
                    {
                        echo 'Niestety wylosowana liczba jest mniejsza od Twojej!<br>';
                    }
                    elseif($num < $_SESSION['los'])
                    {
                        echo 'Niestety wylosowana liczba jest większa od Twojej!<br>';
                    }
                    else
                    {
                        echo 'Brawo! Zgadłeś za '. $_SESSION['i'] .' razem!<br>';
                        session_destroy();
                    }
                }
                else
                {
                    if(isset($_SESSION['i']))
                    {
                        echo 'Podaj kolejną liczbę...';
                    }
                    else
                    {
                        echo 'Podaj pierwszą liczbę ...';
                    }
                }
            ?>
            </td>
        </tr>
    </table>
</body>
</html>
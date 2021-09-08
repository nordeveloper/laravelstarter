<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        td{
            background: red;
        }
        tr{
            background: green;
        }
    </style>
</head>
<body>
    <h3>Test email blade</h3>

    <table border="1">
        <tr>
            <td>
                <p>Laravel Email test blade</p>
                {{$emailData['text']}}
            </td>
        </tr>
    </table>
</body>
</html>
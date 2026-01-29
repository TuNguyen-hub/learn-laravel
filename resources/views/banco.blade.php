<!DOCTYPE html>
<html>
<head>
    <title>Bàn cờ vua</title>
    <style>
        table {
            border-collapse: collapse;
        }
        td {
            width: 80px;
            height: 80px;
        }
        .white {
            background-color: #fff;
        }
        .black {
            background-color: #000;
        }
    </style>
</head>
<body>

<h2>Bàn cờ {{ $n }} x {{ $n }}</h2>

<table border="1">
@for ($i = 0; $i < $n; $i++)
    <tr>
    @for ($j = 0; $j < $n; $j++)
        <td class="{{ ($i + $j) % 2 == 0 ? 'white' : 'black' }}"></td>
    @endfor
    </tr>
@endfor
</table>

</body>
</html>
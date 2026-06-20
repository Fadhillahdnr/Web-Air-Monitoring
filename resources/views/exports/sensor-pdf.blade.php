<!DOCTYPE html>
<html>
<head>
    <title>Air Monitoring Report</title>

    <style>

        body{
            font-family: sans-serif;
        }

        h1{
            text-align: center;
            margin-bottom: 20px;
        }

        table{
            width: 100%;
            border-collapse: collapse;
        }

        th, td{
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }

        th{
            background: #f3f4f6;
        }

    </style>

</head>
<body>

    <h1>Air Monitoring Report</h1>

    <table>

        <thead>
            <tr>
                <th>PM2.5</th>
                <th>CO</th>
                <th>Ozon</th>
                <th>Suhu</th>
                <th>Baterai</th>
                <th>Waktu</th>
            </tr>
        </thead>

        <tbody>

            @foreach($datas as $data)

            <tr>
                <td>{{ $data->pm25 }}</td>
                <td>{{ $data->co }}</td>
                <td>{{ $data->ozone }}</td>
                <td>{{ $data->temperature }}°C</td>
                <td>{{ $data->battery }}%</td>
                <td>{{ $data->created_at }}</td>
            </tr>

            @endforeach

        </tbody>

    </table>

</body>
</html>
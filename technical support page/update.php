<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid;
            padding: 3px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 10px;
            padding-bottom: 12px;
            text-align: center;
            background-color: #0000FF;
            color: white;
        }

        .button {
            background-color: #0000FF;
            border: none;
            color: white;
            padding: 10px 30px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <table id="customers">

        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Issue Type</th>
            <th>Description</th>


        </tr>
        <?php
        require 'submit.php';
        $sql = "SELECT id,name,email,phone,issue_type,description From patient";
        $result = $conn->query($sql);


        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {


                $row = '<tr>
        <td>' . $row["id"] . '</td>
        <td>' . $row["name"] . '</td>
        <td>' . $row["email"] . '</td>
        <td>' . $row["phone"] . '</td>
        <td>' . $row["issue_type"] . '</td>
        <td>' . $row["description"] . '</td>
        <td><a class="button" href="update_form.php?id=' . $row['id'] . '">Update</a></td>
        <td><a class="button" href="delete_action.php?id=' . $row['id'] . '">Delete</a></td>
      </tr>
      ';
                echo $row;
            }
        } else {
            echo "no Results";
        }

        $conn->close();
        ?>

    </table>
</body>

</html>
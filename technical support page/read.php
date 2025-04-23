<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Read</title>
  <style>
    #customers {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    #customers td,
    #customers th {
      border: 1px solid #ddd;
      padding: 8px;
    }

    #customers tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    #customers tr:hover {
      background-color: #ddd;
    }

    #customers th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #0000FF;
      color: white;
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
    $sql = "SELECT id,name,email,phone,issue_type,description From patient ORDER BY id DESC LIMIT 1";
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {

      while ($row = $result->fetch_assoc()) {


        $row = "<tr>
        <td>" . $row["id"] . "</td>
        <td>" . $row["name"] . "</td>
        <td>" . $row["email"] . "</td>
        <td>" . $row["phone"] . "</td>
        <td>" . $row["issue_type"] . "</td>
        <td>" . $row["description"] . "</td>
      </tr>
      ";
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
<?php 

include 'connection.php';

$query="SELECT * FROM teacher";

$data=mysqli_query($conn,$query);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Teacher</title>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 65%;
            margin-top: 40px;
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
            background-color: #04AA6D;
            color: white;
        }
        /* .butncenter{
            display: flex;
            justify-content: center;
            align-items: center;
        } */

        .teacherimg{
            width: 150px;
            height: 100px;
        }
    </style>
</head>

<body>
    <?php
    include  'admin_side_bar.php'

    ?>


    <div class="tableheadingone">
        <div class="admisionheading">
            <div class="studentinfoheading">
                <h1>Teacher Information</h1>
            </div>

            <div class="searchstudenta">
                <input class="SearchInput" type="search">
                <button class="btn btn-success  serachbtn" type="submit"> search</button>
            </div>
        </div>


        </style>
        </head>

        <body>


            <table id="customers">
                <tr>
                    <th>Teacher Name</th>
                    <th>Teacher Eduction</th>
                    <th>Photo</th>
                    <th>Action</th>
                </tr>
            <?php
            while($file=$data->fetch_assoc()){

             
            ?>
                <tr class="butncenter">
                    <td><?php echo"{$file['tname']}"?></td>
                    <td><?php echo"{$file['tdescription']}"?></td>
                    <td><img class="teacherimg" src="<?php echo"{$file['img']}"?>" alt=""></a></td>
                    <td >
                        <a style="margin-left: 20px;" class="btn btn-danger" href="?id=<?php echo $row['id']; ?>">Delete</a>
                        <!-- Updated Update button to pass the student ID -->
                        <a style="margin-left: 15px;" class="btn btn-success" href="?id=<?php echo $row['id']; ?>" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" onclick="loadStudentData(<?php echo $row['id']; ?>)">Update</a>
                    </td>
                </tr>
               
                <?php
                }
            ?>

            </table>

        </body>

</html>


</div>
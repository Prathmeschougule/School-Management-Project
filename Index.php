<?php


    //show the addmision msg
    error_reporting(0);
    session_start();
    session_destroy();
    if($_SESSION['message']){

        $message=$_SESSION['message'];
        echo"
        
        <script type=' text/javascript'>
        alert('$message');
        
        </script>";
    }

    include 'connection.php';

    $query="SELECT * FROM teacher";

    $data=mysqli_query($conn,$query);





?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css_file/style.css">
    <title>Document</title>
</head>
<body>
    <nav>

      <label for="" class="logo">Kids</label>
        <ul>
                <li><a href="">Home</a></li>
                <li><a href="">About Us</a></li>
                <li><a href="">Services</a></li>
                <li><a href="">Acadmic</a></li>              
                <li class="btn btn-success"><a href="LogIn.php">Admin LogIn</a></li>
        </ul> 
     </nav>
        
       <div class="main">

           <label class="imgText" for="">We Teach The Student </label>
           <img  class="classImg" src="Assets/school.png" alt="">

       </div>

    <div class="container">
        <div class="row">

            <div class="col-md-3">
                <img class="rowImg" src="Assets/school.png" alt="">
            </div>
            
            <div class="col-md-8">
                <h1>This School Is the Best In The Destrict</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque commodi culpa necessitatibus ratione, neque laborum sapiente incidunt sit voluptates exercitationem hic suscipit corrupti asperiores dicta laudantium illum. Voluptatum praesentium nemo error recusandae maxime ut, exercitationem optio quod et laborum incidunt quae quaerat dolore pariatur. Neque deleniti aliquid, labore sed quisquam eius sint quo magni obcaecati quia aperiam id dolores dolorum autem cum sit fugiat! Ipsa minus aliquam ab consequatur aut quaerat adipisci, aperiam obcaecati, neque odit incidunt enim corrupti tempore maiores consequuntur similique eveniet, inventore tenetur dignissimos! Dolore aliquid maxime, nemo inventore officia consequuntur a dolor? Quas dolore dolor nulla.</p>
            </div>
        </div>
    </div>   
    
    <div class="center">
        <h1>Our Best Teacher</h1>
    </div>

    <div class="conatainer">
        <div class="row">
        <?php 
        
        while($file=$data->fetch_assoc())
        {

       ?>

       
            <div class="col-md-3">
                <img class="teacher" src="<?php echo "{$file['img']}"?>" alt="">
                <h3><?PHP echo "{$file['tname']}"?></h3>
                <p><?PHP echo "{$file['tdescription']}"?></p>
            </div>
            <?php 
    
}
?>
            
        </div>
   
      
    </div>

    <div class="center">
        <h1>Our Best Courses</h1>
    </div>

    <div class="conatainer">
        <div class="row">

            <div class="col-md-3">
                <img class="teacher" src="Assets/digital_marketing.png" alt="">
                <p>Marketing</p>
            </div>

            <div class="col-md-3">
                <img class="teacher" src="Assets/graphic_design.png" alt="">
                <p>Graphic Design</p>
            </div>

            <div class="col-md-3">
                <img class="teacher" src="Assets/web_development.png" alt="">
                <p>Web Devepment</p>
            </div>
            
        </div>
    </div>

    <div class="center">
        <h1>Addmision Form </h1>
    </div>
    

    <div  class="admissionFrom">
        <form action="data_check.php" method="post">
            <div>
                <label class="text_lable" for="">Name</label>
                <input class="ipute_text" type="text" name="username">
            </div>
            <div>
                <label class="text_lable" name="" for="">Phon</label>
                <input class="ipute_text" type="text" name="phon">
            </div>
            <div>
                <label class="text_lable" for="">Email</label>
                <input class="ipute_text" type="text"  name="email">
            </div>
            <div>
                <label class="text_lable" for="">Masage</label>
                <textarea name="masage" name="" id="" type="text" ></textarea>
            </div>
            <div>
               
                <button class="btn btn-success" type="submit" name="apply">Send</button>
               
            </div>
        </form>

    </div>

</body>
</html>
<?php

    session_start(); 
    if(!isset($_SESSION['userdata'])){ 
        header("location: ../");
    }

    
    $userdata = $_SESSION['userdata'];
    $groupsdata = $_SESSION['groupsdata'];
    if($_SESSION['userdata']['status']==0){
        $status = '<b style ="color:red">NOT VOTED</b>';
    }
    else{
        $status = '<b style ="color:green">VOTED</b>';
    }   
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-ELECTION SYSTEM</title>
    <link rel="stylesheet" href="/css/stylesheet.css">
</head>

<body>
    <style>
        #backbtn {
            padding: 5px;
            font-size: 15px;
            border-radius: 5px;
            background-color: #00a8ff;
            color: white;
            float: left;
            margin: 10px;
        }
        
        #logoutbtn {
            padding: 5px;
            font-size: 15px;
            border-radius: 5px;
            background-color: #00a8ff;
            color: white;
            float: right;
            margin: 10px;
        }
        
        body {
            text-align: center;
            background-color: #fdcb6e;
        }
        #profile {
            text-align: left;
            background-color: whitesmoke;
            width: 30%;
            padding: 20px;
            float: left;
        }
        #group{
            background-color: whitesmoke;
            width: 60%;
            padding: 20px;
            float: right;
        }
        #votebtn{
            padding: 5px;
            font-size: 15px;
            border-radius: 5px;
            background-color: #00a8ff;
            color: white;

        }
        #voted{
            padding: 5px;
            font-size: 15px;
            border-radius: 5px;
            background-color: green;
            color: white;
        }
        

    </style>
    <div id="mainsection">
        <center>
        <div id="headersection" >
        <a href="../"><button id="backbtn"></button></a>
        <a href="logout.php">  <button id="logoutbtn">logout</button></a>
            <h1>E_ELECTION SYSTEM</h1>
        </div>
        </center>
        
        <hr color="green"> 
        <div id="mainpanel">
        <div id="profile">
            <center> <img src="../uploads/<?php echo $userdata['image'] ?>" height="100" width="100" alt=""><br><br> </center>
            <b>Name:</b> <? echo $userdata['name'] ?><br><br>
            <b>Mobile:</b><? echo $userdata['mobile'] ?><br><br>
            <b>Adhaar:</b><? echo $userdata['Adhar'] ?><br><br>
            <b>Address:</b><? echo $userdata['address'] ?><br><br>
            <b>Status:</b><? echo $status?><br><br>
        </div>
        

        <div id="group">
            <?php
            if($_SESSION['groupsdata']){
                for($i=0; $i<count($groupsdata); $i++){
                    ?>
                    <div>
                        <img style="float:right" src="../uploads/<?php echo $groupsdata[$i]['photo'] ?>" height="100" width="100">
                        <b>Group Name:</br><?php echo $groupsdata[$i]['name'] ?><br><br>
                        <b>votes:</br><?php echo $groupsdata[$i]['name'] ?><br><br>
                        <form action="../api/vote.php" method="POST">
                            <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes']?>">
                            <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id']?>">
                            <?php
                            if($_SESSION['userdata']['status']==0){
                                ?>
                                <input type="submit" name="votebtn" value="vote" id="votebtn">

                                <?php

                                }
                                else{
                                    ?>
                                <button disabled type="button" name="votebtn" value="vote" id="voted">voted</button>
                                    <?php
                                }
                                ?>
                            

                        </form>

                    </div>
                    <hr color="green">

                    <?php
                }


            }
            else{

            }
            ?>

        </div>

        </div>
    
        
    </div>



</body>
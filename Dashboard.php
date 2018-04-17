<html>
<head><title>Legistify</title>
<link href="Content/bootstrap.min.css" rel="stylesheet" />
<script src="Scripts/jquery-1.9.1.min.js"></script>
<script src="Scripts/bootstrap.js"></script>

</head>
<body style="background-image: url('http://www.fannone.com/i/2017/01/fall-leaves-wallpapers-high-resolution.jpg');background-size:;
 background-repeat: no-repeat;">
    <div class="container">
    <div class="row">
        <div>

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#dashboard" aria-controls="home" role="tab" data-toggle="tab">Past Usage</a>
                </li>
                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Classifier</a>
                </li>
                
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="dashboard">
                    <div class="container">
                            <h1>Past Predictions</h1>
                            <hr>
                            <div class="row col-md-10 col-md-offset-1 custyle">
                                <table class="table table-striped custab">
                                    <?php
                                    require "connect.php";
                                    session_start();
                                    if(!$_SESSION['loggedin']) // checking if lawyer is logged in 
                                        header("Location: index.html");
                                     /* For putting date into input of non availablity */
                                    

                                    /* for appointment details */
                                    $query = "Select * from predictions where userID = $_SESSION[id]";
                                    $result = mysqli_query($db,$query);
                                    // $species = mysqli_fetch_row($result)[1];
                                    // $path = mysqli_fetch_row($result)[1];
                                    $num_rows = mysqli_num_rows($result);
                                    if($num_rows>0)
                                    echo "
                                    <thead>
                                        <tr>
                                            <th>Predicted Species</th>
                                            <th>Image uploaded</th>
                                            
                                        </tr>
                                    </thead>";
                                    else
                                        echo "You haven't used our app !!";

                                    
                                    while ($row = mysqli_fetch_row($result)) {
                                        /* for name of the users */
                                        
                                        echo"
                                            <tr>
                                        <td>$row[2]</td>
                                        <td><a href = '$row[1]'><img src='$row[1]' height='100' width='100'></a></td>";
                                    //     switch ($row[3]) {
                                    //         case 'Fixed':
                                    //             echo"
                                    //     <td>
                                    //         <button id='accept' name=$row[1] class='btn btn-primary'>Accept</button>
                                    //         <button id='decline' name=$row[0] class='btn btn-danger'>Decline</button>
                                    //     </td>
                                    // </tr>
                                    //     ";
                                    //             break;

                                    //         case 'Confirmed':
                                    //         echo"<td><span class='label label-success'>Accepted</span></td>";
                                    //         break;
                                    //         default:
                                    //             echo"<td><span class='label label-danger'>Not accepted</span></td>";
                                    //             break;
                                    //     }
                                        
                                    }
                                    
                                    ?>
                                </table>
                            </div>
                        </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="profile">
                    <h1>Find the species</h1>
                    <hr>
                    <!-- <link rel="stylesheet" href="style.css" /> -->
<!-- <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed|Open+Sans+Condensed:300' rel='stylesheet' type='text/css'> -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="script.js"></script>
</head>
<body>
<div class="main">

<form id="uploadimage" action="" method="post" enctype="multipart/form-data">
<div id="image_preview"><img id="previewing" src="noimage.png" /></div>
<hr id="line">
<div id="selectImage">
<label>Select Your Image</label><br/>
<input type="file" name="file" id="file" required />
<input type="submit" value="Upload" class="submit" />
</div>
</form>
</div>
<h4 id='loading' >loading..</h4>
<div id="message"></div>
</body>
                    <hr>
                    <a href = "logout.php"><button class = "btn-primary">Log out</button></a>
                </div>
                
            </div>

        </div>
    </div>
</div>
<body>

</html>
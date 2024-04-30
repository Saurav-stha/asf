    <?php
                session_start();
                
            ?>
<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />

        <link rel="stylesheet" href="../css/unilanding.css" />
    </head>
    <body>
        <?php
            
            require "../database/database.php";
            $uniInfoId = isset($_SESSION['uniInfoId'])? htmlspecialchars(intval($_SESSION['uniInfoId'])):"";
      
            
            $sql="SELECT * FROM universityInformation where id=?";
            $stmt=mysqli_prepare($data,$sql);
            mysqli_stmt_bind_param($stmt,"i", $uniInfoId);
            if(mysqli_stmt_execute($stmt))
            {
                
                $result=mysqli_stmt_get_result($stmt);
                $user=mysqli_fetch_assoc($result);
            }
        
        ?>
        <section class="container">
            <header>Fill out the Form Below</header>
            <?php 
            if($user){

            
            ?>
            <form action="../php/unilanding.php" class="form" method="POST" enctype="multipart/form-data">
                
                <div class = "input-box">
                    <label>Name</label>
                    <input
                        type="text"
                        name="name"
                        placeholder="Enter Name of your Institution"
                        required
                        value="<?=$user['name'];?>"

                    />
                </div>
                <div class="input-box ">
                    <label>Address</label>
                    <input
                        type="text"
                        name="address"
                        placeholder="Enter address"
                        required
                        value="<?=$user['address'];?>"
                    />
                </div>

                <div class="input-box">
                    <label>Email Address</label>
                    <input
                        type="text"
                        name="aEmail"
                        placeholder="Enter email address"
                        required
                        value="<?=$user['aEmail'];?>"
                    />
                </div>

                <div class="column">
                    <div class="input-box">
                        <label>Contact</label>
                        <input
                            type="text"
                            name="phoneNumber"
                            placeholder="Enter Contact number"
                            required
                            value="<?=$user['phoneNumber'];?>"
                        />
                    </div>
                </div>
                <div class="input-box ">
                    <label>Type of Institution </label>
                    <input
                        type="text"
                        name="uniType"
                        placeholder="Type of Institution"
                        required
                        value="<?=$user['uniType'];?>"
                    />
                </div>
                
                <div class="input-box address">
                    <div class="form-group">
                        <label>About Institution</label>
                    <textarea 
                        name="aboutUniversity"
                        placeholder = " Enter about your institution "
                        required>
                        <?=$user['aboutUniversity'];?>
                    </textarea>
                    </div>
                    
                    <div class="form-group">
                        <label>Available Programs</label>
                    <textarea 
                        name="availablePrograms"
                        placeholder="Enter about programs available" 
                        required>
                        <?=$user['availablePrograms'];?>
                    
                    </textarea>
                    </div>
                    <div class="form-group"> <label>Scholarship and Fee Details</label>
                        <div class="column">
                            <textarea class = "fee-scholarship"
                                name="scholarship"
                                placeholder = "Scholarships"
                                required>
                                <?=$user['scholarship'];?>
                                
                            </textarea>
                            <textarea class = "fee-scholarship"
                                name="feeStructure"
                                placeholder="Fee Structure"
                                required>
                                <?=$user['feeStructure'];?>
                                
                            </textarea></div>                        
                    </div>
                </div>
                <!-- Input field for image -->
                <div class="image-field">
                    <label>Upload your university logo</label><br/>
                    <input type="file" name="image" accept="image/*" required />
                </div>
                <?php
                    if($uniInfoId)
                    {
                ?>
                <button type="submit" name="edit">Edit</button>
                <?php
                    } else {
                ?>
                <button type="submit" name="add">Add</button>
                <?php
                    }
                ?>
                <?php
                } else{
                    ?>
                    <form action="../php/unilanding.php" class="form" method="POST" enctype="multipart/form-data">
                
                    <div class = "input-box">
                        <label>Name</label>
                        <input
                            type="text"
                            name="name"
                            placeholder="Enter Name of your Institution"
                            required
                            
                        />
                    </div>
                    <div class="input-box ">
                        <label>Address</label>
                        <input
                            type="text"
                            name="address"
                            placeholder="Enter address"
                            required
                            
                        />
                    </div>
    
                    <div class="input-box">
                        <label>Email Address</label>
                        <input
                            type="text"
                            name="aEmail"
                            placeholder="Enter email address"
                            required
                          
                        />
                    </div>
    
                    <div class="column">
                        <div class="input-box">
                            <label>Contact</label>
                            <input
                                type="text"
                                name="phoneNumber"
                                placeholder="Enter Contact number"
                                required
                              
                            />
                        </div>
                    </div>
                    <div class="input-box ">
                        <label>Type of Institution </label>
                        <input
                            type="text"
                            name="uniType"
                            placeholder="Type of Institution"
                            required
                            
                        />
                    </div>
                    
                    <div class="input-box address">
                        <div class="form-group">
                            <label>About Institution</label>
                        <textarea 
                            name="aboutUniversity"
                            placeholder = " Enter about your institution "
                            required>
                          
                        </textarea>
                        </div>
                        
                        <div class="form-group">
                            <label>Available Programs</label>
                        <textarea 
                            name="availablePrograms"
                            placeholder="Enter about programs available" 
                            required>
                           
                        
                        </textarea>
                        </div>
                        <div class="form-group"> <label>Scholarship and Fee Details</label>
                            <div class="column">
                                <textarea class = "fee-scholarship"
                                    name="scholarship"
                                    placeholder = "Scholarships"
                                    required>
                                   
                                    
                                </textarea>
                                <textarea class = "fee-scholarship"
                                    name="feeStructure"
                                    placeholder="Fee Structure"
                                    required>
                                   
                                    
                                </textarea></div>                        
                        </div>
                    </div>
                    <!-- Input field for image -->
                    <div class="image-field">
                        <label>Upload your university logo</label><br/>
                        <input type="file" name="image" accept="image/*" required />
                    </div>
                    <?php
                        if($uniInfoId)
                        {
                    ?>
                    <button type="submit" name="edit">Edit</button>
                    <?php
                        } else {
                    ?>
                    <button type="submit" name="add">Add</button>
                    <?php
                        }
                    ?>
                    
                    <?php
                    }?>

            </form>
        </section>
    </body>
</html>
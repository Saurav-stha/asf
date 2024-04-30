
        
        <?php
        //for error reporting
        ini_set('display_errors',1);
        ini_set('display_startup_errors',1);
        error_reporting(E_ALL);

            require_once "../database/database.php";
            if(isset($_POST['submit']))
            {
                $search=htmlspecialchars(mysqli_real_escape_string($data,$_POST['search']));


                $sql="SELECT *FROM universityInformation where name like '%$search%'";

                // var_dump($search);
                $result=mysqli_query($data,$sql);

                if($result)
                {
                    if(mysqli_num_rows($result)>0){
                    
                    //Getting the number of rows in the result set
                    $numRows=mysqli_num_rows($result);
                    echo $numRows.'items found';

                    echo '
                        <table>
                            <thead>
                            <tr>
                            <th>Name</th>
                            <th>Email Address</th>
                            <th>Phone Number</th>
                            </tr>
                            </thead>
                        </table>
                    ';
                    //LOPP THROUGH EACH ROW INTHE RESULT SET
                    while($row=mysqli_fetch_assoc($result))
                    {
                    echo '
                        <table?>
                            <tbody>
                            <tr>
                            <a href="./collegeDetails.php?name='.$row['name'].'">
                                <td> '.$row['name'] .' </td>
                                <td> '.$row['aEmail'].' </td>
                                <td> '.$row['phoneNumber'].' </td>
                            </a>
                            </tr>
                            </tbody>
                        </table>
                     ';
                    }
                    }
                    // $searchKeywords=explode(",",$row['search_keywords']); //Split the string by ,
                }
                else{
                    echo '<h2 class=text-danger>Data not found</h2>';
                }
            }
        ?>
        
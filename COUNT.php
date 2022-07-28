<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Animation Studios</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>

<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Welcome</h3>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="HOME.php">HOME</a>
                </li>
                <p>SQL Function</p>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Basic SQL</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="select.php">SELECT</a>
                        </li>
                        <li>
                            <a href="insert.php">DELETE/INSERT/UPDATE</a>
                        </li>
                    </ul>
                </li>
                <li class="active">
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Advances SQL</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="IN.php">IN</a>
                        </li>
                        <li>
                            <a href="NOTIN.php">NOT IN</a>
                        </li>
                        <li>
                            <a href="EXISTS.php">EXISTS/NOT EXISTS</a>
                        </li>
                        <li>
                            <a href="#">COUNT</a>
                        </li>
                        <li>
                            <a href="SUM.php">MAX/MIN/AVG/SUM</a>
                        </li>
                        <li>
                            <a href="HAVING.php">HAVING</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">ABOUT</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">
            
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Search</span>
                    </button>
                </div>
            </nav>
            <h2>某一部動漫的配音員數量</h2>
            <form name="search_info" method="post" accept-charset="UTF-8">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">動漫名稱:</label>
                    <select class="form-control" name='option'id="exampleFormControlSelect1" >
                      <option></option>
                    <?php
                        include("connectMysql.php");
                        $sql = "SELECT animation_name, year FROM animation";
                        $result = mysqli_query($db_link,$sql) or die("Query Fail! ".mysqli_error($db_link));
                        echo mysqli_fetch_array($result);
                        if(mysqli_num_rows($result)):
                            while($row=mysqli_fetch_array($result)):
                    ?>
                      <option><?php echo $row[0]; echo ';'; echo $row[1]; ?></option>
                    <?php   endwhile;
                        endif;
                    ?>
                    </select>
                    
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">SQL:</label>
                    <textarea class="form-control" name='textarea1' id="exampleFormControlTextarea1" >SELECT VA_name,VA_age,VA_gender FROM voice_actor VA WHERE VA.VA_id IN (SELECT VA_id FROM dubbing WHERE dubbing.animation_name= AND dubbing.year= );SELECT COUNT(*) FROM dubbing WHERE dubbing.animation_name= AND dubbing.year= ;</textarea>                

                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-default btn-lg btn-block" name='generate' onclick= processFormData()>SQL From Button</button>                    
                    <button type="submit" class="btn btn-primary btn-lg btn-block" name='submit' >Submit</button>                    
                    <!-- <input type="button" class="btn btn-primary btn-lg btn-block" name='Submit'>                 -->
                </div>
                <div>   
                    <?php
                        if (isset($_POST['submit'])){
                            ?>
                        <table class="table">
                        <thead class="thead-table-hover">
                            <tr>
                                <th scope="col">聲優名稱</th>
                                <th scope="col">年齡</th>
                                <th scope="col">性別</th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php
                            include("connectMysql.php");
                            $sql = explode(";",$_POST['textarea1'])[0];
                            $sql2 = explode(";",$_POST['textarea1'])[1];
                            // echo $sql;
                            echo "<tr>$sql</tr>";
                            echo "<tr><br></tr>";
                            echo "<tr>$sql2</tr>";
                            $result=mysqli_query($db_link,$sql) or die("Query Fail! ".mysqli_error($db_link));
                            $result2=mysqli_query($db_link,$sql2) or die("Query Fail! ".mysqli_error($db_link));
                            if(mysqli_num_rows($result)){
                                while($row=mysqli_fetch_array($result)){       			
                                    echo "<tr>
                                        <td>$row[0]</td> 
                                        <td>$row[1]</td>
                                        <td>$row[2]</td>
                                        </tr>";     
                                }
                            }
                            if(mysqli_num_rows($result2)){
                                while($row=mysqli_fetch_array($result2)){       			
                                    echo "<tr>
                                        <td>配音員數:</td>
                                        <td>$row[0]</td> 
                                        </tr>";     
                                }
                            }
                        }
                    ?>
                        </tbody>
                        </table>
                </div>
                
                
                <script>
                    function processFormData(){
                        const columnElement = document.getElementById("exampleFormControlSelect1");
                        const column = columnElement.value;
                        var res = column.split(';');
                        var name = res[0];
                        var yr = res[1];
                        document.getElementById("exampleFormControlTextarea1").value = "SELECT VA_name,VA_age,VA_gender FROM voice_actor VA WHERE VA.VA_id IN (SELECT VA_id FROM dubbing WHERE dubbing.animation_name= '"+name+"' AND dubbing.year='"+yr +"');SELECT COUNT(*) FROM dubbing WHERE dubbing.animation_name= '"+name+"' AND dubbing.year='"+yr +"';";
                    }
                </script>
            </form>

              
        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <!-- javascript -->
    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar, #content').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>
</body>

</html>
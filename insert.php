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
                            <a href="COUNT.php">COUNT</a>
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
        <?php require_once 'MODIFY.php'; ?>
        <div id="content">
            
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Search</span>
                    </button>
                </div>
            </nav>
            <h2>新增原作/原案</h2>
            <form name="search_info" method="post" accept-charset="UTF-8">
                <div class="form-group">
                  <label for="exampleFormControlInput1">原案作者:</label>
                  <input type="name" name='author' id=exampleFormControlInput1
                  value="<?php echo $author; ?>" >
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput2">原案作品名稱:</label>
                  <input type="text" name='works_name' id=exampleFormControlInput2
                  value="<?php echo $works_name; ?>" >
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect1">性質:</label>
                  <select class="form-control" name='type' id="exampleFormControlSelect1">
                    <option></option>
                    <option>小說</option>
                    <option>漫畫</option>
                    <option>原創</option>
                  </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">SQL:</label>
                    <?php if ($update == true): ?>
                        <textarea class="form-control" name='textarea1' id="exampleFormControlTextarea1" >UPDATE original_work SET</textarea>                
                    <?php else: ?>
                        <textarea class="form-control" name='textarea2' id="exampleFormControlTextarea1" >INSERT INTO original_work</textarea>                
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <?php if ($update == true): ?>
                        <button type="button" class="btn btn-default btn-lg btn-block" name='generate1' onclick= processupdate()>SQL From Button</button>                    
                    <?php else: ?>
                        <button type="button" class="btn btn-default btn-lg btn-block" name='generate2' onclick= processadd()>SQL From Button</button>                    
                    <?php endif; ?>

                    <?php if ($update == true): ?>
                        <button type="submit" class="btn btn-success btn-lg btn-block" name='update' >UPDATE</button>                    
                    <?php else: ?>
                        <button type="submit" class="btn btn-primary btn-lg btn-block" name='add' >ADD</button>                    
                    <?php endif; ?>

                </div>
                <div>
                    <table class="table">
                    <thead class="thead-table-hover">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">原案作者</th>
                            <th scope="col">原案作品名稱</th>
                            <th scope="col">性質</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                            $select = "SELECT * FROM original_work";
                            // echo "<tr>$sql</tr>";
                            if (isset($_SESSION['message'])):
                                $message=$_SESSION['message'];
                                echo "<tr>$message</td>";
                                // unset($_SESSION['message']);
                            endif;
                            $result=mysqli_query($db_link,$select) or die("Query Fail! ".mysqli_error($db_link));
                            $num = 0;
                            if(mysqli_num_rows($result)):
                                while($row=mysqli_fetch_array($result)):       			
                                    $num += 1; 
                    ?>
                                    <tr>
                                        <td><?php echo $num; ?></td>
                                        <td><?php echo $row[0]; ?></td> 
                                        <td><?php echo $row[1]; ?></td>
                                        <td><?php echo $row[2]; ?></td>
                                        <td>
                                            <a href="insert.php?edit=<?php echo $row['author']," ",$row['works_name']; ?>"
                                                class="btn btn-info">Edit</a>
                                            <a href="MODIFY.php?delete=<?php echo $row['author']," ",$row['works_name']; ?>"
                                                class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                         
                                <?php endwhile; ?>
                            <?php endif; ?>
                        
                        </tbody>
                    </table>
                </div>
                
                
                <script>
                    function processadd(){
                        const authorElement = document.getElementById("exampleFormControlInput1");
                        const author = authorElement.value;
                        const nameElement = document.getElementById("exampleFormControlInput2");
                        const name = nameElement.value;
                        const workstypeElement = document.getElementById("exampleFormControlSelect1");
                        const workstype = workstypeElement.value;
                        document.getElementById("exampleFormControlTextarea1").value = "INSERT INTO original_work VALUES ('"+author+"', '"+name+"', '"+workstype+"');";
                    }
                </script>

                <script>
                    function processupdate(){
                        const authorElement = document.getElementById("exampleFormControlInput1");
                        const author = authorElement.value;
                        const nameElement = document.getElementById("exampleFormControlInput2");
                        const name = nameElement.value;
                        const workstypeElement = document.getElementById("exampleFormControlSelect1");
                        const workstype = workstypeElement.value;
                        document.getElementById("exampleFormControlTextarea1").value = "UPDATE original_work SET works_name='"+name+"' WHERE author='"+author+"';";
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
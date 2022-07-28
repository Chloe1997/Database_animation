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
                            <a href="#">SELECT</a>
                        <li>
                            <a href="insert.php">DELETE/INSERT/UPDATE</a>
                        </li>
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
                            <a href="#">EXISTS/NOT EXISTS</a>
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
        <div id="content">
            
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Search</span>
                    </button>
                </div>
            </nav>
            <h2>查詢哪些原作符合特定條件且有/無製作成漫畫</h2>
            <form name="search_info" method="post" accept-charset="UTF-8">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">EXISTS/NOT EXISTS</label>
                  <select class="form-control" id="exampleFormControlSelect1">
                    <option></option>
                    <option>EXISTS</option>
                    <option>NOT EXISTS</option>
                  </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect2">Column</label>
                    <select class="form-control" id="exampleFormControlSelect2">
                      <option></option>
                      <option>animation_name</option>
                      <option>year</option>
                      <option>media_type</option>
                      <option>theme</option>
                    </select>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect3">Operator</label>
                  <select class="form-control" id="exampleFormControlSelect3">
                    <option></option>
                    <option>=</option>
                    <option><</option>
                    <option>></option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1">Value:</label>
                  <input id=exampleFormControlInput1 placeholder="value">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">SQL:</label>
                    <textarea class="form-control" name='textarea1' id="exampleFormControlTextarea1" >SELECT * FROM original_work OW WHERE EXISTS (SELECT * FROM animation A WHERE OW.author = A.author AND OW.works_name = A.works_name)</textarea>                

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
                                <th scope="col">作者</th>
                                <th scope="col">原作名稱</th>
                                <th scope="col">性質</th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php
                            include("connectMysql.php");
                            $sql = $_POST['textarea1'];
                            // echo $sql;
                            echo "<tr>$sql</tr>";
                            $result=mysqli_query($db_link,$sql) or die("Query Fail! ".mysqli_error($db_link));
                            if(mysqli_num_rows($result)){
                                while($row=mysqli_fetch_array($result)){       			
                                    echo "<tr>
                                        <td>$row[0]</td> 
                                        <td>$row[1]</td>
                                        <td>$row[2]</td>
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
                        const existsElement = document.getElementById("exampleFormControlSelect1");
                        const exists = existsElement.value;
                        const columnElement = document.getElementById("exampleFormControlSelect2");
                        const column = columnElement.value;
                        const operatorElement = document.getElementById("exampleFormControlSelect3");
                        const operator = operatorElement.value;
                        const valueElement = document.getElementById("exampleFormControlInput1");
                        const value = valueElement.value;
                        document.getElementById("exampleFormControlTextarea1").value = "SELECT * FROM original_work OW WHERE "+ exists +"(SELECT * FROM animation A WHERE OW.author = A.author AND OW.works_name = A.works_name AND "+column+" "+operator+" '"+value+ "');";
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
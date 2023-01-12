<?php
$servername = "localhost";
$username = "root";
$password = "";
$databasename = "hotel";

$conn = mysqli_connect($servername, $username, $password, $databasename);

if (!$conn) {
    echo "Connection Was not Successfull";
}
?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/style/index.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link href="/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous">
    </script>
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>


    <title>Displaying Result  </title>
</head>

<body>
     <!-- Navigation Bar  -->
     <!-- <header class="mb-auto">
    <div> 
      <h3 class="float-md-start mb-0" id="logo" ><a href="/index.html" id="logo">Shri Radhe Krishna</a></h3>
      <div class="left">
        <nav class="nav nav-masthead justify-content-lg-end ">
          <a id="home" class="nav-link active "  float-md-start mb-0 href="/index.html" >Home</a>
          <a id="home" class="nav-link" href="/html/book.html">Book</a>
          <a id="home" class="nav-link" href="/html/about.html">About</a>
          <a id="home" class="nav-link" href="/html/contact.html">Contact</a>
        </nav>
        </div>
      </div>
     </header> -->
    <!-- Navigation Bar Close -->



    <style>
        #head{
            margin-top: 2%;
            margin-bottom: 3%;
            font-size: 50px;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }
    </style>
    <div class="con">
        <?php
        $sql = "SELECT * FROM `account`";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        $ans = $num;
        ?>
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
            </symbol>
            <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
            </symbol>
            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
            </symbol>
        </svg>

        <div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                <use xlink:href="#check-circle-fill" />
            </svg>
            <div>
                You Have <strong><?php echo $ans ?></strong> Number Of Orders
            </div>
        </div>
    </div>
    <div class="cantainer ">
        <div class="col-md-12">
        <h1 id="head" align=center>Display Orders</h1>
        </div>
    </div>

    <div class="cointainer1">
        <table id="myTable">
            <thead>
                <tr>
                    <th scope="col">S. NO</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">Aadhar Chard</th>
                    <th scope="col">State</th>
                    <th scope="col">City</th>
                    <th scope="col">Zip Code</th>
                    <th scope="Col">Date Time </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM `account`";
                $result = mysqli_query($conn, $sql);
                $sno = 0;
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $sno = $sno + 1;
                    echo "<tr>
           <th scope = row > " . $sno . " </th>
           <td>" . $row["fullname"] . "</td>
           <td>" . $row["email"] . "</td>
           <td>" . $row["number"] . "</td>
           <td>" . $row["address"] . "</td>
           <td>" . $row["adharcard"] . "</td>
           <td>" . $row["state"] . "</td>
           <td>" . $row["city"] . "</td>
           <td>" . $row["zipcode"] . "</td>
           <td>" . $row["datetime"] . "</td>
        
       </tr>";
                    echo "<br>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <hr border=2px solid black>
    <style>
        .cointainer1 {
            margin-top: 10px;
            margin-left: 10%;
            margin-right: 10%;
        }

        br {
            content: "";
        }

        br:after {
            content: " ";
        }

        .flat-breaks br {
            content: "";
        }

        .flat-breaks br:after {
            content: " ";
        }
    </style>

    <?php
    mysqli_close($conn);
    ?>
    <script src="https://cdn.jnsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>
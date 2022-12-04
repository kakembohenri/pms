<?php

session_start();


$host = 'localhost';
$username = 'root';
$password = '';
$database = 'pms_db';

$conn;



$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<?php



if (isset($_GET['search'])) {

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $name = '%' . $_GET['search'] . '%';
        $id = null;
        $prisoners = null;

        if (isset($name)) {
            $qry = mysqli_query($conn, "SELECT * from inmate_list where firstname LIKE '$name' or middlename LIKE '$name' or lastname LIKE '$name'");

            $count = mysqli_num_rows($qry);

            if ($count > 0) {

                $prisoners = mysqli_fetch_all($qry);

                $_SESSION['result'] = 'Search results for ' . '<b>' . $_GET['search'] . '</b>';
            } else {
                $_SESSION['result'] = 'No inmates found';
                $prisoners = null;
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">



</head>

<body>
    <style>
        body {
            background: gainsboro;
            display: flex;
            justify-content: center;
            font-family: Tahoma, sans-serif;
        }

        .search-container {
            display: flex;

            flex-direction: column;
            align-items: center;
        }

        input {
            padding: 0.5rem;
        }

        .results-container {
            width: 30rem;
            height: 80vh;
            overflow-y: auto;
        }

        .result {
            display: flex;
            align-items: center;
            padding: 0.8rem;
            margin: 1rem;
            box-shadow: 0rem 0rem 0.1rem;
            background: white;
        }

        img {
            height: 10rem;
            width: 10rem;
            border-radius: 50%;
        }
    </style>
    <div class='search-container'>

        <h3>Search for inmates</h3>
        <form action="" method='get' id='search-form'>

            <input type="text" name="search" id="search" placeholder="Type the name here" />
            <input type='submit' />
        </form>
        <?php if (!empty($_SESSION['result'])) : ?>
            <div>
                <p>
                    <?php echo $_SESSION['result']; ?>
                </p>
            </div>
        <?php
            $_SESSION['result'] = '';
        endif ?>
        <?php if (isset($prisoners) && $prisoners != null) :
        ?>
            <div class='results-container'>
                <?php foreach ($prisoners as $prisoner) :
                    $img = explode('?', $prisoner[18])[0];
                ?>
                    <div class='result'>
                        <img src="<?php echo '../../' . $img; ?>" alt="" />
                        <div>
                            <div style='display: flex; align-items: center;'>
                                <span style='margin-right: 1rem;'>Name:</span>
                                <p><?php echo $prisoner[2] . " " . $prisoner[3] . " " . $prisoner[4];
                                    ?></p>
                            </div>
                            <a target="_blank" href="results.php?id=<?php echo $prisoner[0]; ?>">
                                View more
                            </a>
                        </div>
                    </div>
                <?php endforeach
                ?>
            </div>
        <?php endif
        ?>
    </div>
</body>
<script>
    let form = document.querySelector('search-form')

    console.log(form)
</script>

</html>
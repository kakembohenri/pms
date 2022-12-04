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

$id = $_GET['id'];

// Get inmates details
$query = mysqli_query($conn, "SELECT * from inmate_list where id='$id'");

$inmate = mysqli_fetch_object($query);

// Get cell 
?>

<html>

<head>

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
            width: 40rem;
        }

        .result {
            display: flex;
            flex-direction: column;
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


    <div class='results-container'>
        <?php
        $img = explode('?', $inmate->image_path)[0];
        ?>
        <div class='result'>
            <div style='display: flex;'>
                <img src="<?php echo '../../' . $img; ?>" alt="" />
                <div>

                    <div style='display: flex; align-items: center;'>
                        <span style='margin-right: 1rem;'>Prisoner code:</span>
                        <p><?php echo $inmate->code;
                            ?></p>
                    </div>
                    <div style='display: flex; align-items: center;'>
                        <span style='margin-right: 1rem;'>Name:</span>
                        <p><?php echo $inmate->firstname . " " . $inmate->middlename . " " . $inmate->lastname;
                            ?></p>
                    </div>
                    <div style='display: flex; align-items: center;'>
                        <span style='margin-right: 1rem;'>Date of birth:</span>
                        <p><?php echo $inmate->dob;
                            ?></p>
                    </div>
                    <div style='display: flex; align-items: center;'>
                        <span style='margin-right: 1rem;'>Gender:</span>
                        <p><?php echo $inmate->sex;
                            ?></p>
                    </div>
                </div>

            </div>
            <div style='display: flex; align-items: center;'>
                <span style='margin-right: 1rem;'>Marital status:</span>
                <p><?php echo $inmate->marital_status;
                    ?></p>
            </div>
            <div style='display: flex; align-items: center;'>
                <span style='margin-right: 1rem;'>Country:</span>
                <p><?php echo $inmate->country;
                    ?></p>
            </div>
            <div style='display: flex; align-items: center;'>
                <span style='margin-right: 1rem;'>Illness:</span>
                <p><?php echo $inmate->illness;
                    ?></p>
            </div>
            <div style='display: flex; justify-content: space-between;'>
                <div>
                    <h4>Sentence details</h4>
                    <div>
                        <div style='display: flex; align-items: center;'>
                            <span style='margin-right: 1rem;'>Cell:</span>
                            <!-- Get prison and cell block -->
                            <?php
                            $cell_id = $inmate->cell_id;

                            // Cell block
                            $query = mysqli_query($conn, "SELECT * FROM cell_list WHERE id='$cell_id'");

                            $cell = mysqli_fetch_object($query);

                            // Prison

                            $prison_id = $cell->prison_id;
                            $query = mysqli_query($conn, "SELECT * FROM prison_list WHERE id='$prison_id'");

                            $prison = mysqli_fetch_object($query);
                            ?>
                            <p><?php echo $prison->name . " " . $cell->name;
                                ?></p>
                        </div>
                        <div style='display: flex; align-items: center;'>
                            <span style='margin-right: 1rem;'>Duration:</span>
                            <p><?php echo $inmate->sentence . " " . $inmate->duration;
                                ?></p>
                        </div>
                        <div style='display: flex; align-items: center;'>
                            <span style='margin-right: 1rem;'>From:</span>
                            <p><?php echo $inmate->date_from;
                                ?></p>
                        </div>
                        <div style='display: flex; align-items: center;'>
                            <span style='margin-right: 1rem;'>To:</span>
                            <p><?php echo $inmate->date_to;
                                ?></p>
                        </div>

                    </div>
                </div>
                <div>
                    <h4>Kin</h4>
                    <div>
                        <div style='display: flex; align-items: center;'>
                            <span style='margin-right: 1rem;'>Name:</span>
                            <p><?php echo $inmate->emergency_name;
                                ?></p>
                        </div>
                        <div style='display: flex; align-items: center;'>
                            <span style='margin-right: 1rem;'>Contact:</span>
                            <p><?php echo $inmate->emergency_contact;
                                ?></p>
                        </div>
                        <div style='display: flex; align-items: center;'>
                            <span style='margin-right: 1rem;'>Relationship:</span>
                            <p><?php echo $inmate->emergency_relation;
                                ?></p>
                        </div>
                    </div>

                </div>
            </div>
            <div>
                <h4>Transfers</h4>

                <?php

                $inmate_id = $inmate->id;
                $query = mysqli_query($conn, "SELECT * FROM transfers WHERE inmate_id='$inmate_id'");

                $count = mysqli_num_rows($query);
                $transfers = mysqli_fetch_all($query);
                ?>
                <?php if ($count > 0) :
                ?>
                    <?php

                    foreach ($transfers as $transfer) : ?>
                        <?php

                        // Cell block
                        $query = mysqli_query($conn, "SELECT * FROM cell_list WHERE id='$cell_id'");

                        $cell = mysqli_fetch_object($query);

                        // Prison

                        $prison_id = $cell->prison_id;
                        $query = mysqli_query($conn, "SELECT * FROM prison_list WHERE id='$prison_id'");

                        $prison = mysqli_fetch_object($query);
                        ?>
                        <div>
                            <div style='display: flex; align-items: center;'>
                                <span style='margin-right: 1rem;'>Code:</span>
                                <p><?php echo $transfer[4];
                                    ?></p>
                            </div>
                            <div style='display: flex; align-items: center;'>
                                <span style='margin-right: 1rem;'>Cell:</span>
                                <p><?php echo $prison->name . " " . $cell->name;
                                    ?></p>
                            </div>
                            <div style='display: flex; align-items: center;'>
                                <span style='margin-right: 1rem;'>Date transferred:</span>
                                <p><?php echo $transfer[3];
                                    ?></p>
                            </div>
                        </div>
                    <?php
                    endforeach
                    ?>
                <?php else : ?>
                    <p>No transfers</p>
                <?php endif ?>
            </div>
        </div>
    </div>

    </div>
</body>

</html>
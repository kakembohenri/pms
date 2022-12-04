<?php if ($_settings->chk_flashdata('success')) : ?>
    <script>
        alert_toast("<?php echo $_settings->flashdata('success') ?>", 'success')
    </script>
<?php endif; ?>
<style>
    .inmate-img {
        width: 3em;
        height: 3em;
        object-fit: cover;
        object-position: center center;
    }

    .notification {
        padding: 0.8rem;
        margin: 0.5rem;
        background: crimson;
    }

    .notification p {
        color: white;
    }
</style>
<?php
$i = 1;
$qry = null;

// if (isset($_GET['filter'])) {
// 	$sex = $_GET['gender'];
// 	$cell_id = $_GET['cell_id'];
// 	$country = $_GET['country'];

// 	if (!empty($sex) && !empty($cell_id) && !empty($country)) {
// 		$qry = $conn->query("SELECT *,concat(lastname,', ', firstname, coalesce(concat(' ', middlename), '')) as `name` from `inmate_list` where sex='$sex' and cell_id='$cell_id'and country='$country' order by `name` asc ");
// 	} else if (!empty($sex) && !empty($cell_id)) {
// 		$qry = $conn->query("SELECT *,concat(lastname,', ', firstname, coalesce(concat(' ', middlename), '')) as `name` from `inmate_list` where sex='$sex' and cell_id='$cell_id' order by `name` asc ");
// 	} else if (!empty($sex) && !empty($country)) {
// 		$qry = $conn->query("SELECT *,concat(lastname,', ', firstname, coalesce(concat(' ', middlename), '')) as `name` from `inmate_list` where sex='$sex' and country='$country' order by `name` asc ");
// 	} else if (!empty($cell_id) && !empty($country)) {
// 		$qry = $conn->query("SELECT *,concat(lastname,', ', firstname, coalesce(concat(' ', middlename), '')) as `name` from `inmate_list` where cell_id='$cell_id' and country='$country' order by `name` asc ");
// 	} else {
// 		$qry = $conn->query("SELECT *,concat(lastname,', ', firstname, coalesce(concat(' ', middlename), '')) as `name` from `inmate_list`  order by `name` asc ");
// 		$_SESSION['status'] = 'Filter is missing input';
// 	}
// } else {
// 	$qry = $conn->query("SELECT *,concat(lastname,', ', firstname, coalesce(concat(' ', middlename), '')) as `name` from `inmate_list`  order by `name` asc ");
// }
$transfers = $conn->query("SELECT * from transfers");

$qry = $conn->query("SELECT *,concat(lastname,', ', firstname, coalesce(concat(' ', middlename), '')) as `name` from `inmate_list`  order by `name` asc ");
// $count = mysqli_num_rows($qry);
?>
<?php //if (!empty($_SESSION['status'])) : 
?>
<!-- <div class='notification'>
		<p><?php //echo $_SESSION['status']; 
            ?></p>
	</div> -->
<?php
//$_SESSION['status'] = '';
//endif 
?>
<div class="card card-outline rounded-0 card-navy">
    <div class="card-header">
        <h3 class="card-title">List of Transfers</h3>
        <?php //echo '<br />' . $count; 
        ?>
        <!-- <div class="card-tools">
            <a href="./?page=inmates/manage_inmate" id="create_new" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span> Create New</a>

        </div> -->
    </div>
    <!-- <form action="" style='display: flex; justify-content: space-around;
    align-items: center;' method='GET' id='filter-form'>
        <p>Filter:</p>
        <div class="">
            <input type="text" name='page' value='transfers' hidden>
            <label for="cell_id" class="control-label">Prison & Cell Block</label>
            <select class="form-control form-control-sm rounded-0" name="cell_id" id="cell_id">
                <option value="" <?= !isset($cell_id) ? 'selected' : '' ?>>--Select Prison--</option>
                <?php
                $cells = $conn->query("SELECT c.*, p.name as `prison` FROM `cell_list` c inner join prison_list p on c.prison_id = p.id where c.delete_flag = 0 and c.`status` = 1 order by c.`name` asc ");
                while ($row = $cells->fetch_assoc()) :
                ?>
                    <option value="<?= $row['id'] ?>" <?= isset($cell_id) && $cell_id == $row['id'] ? 'selected' : '' ?>><?= $row['prison'] . " - " . $row['name'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div>
            <label for="gender" class="control-label">Sex</label>
            <select class="form-control form-control-sm rounded-0" name="gender" id="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>

            </select>
        </div>
        <div style='display:flex; flex-direction:column;'>
            <label for="country">Country</label>
            <input type="text" name='country'>
        </div>
        <button name='filter' id='filter'>
            Filter
        </button>
    </form> -->
    <div class="card-body">
        <div class="container-fluid">
            <table class="table table-hover table-striped table-bordered" id="list">
                <colgroup>
                    <col width="5%">
                    <col width="20%">
                    <col width="20%">
                    <col width="30%">
                    <col width="10%">
                    <col width="15%">
                </colgroup>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    while ($transfered = $transfers->fetch_assoc()) :
                        $inmate_id = $transfered['inmate_id'];
                        $qry = $conn->query("SELECT *,concat(lastname,', ', firstname, coalesce(concat(' ', middlename), '')) as `name` from `inmate_list` where id='$inmate_id' order by `name` asc ");
                        while ($row = $qry->fetch_assoc()) :
                    ?>
                            <tr>
                                <td class="text-center"><?php echo $i++; ?></td>
                                <td>
                                    <?php
                                    $cell_id = $row['cell_id'];
                                    $query = $conn->query("SELECT * FROM cell_list WHERE id='$cell_id'");
                                    $cell = mysqli_fetch_assoc($query);
                                    echo $cell['name'];
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $cell_id = $transfered['cell_id'];
                                    $query = $conn->query("SELECT * FROM cell_list WHERE id='$cell_id'");
                                    $cell = mysqli_fetch_assoc($query);
                                    echo $cell['name'];
                                    ?>
                                </td>
                                <td class=""><?= $row['code'] ?></td>
                                <td class=""><?= $row['name'] ?></td>
                                <td class="text-center">
                                    <?php if (isset($row['date_to']) && !empty($row['date_to']) && strtotime($row['date_to']) <= strtotime(date('Y-m-d'))) : ?>
                                        <span class="badge badge-primary bg-gradient-primary px-3 rounded-pill">Released</span>
                                    <?php else : ?>
                                        <?php if ($row['status'] == 1) : ?>
                                            <span class="badge badge-success bg-gradient-success px-3 rounded-pill">Active</span>
                                        <?php else : ?>
                                            <span class="badge badge-danger bg-gradient-danger px-3 rounded-pill">Inactive</span>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </td>
                                <td align="center">
                                    <button type="button" class="btn btn-flat p-1 btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                        Action
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item view-data" href="./?page=inmates/view_inmate&id=<?php echo $row['id'] ?>"><span class="fa fa-eye text-dark"></span> View</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item edit-data" href="./?page=inmates/manage_inmate&id=<?php echo $row['id'] ?>"><span class="fa fa-edit text-primary"></span> Edit</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item edit-data" href="./?page=inmates/transfer_form&id=<?php echo $row['id'] ?>"><span class="fa fa-edit text-primary"></span> Transfer</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item delete_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-trash text-danger"></span> Delete</a>
                                    </div>
                                </td>
                            </tr>
                    <?php
                        endwhile;
                    endwhile;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.delete_data').click(function() {
            _conf("Are you sure to delete this Inmate permanently?", "delete_inmate", [$(this).attr('data-id')])
        })
        $('.table').dataTable({
            columnDefs: [{
                orderable: false,
                targets: [5]
            }],
            order: [0, 'asc']
        });
        $('.dataTable td,.dataTable th').addClass('py-1 px-2 align-middle')
    })

    function delete_inmate($id) {
        start_loader();
        $.ajax({
            url: _base_url_ + "classes/Master.php?f=delete_inmate",
            method: "POST",
            data: {
                id: $id
            },
            dataType: "json",
            error: err => {
                console.log(err)
                alert_toast("An error occured.", 'error');
                end_loader();
            },
            success: function(resp) {
                if (typeof resp == 'object' && resp.status == 'success') {
                    location.reload();
                } else {
                    alert_toast("An error occured.", 'error');
                    end_loader();
                }
            }
        })
    }
</script>
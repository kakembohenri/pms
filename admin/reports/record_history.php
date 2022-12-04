<?php

// location.href = './?page=reports/record_history&prison='

$prison = isset($_GET['prison']) ? $_GET['prison'] : '';

$i = 1;

if ($prison == "") {

    $records = $conn->query("SELECT * FROM inmate_list");
} else {
    $records = $conn->query("SELECT * FROM inmate_list WHERE prison_id='$prison'");
}
$query = $conn->query("SELECT * FROM prison_list ");

$prisons = mysqli_fetch_all($query);

?>
<div class="content py-5 px-3 bg-gradient-navy">
    <h2>Inmate Record Reports</h2>
</div>
<div class="row flex-column mt-4 justify-content-center align-items-center mt-lg-n4 mt-md-3 mt-sm-0">
    <div class="col-lg-11 col-md-11 col-sm-12 col-xs-12">
        <div class="card rounded-0 mb-2 shadow">
            <div class="card-body">
                <fieldset>
                    <legend>Filter</legend>
                    <form action="" id="filter-form" method='get'>
                        <div class="row align-items-end">
                            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">

                                    <select name="prison" id="prison">
                                        <option value="">--Select Prison--</option>
                                        <?php foreach ($prisons as $prison) : ?>
                                            <option value="<?php echo $prison[0]; ?>"><?php echo $prison[1]; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <button class="btn btn-sm btn-flat btn-primary bg-gradient-primary" type='submit'><i class="fa fa-filter"></i> Filter</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </fieldset>
            </div>
        </div>
    </div>
    <div class="col-lg-11 col-md-11 col-sm-12 col-xs-12">
        <div class="card rounded-0 mb-2 shadow">
            <div class="card-header py-1">
                <div class="card-tools">
                    <button class="btn btn-flat btn-sm btn-light bg-gradient-light border text-dark" type="button" id="print"><i class="fa fa-print"></i> Print</button>
                </div>
            </div>
            <div class="card-body">
                <div class="container-fluid" id="printout">
                    <table class="table table-bordered">
                        <colgroup>
                            <col width="10%">
                            <col width="15%">
                            <col width="15%">
                            <col width="20%">
                            <col width="20%">
                            <col width="35%">
                        </colgroup>
                        <thead>
                            <tr>
                                <th class="px-1 py-1 text-center">#</th>
                                <th class="px-1 py-1 text-center">Sentence</th>
                                <th class="px-1 py-1 text-center">Duration</th>
                                <th class="px-1 py-1 text-center">Inmate</th>
                                <th class="px-1 py-1 text-center">Action</th>
                                <th class="px-1 py-1 text-center">Remarks</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            while ($row = $records->fetch_assoc()) :

                                // Get action and remark
                                $id = $row['id'];

                                $query = $conn->query("SELECT * FROM record_list WHERE inmate_id='$id'");

                                $count = mysqli_num_rows($query);

                                if ($count > 0) {

                                    $remark = $query->fetch_assoc();

                                    $action_id = $remark['action_id'];

                                    $query = $conn->query("SELECT * FROM action_list WHERE id='$action_id'");

                                    $action = $query->fetch_assoc();
                                } else {
                                    $remark = null;

                                    $action = null;
                                }
                            ?>
                                <tr>
                                    <td class="px-1 py-1 align-middle text-center"><?= $i++ ?></td>
                                    <td class="px-1 py-1 align-middle"><?= date("M d, Y", strtotime($row['date_from'])) . " - " . date("M d, Y", strtotime($row['date_to'])) ?></td>
                                    <td class="px-1 py-1 align-middle"><?= $row['sentence'] . " " . $row['duration'] ?></td>

                                    <td class="px-1 py-1 align-middle">
                                        <div style="line-height:1em">
                                            <div><b><?= $row['firstname'] . " " . $row['middlename'] . " " . $row['lastname']; ?></b></div>
                                            <div>Inmate - <?= $row['code'] ?></div>
                                        </div>
                                    </td>
                                    <td class="px-1 py-1 align-middle"><?= $action == null ? '' : $action['name'] ?></td>
                                    <td class="px-1 py-1 align-middle"><?= $remark == null ? '' : $remark['remarks'] ?></td>
                                </tr>
                            <?php endwhile; ?>
                            <?php if ($records->num_rows <= 0) : ?>
                                <tr>
                                    <td class="py-1 text-center" colspan="5">No records found</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<noscript id="print-header">
    <div>
        <style>
            html {
                min-height: unset !important;
            }
        </style>
        <div class="d-flex w-100 align-items-center">
            <div class="col-2 text-center">
                <img src="<?= validate_image($_settings->info('logo')) ?>" alt="" class="rounded-circle border" style="width: 5em;height: 5em;object-fit:cover;object-position:center center">
            </div>
            <div class="col-8">
                <div style="line-height:1em">
                    <div class="text-center font-weight-bold h5 mb-0">
                        <large><?= $_settings->info('name') ?></large>
                    </div>
                    <div class="text-center font-weight-bold h5 mb-0">
                        <large>Prison Inmate Record Report</large>
                    </div>
                    <div class="text-center font-weight-bold h5 mb-0">as of <?= date("F Y", strtotime($month . '-01')) ?></div>
                </div>
            </div>
        </div>
        <hr>
    </div>
</noscript>
<script>
    function print_r() {
        var h = $('head').clone()

        var el = $('#printout').clone()
        var ph = $($('noscript#print-header').html()).clone()
        h.find('title').text("Monthly Inmate Record Report - Print View")
        var nw = window.open("", "_blank", "width=" + ($(window).width() * .8) + ",left=" + ($(window).width() * .1) + ",height=" + ($(window).height() * .8) + ",top=" + ($(window).height() * .1))
        nw.document.querySelector('head').innerHTML = h.html()
        nw.document.querySelector('body').innerHTML = ph[0].outerHTML
        nw.document.querySelector('body').innerHTML += el[0].outerHTML
        nw.document.close()
        start_loader()
        setTimeout(() => {
            nw.print()
            setTimeout(() => {
                nw.close()
                end_loader()
            }, 200);
        }, 300);
    }
    $(function() {

        $('#prison').change(function(e) {

            $.ajax({
                url: _base_url_ + 'admin/reports/record_history',
                data: {
                    prison: e.target.value
                },
                type: "GET",
                error: err => {
                    console.log("Error: ", err)
                    location.href = './?page=reports/record_history'
                },
                success: function(resp) {
                    console.log(resp)
                    location.href = `./?page=reports/record_history&prison=${e.target.value}`
                }
            })
        })


        $('#print').click(function() {
            print_r()
        })

    })
</script>
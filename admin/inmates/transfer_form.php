<?php
if (isset($_GET['id']) && $_GET['id'] > 0) {
    $qry = $conn->query("SELECT * from `inmate_list` where id = '{$_GET['id']}' ");
    if ($qry->num_rows > 0) {
        foreach ($qry->fetch_assoc() as $k => $v) {
            $$k = $v;
        }
    }
    // if (isset($id)) {
    //     $crimes = $conn->query("SELECT crime_id from `inmate_crimes` where inmate_id = '{$id}' ");
    //     $crime_ids = array_column($crimes->fetch_all(MYSQLI_ASSOC), 'crime_id');
    // }
}
?>
<style>
    img#cimg {
        max-height: 15em;
        max-width: 100%;
        object-fit: scale-down;
    }
</style>
<div class="content py-4 bg-gradient-navy px-3">
    <h4 class="mb-0">Transfer inmate form</h4>
</div>
<div class="row mt-n4 justify-content-center align-items-center flex-column">
    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
        <div class="card rounded-0 shadow">
            <div class="card-body">
                <div class="container-fluid">
                    <form action="" id="transfer-form">
                        <input type="hidden" name="inmate_id" value="<?= isset($id) ? $id : '' ?>">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="code" class="control-label">New Code</label>
                                    <input type="text" class="form-control form-control-sm rounded-0" name="new_code" id="new_code" required="required" value="<?= isset($new_code) ? $new_code : "" ?>">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="cell_id" class="control-label">Prison & Cell Block</label>
                                    <select class="form-control form-control-sm rounded-0" name="cell_id" id="cell_id" required="required">
                                        <option value="" <?= !isset($cell_id) ? 'selected' : '' ?>></option>
                                        <?php
                                        $cells = $conn->query("SELECT c.*, p.name as `prison` FROM `cell_list` c inner join prison_list p on c.prison_id = p.id where c.delete_flag = 0 and c.`status` = 1 order by c.`name` asc ");
                                        while ($row = $cells->fetch_assoc()) :
                                        ?>
                                            <option value="<?= $row['id'] ?>" <?= isset($cell_id) && $cell_id == $row['id'] ? 'selected' : '' ?>><?= $row['prison'] . " - " . $row['name'] ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="date_transfered" class="control-label">Date transfered</label>
                                    <input type="date" class="form-control form-control-sm rounded-0" name="date_transfered" id="date_transfered" required="required" value="<?= isset($date_transfered) ? $date_transfered : "" ?>">
                                </div>
                            </div>

                        </div>

                    </form>
                </div>
            </div>
            <div class="card-footer py-1 text-center">
                <button class="btn btn-flat btn-sm btn-navy bg-gradient-navy" form="transfer-form"><i class="fa fa-save"></i> Save</button>
                <?php if (!isset($id)) : ?>
                    <a class="btn btn-flat btn-sm btn-light bg-gradient-light border" href="./?page=inmates"><i class="fa fa-angle-left"></i> Cancel</a>
                <?php else : ?>
                    <a class="btn btn-flat btn-sm btn-light bg-gradient-light border" href="./?page=inmates"><i class="fa fa-angle-left"></i> Cancel</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<script>
    let code = document.querySelector("#new_code")
    let option = document.querySelector("#cell_id")

    option.addEventListener("change", generateCode)

    let selection;

    function generateCode(e) {
        selection = e.target.value
        switch (selection) {
            case '1':
                return code.value = "KPB1C1001" + Math.floor(Math.random() * 100000)
            case '2':
                return code.value = "KPB1C1002" + Math.floor(Math.random() * 100000)
            case '3':
                return code.value = "KPB1C1003" + Math.floor(Math.random() * 100000)
            case '4':
                return code.value = "KPB2C1001" + Math.floor(Math.random() * 100000)
            case '5':
                return code.value = "KPB2C1002" + Math.floor(Math.random() * 100000)
            case '6':
                return code.value = "KPB2C1003" + Math.floor(Math.random() * 100000)
            case '7':
                return code.value = "KPB3C1001" + Math.floor(Math.random() * 100000)
            case '8':
                return code.value = "KPB3C1002" + Math.floor(Math.random() * 100000)
            case '9':
                return code.value = "KPB3C1003" + Math.floor(Math.random() * 100000)
            case '10':
                return code.value = "OKP1C1001" + Math.floor(Math.random() * 100000)
            case '11':
                return code.value = "OKP1C1002" + Math.floor(Math.random() * 100000)
            case '12':
                return code.value = "OKP1C1003" + Math.floor(Math.random() * 100000)
            case '13':
                return code.value = "OKP2C1002" + Math.floor(Math.random() * 100000)
            case '14':
                return code.value = "OKP2C1002" + Math.floor(Math.random() * 100000)
            case '15':
                return code.value = "OKP1C1002" + Math.floor(Math.random() * 100000)
            case '16':
                return code.value = "OKP1C1002" + Math.floor(Math.random() * 100000)
            default:
                console.log('failed')
        }
    }
</script>
<script>
    // function displayImg(input, _this) {
    //     if (input.files && input.files[0]) {
    //         var reader = new FileReader();
    //         reader.onload = function(e) {
    //             $('#cimg').attr('src', e.target.result);
    //             $(input).siblings('.custom-file-label').html(input.files[0].name)
    //         }
    //         reader.readAsDataURL(input.files[0]);
    //     } else {
    //         $('#cimg').attr('src', "<?php //echo validate_image(isset($image_path) ? $image_path : '') 
                                        ?>");
    //         $(input).siblings('.custom-file-label').html('Choose file')
    //     }
    // }
    $(document).ready(function() {
        // $('#crime_ids').select2({
        //     placeholder: "Please select inmate crimes here",
        //     width: '100%',
        //     containerCssClass: 'rounded-0 rounded-0 pb-2'
        // })
        // $('#cell_id').select2({
        //     placeholder: "Please select inmate cell block here",
        //     width: '100%',
        //     containerCssClass: 'form-control form-control-sm rounded-0'
        // })
        $('#transfer-form').submit(function(e) {
            e.preventDefault();
            var _this = $(this)
            $('.err-msg').remove();
            var el = $('<div>')
            el.addClass('alert alert-danger rounded-0 err-msg')
            el.hide()
            start_loader();
            $.ajax({
                url: _base_url_ + "classes/Master.php?f=transfer_inmate",
                data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                dataType: 'json',
                error: err => {
                    console.log(err)
                    alert_toast("An error occured", 'error');
                    end_loader();
                },
                success: function(resp) {
                    if (typeof resp == 'object' && resp.status == 'success') {
                        location.replace("./?page=inmates/view_inmate&id=" + resp.iid)
                    } else if (resp.status == 'failed' && !!resp.msg) {
                        el.text(resp.msg)
                        _this.prepend(el)
                        el.show('slow')
                        $("html, body").scrollTop(0);
                    } else {
                        alert_toast("An error occured", 'error');
                    }
                    end_loader()
                }
            })
        })

    })
</script>
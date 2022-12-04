<style>
  #system-cover {
    width: 100%;
    height: 35em;
    object-fit: cover;
    object-position: center center;
  }
</style>
<h1 class="">Welcome, <?php echo $_settings->userdata('firstname') . " " . $_settings->userdata('lastname') ?>!</h1>
<hr>
<?php

if ($_SESSION['userdata']['type'] == 1) :


  $qry = $conn->query("SELECT *,concat(lastname,', ', firstname, coalesce(concat(' ', middlename), '')) as `name` from `inmate_list` order by `name` asc ");

  while ($row = $qry->fetch_assoc()) :

    $releaseDate = date_create($row["date_to"]);
    $currentDate = date_create(date('Y-m-d'));

    $diff = date_diff($releaseDate, $currentDate);

    if (intval($diff->days) <= 7) :
?>
      <div style='padding:0.3rem 0.6rem; color:black; background:orange; margin:0.4rem 0rem;'>
        <p>
          <?php echo '<b>' . $row['name'] . '</b>' . " Code: " . '<b>' . $row['code'] . '</b>' . " should be released on " . $row['date_to']; ?>

        </p>
      </div>
    <?php
    elseif ($releaseDate < $currentDate) :
    ?>
      <div style='padding:0.3rem 0.6rem; color:white; background:crimson; margin:0.4rem 0rem;'>
        <p>
          <?php echo '<b>' . $row['name'] . '</b>' . " Code: " . '<b>' . $row['code'] . '</b>' . " should have been released on " . $row['date_to']; ?>

        </p>
      </div>
<?php
    endif;
  endwhile;
endif;
?>
<div class="row">
  <div class="col-12 col-sm-3 col-md-3">
    <div class="info-box">
      <!-- span class="info-box-icon bg-gradient-light elevation-1"><i class="fas fa-th-list"></i></span> -->
      <div class="info-box-content">
        <span class="info-box-text">Prison List</span>
        <span class="info-box-number text-right h5">
          <?php
          $prison = $conn->query("SELECT * FROM prison_list where delete_flag = 0 and `status` = 1")->num_rows;
          echo format_num($prison);
          ?>
          <?php ?>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-12 col-sm-3 col-md-3">
    <div class="info-box">
      <!-- <span class="info-box-icon bg-gradient-navy elevation-1"><i class="fas fa-border-all"></i></span> -->
      <div class="info-box-content">
        <span class="info-box-text">Cell Block</span>
        <span class="info-box-number text-right h5">
          <?php
          $cells = $conn->query("SELECT id FROM cell_list where delete_flag = 0 and `status` = 1")->num_rows;
          echo format_num($cells);
          ?>
          <?php ?>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-12 col-sm-3 col-md-3">
    <div class="info-box">
      <!-- <span class="info-box-icon bg-gradient-dark elevation-1"><i class="fas fa-list"></i></span> -->
      <div class="info-box-content">
        <span class="info-box-text">Crimes</span>
        <span class="info-box-number text-right h5">
          <?php
          $crimes = $conn->query("SELECT id FROM crime_list where  `status` =1 and delete_flag = 0")->num_rows;
          echo format_num($crimes);
          ?>
          <?php ?>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->


  <!-- /.col -->
  <div class="col-12 col-sm-3 col-md-3">
    <div class="info-box">
      <!-- <span class="info-box-icon bg-gradient-primary elevation-1"><i class="fas fa-user"></i></span> -->
      <div class="info-box-content">
        <span class="info-box-text">Currrent Inmates</span>
        <span class="info-box-number text-right h5">
          <?php
          $inmates = $conn->query("SELECT id FROM inmate_list where `status` =1  and (date(date_to) > '" . date('Y-m-d') . "' or date_to is NULL )")->num_rows;
          echo format_num($inmates);
          ?>
          <?php ?>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-12 col-sm-3 col-md-3">
    <div class="info-box">
      <!-- <span class="info-box-icon bg-gradient-success elevation-1"><i class="fas fa-user"></i></span> -->
      <div class="info-box-content">
        <span class="info-box-text">Released Inmates</span>
        <span class="info-box-number text-right h5">
          <?php
          $inmates = $conn->query("SELECT id FROM inmate_list where date(date_to) <= '" . date('Y-m-d') . "'")->num_rows;
          echo format_num($inmates);
          ?>
          <?php ?>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->


  <!-- /.col -->
</div>
<div class="container-fluid text-center">
  <img src="<?= validate_image($_settings->info('cover')) ?>" alt="system-cover" id="system-cover" class="img-fluid">
</div>
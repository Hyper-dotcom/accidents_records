<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<?php
$isEdit = false;
if ($id == '')
  $pageTitle = "Adaugare accident";
else {
  $pageTitle = "Editare accident";
  $isEdit = true;
}
if ($this->input->post())
  $isEdit = false;
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?php echo $pageTitle ?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Forms</a></div>
        <div class="breadcrumb-item"><?php echo $pageTitle ?></div>
      </div>
    </div>

    <div class="section-body">
      <h2 class="section-title"><?php echo $pageTitle ?></h2>
      <!-- <p class="section-lead">We provide advanced input fields, such as date picker, color picker, and so on.</p> -->

      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4>Date despre accident</h4>
            </div>
            <div class="card-body">
              <?php //echo form_open(); 
              ?>
              <form method="POST">
                <div class="form-group">
                  <label>Data Accidentului</label>
                  <input value="<?php echo date($accident['Data']) ?>" type="date" class="form-control" name="Data" required>
                </div>

                <div class="form-group">
                  <label>Raniti</label>
                  <input name="Raniti" type="number" value="<?php if ($isEdit) echo $accident['Raniti'];
                                                            else echo $this->input->post('Raniti'); ?>" class="form-control">
                </div>

                <div class="form-group">
                  <label>Decedati </label>
                  <input type="number" name="Decedati" class="form-control" value="<?php if ($isEdit) echo $accident['Decedati'];
                                                                                    else echo $this->input->post('Decedati'); ?>">
                </div>

                <div class="form-group">
                  <label>Invalizi </label>
                  <input type="number" name="Invalizi" class="form-control" value="<?php if ($isEdit) echo $accident['Invalizi'];
                                                                                    else echo $this->input->post('Invalizi') ?>">
                </div>

                <div class="form-group">
                  <label>Departament</label>
                  <select class="form-control" name="DepartamentID" required>
                    <?php foreach ($depOptions as $k => $val) {
                    ?>
                      <option <?php if ($accident['DepartamentID'] == $val['DepartamentID']) echo "selected";
                              else echo ""; ?> value="<?php echo $val['DepartamentID'] ?>"> <?php echo $val["NumeDepartament"] ?></option>
                    <?php } ?>
                  </select>
                </div>

                <div class="card-footer text-right">
                  <button class="btn btn-primary mr-1" type="submit">Submit</button>
                  <!-- <button class="btn btn-secondary" type="reset">Reset</button> -->
                </div>
                <?php echo form_close() ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php $this->load->view('dist/_partials/footer'); ?>
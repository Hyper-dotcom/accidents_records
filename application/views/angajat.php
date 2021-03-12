<?php

use function PHPSTORM_META\type;

defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<?php
$isEdit = false;
if ($id == '')
  $pageTitle = "Adaugare angajat";
else {
  $pageTitle = "Editare Angajat";
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
              <h4>Date angajat</h4>
            </div>
            <div class="card-body">
              <?php //echo form_open(); 
              ?>
              <form method="POST">
                <div class="form-group">
                  <label>Nume</label>
                  <input name="Nume" type="text" value="<?php if ($isEdit) echo $angajat['Nume'];
                                                        else echo $this->input->post('Nume'); ?>" class="form-control">
                </div>
                <div class="form-group">
                  <label>Prenume </label>
                  <input type="text" name="Prenume" class="form-control" value="<?php if ($isEdit) echo $angajat['Prenume'];
                                                                                else echo $this->input->post('Prenume'); ?>">
                </div>
                <div class="form-group">
                  <label>CNP </label>
                  <input type="text" name="CNP" class="form-control" value="<?php if ($isEdit) echo $angajat['CNP'];
                                                                            else echo $this->input->post('CNP') ?>" required>
                </div>

                <div class="form-group">
                  <label>Sex</label>
                  <select class="form-control" name="Sex">
                    <option value="M">M</option>
                    <option value="F">F</option>
                    <option>Other</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Departament</label>
                  <select class="form-control" name="DepartamentID">
                    <?php foreach ($depOptions as $k => $val) {
                    ?>
                      <option <?php if ($angajat['DepartamentID'] == $val['DepartamentID']) echo "selected";
                              else echo ""; ?> value="<?php echo $val['DepartamentID'] ?>"> <?php echo $val["NumeDepartament"] ?></option>
                    <?php } ?>
                  </select>
                </div>

                <?php //print_r($depOptions); 
                ?>
                <div class="form-group">
                  <label>Data Angajarii</label>
                  <input value="<?php echo date($angajat['DataAngajarii']) //($angajat['DataAngajarii']); 
                                ?>" type="date" class="form-control" name="DataAngajarii">
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
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?php echo base_url(); ?>home/index">Tudy</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?php echo base_url(); ?>home/index">T</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="<?php echo $this->uri->segment(1) == 'home' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>home/index"><i class="fas fa-home"></i> <span>Home</span></a></li>

           <!-- <li class="dropdown <?php echo $this->uri->segment(2) == '' || $this->uri->segment(2) == 'index' || $this->uri->segment(2) == 'index_0' ? 'active' : ''; ?>">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
              <ul class="dropdown-menu">
                <li class="<?php echo $this->uri->segment(2) == 'index_0' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>dist/index_0">General Dashboard</a></li>
                <li class="<?php echo $this->uri->segment(2) == '' || $this->uri->segment(2) == 'index' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>home/index">Ecommerce Dashboard</a></li>
              </ul>
            </li> -->
            
            <li class="menu-header">Tables</li>
            <li class="<?php echo $this->uri->segment(1) == 'Angajati' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>Angajati"><i class="fas fa-users"></i> <span>Angajati </span></a></li>
            <li class="<?php echo $this->uri->segment(1) == 'Sectoare' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>Sectoare"><i class="fas fa-city"></i> <span>Sectoare </span></a></li>
            <li class="<?php echo $this->uri->segment(1) == 'Departamente' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>Departamente"><i class="fas fa-building"></i> <span>Departamente </span></a></li>
            <li class="<?php echo $this->uri->segment(1) == 'Accidente' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>Accidente"><i class="fas fa-fire"></i> <span>Accidente </span></a></li>
            <li class="<?php echo $this->uri->segment(1) == 'Categorii_Accidente' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>Categorii_Accidente"><i class="far fa-list-alt"></i> <span>Categorii Accidente </span></a></li>

              <li class="<?php echo $this->uri->segment(2) == 'blank' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>dist/blank"><i class="far fa-square"></i> <span>Blank</span></a></li>
            <!--  
            <li class="dropdown <?php echo $this->uri->segment(2) == 'bootstrap_alert' || $this->uri->segment(2) == 'bootstrap_badge' || $this->uri->segment(2) == 'bootstrap_breadcrumb' || $this->uri->segment(2) == 'bootstrap_buttons' || $this->uri->segment(2) == 'bootstrap_card' || $this->uri->segment(2) == 'bootstrap_carousel' || $this->uri->segment(2) == 'bootstrap_collapse' || $this->uri->segment(2) == 'bootstrap_dropdown' || $this->uri->segment(2) == 'bootstrap_form' || $this->uri->segment(2) == 'bootstrap_list_group' || $this->uri->segment(2) == 'bootstrap_media_object' || $this->uri->segment(2) == 'bootstrap_modal' || $this->uri->segment(2) == 'bootstrap_nav' || $this->uri->segment(2) == 'bootstrap_navbar' || $this->uri->segment(2) == 'bootstrap_pagination' || $this->uri->segment(2) == 'bootstrap_popover' || $this->uri->segment(2) == 'bootstrap_progress' || $this->uri->segment(2) == 'bootstrap_table' || $this->uri->segment(2) == 'bootstrap_tooltip' || $this->uri->segment(2) == 'bootstrap_typography' ? 'active' : ''; ?>">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Bootstrap</span></a>
              <ul class="dropdown-menu">
                <li class="<?php echo $this->uri->segment(2) == 'bootstrap_alert' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>dist/bootstrap_alert">Alert</a></li>
                <li class="<?php echo $this->uri->segment(2) == 'bootstrap_badge' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>dist/bootstrap_badge">Badge</a></li>
                <li class="<?php echo $this->uri->segment(2) == 'bootstrap_breadcrumb' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>dist/bootstrap_breadcrumb">Breadcrumb</a></li>
                <li class="<?php echo $this->uri->segment(2) == 'bootstrap_buttons' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>dist/bootstrap_buttons">Buttons</a></li>
                <li class="<?php echo $this->uri->segment(2) == 'bootstrap_card' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>dist/bootstrap_card">Card</a></li>
                <li class="<?php echo $this->uri->segment(2) == 'bootstrap_carousel' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>dist/bootstrap_carousel">Carousel</a></li>
                <li class="<?php echo $this->uri->segment(2) == 'bootstrap_collapse' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>dist/bootstrap_collapse">Collapse</a></li>
                <li class="<?php echo $this->uri->segment(2) == 'bootstrap_dropdown' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>dist/bootstrap_dropdown">Dropdown</a></li>
                <li class="<?php echo $this->uri->segment(2) == 'bootstrap_form' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>dist/bootstrap_form">Form</a></li>
                <li class="<?php echo $this->uri->segment(2) == 'bootstrap_list_group' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>dist/bootstrap_list_group">List Group</a></li>
                <li class="<?php echo $this->uri->segment(2) == 'bootstrap_media_object' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>dist/bootstrap_media_object">Media Object</a></li>
                <li class="<?php echo $this->uri->segment(2) == 'bootstrap_modal' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>dist/bootstrap_modal">Modal</a></li>
                <li class="<?php echo $this->uri->segment(2) == 'bootstrap_nav' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>dist/bootstrap_nav">Nav</a></li>
                <li class="<?php echo $this->uri->segment(2) == 'bootstrap_navbar' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>dist/bootstrap_navbar">Navbar</a></li>
                <li class="<?php echo $this->uri->segment(2) == 'bootstrap_pagination' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>dist/bootstrap_pagination">Pagination</a></li>
                <li class="<?php echo $this->uri->segment(2) == 'bootstrap_popover' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>dist/bootstrap_popover">Popover</a></li>
                <li class="<?php echo $this->uri->segment(2) == 'bootstrap_progress' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>dist/bootstrap_progress">Progress</a></li>
                <li class="<?php echo $this->uri->segment(2) == 'bootstrap_table' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>dist/bootstrap_table">Table</a></li>
                <li class="<?php echo $this->uri->segment(2) == 'bootstrap_tooltip' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>dist/bootstrap_tooltip">Tooltip</a></li>
                <li class="<?php echo $this->uri->segment(2) == 'bootstrap_typography' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>dist/bootstrap_typography">Typography</a></li>
              </ul>
            </li>
           -->
        </aside>
      </div>

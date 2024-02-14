<!-- Add icons to the links using the .nav-icon class
     with font-awesome or any other icon font library -->


  
<?php 


$dashactive = ($controller == 'dealer' && $action == 'dashboard') ? 'active' : ''; ?>
<?php $rfqlistctive = ($controller == 'dealer' && $action == 'rfqList') ? 'active' : ''; ?>



<li class="nav-item menu-open">
  <?= $this->Html->link(__('<i class="fa fa-chart-line nav-icon"></i><p>Dashboard</p>'), ['controller' => 'dealer', 'action' => 'dashboard'], ['class' => "nav-link $dashactive", 'escape' => false]) ?>
</li>
<li class="nav-item menu-open">
  <?= $this->Html->link(__('<i class="fa fa-clipboard-list nav-icon"></i><p>RFQ List</p>'), ['controller' => 'dealer', 'action' => 'rfq-list'], ['class' => "nav-link $rfqlistctive", 'escape' => false]) ?>
</li>

<li class="nav-item menu-open">
  <?= $this->Html->link(__('<i class="fa fa-shopping-cart nav-icon"></i><p>Want to Buy</p>'), ['controller' => 'dealer', 'action' => 'addproduct', 'buyer'], ['class' => "nav-link $dashactive", 'escape' => false]) ?>
</li>

<li class="nav-item menu-open">
  <?= $this->Html->link(__('<i class="nav-icon fas fa-user-alt"></i><p>Search Supplier</p>'), ['controller' => 'dealer', 'action' => 'search', 'buyer'], ['class' => "nav-link $dashactive", 'escape' => false]) ?>
</li>

<li class="nav-item menu-open">
  <?= $this->Html->link(__('<i class="fas fa-truck nav-icon"></i><p>Regional Supplier</p>'), ['controller' => 'dealer', 'action' => 'regionalsearch', 'buyer'], ['class' => "nav-link $dashactive", 'escape' => false]) ?>
</li>

<!-- 
<li class="nav-item <?= $temvenmenuopen ?>">
  <a href="#" class="nav-link  <?= $temvenactive ?>">
    <i class="nav-icon fas fa-user-alt"></i>
    <p>
      Vendor Management
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview" style="display: none;">
    <li class="nav-item ">
      <a href="/bsms/buyer/vendor-temps" class="nav-link ">
        <i class="fa fa-bars nav-icon"></i>
        <p>Vendor List</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link ">
        <i class="nav-icon fas fa-user-alt"></i>
        <p>
          Vendor Creation
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview" style="display: none;">
        <li class="nav-item"><a href="<?= $this->Url->build('/') ?>buyervendor-temps/add" class="nav-link <?= $createvendactive ?>"><i
          class="fa fa-bars nav-icon"></i>
        <p>New Vendor</p>
      </a></li>
        <li class="nav-item"><a href="<?= $this->Url->build('/') ?>buyervendor-temps/sap-add" class="nav-link <?= $creatsaevendactive ?>"><i
          class="fa fa-bars nav-icon"></i>
        <p>SAP Vendor</p>
      </a></li>
      </ul>
    </li>
  </ul>
</li> -->







<li class="nav-item menu-open">
  <?= $this->Html->link(__('<i class="fas fa-power-off nav-icon"></i><p>Logout</p>'), ['prefix' => false, 'controller' => 'dealer', 'action' => 'logout'], ['class' => 'nav-link', 'escape' => false]) ?>
</li>
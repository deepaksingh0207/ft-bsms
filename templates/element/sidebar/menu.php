<!-- Add icons to the links using the .nav-icon class
     with font-awesome or any other icon font library -->
     <li class="nav-item menu-open">
  <?= $this->Html->link(__('<i class="far fa-tachometer-alt nav-icon"></i><p>Dashboard</p>'), ['controller' => 'dashboard', 'action' => 'index'], ['class' => 'nav-link', 'escape' => false]) ?>
</li>

<li class="nav-item has-treeview">
  <a href="#" class="nav-link active">
    <i class="nav-icon fas fa-user-alt"></i>
    <p>
      User Management
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item"><?= $this->Html->link(__('<i class="far fa-circle nav-icon"></i><p>SAP Users</p>'), ['controller' => 'admin-users', 'action' => 'index', 'sap'], ['class' => 'nav-link', 'escape' => false]) ?></li>
    <li class="nav-item"><?= $this->Html->link(__('<i class="far fa-circle nav-icon"></i><p>Portal Users</p>'), ['controller' => 'admin-users', 'action' => 'index', 'portal'], ['class' => 'nav-link', 'escape' => false]) ?></li>
    <li class="nav-item"><?= $this->Html->link(__('<i class="far fa-circle nav-icon"></i><p>Role</p>'), '#', ['class' => 'nav-link', 'escape' => false]) ?></li>
    <li class="nav-item"><?= $this->Html->link(__('<i class="far fa-circle nav-icon"></i><p>Profile</p>'), '#', ['class' => 'nav-link', 'escape' => false]) ?></li>
  </ul>
</li>

<li class="nav-item menu-open">
  <?= $this->Html->link(__('<i class="far fa-cog nav-icon"></i><p>Settings</p>'), ['controller' => 'settings', 'action' => 'update'], ['class' => 'nav-link', 'escape' => false]) ?>
</li>

<li class="nav-item menu-open">
  <?= $this->Html->link(__('<i class="far fa-sign-out nav-icon"></i><p>Logout</p>'), ['prefix' => false, 'controller' => 'users', 'action' => 'logout'], ['class' => 'nav-link', 'escape' => false]) ?>
</li>

<!-- 
<li class="nav-item has-treeview menu-open">
  <a href="#" class="nav-link active">
    <i class="nav-icon fas fa-tachometer-alt"></i>
    <p>
      Master
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item"><?= $this->Html->link(__('<i class="far fa-circle nav-icon"></i><p>Dashboard<i class="right fas fa-angle-left"></i></p>'), ['controller' => 'dashboard', 'action' => 'index'], ['class' => 'nav-link', 'escape' => false]) ?></li>
    <li class="nav-item"><?= $this->Html->link(__('<i class="far fa-circle nav-icon"></i><p>Users<i class="right fas fa-angle-left"></i></p>'), ['controller' => 'admin-users', 'action' => 'index'], ['class' => 'nav-link', 'escape' => false]) ?></li>
    <li class="nav-item"><?= $this->Html->link(__('<i class="far fa-circle nav-icon"></i><p>Vendor<i class="right fas fa-angle-left"></i></p>'), ['controller' => 'buyer-seller-users', 'action' => 'index'], ['class' => 'nav-link', 'escape' => false]) ?></li>
    <li class="nav-item"><?= $this->Html->link(__('<i class="far fa-circle nav-icon"></i><p>Vendor<i class="right fas fa-angle-left"></i></p>'), ['controller' => 'vendor-temps', 'action' => 'index'], ['class' => 'nav-link', 'escape' => false]) ?></li>
    <li class="nav-item"><?= $this->Html->link(__('<i class="far fa-circle nav-icon"></i><p>Product<i class="right fas fa-angle-left"></i></p>'), ['controller' => 'products', 'action' => 'index'], ['class' => 'nav-link', 'escape' => false]) ?></li> 
    <li class="nav-item"><?= $this->Html->link(__('<i class="far fa-circle nav-icon"></i><p>RFQs<i class="right fas fa-angle-left"></i></p>'), ['controller' => 'rfq-details', 'action' => 'index'], ['class' => 'nav-link', 'escape' => false]) ?></li> 
    <li class="nav-item"><?= $this->Html->link(__('<i class="far fa-circle nav-icon"></i><p>New Vendor<i class="right fas fa-angle-left"></i></p>'), ['controller' => 'vendor-temps', 'action' => 'add'], ['class' => 'nav-link', 'escape' => false]) ?></li> 
    <li class="nav-item"><?= $this->Html->link(__('<i class="far fa-circle nav-icon"></i><p>Logout<i class="right fas fa-angle-left"></i></p>'), ['prefix' => false, 'controller' => 'users', 'action' => 'logout'], ['class' => 'nav-link', 'escape' => false]) ?></li>
  </ul>
</li> -->


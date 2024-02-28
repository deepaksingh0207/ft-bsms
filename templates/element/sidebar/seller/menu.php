<!-- Add icons to the links using the .nav-icon class
     with font-awesome or any other icon font library -->

<?php 
$dashactive = '';

?>

<li class="nav-item menu-open">
  <?= $this->Html->link(__('<i class="fa fa-chart-line nav-icon"></i><p>Dashboard</p>'), ['controller' => 'dealer', 'action' => 'seller-dashboard'], ['class' => "nav-link $dashactive", 'escape' => false]) ?>
</li>
<li class="nav-item menu-open">
  <?= $this->Html->link(__('<i class="fa fa-clipboard-list nav-icon"></i><p>RFQ List</p>'), ['controller' => 'dealer', 'action' => 'productlist'], ['class' => "nav-link $dashactive", 'escape' => false]) ?>
</li>
<li class="nav-item menu-open">
    <?= $this->Html->link(__('<i class="fa fa-user nav-icon"></i><p>Profile</p>'), ['controller' => 'Profiles', 'action' => 'profile'], ['class' => "nav-link $dashactive", 'escape' => false]) ?>
</li>

<li class="nav-item menu-open">
  <?= $this->Html->link(__('<i class="fas fa-power-off nav-icon"></i><p>Logout</p>'), ['prefix' => false, 'controller' => 'dealer', 'action' => 'logout'], ['class' => 'nav-link', 'escape' => false]) ?>
</li>
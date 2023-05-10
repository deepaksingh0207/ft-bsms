<?php
use Cake\I18n\Time;

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';

$time = date('his');
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        F.T. Soloutions Pvt. Ltd.
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.css">
    <link rel="manifest" href="/ftspl_hr/manifest.json?<?= $time?>" crossorigin="anonymous">
    
    <?= $this->Html->css('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css')?>
    <?= $this->Html->css('milligram.min.css?'.$time) ?>
    <?= $this->Html->css('cake.css?'.$time) ?>
           
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
        
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <?php if($logged_in) :?>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
             <?php endif; ?>
            <a class="navbar-brand" href="javascript:void(0);">SMS - Admin</a>
        </div>
        <?php if($logged_in) :?>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
            <li><?= $this->Html->link(__('Dashboard'), ['controller' => 'dashboard', 'action' => 'index'], ['class' => 'top-nav-item']) ?></li> 
            <li><?= $this->Html->link(__('Users'), ['controller' => 'adminusers', 'action' => 'index'], ['class' => 'top-nav-item']) ?></li> 
            <li><?= $this->Html->link(__('Vendor'), ['controller' => 'buyersellerusers', 'action' => 'index'], ['class' => 'top-nav-item']) ?></li> 
            <li><?= $this->Html->link(__('Product'), ['controller' => 'products', 'action' => 'index'], ['class' => 'top-nav-item']) ?></li> 
            <li><?= $this->Html->link(__('RFQs'), ['controller' => 'rfqdetails', 'action' => 'index'], ['class' => 'top-nav-item']) ?></li> 
            <li><?= $this->Html->link(__('New Vendor'), ['controller' => 'vendortemps', 'action' => 'add'], ['class' => 'top-nav-item']) ?></li> 

            
            <li><?= $this->Html->link('Logout', ['controller' => 'adminusers', 'action' => 'logout']) ?> </li>
             
            </ul>
        </div>
         <?php endif; ?>
    </div>
    
</nav>

    <!--  <nav class="top-nav">
		<h3><?= $this->Html->link(__('F. T. Solutions'), ['controller' => 'Admin', 'action' => 'index'], ['class' => 'top-nav-item']) ?></h3>
		<?php if($logged_in) :?>
            <ul>
            <li><?= $this->Html->link(__('Home'), ['controller' => 'Admin', 'action' => 'index'], ['class' => 'top-nav-item']) ?> </li>
            <?= $this->Html->link(__('Employee'), ['controller' => 'employees', 'action' => 'index'], ['class' => 'top-nav-item']) ?> &nbsp;| &nbsp; 
            <?= $this->Html->link(__('Attandance'), ['controller' => 'employee-attandances', 'action' => 'index'], ['class' => 'top-nav-item']) ?> &nbsp;|&nbsp; 
            <?= $this->Html->link(__('Leave'), ['controller' => 'leaves', 'action' => 'index'], ['class' => 'top-nav-item']) ?> &nbsp;|&nbsp; 
            <?= $this->Html->link(__('salary Slip'), ['controller' => 'employee-monthy-summary', 'action' => 'index'], ['class' => 'top-nav-item']) ?>
            
            <br />
            <?= $this->Html->link(__('Department'), ['controller' => 'departments', 'action' => 'index'], ['class' => 'top-nav-item']) ?> &nbsp;|&nbsp;
            <?= $this->Html->link(__('Module'), ['controller' => 'modules', 'action' => 'index'], ['class' => 'top-nav-item']) ?> &nbsp;|&nbsp;
            <?= $this->Html->link(__('Designation'), ['controller' => 'designations', 'action' => 'index'], ['class' => 'top-nav-item']) ?> &nbsp;|&nbsp;
            <?= $this->Html->link(__('Holiday List'), ['controller' => 'holidays', 'action' => 'index'], ['class' => 'top-nav-item']) ?>
             
            </ul>
        <?php endif; ?>
            
        
        <?php if($logged_in) :?>
        	<div style="float:right;margin-right:10px;">
        		<?php echo $this->Html->link('Logout', ['controller' => 'admin', 'action' => 'logout']) ?>
        	</div>
        	<?php endif; ?>
    </nav>
        -->
    <main class="main">
        <div id="content" class="container" style="margin-top:80px;">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>
</body>

<?= $this->Html->script('app.js?'.$time) ?>
<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
<?= $this->Html->script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js') ?>

</html>

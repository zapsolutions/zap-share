<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->fetch('meta');
		echo $this->Html->css('//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css');
		echo $this->Html->css('custom');
		echo $this->fetch('css');
		echo $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js');
		echo $this->Html->script('//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js');
		echo $this->fetch('script');
	?>
</head>
<body>
	<?php echo $this->element('navbar'); ?>
	<div id="container">
		<div id="content">
			<?php echo $this->Session->flash(); ?>
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<?php echo $this->element('sidebar'); ?>
					</div>
					<div class="col-md-9">
						<?php echo $this->fetch('content'); ?>
					</div>
				</div>
			</div>
		</div>
		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', ['alt' => $cakeDescription, 'border' => '0']),
					'http://www.cakephp.org/',
					['target' => '_blank', 'escape' => false]
				);
			?>
		</div>
	</div>
</body>
</html>

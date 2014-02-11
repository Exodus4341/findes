<div class="container1">

	<div id="content1" style="z-index:300">
	<section>

<?php echo Form::open(array()); ?>

	<?php if (isset($_GET['destination'])): ?>
		<?php echo Form::hidden('destination',$_GET['destination']); ?>
	<?php endif; ?>

	

	<?php echo Html::anchor('public',Html::img('assets/img/fulllogo.png', array('class' => 'fulllogo'))) ?>
	<?php echo Html::img('assets/img/strip.png', array('class' => 'strip')) ?>



	<div style="margin-top:-50px">
		<?php if (isset($login_error)): ?>
			<div class="error"><?php echo $login_error; ?></div>
		<?php endif; ?>
	
		<div class="input"><?php echo Form::input('email', Input::post('email'), array('id' => 'username', 'placeholder' => 'Username or Email', )); ?></div>
		
		<?php if ($val->error('email')): ?>
			<div class="error"><?php echo $val->error('email')->get_message('You must provide a username or email'); ?></div>
		<?php endif; ?>
	</div>

	<div>
		<div class="input"><?php echo Form::password('password','',array('id' => 'password', 'placeholder' => 'Password', )); ?></div>
		
		<?php if ($val->error('password')): ?>
			<div class="error"><?php echo $val->error('password')->get_message(':label cannot be blank'); ?></div>
		<?php endif; ?>
	</div>

	<div class="actions" style="float:left;">
		<?php echo Form::submit(array('value'=>'Login', 'name'=>'submit')); ?>
		
	</div>
	<div style="float:right"> 
		<?php echo Html::anchor('public/register', '<i class="icon-lock" title="Register"></i> Register', array('data-toggle' => 'modal','data-target'=>'#myModal', 'class' => 'register')); ?>
	</div>


	

<?php echo Form::close(); ?>
	
	</section>
	</div>
</div>

<div id="two" style="float:right; margin-right:64px; margin-top:-250px;">
            <ol>
                <li>
                    <h2><div><?php echo Html::img('assets/img/tail.png',array('class' => 'tail')); ?></div></h2>
                    <div>
                        <h3><?php echo Html::anchor('auth/session/facebook', Asset::img('fb_body.png')); ?></h3>
                        
                    </div>
                </li>
                <li>
                    <h2><?php echo Html::img('assets/img/fb_head.png', array('class' => '')) ?></h2>
                    <div>
                        
                    </div>
                </li>
               
            </ol>
            
</div>

<div id="two1" style="float:right; margin-right:64px; margin-top:-200px;">
            <ol>
                <li>
                    <h2><div><?php echo Html::img('assets/img/tail.png',array('class' => 'tail')); ?></div></h2>
                    <div>
                        <h3><?php echo Html::anchor('auth/session/twitter', Asset::img('twitter_body.png')); ?></h3>
                        
                    </div>
                </li>
                <li>
                    <h2><?php echo Html::img('assets/img/twitter_head.png', array('class' => '')) ?></h2>
                    <div>
                        
                    </div>
                </li>
               
            </ol>
            
</div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Register</h4>
      </div>
      <div class="modal-body">

      <?php echo Form::open(array('method' => 'post', 'action' => 'public/register')); ?>

			<fieldset>
				<div class="clearfix">
					<?php echo Form::label('Username', 'username'); ?>

					<div class="input">
						<?php echo Form::input('username', '', array('class' => 'span4')); ?>

					</div>
				</div>
				<div class="clearfix">
					<?php echo Form::label('Password', 'password'); ?>

					<div class="input">
						<?php echo Form::input('password', '', array('class' => 'span4','type'=>'password')); ?>

					</div>
				</div>
				<div class="clearfix">
					

					<div class="input">
						<?php echo Form::input('group', Input::post('group', isset($user) ? $user->group : ''), array('class' => 'span4','type'=>'hidden')); ?>

					</div>
				</div>
				<div class="clearfix">
					<?php echo Form::label('Email', 'email'); ?>

					<div class="input">
						<?php echo Form::input('email', Input::post('email', isset($user) ? $user->email : ''), array('class' => 'span4')); ?>

					</div>
				</div>
				<div class="clearfix">
					

					<div class="input">
						<?php echo Form::input('profile_fields', Input::post('profile_fields', isset($user) ? $user->profile_fields : ''), array('class' => 'span8', 'rows' => 8, 'type' => 'hidden')); ?>

					</div>
				</div>
				
				
				<div class="clearfix">
					

					<div class="input">
						<?php echo Form::input('last_login', Input::post('last_login', isset($user) ? $user->last_login : ''), array('class' => 'span4', 'type' => 'hidden')); ?>

					</div>
				</div>
				<div class="clearfix">
					

					<div class="input">
						<?php echo Form::input('login_hash', Input::post('login_hash', isset($user) ? $user->login_hash : ''), array('class' => 'span4', 'type' => 'hidden')); ?>

					</div>
				</div>
			</fieldset>
      </div>
        
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <?php echo Form::submit('submit', 'Register', array('class' => 'btn btn-primary')); ?>
      </div>
    </div><!-- /.modal-content -->
    <?php echo Form::close(); ?>
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


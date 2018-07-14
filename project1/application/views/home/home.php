<div class="row form">
	<div class="span6">
		<form id="login_form" class="horizontal" method="post" action="<?=site_url('user/login');?>">
			<div class="control-groups">
				<label class="control-label">Login</label>
				<div class="controls">
					<input type="text" name="login" class="input-xlarge">
				</div>
			</div>
			<div class="control-groups">
				<label class="control-label">Login</label>
				<div class="controls">
					<input type="password" name="password" class="input-xlarge">
				</div>
			</div>
			<div class="control-groups">
				<div class="controls">
					<input type="submit" value="Login" name="submit" class="btn btn-primary">
				</div>
			</div>
		</form>
		<a href="<?=site_url('home/register');?>">Register</a>
	</div>
</div>

<script type="text/javascript">
	$(function() {
		$("#login_form").submit(function(evt){
			evt.preventDefault();
			var url = $(this).attr('action');
			var postData = $(this).serialize();
			$.post(url,postData, function(o){
				if(o.result == 1){
					window.location.href = '<?=site_url('dashboard')?>';
					alert('good login');
				}else{
					alert('Bad login');
				}
			},'json')
		});
	});
</script>
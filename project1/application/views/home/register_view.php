<div class="row form">
	<div class="span6">
		<div class="alert alert-error" id="register_form_error"></div>
		<form id="register_form" class="horizontal" method="post" action="<?=site_url('user/register');?>">
			<div class="control-groups">
				<label class="control-label">Login</label>
				<div class="controls">
					<input type="text" name="login" class="input-xlarge">
				</div>
			</div>
			<div class="control-groups">
				<label class="control-label">Email</label>
				<div class="controls">
					<input type="text" name="email" class="input-xlarge">
				</div>
			</div>
			<div class="control-groups">
				<label class="control-label">Password</label>
				<div class="controls">
					<input type="password" name="password" class="input-xlarge">
				</div>
			</div>
			<div class="control-groups">
				<label class="control-label">Confirm</label>
				<div class="controls">
					<input type="password" name="confirm" class="input-xlarge">
				</div>
			</div>
			<div class="control-groups">
				<div class="controls"><br>
					<input type="submit" value="Register" class="btn btn-primary">
				</div>
			</div>
		</form>
		<a href="<?=site_url('/');?>">Back</a>
	</div>
</div>

<script type="text/javascript">
	$(function() {

		$("#register_form_error").hide();
		$("#register_form").submit(function(evt){
			evt.preventDefault();
			var url = $(this).attr('action');
			var postData = $(this).serialize();
			$.post(url,postData, function(o){
				if(o.result == 1){
					window.location.href = '<?=site_url('dashboard')?>';
					alert('good login');
				}else{
					$('#register_form_error').show();
					var output = '<ul>';
					for(var key in o.error){
						var value = o.error[key];
						output += '<li> '+value+' </li>';
					}
					output += '</ul>';
					$('#register_form_error').html(output);
				}
			},'json');
		});
	});
</script>
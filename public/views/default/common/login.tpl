<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<title>admin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="Moath Odat">
  
</head>

<body>

					<form class="form-horizontal" method=post onsubmit="return false ;">
						<fieldset>
							<div class="input-prepend" title="Username" data-rel="tooltip">
								<span class="add-on"><i class="icon-user"></i></span>
								<input autofocus class="input-large span10" name="username" id="name" type="text" value="{if isset($username)}{$username}{/if}"  />
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend" title="Password" data-rel="tooltip">
								<span class="add-on"><i class="icon-lock"></i></span><input class="input-large span10" name="password" id="pass" type="password"  />
							</div>
							<div class="clearfix"></div>

							 
							<div class="clearfix"></div>

							<p class="center span5">
							<button type="submit" class="btn btn-primary" onclick="return ajaxValidation();">Login</button>
							</p>
						</fieldset>
					</form>
	 
		
</body>
</html>
 	
	
	
	
		
	
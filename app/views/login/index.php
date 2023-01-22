<?php
include __DIR__ . '/../header.php';
//$Username = $_SESSION['Username'];
echo "<h1>LoginPage</h1>";
include __DIR__ . '/../footer.php';
?>
  <!-- <form action="/login/login" method="post">
     	<h2>LOGIN</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>User Name</label>
     	<input type="text" name="Username" placeholder="User Name"><br>	
     	<label>Password</label>
     	<input type="password" name="Password" placeholder="Password"><br>

     	<button name="login" type="submit">Login</button>
     </form> -->

	<form action="/login/login" method="post">
		<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
		<div class="mb-3">
			<label for="Username" class="form-label">GebruikersNaam</label>
			<input type="text" class="form-control" name="Username" aria-describedby="emailHelp">
			<div id="emailHelp" class="form-text">Uw gegevens zullen nooit gedeeld worden met Derden.</div>
		</div>
			<div class="mb-3">
				<label for="Password" class="form-label">Wachtwoord</label>
				<input type="password" class="form-control" name="Password">
			</div>
			<!-- <div class="mb-3 form-check">
				<input type="checkbox" class="form-check-input" id="exampleCheck1">
				<label class="form-check-label" for="exampleCheck1">Check me out</label>
			</div> -->
		<button name="login" type="submit" class="btn btn-primary">Login</button>
	</form>
</body>
</html>

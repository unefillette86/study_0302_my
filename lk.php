<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
		integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">
	<title>Личный кабинет</title>
	<style>
		body{
		background-color: #FFF6F6;
		font-size: 1.2rem;
		}
		span {
			margin-left: 0.5rem;
		}
		p>span:nth-child(1) {
			font-weight: bold;
			color: #E7426A;
		}
	</style>
</head>

<body>
<h1 class="text-center">Личный кабинет пользователя</h1>
<div class="container mt-5">
<div class="row">
	<div class="col-8 mx-auto">
		<p>
			<span>Id:</span>
			<span><?= $_SESSION["id"]; ?></span>
		</p>
		<p>
			<span>Имя:</span>
			<span><?php echo $_SESSION["name"]; ?></span>
			<span class="edit-btn btn btn-danger">Изменить</span>
			<span class="save-btn btn btn-success" hidden> Сохранить</span>
			<span class="cancel-btn btn btn-info" hidden>Отменить</span>
		</p>
		<p>
			<span>Фамилия:</span>
			<span><?php echo $_SESSION["surname"]; ?></span>
			<span class="edit-btn btn btn-danger">Изменить</span>
			<span class="save-btn btn btn-success" hidden> Сохранить</span>
			<span class="cancel-btn btn btn-info" hidden>Отменить</span>
		</p>
		<p>
			<span>Email:</span>
			<span><?php echo $_SESSION["email"]; ?></span>
		</p>
	</div>
</div>
</div>
<script>
	let edit_buttons = document.querySelectorAll(".edit-btn");
	let save_buttons = document.querySelectorAll(".save-btn");
	let cancel_buttons = document.querySelectorAll(".cancel-btn");

	for (let i = 0; i < edit_buttons.length; i++) {
		edit_buttons[i].addEventListener("click", () => {
let input = edit_buttons[i].previousElementSibling;
let inputValue = input.innerText;
input.innerHTML = `<input type="text" value="${inputValue}">`;
save_buttons[i].hidden = false;
cancel_buttons[i].hidden = false;
edit_buttons[i].hidden = true;
		});

		save_buttons[i].addEventListener("click", () => {
let input = save_buttons[i].parentElement.querySelector("input");
let inputValue = input.value;
input.parentElement.innerHTML = inputValue;
save_buttons[i].hidden = true;
cancel_buttons[i].hidden = true;
edit_buttons[i].hidden = false;
		});

		cancel_buttons[i].addEventListener("click", () => {
let input = cancel_buttons[i].parentElement.querySelector("input");
let inputValue = input.value;
input.parentElement.innerHTML = input.value;
save_buttons[i].hidden = true;
cancel_buttons[i].hidden = true;
edit_buttons[i].hidden = false;
		});
	}
</script>
</body>

</html>
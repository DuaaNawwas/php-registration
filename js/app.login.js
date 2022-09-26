const emailLogin = document.getElementById("emailLogin");
const passwordLogin = document.getElementById("password-login");
const loginForm = document.getElementById("loginForm");

// function to check if field empty
const isRequired = (value) => (value === "" ? false : true);

// function to show error
const showError = (input, message) => {
	// get the form-field element
	const formField = input.parentElement;
	// add the error class
	formField.classList.remove("success");
	formField.classList.toggle("error");

	// show the error message
	const error = formField.querySelector("small");
	error.textContent = message;
};

// function to show success
const showSuccess = (input) => {
	// get the form-field element
	const formField = input.parentElement;

	// remove the error class
	formField.classList.remove("error");
	formField.classList.toggle("success");

	// hide the error message
	const error = formField.querySelector("small");
	error.textContent = "";
};

// function to validate email
const checkEmail = () => {
	let valid = false;
	const emailTrimmed = emailLogin.value.trim();
	if (!isRequired(emailTrimmed)) {
		showError(emailLogin, "Email cannot be blank.");
	} else {
		showSuccess(emailLogin);
		valid = true;
	}
	return valid;
};

// function to validate password
const checkPassword = () => {
	let valid = false;

	const passwordTrimmed = passwordLogin.value.trim();

	if (!isRequired(passwordTrimmed)) {
		showError(passwordLogin, "Password cannot be blank.");
	} else {
		showSuccess(passwordLogin);
		valid = true;
	}

	return valid;
};

loginForm.addEventListener("submit", function (e) {
	// prevent the form from submitting
	e.preventDefault();

	// validate forms
	let isEmailValid = checkEmail(),
		isPasswordValid = checkPassword();

	let isFormValid = isEmailValid && isPasswordValid;

	// submit to the server if the form is valid
	if (isFormValid) {
		const emailLoginValue = emailLogin.value;
		const passwordLoginValue = passwordLogin.value;

		// console.log(fullNameTrimmed);
		fetch("http://localhost/php-registration/includes/login.inc.php", {
			method: "POST",
			headers: {
				"Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
			},
			body: `emailLoginValue=${emailLoginValue}&passwordLoginValue=${passwordLoginValue}`,
		})
			.then((response) => response.text())
			.then((res) => (location.href = res));
	}
});

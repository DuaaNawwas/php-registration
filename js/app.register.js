const fname = document.getElementById("fname-registration");
const sname = document.getElementById("sname-registration");
const tname = document.getElementById("tname-registration");
const lname = document.getElementById("lname-registration");
// const image = document.getElementById("image-registration");
const email = document.getElementById("email-registration");
const phone = document.getElementById("phone-registration");
const dob = document.getElementById("dob-registration");
const password = document.getElementById("password-registration");
const passwordConfirm = document.getElementById(
	"password-confirm-registration"
);

const form = document.getElementById("registrationForm");

// verification functions

// function to check if field empty
const isRequired = (value) => (value === "" ? false : true);

// function to verify email
const isEmailValid = (email) => {
	const re =
		/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return re.test(email);
};
// function to verify password
const isPasswordSecure = (password) => {
	const re = new RegExp(
		"^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*])(?=.{8,})"
	);

	return re.test(password);
};
// function to check if age is above 16
const isOfAge = (dob) => {
	let currentDate = new Date();
	let currentYear = currentDate.getFullYear();
	let dobDate = new Date(dob);
	let bdYear = dobDate.getFullYear();

	let age = currentYear - bdYear;

	return age > 16;
};

// function to verify if name is text
const isText = (inputName) => {
	const re = new RegExp("^[A-Za-z]*");
	return re.test(inputName);
};
// function to verify phone number
const isNum = (inputName) => {
	const re = new RegExp("\\d{14}");
	return re.test(inputName);
};

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

// function to check if name is text
const checkName = (nameInput) => {
	let valid = false;
	const username = nameInput.value.trim();

	if (!isRequired(username)) {
		showError(nameInput, "Name cannot be blank.");
	} else if (!isText(username)) {
		showError(nameInput, `Name must be only text.`);
	} else {
		showSuccess(nameInput);
		valid = true;
	}
	return valid;
};
// function to validate phone
const checkPhone = () => {
	let valid = false;
	const phoneTrimmed = phone.value.trim();
	if (!isRequired(phoneTrimmed)) {
		showError(phone, "Phone cannot be blank.");
	} else if (!isNum(phoneTrimmed)) {
		showError(phone, "Phone must be only numbers and 14 digits.");
	} else {
		showSuccess(phone);
		valid = true;
	}
	return valid;
};

// function to check date
const checkDob = () => {
	let valid = false;
	const dobVal = dob.value;
	if (!isRequired(dobVal)) {
		showError(dob, "Date of birth cannot be blank.");
	} else if (!isOfAge(dobVal)) {
		showError(dob, "You should be over the age of 16.");
	} else {
		showSuccess(dob);
		valid = true;
	}
	return valid;
};

// function to validate email
const checkEmail = () => {
	let valid = false;
	const emailTrimmed = email.value.trim();
	if (!isRequired(emailTrimmed)) {
		showError(email, "Email cannot be blank.");
	} else if (!isEmailValid(emailTrimmed)) {
		showError(email, "Email is not valid.");
	} else {
		showSuccess(email);
		valid = true;
	}
	return valid;
};

// function to validate password
const checkPassword = () => {
	let valid = false;

	const passwordTrimmed = password.value.trim();

	if (!isRequired(passwordTrimmed)) {
		showError(password, "Password cannot be blank.");
	} else if (!isPasswordSecure(passwordTrimmed)) {
		showError(
			password,
			"Password must has at least 8 characters that include at least 1 lowercase character, 1 uppercase characters, 1 number, and 1 special character in (!@#$%^&*)"
		);
	} else {
		showSuccess(password);
		valid = true;
	}

	return valid;
};

// function to confirm password
const checkConfirmPassword = () => {
	let valid = false;
	// check confirm password
	const confirmPassword = passwordConfirm.value.trim();
	const passwordTrimmed = password.value.trim();

	if (!isRequired(confirmPassword)) {
		showError(passwordConfirm, "Please enter the password again");
	} else if (passwordTrimmed !== confirmPassword) {
		showError(passwordConfirm, "Confirm password does not match");
	} else {
		showSuccess(passwordConfirm);
		valid = true;
	}

	return valid;
};

// image.addEventListener("change", () => {
// 	upload_image(image.files[0]);
// });

// const upload_image = (file) => {
// 	// check file type

// 	if (!["image/jpeg", "image/png"].includes(file.type)) {
// 		showError(image, "Only .jpg and .png image are allowed");

// 		document.getElementsById("image").value = "";

// 		return;
// 	}

// 	// check file size (< 2MB)
// 	if (file.size > 2 * 1024 * 1024) {
// 		showError(image, "File must be less than 2 MB");

// 		document.getElementsById("image").value = "";
// 		return;
// 	}

// 	const form_data = new FormData();

// 	form_data.append("image", file);
// };

form.addEventListener("submit", function (e) {
	// prevent the form from submitting
	e.preventDefault();

	// validate forms
	let isFirstnameValid = checkName(fname),
		isSecondnameValid = checkName(sname),
		isThirdnameValid = checkName(tname),
		isLastnameValid = checkName(lname),
		ischeckPhone = checkPhone(),
		ischeckDob = checkDob(),
		isEmailValid = checkEmail(),
		isPasswordValid = checkPassword(),
		isConfirmPasswordValid = checkConfirmPassword();

	let isFormValid =
		isFirstnameValid &&
		isSecondnameValid &&
		isThirdnameValid &&
		isLastnameValid &&
		ischeckPhone &&
		ischeckDob &&
		isEmailValid &&
		isPasswordValid &&
		isConfirmPasswordValid;

	// submit to the server if the form is valid
	if (isFormValid) {
		const fnameValue = fname.value;
		const snameValue = sname.value;
		const tnameValue = tname.value;
		const lnameValue = lname.value;
		const fullName =
			fnameValue + " " + snameValue + " " + tnameValue + " " + lnameValue;
		// const fullNameTrimmed = fullName.trim();
		const emailValue = email.value;
		const phoneValue = phone.value;
		const dobValue = dob.value;
		const passwordValue = password.value;

		// console.log(fullNameTrimmed);
		fetch("http://localhost/php-registration/includes/register.inc.php", {
			method: "POST",
			headers: {
				"Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
			},
			body: `fullName=${fullName}&emailValue=${emailValue}&phoneValue=${phoneValue}&dobValue=${dobValue}&passwordValue=${passwordValue}`,
		})
			.then((response) => response.text())
			.then((res) => {
				if (res == "welcome.php") {
					location.href = res;
				} else {
					alert(res);
				}
			});
	}
});

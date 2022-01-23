document.forms['auth-form'].addEventListener('submit', submitHandler);

function submitHandler(e) {

    let form = e.target,
        nameInput,
        nameValue,
        passwordInput,
        passwordValue, validationResult;

    nameInput = form.querySelector('[name=name]');
    nameValue = nameInput.value;
    passwordInput = form.querySelector('[name=password]');
    passwordValue = passwordInput.value;

    validationResult = validateData(nameValue, passwordValue);
    e.preventDefault();

    if (!validationResult.success) {
        cleanUpErrors(form);
        showErrors(form, validationResult.errors);
        return false;
    } else {
        cleanUpErrors(form);

        let xhr = new XMLHttpRequest(),
            answer,
            formValue = JSON.stringify({
                name: nameInput.value,
                password: passwordInput.value
            })

        xhr.open("POST", "./php/ajax/auth.php")
        xhr.setRequestHeader('Content-type', 'application/json; charset=utf-8');
        xhr.send(formValue);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {

                let containerResponse = document.getElementById('auth-response');

                answer = JSON.parse(xhr.response);

                console.log(answer);

                if (answer.status) {

                    containerResponse.classList.remove("invalid");
                    containerResponse.classList.add('valid');
                    containerResponse.innerHTML = "Успешная авторизация";
                    containerResponse.style.display = 'block';

                    setTimeout(authSuccess, 3000);

                } else {

                    containerResponse.classList.add('invalid');
                    containerResponse.innerHTML = "Ошибка авторизации";
                    containerResponse.style.display = 'block';
                    setTimeout(() => containerResponse.style.display = 'none', 3000);

                }

            }
        }

    }

    function authSuccess() {

        document.getElementById('login-form-wrapper').style.display = 'none';
        document.getElementById('auth-success').style.display = 'block';
    }

    function validateData(name, password) {
        let result = {
            success: true,
            errors: []
        };


        if (!validateFields(name)) {
            result.success = false;
            result.errors.push({
                field: 'name',
                message: 'Имя не корректно'
            });
        }

        if (!validateFields(password)) {
            result.success = false;
            result.errors.push({
                field: 'password',
                message: 'Пароль должен состоять из 3 и более символов'
            });
        }

        return result;
    }

    function validateFields(field) {
        return field.length >= 3 ? true : false;
    }

    function cleanUpErrors(form) {
        let errorMessages;
        let i;
        let invalidFields;

        invalidFields = form.querySelectorAll(
            '.${invalidClass}'.replace('${invalidClass}', 'invalid')
        );

        for (i = 0; i < invalidFields.length; i++) {
            invalidFields[i].className = invalidFields[i].className.replace('invalid', '');
        }

        errorMessages = form.querySelectorAll(
            '.${errorClass}'.replace('${errorClass}', 'error-message')
        );

        for (i = 0; i < errorMessages.length; i++) {
            errorMessages[i].remove();
        }
    }

    function showErrors(form, errors) {
        let i;

        for (i = 0; i < errors.length; i++) {
            showError(form, errors[i]);
        }

        function showError(form, error) {
            let input;
            let errorEl;

            input = form.querySelector('[name=${inputName}]'.replace('${inputName}', error.field));
            errorEl = getErrorElement(error.message);
            input.parentNode.className += ' invalid';

            insertMessage(errorEl, input);

            function insertMessage(newElement, targetElement) {
                targetElement.parentNode.appendChild(newElement);
            }

            function getErrorElement(message) {
                let errorEl;

                errorEl = document.createElement('span');
                errorEl.innerText = message;
                errorEl.className = 'error-message';

                return errorEl;
            }
        }
    }
}

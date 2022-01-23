<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Тестовое задание</title>

  <link href="/css/normalize.css" rel="stylesheet" type="text/css">
  <link href="/css/style.css" rel="stylesheet" type="text/css">

  <script>
    function loadData() {
      return new Promise((resolve, reject) => {
        setTimeout(resolve, 5000);
      })
    }

    loadData()
      .then(() => {
        let preloaderEl = document.getElementById('preloader');
        preloaderEl.classList.add('hidden');
        preloaderEl.classList.remove('visible');
      });
  </script>

</head>

<body>

  <div id="preloader" class="visible">
    <svg class="preloader__image" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
      <path fill="currentColor"
        d="M304 48c0 26.51-21.49 48-48 48s-48-21.49-48-48 21.49-48 48-48 48 21.49 48 48zm-48 368c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.49-48-48-48zm208-208c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.49-48-48-48zM96 256c0-26.51-21.49-48-48-48S0 229.49 0 256s21.49 48 48 48 48-21.49 48-48zm12.922 99.078c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48c0-26.509-21.491-48-48-48zm294.156 0c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48c0-26.509-21.49-48-48-48zM108.922 60.922c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.491-48-48-48z">
      </path>
    </svg>
  </div>

  <div class="login-form-wrapper" id="login-form-wrapper">
    <h1>
      Авторизация
    </h1>
    <div class="form-body">
      <form name="auth-form">
        <div class="fieldset">
          <input id="name" name="name" type="text" required>
          <label for="name">
            Имя
          </label>
          <div class="highlighter"></div>
        </div>
        <div class="fieldset">
          <input id="password" name="password" type="password" required>
          <label for="password">
            Пароль
          </label>
          <div class="highlighter"></div>
        </div>
        <div class="auth-response" id="auth-response"></div>
        <div class="fieldset button-set">
          <input type="submit" value="Войти">
        </div>

      </form>
    </div>
  </div>

  <div class="auth-success" id="auth-success">Добро пожаловать</div>


  <script src="/js/main.js"></script>

</body>

</html>

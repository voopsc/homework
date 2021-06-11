    <?php
      // Authentication
      use Framework\Authentication as Auth;
      $auth = new Auth\UAuth;
    ?>
    <!-- modals -->
    <div class="login-registration modal" data-modal="login-signup">
      <span class="overlay"></span>
      <div class="content">
        <?php if (!$auth->getLogin()): ?>
          <ul class="user-action list list-two-items text-center">
            <li class="link active" data-tab-id="login">
              Увійти
            </li>
            <li class="link" data-tab-id="signup">
              Зареєструватися
            </li>
          </ul>
          <div class="form-box">
            <div class="form-wrp text-center visible">
              <h2 class="title-main">Увійти</h2>
              <form class="form-main flex f-center" action="/app/login" method="post">

                <label>
                  <input type="text" name="user" value="" placeholder="Ваше ім'я" min="3" autocomplete="name" required>
                  <i class="icon">
                    <svg viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M23.046 17.454C21.5756 15.9837 19.8254 14.8952 17.9159 14.2363C19.9611 12.8277 21.3047 10.4703 21.3047 7.80469C21.3047 3.50119 17.8035 0 13.5 0C9.19651 0 5.69531 3.50119 5.69531 7.80469C5.69531 10.4703 7.03893 12.8277 9.08413 14.2363C7.17462 14.8952 5.42447 15.9837 3.95408 17.454C1.40426 20.0039 0 23.394 0 27H2.10938C2.10938 20.7192 7.21918 15.6094 13.5 15.6094C19.7808 15.6094 24.8906 20.7192 24.8906 27H27C27 23.394 25.5957 20.0039 23.046 17.454ZM13.5 13.5C10.3596 13.5 7.80469 10.9451 7.80469 7.80469C7.80469 4.66425 10.3596 2.10938 13.5 2.10938C16.6404 2.10938 19.1953 4.66425 19.1953 7.80469C19.1953 10.9451 16.6404 13.5 13.5 13.5Z"/>
                    </svg>
                  </i>
                </label>

                <label>
                  <input type="password" name="password" value="" placeholder="Пароль" min="6" autocomplete="password" required>
                  <i class="icon">
                    <svg viewBox="0 0 16 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M1.15583 9.31746H1.47025V6.53197C1.47025 2.93164 4.39745 0 8.00221 0C11.6025 0 14.5342 2.92721 14.5342 6.53197C14.5342 6.8641 14.2685 7.12981 13.9363 7.12981C13.6042 7.12981 13.3385 6.8641 13.3385 6.53197C13.3385 3.59148 10.9471 1.19568 8.00221 1.19568C5.06172 1.19568 2.66593 3.58705 2.66593 6.53197V9.31746H14.8442C15.4819 9.31746 16 9.83559 16 10.4733V17.9175C16 19.8262 14.4456 21.3806 12.5369 21.3806H3.46305C1.55439 21.3806 0 19.8262 0 17.9175V10.4733C0 9.83559 0.518128 9.31746 1.15583 9.31746ZM1.19568 17.9175C1.19568 19.1663 2.2098 20.1849 3.46305 20.1849H12.5325C13.7813 20.1849 14.7999 19.1708 14.7999 17.9175V10.5131H1.19568V17.9175Z"/>
                      <path d="M7.99779 17.674C6.76225 17.674 5.76142 16.6687 5.76142 15.4376C5.76142 14.202 6.76668 13.2012 7.99779 13.2012C9.23332 13.2012 10.2342 14.2065 10.2342 15.4376C10.2342 16.6687 9.23332 17.674 7.99779 17.674ZM7.99779 14.3925C7.42209 14.3925 6.9571 14.8619 6.9571 15.4332C6.9571 16.0044 7.42209 16.4783 7.99779 16.4783C8.57348 16.4783 9.03847 16.0089 9.03847 15.4376C9.03847 14.8663 8.57348 14.3925 7.99779 14.3925Z"/>
                    </svg>
                  </i>
                </label>

                <fieldset>
                  <button type="submit" name="submit" class="btn">Увійти</button>
                </fieldset>
              </form>
              <!-- <ul class="error-list">
              <li>Такого користувача не існує</li>
              <li>Пароль невірний</li>
            </ul> -->
          </div>
        </div>
        <?php else: ?>
          <div class="form-wrp visible">
            <p class="subtitle">Привет, <?php echo $auth->getLogin(); ?> !</p>
          </div>
          <ul class="user-action list text-center">
            <li class="link active flex f-center">
              <a href="#">Вийти</a>
            </li>
          </ul>
        <?php endif; ?>
      </div>
    </div>

    <!-- Script -->
    <script src="/App/html/js/script.js"></script>
  </body>
</html>

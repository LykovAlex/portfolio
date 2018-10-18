                                                          <!-- CALL ME -->
    <div class="callMe">
      <div class="wrapperForCallMe">
        <h3 id="h3_for_callback"> Связаться с автором блога </h3>
          <form class="formCallMe"  id="form">
          <div class="allInputs">
            <label for="nameSender"> <p> Введите ваше имя </p> </label>
            <div class="wrapperForInput"><input type="text" name="name" id="nameSender" required='required'></div>
            <label for="mailSender"> <p> Введите ваш почтовый адрес </p> </label>
            <div class="wrapperForInput"><input type="email" name="mail" id="mailSender" required='required'></div>
            <!-- <input type="submit" name="submit" value="Отправить письмо" id="submit"> -->
            <button id="submit">Отправить письмо</button>
          </div>
          <div class="wrapperForTextarea clearfix">
            <textarea name="text" placeholder="Написать автору..." required='required' rows="12"  class="textSender"></textarea>
          </div>
        </form>
      </div>
    </div>
                                                          <!-- FOOTER -->
    <footer class='footer'>
      <nav class="footerSection">
        <h3> Страницы </h3>
        <ul>
          <li> <a href="index.php"> Главная </a> </li>
          <li> <a href="blog.php"> Блог </a> </li>
          <li> <a href="contacts.php"> Контакты </a> </li>
        </ul>
      </nav>

      <div class="footerSection">
        <h3> Поиск </h3>
        <form action="search.php" method="post">
          <input type="text" name="search" class="inputSearch" placeholder="Поиск..." required maxlength="30">
        </form>
      </div>

      <nav class="footerSection">
        <h3> Рубрики </h3>
        <ul>
          <li> <a href="view_posts.php?id=1"> Загадочный Тайланд </a> </li>
          <li> <a href="view_posts.php?id=2"> Таинственная Индия </a> </li>
          <li> <a href="view_posts.php?id=3"> Жаркая Африка </a> </li>
        </ul>
      </nav>
    </footer>
    <div class="copy">
      &copy 2018 GO TO TRAVEL
    </div>
  </body>
</html>

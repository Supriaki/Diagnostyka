<div class="wysrodkowanie">
  <div class="login-wrapper">
      <form action="index.php?strona=logowanie" class="form" method="post">
        <h2>Logowanie</h2>
        <div class="input-group">
          <input type="text" name="loginUser" id="loginUser" required>
          <label for="loginUser">Użytkownik</label>
        </div>
        <div class="input-group">
          <input type="password" name="loginPassword" id="loginPassword" required>
          <label for="loginPassword">Hasło</label>
        </div>
        <input type="submit" value="Zaloguj" class="submit-btn">
        <!-- <a href="#forgot-pw" class="forgot-pw">Zapomniałeś Hasła?</a> -->
      </form>

      <!-- <div id="forgot-pw">
        <form action="" class="form">
          <a href="#" class="close">&times;</a>
          <h2>Mail na który należy się skontaktować w tej sprawie: </h2>
          <div class="input-group">
            <input type="email" name="email" id="email" required>
            <label for="email">Email</label>
          </div>
          <inpu`t type="submit" value="Submit" class="submit-btn">
        </form>
      </div> -->
  </div>
</div>
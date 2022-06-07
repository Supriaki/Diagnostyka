<div class="wysrodkowanie">
  <div class="login-wrapper">
    <form action="index.php?strona=logowanie" class="form" method="post">
      <h2>Logowanie</h2>
      <div class="input-group">
        <input type="text" name="loginUser" id="loginUser" required />
        <label for="loginUser">Użytkownik</label>
      </div>
      <div class="input-group">
        <input
          type="password"
          name="loginPassword"
          id="loginPassword"
          required
        />
        <label for="loginPassword">Hasło</label>
      </div>
      <input type="submit" value="Zaloguj" class="submit-btn" />
      <a href="#forgot-pw" class="forgot-pw">Brak loginu?</a>
    </form>

    <div id="forgot-pw">
      <form action="index.php?strona=ustawlogin" method="post" class="form">
        <a href="#" class="close">&times;</a>
        <h2>Formularz ustawienia hasła:</h2>
        <div class="input-group">
          <input type="text" name="nrReg" id="nrReg" required />
          <label for="text">Twój numer w dzienniku</label>
        </div>
        <div class="input-group">
          <input type="text" name="loginReg" id="loginReg" required />
          <label for="text">Twój login (taki sam jak do komputerów)</label>
        </div>
        <div class="input-group">
          <input type="text" name="hasloReg" id="hasloReg" required />
          <label for="text">Twoje hasło (conajmniej 4 litery)</label>
        </div>
        <input type="submit" value="Ustaw" class="submit-btn" />
      </form>
    </div>
  </div>
</div>

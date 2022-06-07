function index_napis() {
  if (screen.width > 600) {
    document.write("Technikum Łączności i Multimediów Cyfrowych w Szczecinie");
  } else {
    document.write("TŁIMC");
  }
}

function tabela_istn() {
  alert("Nazwa bazy danych już istnieje!");
}

function showPass() {
  var input = document.getElementById("loginPassword");
  if (input.type === "password") {
    input.type = "text";
  } else {
    input.type = "password";
  }
}

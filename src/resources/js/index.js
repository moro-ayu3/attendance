window.onload = function () {
  const button = document.getElementById("submit");

  button.addEventListener('Keyup', function () {
    const button = button.value;
    console.log(button);

    if (button) {
      button.disabled = null;
    } else {
      button.disabled = "disabled";
    }

  })
}
function clear() {
  let msg = "Are you sure you want to clear all text input fields?";
  if (confirm(msg)) {
    document.getElementByClass("inputText").value = "";
  }
}

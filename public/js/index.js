// search condition.
function getQueryParam(name) {
  var url = window.location.href;

  name = name.replace(/[\[\]]/g, "\\$&");

  var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
    results = regex.exec(url);

  if (!results) return null;
  if (!results[2]) return "";
  return decodeURIComponent(results[2].replace(/\+/g, " "));
}
{
  // area, genre.
  {
    const elemArea = document.getElementById("searchArea");
    const paramArea = getQueryParam('area');

    let options = elemArea.options;
  }
}

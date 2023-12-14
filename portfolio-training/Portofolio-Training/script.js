/**
 * script.js
 * JavaScript file
 * fetch the github user api
 * @author Ulysse Valdenaire
 */

window.onload = getGithubApi();
let reposGithub;

/**
 * getGithubApi
 * @return void
 */
function getGithubApi() {
  fetch("https://api.github.com/users/UltraViolet33")
    .then(function (res) {
      if (res.ok) {
        return res.json();
      }
    })
    .then(function (value) {
      reposGithub = value.public_repos;
      writeHTML("reposGithub", reposGithub);
    })
    .catch(function (err) {
      console.log("error");
    });
}

/**
 * writeHTML
 * writeHTML content from the js file
 * @param  {string} id
 * @param  {string} value
 * @return void
 */
function writeHTML(id, value) {
  const element = document.getElementById(id);
  element.innerHTML = element.textContent + value;
}

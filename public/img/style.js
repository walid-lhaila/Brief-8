const settings = document.getElementById('settings');
const popup = document.getElementById('popup');

settings.addEventListener('click', (e) => {
popup.classList.toggle("scale-0");
popup.classList.toggle("scale-90");

});

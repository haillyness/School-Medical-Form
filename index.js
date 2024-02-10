document.addEventListener('DOMContentLoaded', function () {
  var links = document.querySelectorAll('.navbar a:not([href="./form.php"])');

  links.forEach(function (link) {
    link.addEventListener('click', function (e) {
      e.preventDefault();

      var targetId = this.getAttribute('href').substring(1);
      var targetElement = document.getElementById(targetId);

      if (targetElement) {
        window.scrollTo({
          top: targetElement.offsetTop - document.querySelector('.container').offsetHeight,
          behavior: 'smooth'
        });
      }
    });
  });

  var aboutContainer = document.getElementById('aboutUs');
  var missionContainer = document.getElementById('mission');
  var teamContainer = document.getElementById('OurTeam');

  function handleScroll() {
    var aboutContainerRect = aboutContainer.getBoundingClientRect();
    var missionContainerRect = missionContainer.getBoundingClientRect();
    var teamContainerRect = teamContainer.getBoundingClientRect(); 

    if (aboutContainerRect.top <= window.innerHeight / 2) {
      aboutContainer.classList.add('visible');
    }

    if (missionContainerRect.top <= window.innerHeight / 2) {
      missionContainer.classList.add('visible');
    }

    if (teamContainerRect.top <= window.innerHeight / 2) {
      teamContainer.classList.add('visible');
      window.removeEventListener('scroll', handleScroll);
    }
  }

  window.addEventListener('scroll', handleScroll);
  handleScroll(); 
});

var currentStep = 1; 

document.getElementById('nextButton').addEventListener('click', function() {
    currentStep++;

   
    var circle1 = document.getElementById('circle1');
    var circle2 = document.getElementById('circle2');

    if (currentStep === 2) {
        circle1.style.backgroundColor = 'transparent';
        circle1.style.color = 'maroon';
        circle2.style.backgroundColor = 'maroon';
        circle2.style.color = 'white';
    }

   
    var progress = (currentStep - 1) * 50; 
    var progressBar = document.querySelector('.line');
    progressBar.style.width = progress + '%';
});
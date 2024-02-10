document.addEventListener('DOMContentLoaded', function () {
    const medicalAttentionYes = document.getElementById('medical-attention-yes');
    const illnessSpecification = document.getElementById('illness-specification');
    const foodAllergiesYes = document.getElementById('food-allergies-yes');
    const foodAllergiesSpecification = document.getElementById('food-allergies-specification');
    const medicineAllergiesYes = document.getElementById('medicine-allergies-yes');
    const medicineAllergiesSpecification = document.getElementById('medicine-allergies-specification');
    const prevButton = document.getElementById('prevButton');
    const nextButton = document.getElementById('nextButton');
    const formSections = document.querySelectorAll('.form-section');
    let currentSection = 1;

    // Function to show or hide a form section based on the current section
    function toggleSectionVisibility(sectionNumber) {
        formSections.forEach(section => {
            section.style.display = section.dataset.section == sectionNumber ? 'block' : 'none';
        });
    }

    // Initial setup
    toggleSectionVisibility(currentSection);

    medicalAttentionYes.addEventListener('change', function () {
        illnessSpecification.style.display = medicalAttentionYes.checked ? 'block' : 'none';
    });

    foodAllergiesYes.addEventListener('change', function () {
        foodAllergiesSpecification.style.display = foodAllergiesYes.checked ? 'block' : 'none';
    });

    medicineAllergiesYes.addEventListener('change', function () {
        medicineAllergiesSpecification.style.display = medicineAllergiesYes.checked ? 'block' : 'none';
    });

    prevButton.addEventListener('click', function () {
        if (currentSection > 1) {
            currentSection--;
            toggleSectionVisibility(currentSection);
        }
    });

    nextButton.addEventListener('click', function () {
        if (currentSection < formSections.length) {
            currentSection++;
            toggleSectionVisibility(currentSection);
        }
    });
});

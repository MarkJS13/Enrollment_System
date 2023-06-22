document.addEventListener("DOMContentLoaded", function() {
    var selectedSubjects = [];
  
    var subjectDropdown = document.getElementById("subject-dropdown");
    var addSubjectButton = document.getElementById("add-subject");
    var selectedSubjectsDiv = document.getElementById("selected-subjects");
    var selectedSubjectsInput = document.getElementById("selected-subjects-input");
  
    function createSubjectElement(subject) {
      var subjectElement = document.createElement("div");
      subjectElement.classList.add("subject-item");
      subjectElement.setAttribute("data-subject", subject);
  
      var subjectName = document.createElement("p");
      subjectName.textContent = subject;
  
      var removeButton = document.createElement("button");
      removeButton.textContent = "X";
      removeButton.addEventListener("click", function(event) {
        event.preventDefault();
        removeSubject(subject);
      });
  
      subjectElement.appendChild(subjectName);
      subjectElement.appendChild(removeButton);
  
      return subjectElement;
    }

    
  
    function addSubject(subject) {
      if (subject.trim() === "") {
        return;
      }
    
      if (selectedSubjects.includes(subject)) {
        alert("Subject already selected.");
        return;
      }
    
      selectedSubjects.push(subject);
    
      selectedSubjectsInput.value = selectedSubjects.join(",");
    
      var subjectElement = createSubjectElement(subject);
      selectedSubjectsDiv.appendChild(subjectElement);
    }
    
  
    function removeSubject(subject) {
      var index = selectedSubjects.indexOf(subject);
      if (index > -1) {
        selectedSubjects.splice(index, 1);
      }
  
      selectedSubjectsInput.value = selectedSubjects.join(",");
      var subjectElements = selectedSubjectsDiv.getElementsByClassName("subject-item");
      for (var i = 0; i < subjectElements.length; i++) {
        var subjectElement = subjectElements[i];
        if (subjectElement.getAttribute("data-subject") === subject) {
          subjectElement.remove();
          break;
        }
      }
    }
  
    addSubjectButton.addEventListener("click", function() {
      var selectedSubject = subjectDropdown.value;
      if (selectedSubject.trim() !== "") {
        addSubject(selectedSubject);
        subjectDropdown.value = "";
      }
    });
    
  
    document.querySelector("form").addEventListener("submit", function(event) {
      // Check if there are any selected subjects
      if (selectedSubjects.length === 0) {
        event.preventDefault();
        alert("Please select at least one subject.");
      }
    });
  });
  

const showDetails = document.querySelectorAll('.show');
const showStudent = document.querySelector('.stud_show');
const showCourse = document.querySelector('.course_show');
const showSubjects = document.querySelector('.subj_show');
const closeDetails = document.querySelectorAll('.close');

showDetails.forEach(show => {
    show.addEventListener('click', e => {
        if(e.target.classList.contains('stud')) {
            showStudent.classList.toggle('show_deets');
        } else if(e.target.classList.contains('cour')) {
            showCourse.classList.toggle('show_deets');
        } else if(e.target.classList.contains('subj')) {
            showSubjects.classList.toggle('show_deets');
        }
    })
})


/*department select chat*/
document
   .getElementById('target')
   .addEventListener('change', function () {
      'use strict';
      var vis = document.querySelector('.vis'),
         target = document.getElementById(this.value);
      if (vis !== null) {
         vis.className = 'inv';
      }
      if (target !== null) {
         target.className = 'vis';
      }
   });

/*student or CR*/
function myFunction() {
   var popup = document.getElementById("myPopup");
   popup.classList.toggle("show");
}

/*stud chat*/
function openStud() {
   document.getElementById("popupForm").style.display = "block";
}
function studSubmit() {
   if (document.getElementById('password').value == 'comp2023') { window.location.href = 'http://localhost/FCRIT_BULLETIN/dept_chat/chat_comp_stud.html'; }
   else if (document.getElementById('password').value == 'mech2023') { window.location.href = 'http://localhost/FCRIT_BULLETIN/dept_chat/chat_mech_stud.html'; } else { alert('Please check your passcode and try again'); }
}
function studClose() {
   document.getElementById("popupForm").style.display = "none";
}

/*cr chat*/
function openCR() {
   document.getElementById("popupForm1").style.display = "block";
}
function crSubmit() {
   if (document.getElementById('password1').value == 'fcrit@comp') { window.location.href = 'http://localhost/FCRIT_BULLETIN/dept_chat/chat_comp_cr.html'; } else if (document.getElementById('password1').value == 'fcrit@mech') { window.location.href = 'http://localhost/FCRIT_BULLETIN/dept_chat/chat_mech_cr.html'; } else { alert('Please check your passcode and try again'); }
}
function crClose() {
   document.getElementById("popupForm1").style.display = "none";
}

/*contact form*/
function openContact() {
   document.getElementById("myForm").style.display = "block";
}
function closeContact() {
   document.getElementById("myForm").style.display = "none";
}
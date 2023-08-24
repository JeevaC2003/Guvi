function swapForms() {
  var form1 = document.getElementById('one');
  var form2 = document.getElementById('two');

  if (form1.classList.contains('view')) { 
    form1.classList.remove('view');
    form1.classList.add('hide');
    
    form2.classList.remove('hide'); 
    form2.classList.add('view');
  } else {
    form1.classList.remove('hide');
    form1.classList.add('view');
    
    form2.classList.remove('view');
    form2.classList.add('hide');
  }
}
// <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.all.js"></script>

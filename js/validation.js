// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()

const password = document.getElementById("password");
const password2 = document.getElementById("password2");
if(password){
  password.addEventListener("input",(event) => {
    if(password.value.length <8){
      password.setCustomValidity("Mật khẩu tối thiểu 8 ký tự");
      password.reportValidity();
    }else {
      password.setCustomValidity("");
    }
  });
  password2.ad
}
if(password2){
  password2.addEventListener("input", (event) => {
    if (password.value != password2.value) {
      password2.setCustomValidity("Mật khẩu không khớp");
      password2.reportValidity();
    } else {
      password2.setCustomValidity("");
    }
  });
}

const phone = document.getElementById("phone");
if(phone){
  phone.addEventListener("input", (event) => {
    if (phone.value.length<10 || isNaN(0 + phone.value)) {
      phone.setCustomValidity("Số điện thoại không hợp lệ");
      phone.reportValidity();
    } else {
      phone.setCustomValidity("");
    }
    });
}

// function addProduct(){  
var size = document.querySelector('input[name="size"]:checked');   
//   // if(size == null) {   
//   //     var error = document.getElementById('errorSize');
//   //     window.alert("Vui lòng chọn size");
//   // }  

// }  
const form = document.getElementById("FormAddProduct");
const errorSize = document.getElementById("errorSize");

form.addEventListener("submit", function(event) {
  // if the email field is valid, we let the form submit
  if (size == null) {
    // If it isn't, we display an appropriate error message
    errorSize.textContent = "You need to enter an e-mail address.";
    // Then we prevent the form from being sent by canceling the event
    event.preventDefault();
    window.location = this.href;
  }

});


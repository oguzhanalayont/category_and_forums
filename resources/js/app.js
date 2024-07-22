import './bootstrap';
import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;
// app.js

import toastr from 'toastr';
import 'toastr/build/toastr.min.css';

// Toastr yapılandırma (isteğe bağlı)
toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
};

// Sayfa yüklendiğinde mesajları kontrol et
document.addEventListener('DOMContentLoaded', () => {
  const notificationMessage = document.getElementById('notification-message');
  const type = notificationMessage?.dataset.type;

  if (notificationMessage && type) {
    toastr[type](notificationMessage.innerText);
  }
});

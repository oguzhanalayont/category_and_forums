import './bootstrap';
import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;
// app.js

import 'toastr/build/toastr.min.css';
import toastr from 'toastr';

window.toastr = toastr;

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
  console.log('Toastr:', toastr); // Toastr'ın yüklenip yüklenmediğini kontrol edin
});

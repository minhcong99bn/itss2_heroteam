require('./bootstrap');
require('./script');
import swal from 'sweetalert2';
window.Swal = swal;

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

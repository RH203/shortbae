import './bootstrap';
import "flyonui/flyonui"

import Swal from 'sweetalert2'

window.Swal = Swal


import flatpickr from "flatpickr";
import "flatpickr/dist/flatpickr.min.css";

window.addEventListener('load', function () {
  flatpickr('#flatpickr-date', {
    monthSelectorType: 'static'
  })
})

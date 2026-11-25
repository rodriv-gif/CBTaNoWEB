// Carga los datos de la reserva elegida dentro del modal y calcula la fecha límite de devolución
const modalConfirmar = document.getElementById('confirmarPrestamoModal');
const selectTipo = document.getElementById('id_tipo_prestamo');
let diasDomicilioActual = 7;

if (modalConfirmar) {
    modalConfirmar.addEventListener('show.bs.modal', function (evento) {
        const boton = evento.relatedTarget;
        if (!boton) {
            return;
        }

        document.getElementById('modal_id_reserva').value = boton.getAttribute('data-id');
        document.getElementById('modal_folio').textContent = boton.getAttribute('data-folio');
        document.getElementById('modal_lector').textContent = boton.getAttribute('data-lector');
        document.getElementById('modal_libro').textContent = boton.getAttribute('data-libro');

        diasDomicilioActual = parseInt(boton.getAttribute('data-dias'), 10) || 7;
        actualizarFechaCalculada();
    });
}

// Recalcula la fecha límite mostrada cuando el bibliotecario cambia el tipo de préstamo
function actualizarFechaCalculada() {
    const etiquetaFecha = document.getElementById('modal_fecha_devolucion');
    if (!selectTipo || !etiquetaFecha) {
        return;
    }

    const fecha = new Date();
    if (selectTipo.value !== '1') {
        fecha.setDate(fecha.getDate() + diasDomicilioActual);
    }

    const dia = String(fecha.getDate()).padStart(2, '0');
    const mes = String(fecha.getMonth() + 1).padStart(2, '0');
    const anio = fecha.getFullYear();
    etiquetaFecha.textContent = dia + '/' + mes + '/' + anio;
}

if (selectTipo) {
    selectTipo.addEventListener('change', actualizarFechaCalculada);
}
function habilitarBotonBuscarViaje() {
    document.getElementById('buscarViajeBtn').removeAttribute('disabled');
    document.getElementById('buscarViajeBtn1').removeAttribute('disabled');
}

document.addEventListener("DOMContentLoaded", function () {
    const modalOverlay = document.getElementById('modal-overlay');
    const modal = document.getElementById('modal');
    const openModalButton = document.getElementById('open-modal'); // Agregado

    // Abre el modal
    function openmodal() {
        modalOverlay.classList.remove("hidden");
    }

    // Cierra el modal
    function closemodal() {
        modalOverlay.classList.add("hidden");
    }

    // Abre el modal al hacer clic en el botón
    openModalButton.addEventListener("click", () => {
        openmodal();
    });

    // Cierra el modal si se hace clic en cualquier parte fuera del contenido del modal
    modalOverlay.addEventListener("click", (event) => {
        if (event.target === modalOverlay) {
            closemodal();
        }
    });
});

const redondoRadio = document.getElementById('redondo');
const sencilloRadio = document.getElementById('sencillo');
const datepickerRange = document.getElementById('datepickerRange');
const datepickerSingle = document.getElementById('datepickerSingle');

const toggleDatepickers = () => {
    if (redondoRadio.checked) {
        datepickerRange.classList.remove('hidden');
        datepickerSingle.classList.add('hidden');
    } else if (sencilloRadio.checked) {
        datepickerRange.classList.add('hidden');
        datepickerSingle.classList.remove('hidden');
    }
};

redondoRadio.addEventListener('change', toggleDatepickers);
sencilloRadio.addEventListener('change', toggleDatepickers);

let selectedCounts = {
    adult: 0,
    child: 0,
    inapam: 0,
    professor: 0,
    student: 0
};

const openModalButton = document.getElementById('openTicketModal');
const closeModalButton = document.getElementById('closeTicketModal');
const ticketModal = document.getElementById('ticketModal');
const incrementButtons = document.querySelectorAll('[data-type^="increment"]');
const decrementButtons = document.querySelectorAll('[data-type^="decrement"]');
const totalMessageElement = document.getElementById('totalMessage'); // Elemento para mostrar el mensaje


openModalButton.addEventListener('click', () => {
    event.preventDefault();
    ticketModal.style.display = 'flex';
});

closeModalButton.addEventListener('click', () => {
    ticketModal.style.display = 'none';
    let totalTickets = 0;

    for (const type in selectedCounts) {
        const countElement = document.getElementById(`${type}Count`);
        const inputElement = document.getElementById(`${type}Input`);
        countElement.textContent = selectedCounts[type];
        inputElement.value = selectedCounts[type];

        totalTickets += selectedCounts[type]; // Sumar al total de boletos
    }
    const totalMessage = `${totalTickets} pasajeros`;
    totalMessageElement.textContent = totalMessage;

    openModalButton.textContent = `${totalTickets} Pasajero(s)`; // Actualizar el contenido del botón
});
document.addEventListener('DOMContentLoaded', function () {
    const boletoAbiertoButton = document.getElementById('boletoAbiertoButton');
    const fechaEspecificaInput = document.getElementById('fechaEspecifica');
    const professorCount = document.getElementById('professorCount');
    const studentCount = document.getElementById('studentCount');

    boletoAbiertoButton.addEventListener('click', function () {
        professorCount.textContent = '0';
        studentCount.textContent = '0';
        selectedCounts.professor = 0;
        selectedCounts.student = 0;

        const incrementProfessorButton = document.querySelector('[data-type="increment-professor"]');
        const decrementProfessorButton = document.querySelector('[data-type="decrement-professor"]');
        const incrementStudentButton = document.querySelector('[data-type="increment-student"]');
        const decrementStudentButton = document.querySelector('[data-type="decrement-student"]');


        incrementProfessorButton.disabled = true;
        decrementProfessorButton.disabled = true;
        incrementStudentButton.disabled = true;
        decrementStudentButton.disabled = true;

        // Habilitar el input de fecha específica
        fechaEspecificaInput.disabled = false;
        fechaEspecificaInput.value = ""; // Limpiar el valor del input al cambiar a "Boleto Abierto"
    });

});
incrementButtons.forEach((button) => {
    button.addEventListener('click', (event) => {
        event.stopPropagation();
        const type = button.getAttribute('data-type').split('-')[1];
        updateCount(type, 1);
    });
});

decrementButtons.forEach((button) => {
    button.addEventListener('click', (event) => {
        event.stopPropagation();
        const type = button.getAttribute('data-type').split('-')[1];
        updateCount(type, -1);
    });
});

function updateCount(type, increment) {
    const maxCounts = {
        adult: 10,
        child: 9,
        inapam: 6,
        professor: 2,
        student: 8
    };

    selectedCounts[type] = Math.min(Math.max(selectedCounts[type] + increment, 0), maxCounts[type]);

    const countElement = document.getElementById(`${type}Count`);
    countElement.textContent = selectedCounts[type];
}
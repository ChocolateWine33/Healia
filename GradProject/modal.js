const openModalButtons = document.querySelectorAll('[data-modal-target]')
const overlay = document.getElementById('overlay')

openModalButtons.forEach(button => {
  button.addEventListener('click', () => {
    const modal = document.querySelector(button.dataset.modalTarget)
    openModal(modal)
  })
})



overlay.addEventListener('click', () => {
  const modals = document.querySelectorAll('.modal.active')
  const modals_d = document.querySelectorAll('.modal-d.active')
  const modals_s = document.querySelectorAll('.modal-s.active')

  const modals_td = document.querySelectorAll('.modal-td.active')
  const modals_tu = document.querySelectorAll('.modal-tu.active')
  const modals_te = document.querySelectorAll('.modal-te.active')

  modals.forEach(modal => {
    closeModal(modal)
    

  })
  modals_d.forEach(modal => {
    closeModal(modal)
  })
  modals_td.forEach(modal => {
    closeModal(modal)
  })
  modals_tu.forEach(modal => {
    closeModal(modal)
  })
  modals_te.forEach(modal => {
    closeModal(modal)
  })
  modals_s.forEach(modal => {
    closeModal(modal)
  })
  
})



function openModal(modal) {
  if (modal == null) return
  modal.classList.add('active')
  overlay.classList.add('active')
}

function closeModal(modal) {
  if (modal == null) return
  modal.classList.remove('active')
  overlay.classList.remove('active')
}
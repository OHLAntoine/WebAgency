const menuIcon = document.querySelector('.fa-bars')
const menuList = document.querySelector('.menu-list')
const cover = document.querySelector('.cover')
const left = document.querySelector('.fa-chevron-left')
const right = document.querySelector('.fa-chevron-right')
const links = document.querySelectorAll('.menu-list li')

// Affichage de la nav

const menu = () => {
    menuList.classList.toggle('menu-list-active')
}

menuIcon.addEventListener('click', menu)

// Changement de Cover

const slide = () => {
    cover.classList.toggle('bg-2')
}

left.addEventListener('click', slide)
right.addEventListener('click', slide)
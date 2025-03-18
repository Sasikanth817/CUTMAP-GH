const form = document.querySelector('.pay-form');
const isAnimate = document.querySelectorAll('.isAnimate');
form .addEventListener('mouseenter',()=>{
isAnimate.forEach(anim=>anim.classList.add('anim-run'));
})
form .addEventListener('mouseleave',()=>{
isAnimate.forEach(anim=>anim.classList.remove('anim-run'));
})
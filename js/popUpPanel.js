
let a = document.querySelector('.add_std');
let b = document.querySelector('.add_std_btn');
let c = document.querySelector('.add_std_cls');

b.addEventListener('click', close_open)
c.addEventListener('click', close_open)

function close_open(){
    a.classList.toggle('visOFF');
}
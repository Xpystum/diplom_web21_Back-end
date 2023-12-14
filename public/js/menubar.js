let bar = document.querySelector('.bar');
let arrow = document.querySelector('.arrow');
let btnBar = document.querySelector('.button-bar');
let textsMenu = document.querySelectorAll('.text-menu');

console.log(textsMenu);


btnBar.addEventListener('click', (evt)=>{
    if(bar.classList.contains('active')){
        bar.classList.remove('active');
        arrow.classList.add('active');
        textsMenu.forEach((text)=>
            text.classList.add('active')
        )
        return;
    }
    if(arrow.classList.contains('active')){
        bar.classList.add('active');
        arrow.classList.remove('active');
        textsMenu.forEach((text)=>
            text.classList.remove('active')
        )
        return;
    }
    
    
})



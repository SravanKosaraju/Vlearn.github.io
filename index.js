const burger=document.querySelector('.burger')
const navbar=document.querySelector('.navbar') 
const navlist=document.querySelector('.nav-list') 
const rightnav=document.querySelector('.rightnav') 


burger.addEventListener('click',()=>{
     rightnav.classList.toggle('vclass-resp')
     navlist.classList.toggle('vclass-resp')
     navbar.classList.toggle('navheight-resp')
     navbar.classList.toggle('bg')
})

window.addEventListener('scroll',()=> {
     let scrollPosition = window.pageYOffset;
     if (scrollPosition >= 100) {
       navbar.classList.add('bg');
     } else {
       navbar.classList.remove('bg');
     }
});
 
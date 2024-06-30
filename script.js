let menu = document.querySelector('#menu-bar');
let navbar = document.querySelector('.navbar');
let videoBtn = document.querySelectorAll('.vid-btn')




 window.onscroll = () =>{
//     searchBtn.classList.remove('fa-times');
//     searchBar.classList.remove('active');
       menu.classList.remove('fa-times');
       navbar.classList.remove('active');
}



menu.addEventListener('click', () =>{
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
});

videoBtn.forEach(btn =>{
    btn.addEventListener('click', ()=>{
        document.querySelector('.controls .active').classList.remove('active');
        btn.classList.add('active');
        let src = btn.getAttribute('data-src');
        document.querySelector('#video-slider').src = src;
    });
});



function popup(popup_name)
{
 get_popup=document.getElementById(popup_name);
  if(get_popup.style.display=="flex")
  {
   get_popup.style.display="none";
  }
  else
  {
   get_popup.style.display="flex";
  }
}


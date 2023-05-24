const li = document.querySelectorAll('.steps__content li')
console.log(li)
// li[0].classList.add('active')

for(i=0; i< li.length; i++){
    li[i].addEventListener('click', function(e){
        for(i=0; i<li.length; i++){
            li[i].classList.remove('active')
        }
        e.target.parentElement.classList.add('active');
    });
    
}
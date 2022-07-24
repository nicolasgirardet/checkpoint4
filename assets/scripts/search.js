// SEARCH TOOL
const keyword = document.getElementById('keyword');
const cards = document.getElementsByClassName('undetailed-dish-card');
const cardContainer = document.getElementById('dish-card-container');

keyword.addEventListener('input', function(event){
    let search = event.target.value;
    fetch('/recipe/' + search)
    .then(response => response.json())
    .then((data) => {
        for (let i = 0; i < cards.length; i++) {
            cards[i].classList.add('d-none');
            for (let j = 0; j < data.length; j++) {
                if (data[j] == cards[i].id) {
                    cards[i].classList.remove('d-none');
                }
            } 
        }
    })
})

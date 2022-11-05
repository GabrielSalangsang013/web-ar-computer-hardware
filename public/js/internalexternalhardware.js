const burger = document.querySelector('.burger');
const nav_links = document.querySelector('.nav-links');
const myBody = document.querySelector('body');
burger.addEventListener('click', () => {
    nav_links.classList.toggle('show_nav_links');
    burger.classList.toggle('cross_burger');
    myBody.classList.toggle('overflow_screen');
});

function liveSearch() {
    // Locate the card elements
    let cards = document.querySelectorAll('.hardware')
    // Locate the search input
    let search_query = document.getElementById("searchbox").value;
    // Loop through the cards
    for (var i = 0; i < cards.length; i++) {
        // If the text is within the card...
        if(cards[i].textContent.toLowerCase().includes(search_query.toLowerCase())) {
            cards[i].classList.remove("is-hidden");
        } else {
            cards[i].classList.add("is-hidden");
        }
    }
}

let typingTimer;        
let typeInterval = 500; // Half a second
let searchInput = document.getElementById('searchbox');

searchInput.addEventListener('keyup', () => {
    clearTimeout(typingTimer);
    typingTimer = setTimeout(liveSearch, typeInterval);
});
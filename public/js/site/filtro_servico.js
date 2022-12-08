const input = document.querySelector(".filter input")
const cards  =  document.querySelector(".card-deck")

const filterCard = (cardArray, inputvalue, returnBool) => cardArray

    .filter(card => {
        
        const boolCard = card.id.toLowerCase().includes(inputvalue)
        return returnBool? boolCard : !boolCard
    })

const hiddenCard = (cardArray,inputvalue ) => {
  
    filterCard(cardArray,inputvalue, false )
    .forEach(card => {
        card.classList.add("hidden-filter")
     })
    
}

const showCard = (cardArray,inputvalue ) => {

        filterCard(cardArray,inputvalue, true )
        .forEach(card => {
            card.classList.remove("hidden-filter")
        })
}


input.addEventListener('input', event => {
    
   const inputvalue = event.target.value.trim().toLowerCase()
   console.log(inputvalue)
   const cardArray =  Array.from(cards.children)
   
   hiddenCard(cardArray,inputvalue)
   showCard(cardArray,inputvalue)

})


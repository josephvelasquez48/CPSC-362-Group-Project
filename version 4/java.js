
// create a new `Date` object
const now = new Date();

// get the current date and time as a string
const currentDateTime = now.toLocaleString();

console.log(currentDateTime);

const container1 = document.getElementsByClassName
("container1")[0];

const box = document.getElementsByClassName
("box")[0];
const Word = document.getElementById("Word");
const definition = document.getElementById("definition");
let contentArray = localStorage.getItem('item') ?
JSON.parse(localStorage.getItem('item')) : [];


contentArray.forEach(divMaker);

function divMaker(text){
    var card = document.createElement("div")
    card.className = 'flashcard';

    var front = document.createElement("div");
    front.className = 'front';
    front.innerHTML = text.Word;

    var back = document.createElement("div");
    back.className = 'back';
    back.innerHTML = text.definition;

    card.appendChild(front);
    card.appendChild(back);
    container1.appendChild(card);

    card.addEventListener("click", function() {
        card.classList.toggle('flipped');
    });

}

function addcard() {
    var wordInput = document.getElementById("Word").value.trim(); // Trim to remove leading and trailing whitespace
    var definitionInput = document.getElementById("definition").value.trim();
    var wordMaxLength = 20;
    var definitionMaxLength = 150;

     // Check if input fields exceed the maximum character limit
     if (wordInput.length > wordMaxLength || definitionInput.length > definitionMaxLength) {
        alert("Word or definition exceeds maximum character limit!");
        return;
    }

    // Check if input fields are empty
    if (wordInput === '' || definitionInput === '') {
        alert("You must enter a definition/word. The input box cannot be empty.");
        return; // Exit the function early if input fields are empty
    }


    var flashcard_data = {
        'Word': wordInput,
        'definition': definitionInput
    }

//Create table row
var row = document.createElement("tr");

//Create and append table data for Word and definition
var wordCell = document.createElement("td");
wordCell.textContent = wordInput;
row.appendChild(wordCell);
var definitionCell = document.createElement("td");
definitionCell.textContent = definitionInput;
row.appendChild(definitionCell);

//Append row to table
var tableBody = document.getElementById("tableBody");
tableBody.appendChild(row);
document.getElementById("Word").value = '';
document.getElementById("definition").value = '';
    var flashcard_data = {
        'Word': wordInput,
        'definition': definitionInput
    }

    contentArray.push(flashcard_data);
    localStorage.setItem('item', JSON.stringify(contentArray));
    divMaker(contentArray[contentArray.length - 1]);

    // Clear input fields after saving
    document.getElementById("Word").value = '';
    document.getElementById("definition").value = '';
}




function eraseset(){
    localStorage.clear();
    container1.innerHTML=' ';
    contentArray = [];
    var tableBody = document.getElementById("tableBody");
    while(tableBody.hasChildNodes()){
    tableBody.removeChild(tableBody.firstChild)};
}

function showbox(){
    box.style.display = "block"
}

function hidebox(){
    box.style.display = "none"
}


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
var div = document.createElement("div");
var h2_word = document.createElement("h2_word");
var h2_def = document.createElement("h2_def");

div.className = 'container1';
h2_word.innerHTML = "<br><span class='flashcard-word' id='flashcard-" + text.Word + "'>" + text.Word + "</span><br>"; // Wrap word in span with unique id

h2_def.innerHTML = text.definition;

div.appendChild(h2_word);
div.appendChild(h2_def);
container1.appendChild(div);

document.getElementById("flashcard-" + text.Word).addEventListener("click", function() {
    var word = text.Word;
    var url = "https://www.dictionary.com/browse/" + word;
    window.open(url, "_blank");
});

}

function addcard() {
    var wordInput = document.getElementById("Word").value.trim(); // Trim to remove leading and trailing whitespace
    var definitionInput = document.getElementById("definition").value.trim();

    // Check if input fields are empty
    if (wordInput === '' || definitionInput === '') {
        alert("You must enter a definition/word. The input box cannot be empty.");
        return; // Exit the function early if input fields are empty
    }

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
}

function showbox(){
    box.style.display = "block"
}

function hidebox(){
    box.style.display = "none"
}


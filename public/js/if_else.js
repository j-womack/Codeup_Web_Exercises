// ignore these lines for now
// just know that the variable 'color' will end up with a random value from the colors array
var colors = ['red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'violet'];
var color = colors[Math.floor(Math.random()*colors.length)];

var favorite = 'green'; // TODO: change this to your favorite color from the list

// TODO: Create a block of if/else statements to check for every color except indigo and violet.
if (color === 'red') {
    console.log("Red --> Blood");
} else if (color === 'orange') {
    console.log("Orange --> Orange");
} else if (color === 'yellow') {
    console.log("Yellow --> Sunflower");
} else if (color === 'green') {
    console.log("Green --> Grass");
} else if (color === 'blue') {
    console.log("Blue --> Sky");
} else {
    console.log("I'm not sure what " + color + " is...");
}

var statement = (color == favorite) ? "This is my favorite color" : "";
console.log(statement);
// TODO: When a color is encountered log a message that tells the color, and an object of that color.
//       Example: Blue is the color of the sky.



// TODO: Have a final else that will catch indigo and violet.


// TODO: In the else, log: I do not know anything by that color.


// TODO: Using the ternary operator, conditionally log a statement that
//       says whether the random color matches your favorite color.

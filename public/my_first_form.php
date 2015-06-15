<?php
  var_dump($_GET);
  var_dump($_POST);
?>
<html>
<head>
    <title>My First HTML Form</title>
</head>
<body>
<section>
    <h2>User Login</h2>
    <form method="POST" action="/my_first_form.php">
        <p>
            <label for="email">Email:</label>
            <input id="email" name="email" placeholder="soandso@example.com" type="text" autofocus required>
        </p>
        <p>
            <label for="password">Password:</label>
            <input id="password" name="password" placeholder="Password" type="password" required>
        </p>
        <p>
            <!-- <input type="submit" name="GO!" value="Login"> -->
            <button>Submit</button>
        </p>
    </form>
<hr>
</section>
<section>
    <h2>Compose an Email</h2>
    <form method="POST" action="/my_first_form.php">
        <p>
            <label for="to">To:</label>
            <input type="text" id="to" name="to" placeholder="To">
        </p>

        <p>
            <label for="from">From:</label>
            <input type="text" id="from" name="from" placeholder="From">
        </p>
        <p>
            <label for="subject">Subject:</label>
            <input type="text" id="subject" name="subject" placeholder="Subject">
        </p>
        <p>
            <textarea id="email_body" name="email_body" rows="5" placeholder="Compose an Email"></textarea>
        </p>
        <input type="checkbox" id="save" name="save" value="yes" checked>
        <label for="save">Would you like to save a copy to your sent folder?</label>
        <p><button>Submit</button></p>
    </form>
</section>
<hr>
<section>
    <h2>Multiple Choice Test</h2>
    <form method="POST" action="/my_first_form.php">
        <p>Where are we?</p>
        <label>
            <input type="radio" name="q1" value="houston">
            Houston
        </label>
        <label>
            <input type="radio" name="q1" value="dallas">
            Dallas
        </label>
        <label>
            <input type="radio" name="q1" value="austin">
            Austin
        </label>
        <label>
            <input type="radio" name="q1" value="san antonio">
            San Antonio
        </label>
        <p><button>Submit</button></p>
    </form>
</section>
<hr>
<section>
    <h2>Another Question</h2>
    <form method="POST" action="my_first_form.php">
        <p>Where would you like to visit? (Check all that apply)</p>
        <label><input type="checkbox" id="place1" name="place[]" value="austin">Austin</label>
        <label><input type="checkbox" id="place2" name="place[]" value="chicago">Chicago</label>
        <label><input type="checkbox" id="place3" name="place[]" value="san francisco">San Francisco</label>
        <label><input type="checkbox" id="place4" name="place[]" value="seattle">Seattle</label>
        <label><input type="checkbox" id="place5" name="place[]" value="new york">New York</label>
        <p>
        <label for="location">Where have you visited? </label>
        <select id="location" name="location[]" multiple>
            <option value="austin">Austin</option>
            <option value="chicago">Chicago</option>
            <option value="san francisco">San Francisco</option>
            <option value="seattle">Seattle</option>
            <option value="new york">New York</option>
        </select>
        </p>    

        <p><button>Submit</button></p>
    </form>
</section>
<hr>
<section>
    <h2>Select Testing</h2>
    <form method="POST" action="my_first_form.php">
        <label for="hungry">Are you hungry?</label>
        <select id="hungry" name="hungry">
            <option value="1">Yes</option>
            <option value="0">No</option>
        </select>
        <p><button>Submit</button></p>
    </form>
</section>
</body>
</html>